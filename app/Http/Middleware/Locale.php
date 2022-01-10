<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Locale
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
        // tuy chinh thay doi ngon ngu
        $language = $request->session()->get('website_language', config('app.locale'));
        config(['app.locale' => $language]);

        return $next($request);
    }
}
