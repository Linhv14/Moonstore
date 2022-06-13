<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        
        if (Auth::check()) {
            $type_user = Auth::user()->type_user;
            if ($type_user == 'Admin')
            {
                return $next($request);
            }
            return redirect('admin-dashboard');
        }
        return redirect('login-admin');   
    }
}