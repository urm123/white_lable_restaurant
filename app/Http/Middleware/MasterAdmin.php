<?php
/**
 * Created by PhpStorm.
 * User: janaka
 * Date: 14/03/19
 * Time: 10:47 AM
 */

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

/**
 * Class MasterAdmin
 * @package App\Http\Middleware
 */
class MasterAdmin
{
    /**
     * @param $request
     * @param Closure $next
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::user()->role != 'master_admin') {
            Auth::logout();
            return redirect('/login')->withErrors(['errors' => 'Please login as Master Admin']);
        }
        return $next($request);
    }
}