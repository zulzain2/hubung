<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\UserTemporary;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     // 'name' => 'required|string|max:255',
        //     // 'email' => 'required|string|email|max:255|unique:users',
        //     // 'password' => 'required|string|confirmed|min:8',
        // ]);

        $validator = Validator::make($request->all(), [
            'nick_name' => 'required|string|max:255',
            'phone_number' => 'required|unique:users|string|max:64',
        ],[
            'phone_number.unique' => 'Phone number already registered. Please login.'
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
     
        $otp = rand(1000,9999);
        $otp_expired = date("Y-m-d h:i:s", time() + 300);
        
        $raw_mobile_no = $request->phone_number;

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

        $user_temporary = UserTemporary::create([
            'nick_name' => $request->nick_name,
            'phone_number' => $request->phone_number,
            'otp' => $otp,
            'otp_expired' => $otp_expired,
        ]);

        // $user = User::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        // ]);

        // event(new Registered($user));

        // Auth::login($user);

        // return redirect(RouteServiceProvider::HOME);

        $data = [
            'status' => 'success', 
            'message' => 'Successfully request OTP' ,
            'user_id' => $user_temporary->id,
        ];
        return json_encode($data);
    }


}
