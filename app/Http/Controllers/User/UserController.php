<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\MenuItem;
use App\Repository\MenuItemRepository;
use App\Repository\RestaurantRepository;
use App\Repository\UserRepository;
use App\Rules\Telephone;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

/**
 * Class UserController
 * @package App\Http\Controllers\User
 */
class UserController extends Controller
{

    protected $restaurant;

    protected $menu_item;

    protected $user;

    /**
     * UserController constructor.
     * @param RestaurantRepository $restaurant_repository
     * @param MenuItemRepository $menu_item_repository
     * @param UserRepository $userRepository
     */
    public function __construct(RestaurantRepository $restaurant_repository, MenuItemRepository $menu_item_repository, UserRepository $userRepository)
    {
        $this->restaurant = $restaurant_repository;
        $this->menu_item = $menu_item_repository;
        $this->user = $userRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function favourite(Request $request)
    {
        if (!Auth::check()) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Please login to add this restaurant to your favourite list.'
            ]);
        } else {
            $restaurant_id = $request->restaurant_id;

            $restaurant = $this->restaurant->getRestaurant($restaurant_id);

            $user_id = Auth::id();

            $restaurant_user = $restaurant->users()->where('user_id', '=', $user_id)->first();

            if ($restaurant_user) {
                $restaurant_user_result = $restaurant->users()->where('user_id', '=', $user_id)->detach();
            } else {
                $restaurant_user_result = $restaurant->users()->attach($user_id);
            }

            if (!$restaurant_user_result) {
                return response()->json([
                    'status' => 'added',
                    'message' => 'Successfully added to favourites list'
                ]);
            } else {
                return response()->json([
                    'status' => 'removed',
                    'message' => 'Successfully removed from favourites list'
                ]);
            }


        }
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function favourites()
    {
        $user = Auth::user();

        foreach ($user->restaurants as $restaurant) {

            $total = 0;
            $count = 0;


            if ($restaurant->logo) {
                $restaurant->logo = getStorageUrl() . $restaurant->logo;
            } else {
                $restaurant->logo = asset('img/default.jpg');
            }

            foreach ($restaurant->reviews as $review) {
                $total += $review->rating;
                $count++;
            }

            if ($total && $count) {
                $restaurant->rating = number_format($total / $count, 0, '.', '');
            } else {
                $restaurant->rating = 5;
            }
        }

        return view('user.user.favourites', ['user' => $user]);
    }

//    new code
//    new code
//    new code

    public function favouriteMenuItem(Request $request)
    {
        if (!Auth::check()) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Please login to add this menu item to your favourite list.'
            ]);
        } else {
            $menu_item_id = $request->menu_item_id;

            $menu_item = $this->menu_item->get($menu_item_id);

            $user_id = Auth::id();

            $menu_item_user = $menu_item->users()->where('user_id', '=', $user_id)->first();

            if ($menu_item_user) {
                $menu_item_user_result = $menu_item->users()->where('user_id', '=', $user_id)->detach();
            } else {
                $menu_item_user_result = $menu_item->users()->attach($user_id);
            }

            if (!$menu_item_user_result) {
                return response()->json([
                    'status' => 'added',
                    'message' => 'Successfully added to favourites list'
                ]);
            } else {
                return response()->json([
                    'status' => 'removed',
                    'message' => 'Successfully removed from favourites list'
                ]);
            }


        }
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function menuItemFavourites()
    {
        $user = Auth::user();

        foreach ($user->menuItems as $menu_item) {
            if ($menu_item->logo) {
                $menu_item->logo = getStorageUrl() . $menu_item->logo;
            } else {
                $menu_item->logo = asset('img/default.jpg');
            }
        }
        return view('user.user.favourites', ['user' => $user]);
    }

//    new code
//    new code
//    new code

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function deliveries()
    {
        $deliveries = Auth::user()->deliveries()->orderBy('created_at', 'desc')->paginate(15);

        $selected_deliveries = [];


        foreach ($deliveries as $delivery) {

            $discount = 0;

            $delivery->delivery_items = $delivery->deliveryItems;

            $delivery->restaurant = $delivery->restaurant()->withTrashed()->first();

            $subtotal = 0;

            $delivery->promotion = $delivery->promotion;
            $delivery->menu_item = $delivery->menuItem;
            $delivery->site_promotion = $delivery->site_promotion;


            foreach ($delivery->delivery_items as $delivery_item) {
                $delivery_item->menu_item = $delivery_item->menuItem;
                $delivery_item->addon_menu_items = $delivery_item->addonMenuItems;
                foreach ($delivery_item->addon_menu_items as $addon_menu_item) {
                    $addon_menu_item->addon = $this->menu_item->getAddon($addon_menu_item['menu_item_id'], $addon_menu_item['addon_id']);
                }
                $delivery_item->variant = $delivery_item->menuItemVariants;

                if ($delivery_item->variant) {
                    $delivery_item->variant->variant = $this->menu_item->getVariant($delivery_item->variant->menu_item_id, $delivery_item->variant->variant_id);
                }
                if ($delivery_item->menu_item) {

                    $menu_item_price = 0;

                    if ($delivery_item->variant) {
                        $menu_item_price = $delivery_item->variant->price * $delivery_item->quantity;
                    } else {
                        $menu_item_price = $delivery_item->quantity * $delivery_item->menuItem->price;
                    }

                    if ($delivery->menu_item) {
                        if ($delivery->menu_item->id == $delivery->menu_item_id) {
                            if ($delivery->menu_item->promo_type == 'percentage') {
                                $discount = $menu_item_price * $delivery->menu_item->promo_value * 0.01;
                            } else {
                                $discount = $delivery->menu_item->promo_value;
                            }
                        }
                    }

                    $subtotal += $menu_item_price;

                    if ($delivery_item->deliveryItemAddons) {
                        foreach ($delivery_item->deliveryItemAddons as $addon) {
                            if ($addon->addon) {
                                $subtotal += $addon->addon->price;
                            }
                        }
                    }

                }

            }


            if ($delivery->promotion) {
                if ($delivery->promotion->type == 'percentage') {
                    $discount = $subtotal * $delivery->promotion->value * 0.01;
                } else {
                    $discount = $delivery->promotion->value;
                }
            }
            if ($delivery->sitePromotion) {
                if ($delivery->sitePromotion->type == 'percentage') {
                    $discount = $subtotal * $delivery->sitePromotion->value * 0.01;
                } else {
                    $discount = $delivery->sitePromotion->value;
                }
            }

            $delivery->reduction = $discount;

            $original_time = $delivery->time;

            $delivery->time = Carbon::parse($delivery->time)->diffForHumans();

            switch ($delivery->delivery_status) {
                case 'initiated':
                    $progress = 12;
                    break;
                case 'approved':
                    $progress = 25;
                    break;
                case 'dispatched':
                    $progress = 50;
                    break;
                case 'delivered':
                    $progress = 88;
                    break;
                default:
                    $progress = 12;
                    break;
            }

            if (!$delivery->delivery_status) {
                $delivery->delivery_status = 'initiated';
            }

            $delivery->progress = $progress;

            if ($delivery->delivery_items && $delivery->restaurant) {
                $selected_deliveries[] = $delivery;
            }

            if ($delivery->restaurant) {
                $delivery_locations = $delivery->restaurant->deliveryLocations;

                $delivery->elapsed_time = 0;

                foreach ($delivery_locations as $delivery_location) {
                    if ($delivery_location->postcode == $delivery->postcode) {
                        $elapsed_time = Carbon::parse($original_time)->addMinutes($delivery_location->delivery_time)->diffForHumans();
                        if ($elapsed_time > 0 and Carbon::parse($original_time)->gt(Carbon::now())) {
                            $delivery->elapsed_time = $elapsed_time;
                        }
                    }
                }
            }

            $delivery->ticket = $delivery->ticket()->first();

            if ($delivery->ticket) {
                $delivery->ticket->date = Carbon::parse($delivery->ticket->created_at)->toFormattedDateString();
                $delivery->ticket->user = $delivery->ticket->user()->first();
                $delivery->ticket->messages = $delivery->ticket->ticketMessages()->get();
                $delivery->ticket->resolved = (bool)$delivery->ticket->resolved;
                if ($delivery->ticket->messages) {
                    foreach ($delivery->ticket->messages as $message) {
                        $message->date = Carbon::parse($message->created_at)->toFormattedDateString();
                    }
                }
            }
        }

        return view('user.user.deliveries', [
            'deliveries' => $selected_deliveries,
            'paginate' => $deliveries
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function takeaways()
    {
        $takeaways = Auth::user()->takeaways()->orderBy('created_at', 'desc')->paginate(15);

        $selected_takeaways = [];

        foreach ($takeaways as $takeaway) {

            $subtotal = 0;

            $discount = 0;


            $takeaway->promotion = $takeaway->promotion;
            $takeaway->menu_item = $takeaway->menuItem;
            $takeaway->site_promotion = $takeaway->site_promotion;

            $takeaway->takeaway_items = $takeaway->takeawayItems;

            $takeaway->restaurant = $takeaway->restaurant()->withTrashed()->first();


            foreach ($takeaway->takeaway_items as $takeaway_item) {
                $takeaway_item->menu_item = $takeaway_item->menuItem;
                $takeaway_item->addon_menu_items = $takeaway_item->addonMenuItems;
                foreach ($takeaway_item->addon_menu_items as $addon_menu_item) {
                    $addon_menu_item->addon = $this->menu_item->getAddon($addon_menu_item['menu_item_id'], $addon_menu_item['addon_id']);
                }
                $takeaway_item->variant = $takeaway_item->menuItemVariants;

                if ($takeaway_item->variant) {
                    $takeaway_item->variant->variant = $this->menu_item->getVariant($takeaway_item->variant->menu_item_id, $takeaway_item->variant->variant_id);
                }

                if ($takeaway_item->menu_item) {

                    $menu_item_price = 0;

                    if ($takeaway_item->variant) {
                        $menu_item_price = $takeaway_item->variant->price * $takeaway_item->quantity;
                    } else {
                        $menu_item_price = $takeaway_item->quantity * $takeaway_item->menuItem->price;
                    }

                    if ($takeaway->menu_item) {
                        if ($takeaway->menu_item->id == $takeaway->menu_item_id) {
                            if ($takeaway->menu_item->promo_type == 'percentage') {
                                $discount = $menu_item_price * $takeaway->menu_item->promo_value * 0.01;
                            } else {
                                $discount = $takeaway->menu_item->promo_value;
                            }
                        }
                    }

                    $subtotal += $menu_item_price;

                    if ($takeaway_item->takeawayItemAddons) {
                        foreach ($takeaway_item->takeawayItemAddons as $addon) {
                            if ($addon->addon) {
                                $subtotal += $addon->addon->price;
                            }
                        }
                    }

                }
            }

            if ($takeaway->promotion) {
                if ($takeaway->promotion->type == 'percentage') {
                    $discount = $subtotal * $takeaway->promotion->value * 0.01;
                } else {
                    $discount = $takeaway->promotion->value;
                }
            }
            if ($takeaway->sitePromotion) {
                if ($takeaway->sitePromotion->type == 'percentage') {
                    $discount = $subtotal * $takeaway->sitePromotion->value * 0.01;
                } else {
                    $discount = $takeaway->sitePromotion->value;
                }
            }

            $takeaway->reduction = $discount;

            $takeaway->time = Carbon::parse($takeaway->time)->diffForHumans();

            switch ($takeaway->takeaway_status) {
                case 'initiated':
                    $progress = 12;
                    break;
                case 'approved':
                    $progress = 25;
                    break;
                case 'dispatched':
                    $progress = 50;
                    break;
                case 'collected':
                    $progress = 88;
                    break;
                default:
                    $progress = 12;
                    break;
            }

            $takeaway->progress = $progress;

            if ($takeaway->takeaway_items) {
                $selected_takeaways[] = $takeaway;
            }

            $takeaway->ticket = $takeaway->ticket()->first();
            if ($takeaway->ticket) {
                $takeaway->ticket->date = Carbon::parse($takeaway->ticket->created_at)->toFormattedDateString();
                $takeaway->ticket->user = $takeaway->ticket->user()->first();
                $takeaway->ticket->messages = $takeaway->ticket->ticketMessages()->get();
                $takeaway->ticket->resolved = (bool)$takeaway->ticket->resolved;
                if ($takeaway->ticket->messages) {
                    foreach ($takeaway->ticket->messages as $message) {
                        $message->date = Carbon::parse($message->created_at)->toFormattedDateString();
                    }
                }
            }
        }


        return view('user.user.takeaways', [
            'takeaways' => $selected_takeaways,
            'paginate' => $takeaways
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function reservations()
    {
        $reservations = Auth::user()->reservations()->orderBy('created_at', 'desc')->paginate(15);

        foreach ($reservations as $reservation) {
            $reservation->restaurant = $reservation->restaurant()->withTrashed()->first();

            $restaurant_address = $reservation->restaurant->city . '+' . $reservation->restaurant->province . '+' . $reservation->restaurant->county . '+' . $reservation->restaurant->postcode;

            $reservation->restaurant->query_address = str_replace(' ', '+', $restaurant_address);

            $reservation->date = Carbon::parse($reservation->time)->toFormattedDateString();
            $reservation->time = Carbon::parse($reservation->time)->format('g:i A');
        }

        return view('user.user.reservations', [
            'reservations' => $reservations
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function profile()
    {

        return view('user.user.profile', ['user' => Auth::user()]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function profilePost(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone' => new Telephone,
        ]);

        $user = Auth::user()->update($request->all());

        if ($user) {
            $request->session()->flash('success', 'Updated successfully!');
            return redirect(route('user.profile'));
        } else {
            return redirect(route('user.profile'))->withErrors(['Profile update failed']);
        }
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function password()
    {
        return view('user.user.password');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function passwordPost(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required|string|min:6|confirmed',
        ]);

        if (!Hash::check($request->current_password, Auth::user()->getAuthPassword())) {
            $validator->errors()->add('current_password', 'The current password field is required.');
            return redirect(route('user.password'))
                ->withErrors($validator)
                ->withInput();
        }

        if ($validator->fails()) {
            return redirect(route('user.password'))
                ->withErrors($validator)
                ->withInput();
        }


        $user = Auth::user()->update([
            'password' => bcrypt($request->password)
        ]);

        if ($user) {
            $request->session()->flash('success', 'Updated successfully!');
            return redirect(route('user.password'));
        } else {
            return redirect(route('user.password'))->withErrors(['Password update failed']);
        }
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function address(Request $request)
    {
        if ($request->delivery) {
            if (Auth::user()->email != setting('guest_email_id')) {
                $request->session()->put('delivery_redirect', true);
            } else {
                return redirect(route('delivery.create'));
            }
        }
        $addresses = Auth::user()->addresses()->get();
        return view('user.user.address', ['addresses' => $addresses]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function dining()
    {
        return view('user.user.dining', ['user' => Auth::user()]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function diningPost(Request $request)
    {
        $user = Auth::user()->update($request->all());

        if ($user) {
            $request->session()->flash('success', 'Updated successfully!');
            return redirect(route('user.dining'));
        } else {
            return redirect(route('user.dining'))->withErrors(['Address update failed']);
        }
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function communication()
    {
        return view('user.user.communication', ['user' => Auth::user()]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function communicationPost(Request $request)
    {
        if ($request->offer_emails) {
            $request->request->set('offer_emails', true);
        } else {
            $request->request->set('offer_emails', false);
        }

        if ($request->restaurant_emails) {
            $request->request->set('restaurant_emails', true);
        } else {
            $request->request->set('restaurant_emails', false);
        }

        $user = Auth::user()->update($request->all());

        if ($user) {
            $request->session()->flash('success', 'Updated successfully!');
            return redirect(route('user.communication'));
        } else {
            return redirect(route('user.communication'))->withErrors(['Address update failed']);
        }
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function payment()
    {
        return view('user.user.payment', ['user' => Auth::user()]);
    }

    /**
     * @param Request $request
     */
    public function paymentPost(Request $request)
    {

    }

    /**
     * @param Request $request
     */
    public function location(Request $request)
    {
        try {
            $latitude = $request->latitude;
            $longitude = $request->longitude;
            $request->session()->put('latitude', $latitude);
            $request->session()->put('longitude', $longitude);
        } catch (\Exception $exception) {

        }
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function guest()
    {
        $guest = $this->user->getGuest();

        if (!$guest) {
            $guest = $this->user->createGuest();
        }
        if (!$guest->addresses()->count()) {
            $guest->addresses()->delete();

            $restaurant = $this->restaurant->getRestaurant(1);

            $guest->addresses()->create([
                'address' => '',
                'street' => '',
                'city' => $restaurant->city,
                'county' => $restaurant->county,
                'postcode' => $restaurant->postcode,
                'default' => $restaurant->true,
            ]);
        }
        Auth::login($guest);

        return redirect()->intended(route('user.home'));
    }
}
