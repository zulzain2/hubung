<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\UserTemporary;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }
 
    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // $request->authenticate();

        $validator = Validator::make($request->all(), [
            'phone_number' => 'required',
        ]);

        if($validator->fails()){
            $data = [
                'status' => 'error', 
                'type' => 'Validation Error',
                'message' => 'Validation error, please check back your input.' ,
                'error_list' => $validator->messages() ,
            ];
            return json_encode($data);
        }

        $user = User::where('phone_number', $request->phone_number)->get()->first();

        if(!$user)
        {
            $data = [
                'status' => 'error', 
                'type' => 'Phone Not Register',
                'message' => 'Phone number is not registered.' ,
                'error_list' => $validator->messages() ,
            ];
            return json_encode($data);
        }

        $otp = rand(1000,9999);
        $otp_expired = date("Y-m-d h:i:s", time() + 300);
        
        

        /* regex for validating the length and the contact number is a number
            it must be a number and must be between 8 to 12 inclusive */
        $passedRegex = preg_match('/\d{8,13}/', $request->phone_number);
        if (!$request->phone_number || !$passedRegex)
            return '{"status":1,"error":"Mobile number invalid"}';

        // Check if country code is already included in the mobile no
        if ($request->phone_number[0] != 6)
            $request->phone_number = "6$request->phone_number"; // if not, append

        $ESMS_USERNAME     = 'magicxutm';
        $ESMS_PASSWORD     = 'magicX2020';

        $URL = 'https://api.esms.com.my/sms/send';

        $data = array(
            'user'	=> $ESMS_USERNAME,
            'pass'	=> $ESMS_PASSWORD,
            'to'	=> $request->phone_number,
            'msg'	=> "RM0.00 Communication: Your verification code is ".$otp." and will expired on ".date('j F Y, g:i a' , strtotime($otp_expired)).""
        );

        $options = array(
            'http' => array(
                'header'  => "Content-type: application/x-www-form-urlencoded; charset=utf-8",
                'method'  => 'POST',
                'content' => http_build_query($data)
            )
        );

        $context  = stream_context_create($options);
        $result = file_get_contents($URL, false, $context);

        $user->otp = $otp;
        $user->otp_expired = $otp_expired;
        $user->save();

        // Auth::loginUsingId($user->id);

        // $request->session()->regenerate();

        $prevUrl = '';

        if($request->getRequestUri() == '/login' && $request->prevUrl)
        {
            // return redirect($request->prevUrl);
            $prevUrl = $request->prevUrl;
        }
        // else
        // {
            // return redirect()->intended(RouteServiceProvider::HOME);
            
        // }
 
        $data = [
            'status' => 'success', 
            'message' => 'Successfully request OTP',
            'user_id' => $user->id,
            'prevUrl' => $prevUrl,
        ];
        return json_encode($data);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function createOtp(Request $request)
    {
        if($request->type)
        {
            if($request->type == 'login')
            {
                $type = $request->type;
                $tempuser = User::find($request->tempuser_id); 
            }
            else if ($request->type == 'register') 
            {
                $type = $request->type;
                $tempuser = UserTemporary::find($request->tempuser_id);
            }

            $prevUrl = $request->prevUrl;

            return view('auth.register_otp')->with(compact('tempuser' , 'type' , 'prevUrl'));
        }
  
    }

    public function storeOtp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'digit1' => 'required',
            'digit2' => 'required',
            'digit3' => 'required',
            'digit4' => 'required',
            'tempuser_id' => 'required'
        ]);

        if($validator->fails()){
        $data = [
            'status' => 'error', 
            'type' => 'Validation Error',
            'message' => 'Validation error, please check back your input.' ,
            'error_list' => $validator->messages() ,
        ];
        return json_encode($data);
        }

        $prevUrl = $request->prevUrl;

        if($request->type == 'login')
        {
            $user = User::find($request->tempuser_id);

            $dbtimestamp = strtotime($user->otp_expired);
            if (($dbtimestamp - time()) > (5 * 60)) {
                $data = [
                    'status' => 'error', 
                    'type' => 'Expired OTP',
                    'message' => 'Otp has expired, you`ll redirect back.' ,
                    'error_list' => '' ,
                ];
                return json_encode($data);
            }
    
            if($user->otp != ($request->digit1.$request->digit2.$request->digit3.$request->digit4))
            {
                $data = [
                    'status' => 'error', 
                    'type' => 'Invalid OTP',
                    'message' => 'Wrong otp, please try again.' ,
                    'error_list' => '' ,
                ];
                return json_encode($data);
            }
    
            Auth::login($user);
    
            $data = [
                'status' => 'success', 
                'message' => 'Successfully connect to system',
                'prevUrl' => $prevUrl,
                'user_id' => $user->id,
            ];
            return json_encode($data);
        }
        else if($request->type == 'register')
        {
            $tempuser = UserTemporary::find($request->tempuser_id);

            $dbtimestamp = strtotime($tempuser->otp_expired);
            if (($dbtimestamp - time()) > (5 * 60)) {
                $data = [
                    'status' => 'error', 
                    'type' => 'Expired OTP',
                    'message' => 'Otp has expired, you`ll redirect back.' ,
                    'error_list' => '' ,
                ];
                return json_encode($data);
            }
    
            if($tempuser->otp != ($request->digit1.$request->digit2.$request->digit3.$request->digit4))
            {
                $data = [
                    'status' => 'error', 
                    'type' => 'Invalid OTP',
                    'message' => 'Wrong otp, please try again.' ,
                    'error_list' => '' ,
                ];
                return json_encode($data);
            }
    
            $user = New User;
            $user->nick_name = $tempuser->nick_name;
            $user->phone_number = $tempuser->phone_number;
            $user->save();
    
            $tempuser->delete();
    
            event(new Registered($user));
    
            Auth::login($user);
    
            $data = [
                'status' => 'success', 
                'message' => 'Successfully register new user',
                'user_id' => $user->id,
            ];
            return json_encode($data);
        }

    }

    public function tryAgainOtp(Request $request){

        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'type' => 'required',
        ]);

        if($validator->fails()){
            $data = [
                'status' => 'error', 
                'type' => 'Validation Error',
                'message' => 'Validation error, please check back your input.' ,
                'error_list' => $validator->messages() ,
            ];
            return json_encode($data);
        }

        if($request->type == 'login')
        {
            $user = User::find($request->user_id);

            $otp = rand(1000,9999);
            $otp_expired = date("Y-m-d h:i:s", time() + 300);
            
            $user->otp = $otp;
            $user->otp_expired = $otp_expired;
            $user->save();

           
            /* regex for validating the length and the contact number is a number
                it must be a number and must be between 8 to 12 inclusive */
            $passedRegex = preg_match('/\d{8,13}/', $request->phone_number);
            if (!$request->phone_number || !$passedRegex)
                return '{"status":1,"error":"Mobile number invalid"}';

            // Check if country code is already included in the mobile no
            if ($request->phone_number[0] != 6)
                $request->phone_number = "6$request->phone_number"; // if not, append

            $ESMS_USERNAME     = 'magicxutm';
            $ESMS_PASSWORD     = 'magicX2020';

            $URL = 'https://api.esms.com.my/sms/send';

            $data = array(
                'user'	=> $ESMS_USERNAME,
                'pass'	=> $ESMS_PASSWORD,
                'to'	=> $request->phone_number,
                'msg'	=> "RM0.00 Communication: Your verification code is ".$otp." and will expired on ".date('j F Y, g:i a' , strtotime($otp_expired)).""
            );

            $options = array(
                'http' => array(
                    'header'  => "Content-type: application/x-www-form-urlencoded; charset=utf-8",
                    'method'  => 'POST',
                    'content' => http_build_query($data)
                )
            );

            $context  = stream_context_create($options);
            $result = file_get_contents($URL, false, $context);


            $data = [
                'status' => 'success', 
                'message' => 'Successfully send OTP',
            ];
        }
        else if($request->type == 'register')
        {
            $tempuser = UserTemporary::find($request->user_id);

            $otp = rand(1000,9999);
            $otp_expired = date("Y-m-d h:i:s", time() + 300);
            
            $tempuser->otp = $otp;
            $tempuser->otp_expired = $otp_expired;
            $tempuser->save();

            $data = [
                'status' => 'success', 
                'message' => 'Successfully send OTP',
            ];
        }
        else
        {
            $data = [
                'status' => 'error', 
                'type' => 'Invalid Request',
                'message' => 'Some data cannot be fetch, please try again.'
            ];
        }

        return json_encode($data);

    }
    
}
