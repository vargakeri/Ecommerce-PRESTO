<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class SetLocaleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request 
     * @param \Closure $next
     * * @param mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $localeLanguage = session('locale','it');
        App::setlocale($localeLanguage);
        return $next($request);
    }
}
