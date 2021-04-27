<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        // if (Auth::guard($guard)->check() && auth()->user()->user_type=1) {
        //     return redirect('/home');
        // }\
        if(Auth::check()){
            if(auth()->user()->user_type== "admin"){
                return redirect('/admin');
            }
            if(auth()->user()->user_type=="intern"){
                return redirect('/dashboard');
            }
        }
        return $next($request);
        
    }
}
