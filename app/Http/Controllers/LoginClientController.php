<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\accountRequest;
use Illuminate\Support\Facades\Auth;

class LoginClientController extends Controller
{   
    public function login() {
        return view('client.login_client');
    }

    public function authenticate(accountRequest $request) {

        $credentials = [
            'email'     => $request->email,
            'password'  => $request->password,
        ];
        if (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password']])) 
        {   
            $request->session()->regenerate();          
            return redirect()->route('route.client.index');    
        }

        return back()->withErrors([
            'email' => 'Tài khoản hoặc mật khẩu không đúng.',
        ]);
    }

    public function register() {
        return view('client.register_client');
    }

    public function redirect(Request $request)
    {
        $value = $request->account;
        if ($value == 'register') {
            return redirect()->route('route.client.register_client');
        } else {
            return redirect()->route('route.client.index');
        }
    }

    public function logoutClient(Request $request) {

        Auth::logout();

        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect()->route('route.client.login_client');

    }

    public function fotgetPassword(Request $request) {
        return view('client.forget_password');
    }
}
