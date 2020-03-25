<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

/**
 * Class SeucreRedirection
 * @package App\Http\Middleware
 */
class SecureRedirection
{
    /**
     * @param $request
     * @param Closure $next
     * @return \Illuminate\Http\RedirectResponse|mixed
     */
    public function handle($request, Closure $next)
    {

        if (!$request->secure()) {
            return redirect()->secure($request->getRequestUri());
        }

        return $next($request);
    }
}
