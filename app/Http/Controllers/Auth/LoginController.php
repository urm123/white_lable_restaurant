<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers {
        logout  as performLogout;
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * @param Request $requestre
     * @param $user
     * @return \Illuminate\Http\JsonResponse
     */
    protected function authenticated(Request $request, $user)
    {
        $this->redirectTo = $this->getUrl();

        if ($request->ajax()) {
            return response()->json([
                'auth' => auth()->check(),
                'user' => $user,
                'intended' => $this->redirectTo,
            ]);
        } else {
            return redirect($this->redirectTo);
        }
    }

    /**
     * @return string
     */
    protected function getUrl()
    {
        $redirect_url = redirect()->intended()->getTargetUrl();
        if (Auth::user()->role == 'admin') {
            if ($redirect_url) {
                return $redirect_url;
            } else {
                return route('admin.delivery.index');
            }
        } elseif (Auth::user()->role == 'master_admin') {
            return route('master-admin.restaurant.request');
        } else {
            if ($redirect_url) {
                return $redirect_url;
            } else {
                return route('user.reservations');
            }
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        if (Auth::check() && Auth::user() && isset(Auth::user()->role)) {
            if (Auth::user()->role == 'admin') {
                $this->performLogout($request);
                return redirect()->route('admin.landing');
            } else if (Auth::user()->role == 'master_admin') {
                $this->performLogout($request);
                return redirect()->route('master-admin.landing');
            }
        }
        $this->performLogout($request);
        return redirect()->route('user.home');
    }
}
