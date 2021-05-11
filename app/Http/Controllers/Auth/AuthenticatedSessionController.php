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

        // if($request->getRequestUri() == '/login' && $request->prevUrl)
        // {
        //     return redirect($request->prevUrl);
        // }
        // else
        // {
        //     return redirect()->intended(RouteServiceProvider::HOME);
        // }
       
        $data = [
            'status' => '200', 
            'message' => 'Successfully request OTP' ,
            'user_id' => $user->id,
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
    
}
