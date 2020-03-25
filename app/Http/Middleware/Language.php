<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

/**
 * Class Language
 * @package App\Http\Middleware
 */
class Language
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        App::setLocale($request->session()->get('language'));
        return $next($request);
    }
}
