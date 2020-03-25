<?php
/**
 * Created by PhpStorm.
 * User: janaka
 * Date: 06/03/19
 * Time: 5:47 PM
 */

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

/**
 * Class Admin
 * @package App\Http\Middleware
 */
class Admin
{
    /**
     * @param $request
     * @param Closure $next
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::user()->role != 'admin') {
            Auth::logout();
            return redirect('/login')->withErrors(['errors' => 'Please login as administrator']);
        }
        return $next($request);
    }
}