<?php

namespace App\Http\Controllers\MasterAdmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

/**
 * Class PageController
 * @package App\Http\Controllers\MasterAdmin
 */
class PageController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function landing()
    {
        if (Auth::check() && Auth::user()->role == 'master_admin') {
            return redirect(route('master-admin.restaurant.request'));
        } else {
            return view('master-admin.page.landing');
        }
    }
}
