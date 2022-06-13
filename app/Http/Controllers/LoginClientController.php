<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\userRequest;
use App\Http\Requests\accountRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Users;
use Illuminate\Support\Facades\Crypt;


class LoginClientController extends Controller
{   

    public function home() {
        return view('client.index');
    }

    public function login() {
        return view('client.login');
    }

    public function authenticate(accountRequest $request) {

        $credentials = [
            'email'     => $request->email,
            'password'  => $request->password,
        ];
        if (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password']])) 
        {   
            $request->session()->regenerate();          
            return redirect('/');    
        }

        return back()->withErrors([
            'email' => 'Tài khoản hoặc mật khẩu không đúng.',
        ]);
    }

    public function register() {
        return view('client.register');
    }

    public function save(userRequest $request) {
        $user = [
            'password'  => bcrypt($request->password),
            'name'      => $request->name,
            'address'   => $request->address,
            'phone'     => $request->phone,
            'country'   => $request->country,
            'email'     => $request->email,
            'city'      => $request->city, 
        ];
        Users::create($user);
        return redirect('login');
    }

    public function redirect(Request $request)
    {
        $value = $request->account;
        if ($value == 'register') {
            return redirect('/register');
        } else {
            return redirect('/');
        }
    }

    public function logout(Request $request) {

        Auth::logout();

        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('login');

    }

    public function forgetPassword(Request $request) {
        return view('client.forget_password');
    }
}
