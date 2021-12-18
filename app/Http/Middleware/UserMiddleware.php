<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // return $next($request);
        // if (Auth::user()->role == 'user') {
        //     return $next($request);
        // }

        if (Auth::check()) {
            if (Auth::user()) {
                return $next($request);
            } else {
                Auth::logout();
                toastr()->error("Sorry You are not User.");
                return redirect()->route('loginForm');
            }
        } else {
            Auth::logout();
            toastr()->warning("Please Login");
            return redirect()->route('loginForm');
        }
    }
}
