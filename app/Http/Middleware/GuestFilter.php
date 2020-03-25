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
class GuestFilter
{
    /**
     * @param $request
     * @param Closure $next
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::user()->email == setting('guest_email_id')) {
            Auth::logout();
            return redirect('/login')->withErrors(['errors' => 'Please login as a registered user to access customer area.']);
        }
        return $next($request);
    }
}
