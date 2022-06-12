<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\accountRequest;   
use Illuminate\Support\Facades\Auth;

class LoginAdminController extends Controller
{
    public function loginAdmin() {
        return view('admin.login_admin');
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
            return redirect()->route('route.admin.index');
        }
        return back()->withErrors([
            'email' => 'Tài khoản hoặc mật khẩu không đúng.',
        ]);
    }
        
    public function logoutAdmin(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('route.admin.login_admin');
    }  
}
