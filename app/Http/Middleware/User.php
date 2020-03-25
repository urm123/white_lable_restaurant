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
 * Class User
 * @package App\Http\Middleware
 */
class User
{
    /**
     * @param $request
     * @param Closure $next
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::user()->role == 'admin' || Auth::user()->role == 'master_admin') {
            Auth::logout();
            return redirect('/login')->withErrors(['errors' => 'Please login as user']);
        }
        return $next($request);
    }
}
