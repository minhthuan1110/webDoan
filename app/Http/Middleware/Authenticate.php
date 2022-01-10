<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     *
     */
    public function handle($request, Closure $next, ...$guards)
    {
        $url = url()->previous();
        foreach ($guards as $guard) {
            if (!auth($guard)->check()) {
                return redirect($url);
            }
        }

        return $next($request);
    }

    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    // protected function redirectTo($request)
    // {
    //     // if (Auth::guard('admin')->check()) {
    //     //     return redirect()->route('admin.dashboard');
    //     // } else if (Auth::guard('user')->check()) {
    //     //     return redirect()->intended();
    //     // } else
    //     if (!$request->expectsJson()) {
    //         return redirect()->intended('/');
    //     }
    // }
}
