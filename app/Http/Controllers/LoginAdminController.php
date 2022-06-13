<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\accountRequest;   
use Illuminate\Support\Facades\Auth;

class LoginAdminController extends Controller
{
    public function login() {
        return view('admin.login');
    }

    public function authenticate(accountRequest $request) {
        $email = $request->email;
        $type = DB::table('users')->where('email', $email)->value('type_user');
        $credentials = [
            'email'     => $email,
            'password'  => $request->password,
            'type_user' => $type,
        ];

        if (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password'], 'type_user' => 'Admin']) 
            || Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password'], 'type_user' => 'Staff'])) 
        {   
            $request->session()->regenerate();
            return redirect('/admin-dashboard');
        }
        return back()->withErrors([
            'email' => 'Tài khoản hoặc mật khẩu không đúng.',
        ]);
    }
        
    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login-admin');
    }  
}
