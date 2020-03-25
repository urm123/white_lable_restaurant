<?php

namespace App\Http\Controllers\Api\User;

use App\Repository\UserRepository;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

/**
 * Class UserController
 * @package App\Http\Controllers\Api\User
 */
class UserController extends Controller
{

    protected $user;

    /**
     * UserController constructor.
     * @param UserRepository $user_repository
     */
    public function __construct(UserRepository $user_repository)
    {
        $this->user = $user_repository;
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
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {

        $email_check = $this->user->getUserByEmail($request->email);

        if ($email_check) {
            return response()->json([
                'message' => 'Email exists. Use different email or login.',
            ], 400);
        }

        $request->request->set('password', bcrypt($request->password));

        $user = $this->user->create($request->all());

        if ($user) {
            return response()->json([
                'message' => 'Registered successfully',
                'data' => [
                    'user' => $user
                ]
            ]);
        } else {
            return response()->json([
                'message' => 'Registration failed please try again',
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $user = Auth::user();

        if ($user) {
            return response()->json([
                'message' => 'success',
                'data' => [
                    'user' => $user
                ]
            ]);
        } else {
            return response()->json([
                'message' => 'User not found.'
            ], 400);
        }
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
        if ($request->password) {
            $request->request->set('password', bcrypt($request->password));
        }
        $update = $user->update($request->all());

        if ($update) {
            return response()->json([
                'message' => 'Updated successfully!',
                'data' => [
                    'user' => $user
                ]
            ]);
        } else {
            return response()->json([
                'message' => 'Update failed!'
            ], 400);
        }

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
     * @return \Illuminate\Http\JsonResponse
     */
    public function orders(Request $request)
    {
        $type = $request->type;

        $takeaways = Auth::user()->takeaways;

        foreach ($takeaways as $takeaway) {
            $subtotal = 0;

            $discount = 0;


            $takeaway->promotion = $takeaway->promotion;
//            $takeaway->menu_item = $takeaway->menuItem()->withTrashed()->first();
            $takeaway->site_promotion = $takeaway->site_promotion;

            $takeaway->takeaway_items = $takeaway->takeawayItems;

            $takeaway->restaurant = $takeaway->restaurant()->withTrashed()->first();


            foreach ($takeaway->takeaway_items as $takeaway_item) {
                $takeaway_item->menu_item = $takeaway_item->menuItem()->withTrashed()->first();
                $takeaway_item->takeaway_item_addons = $takeaway_item->takeawayItemAddons;
                foreach ($takeaway_item->takeaway_item_addons as $takeaway_item_addon) {
                    $takeaway_item_addon->addon = $takeaway_item_addon->addon()->withTrashed()->first();
                }
                $takeaway_item->variant = $takeaway_item->variant()->withTrashed()->first();

                if ($takeaway_item->menu_item) {

                    $menu_item_price = 0;

                    if ($takeaway_item->variant) {
                        $menu_item_price = $takeaway_item->variant->price * $takeaway_item->quantity;
                    } else {
                        $menu_item_price = $takeaway_item->quantity * $takeaway_item->menu_item->price;
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
                case 'delivered':
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
                if ($takeaway->ticket->messages) {
                    foreach ($takeaway->ticket->messages as $message) {
                        $message->date = Carbon::parse($message->created_at)->toFormattedDateString();
                    }
                }
                $takeaway->ticket->messages = $takeaway->ticket->ticketMessages()->get();
            }

            $takeaway->sub_total = $subtotal;

            $takeaway->type = 'takeaway';


        }

        $reservations = Auth::user()->reservations;

        foreach ($reservations as $reservation) {
            $reservation->restaurant = $reservation->restaurant()->withTrashed()->first();

            $restaurant_address = $reservation->restaurant->city . '+' . $reservation->restaurant->province . '+' . $reservation->restaurant->county . '+' . $reservation->restaurant->postcode;

            $reservation->restaurant->query_address = str_replace(' ', '+', $restaurant_address);

            $reservation->date = Carbon::parse($reservation->time)->toFormattedDateString();
            $reservation->time = Carbon::parse($reservation->time)->format('g:i A');
        }

        $deliveries = Auth::user()->deliveries;

        foreach ($deliveries as $delivery) {
            $discount = 0;

            $delivery->delivery_items = $delivery->deliveryItems;

            $delivery->restaurant = $delivery->restaurant()->withTrashed()->first();

            $subtotal = 0;


            $delivery->promotion = $delivery->promotion;
//            $delivery->menu_item = $delivery->menuItem()->withTrashed()->first();
            $delivery->site_promotion = $delivery->site_promotion;


            foreach ($delivery->delivery_items as $delivery_item) {
                $delivery_item->menu_item = $delivery_item->menuItem()->withTrashed()->first();
                $delivery_item->delivery_item_addons = $delivery_item->deliveryItemAddons;
                foreach ($delivery_item->delivery_item_addons as $delivery_item_addon) {
                    $delivery_item_addon->addon = $delivery_item_addon->addon;
                }
                $delivery_item->variant = $delivery_item->variant;


                if ($delivery_item->menu_item) {

                    $menu_item_price = 0;

                    if ($delivery_item->variant) {
                        $menu_item_price = $delivery_item->variant->price * $delivery_item->quantity;
                    } else {
                        $menu_item_price = $delivery_item->quantity * $delivery_item->menu_item->price;
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

            $delivery->sub_total = $subtotal;

            $delivery->type = 'delivery';

        }


        $orders = [];

        foreach ($deliveries as $delivery) {
            if ($type == 'current') {
                if ($delivery->delivery_status != 'delivered') {
                    $orders[] = $delivery;
                }
            } else if ($type == 'past') {
                if ($delivery->delivery_status == 'delivered') {
                    $orders[] = $delivery;
                }
            } else {
                $orders[] = $delivery;
            }
        }

        foreach ($takeaways as $takeaway) {
            if ($type == 'current') {
                if ($takeaway->takeaway_status != 'delivered') {
                    $orders[] = $takeaway;
                }
            } else if ($type == 'past') {
                if ($takeaway->takeaway_status == 'delivered') {
                    $orders[] = $takeaway;
                }
            } else {
                $orders[] = $takeaway;
            }
        }

        foreach ($reservations as $reservation) {
            $reservation->type = 'reservation';
            if (Carbon::parse($reservation->time)->lte(Carbon::now())) {
                $reservation->reservation_status = 'expired';
            } else {
                $reservation->reservation_status = 'pending';
            }
            $orders[] = $reservation;
        }


        if ($orders) {
            return response()->json([
                'message' => 'success',
                'data' => [
                    'orders' => $orders
                ]
            ]);
        } else {
            return response()->json([
                'message' => 'Failed'
            ], 400);
        }


    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getUser()
    {
        $user = Auth::user();

        $user->address = $user->addresses()->where('default', '=', true)->first();

        if ($user) {
            return response()->json([
                'message' => 'success',
                'data' => [
                    'user' => $user
                ]
            ]);
        } else {
            return response()->json([
                'message' => 'Failed'
            ], 400);
        }
    }
}
