<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Validator;

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
            'status' => '200', 
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
                'status' => '200', 
                'message' => 'Successfully connect to system',
                'prevUrl' => $prevUrl,
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
                'status' => '200', 
                'message' => 'Successfully register new user'
            ];
            return json_encode($data);
        }

    }
    
}
