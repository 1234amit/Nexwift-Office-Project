<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
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
        if (Auth::check()) {
            if (Auth::user()->role == '1') //1 for admin, 2 for hr, 3 for employee, 0 for normal user
            {
                return $next($request);
            } elseif (Auth::user()->role == '2') {
                return redirect('/hr/dashboard');
            } elseif (Auth::user()->role == '3') {
                return redirect('/employee/dashboard');
            } else {
                return redirect('/home')->with('message', 'Access denied, as you are not an admin');
            }
        } else {
            return redirect('/login')->with('message', 'Please login first');
        }
    } //end method
}
