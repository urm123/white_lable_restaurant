<?php
/**
 * Created by PhpStorm.
 * User: janaka
 * Date: 12/03/19
 * Time: 10:54 AM
 */

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

/**
 * Class Own
 * @package App\Http\Middleware
 */
class Own
{
    /**
     * @param $request
     * @param Closure $next
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->restaurant->id != Auth::user()->restaurant()->withTrashed()->first()->id) {
            return redirect(route('admin.delivery.index'))->withErrors(['errors' => 'You don\'t own this restaurant']);
        }
        return $next($request);
    }
}