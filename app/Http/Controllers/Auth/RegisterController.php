<?php

namespace App\Http\Controllers\Auth;

use App\Restaurant;
use App\RestaurantClone;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        if (isset($data['role']) && $data['role'] == 'admin') {
            return Validator::make($data, [
                'first_name' => ['required', 'string', 'max:255'],
                'last_name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:6', 'confirmed'],
                'country' => ['required', 'string', 'max:255'],
                'city' => ['required', 'string', 'max:255'],
                'postcode' => ['required', 'string', 'max:255'],
                'province' => ['required', 'string', 'max:255'],
                'subscription' => ['required'],
                'cuisines' => ['required'],
            ]);
        } else {
            return Validator::make($data, [
                'first_name' => ['required', 'string', 'max:255'],
                'last_name' => ['required', 'string', 'max:255'],
                'postcode' => ['required'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:6', 'confirmed'],
            ]);
        }
    }

    /**
     * @param array $data
     * @return mixed
     * @throws \Exception
     */
    protected function create(array $data)
    {
        if (isset($data['role']) && $data['role'] == 'admin') {
            $user = User::create([
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'role' => 'admin',
            ]);


            $data['user_id'] = $user->id;

            if ($data['takeaway'] == 'true') {
                $data['takeaway'] = true;
            } else {
                $data['takeaway'] = false;
            }

            if ($data['delivery'] == 'true') {
                $data['delivery'] = true;
            } else {
                $data['delivery'] = false;
            }

            if ($data['reserve'] == 'true') {
                $data['reserve'] = true;
            } else {
                $data['reserve'] = false;
            }

            $data['price_range'] = 1;

            $restaurant = new Restaurant($data);

            $restaurant->save();

            foreach ($data['cuisines'] as $cuisine) {
                $restaurant->cuisines()->attach($cuisine);
            }

            $clone = $restaurant->restaurantClone()->create($data);

            foreach ($data['cuisines'] as $cuisine) {
                $clone->cuisines()->attach($cuisine);
            }

            $restaurant->delete();

            Mail::raw('Congratulations! You are successfully registered!', function ($message) use ($data) {
                $message->to($data['email'])->subject('Welcome to '.config('app.name'));
            });

            return $user;


        } else {

//            Mail::raw('Congratulations! You are successfully registered!', function ($message) use ($data) {
//                $message->to($data['email'])->subject('Welcome to eatoeat');
//            });

            $user_email = $data['email'];

            $theme = setting('site_theme');
            $restaurant = Restaurant::first();

            if($theme == 'orange-peel') {
                $color_theme = '#ffbf00';
                $button_color = '#d38a0c';
            } elseif ($theme == 'whiskey') {
                $color_theme = '#d3a971';
                $button_color = '#d38a0c';
            } elseif ($theme == 'thunderbird') {
                $color_theme = '#cb1511';
                $button_color = '#900906';
            } elseif ($theme == 'amber') {
                $color_theme = '#ffbf00';
                $button_color = '#d38a0c';
            } elseif ($theme == 'apple') {
                $color_theme = '#409843';
                $button_color = '#2d5840';
            } else {
                $color_theme = '#2A8F38';
                $button_color = '#db6d13';
            }

            $theme = [
                'color_theme'       => $color_theme,
                'button_color'      => $button_color,
                'restaurant_email'  => $restaurant->email,
                'restaurant_tel'    => $restaurant->phone,
                'current_year'      => date('Y'),
                'terms_url'         => config('app.url').'/terms-and-conditions',
                'app_name'          => config('app.name'),
                'app_logo'          => asset('storage/'. $restaurant->logo)
            ];

            Mail::send(['html' => 'user.email.user-registration'], ['data' => $data, 'theme' => $theme],
                function ($message) use ($user_email) {
                    $message->to($user_email)
                        ->subject('Welcome to '.config('app.name'));
                });

            return User::create([
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'postcode' => $data['postcode'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);
        }
    }

    /**
     * @param Request $request
     * @throws \Illuminate\Validation\ValidationException
     */
    public function signupValidation(Request $request)
    {
        if (isset($request->role) && $request->role == 'admin') {
            $this->validate($request, [
                'first_name' => ['required', 'string', 'max:255'],
                'last_name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:6', 'confirmed'],
                'country' => ['required', 'string', 'max:255'],
                'city' => ['required', 'string', 'max:255'],
                'postcode' => ['required', 'string', 'max:255'],
                'province' => ['required', 'string', 'max:255'],
                'subscription' => ['required'],
                'cuisines' => ['required'],
                'name' => ['required'],
            ], ['name' => 'Restaurant name field is required.']);
        } else {
            $this->validate($request, [
                'first_name' => ['required', 'string', 'max:255'],
                'last_name' => ['required', 'string', 'max:255'],
                'postcode' => ['required'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:6', 'confirmed'],
            ]);
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|string
     */
    protected function registered(Request $request, $user)
    {

        $this->redirectTo = $this->getUrl();
        if ($request->ajax()) {
            return response()->json([
                'auth' => auth()->check(),
                'user' => $user,
                'intended' => $this->getUrl(),
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
}
