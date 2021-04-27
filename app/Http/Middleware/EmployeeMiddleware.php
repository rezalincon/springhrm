<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class EmployeeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (auth()->user()->role == 'employee'){





        }
        else{
            Auth::logout();
            return redirect()->route('accessdenied');

        }
        return $next($request);

    }
}
