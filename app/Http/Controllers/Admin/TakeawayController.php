<?php

namespace App\Http\Controllers\Admin;

use App\Repository\MenuItemRepository;
use App\Repository\TakeawayRepository;
use App\Takeaway;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

/**
 * Class TakeawayController
 * @package App\Http\Controllers\Admin
 */
class TakeawayController extends Controller
{
    protected $takeaway;

    protected $menu_item;

    /**
     * TakeawayController constructor.
     * @param TakeawayRepository $takeaway_repository
     */
    public function __construct(TakeawayRepository $takeaway_repository, MenuItemRepository $menu_item_repository)
    {
        $this->takeaway = $takeaway_repository;
        $this->menu_item = $menu_item_repository;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $id = false;

        if ($request->id) {
            $id = $request->id;
        }
        return view('admin.takeaway.index', ['id' => $id]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getTakeaways(Request $request)
    {
        $sort = $request->sort;

        $sortString = '';

        switch ($sort) {
            case 'pending':
                $sortString = "'pending','accepted','declined'";
                break;

            case 'accepted':
                $sortString = "'accepted','pending','declined'";
                break;

            case 'declined':
                $sortString = "'declined','pending','accepted'";
                break;
        }

        $takeaways = Auth::user()
            ->restaurant
            ->takeaways()
            ->whereRaw("date(time)>='$request->date_from'")
            ->whereRaw("date(time)<='$request->date_to'")
            ->orderByRaw('field(restaurant_status,' . $sortString . ')')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        foreach ($takeaways as $takeaway) {

            $takeaway->user = $takeaway->user()->first();
            $takeaway->items = $takeaway->takeawayItems()->get();

            $takeaway->subtotal = 0;
            $takeaway->reduction = 0;

            $takeaway->restaurant = $takeaway->restaurant()->first();

            foreach ($takeaway->items as $item) {
                $item->menu_item = $item->menuItem()->first();
                $item->takeaway_item_addons = $item->addonMenuItems()->get();
                $item->variant = $item->menuItemVariants()->first();

                foreach ($item->takeaway_item_addons as $addon_menu_item) {
                    $addon_menu_item->addon = $this->menu_item->getAddon($addon_menu_item['menu_item_id'], $addon_menu_item['addon_id']);
                }

                if ($item->variant) {
                    $item->variant->variant = $this->menu_item->getVariant($item->variant->menu_item_id, $item->variant->variant_id);
                }

                $menu_item_price = 0;

                if ($item->variant) {
                    $menu_item_price = $item->variant->price * $item->quantity;
                } else {
                    if ($item->menuItem)
                        $menu_item_price = $item->quantity * $item->menuItem->price;
                }

                if ($takeaway->menuItem) {
                    if ($takeaway->menuItem->id == $takeaway->menu_item_id) {
                        if ($takeaway->menuItem->promo_type == 'percentage') {
                            $takeaway->reduction = $menu_item_price * $takeaway->menuItem->promo_value * 0.01;
                        } else {
                            $takeaway->reduction = $takeaway->menuItem->promo_value;
                        }
                    }
                }

                $takeaway->subtotal += $menu_item_price;

                if ($item->addonMenuItems) {
                    foreach ($item->addonMenuItems as $addon) {
                        if ($addon)
                            $takeaway->subtotal += $addon->price;
                    }
                }

            }

            if ($takeaway->promotion) {
                if ($takeaway->promotion->type == 'percentage') {
                    $takeaway->reduction = $takeaway->subtotal * $takeaway->promotion->value * 0.01;
                } else {
                    $takeaway->reduction = $takeaway->subtotal->promotion->value;
                }
            }
            if ($takeaway->sitePromotion) {
                if ($takeaway->sitePromotion->type == 'percentage') {
                    $takeaway->reduction = $takeaway->subtotal * $takeaway->sitePromotion->value * 0.01;
                } else {
                    $takeaway->reduction = $takeaway->sitePromotion->value;
                }
            }

            $takeaway->payment = json_decode($takeaway->payment, true);

            $takeaway->date = Carbon::parse($takeaway->time)->toFormattedDateString();
            $takeaway->display_time = Carbon::parse($takeaway->time)->format('g:i A');

            $takeaway->subtotal = number_format($takeaway->subtotal, '2', '.', ',');
            $takeaway->vat = number_format($takeaway->vat, '2', '.', ',');
            $takeaway->reduction = number_format($takeaway->reduction, '2', '.', ',');
            $takeaway->total = number_format($takeaway->total, '2', '.', ',');
        }

        return response()->json([
            'message' => 'success',
            'data' => [
                'takeaways' => $takeaways
            ]
        ]);
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
     * @param \App\Takeaway $takeaway
     * @return \Illuminate\Http\Response
     */
    public function show(Takeaway $takeaway)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Takeaway $takeaway
     * @return \Illuminate\Http\Response
     */
    public function edit(Takeaway $takeaway)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Takeaway $takeaway
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Takeaway $takeaway)
    {

        if ($takeaway->user->email == setting('guest_email_id')) {
            $user_email = $takeaway->email;
        } else {
            $user_email = $takeaway->user->email;
        }


        $restaurant = $takeaway->restaurant()->first();
        $theme = setting('site_theme');

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

        switch ($request->all()['takeaway']['takeaway_status']) {
            case'dispatched':
                Mail::send(['html' => 'user.email.takeaway-ready'], ['takeaway' => $takeaway, 'theme' => $theme],
                    function ($message) use ($user_email) {
                        $message->to($user_email)
                            ->subject('Order ready');
                    });
                break;
        }

        if ($request->all()['takeaway']['restaurant_status'] == 'declined') {
            Mail::send(['html' => 'user.email.takeaway-declined'], ['takeaway' => $takeaway, 'theme' => $theme],
                function ($message) use ($user_email) {
                    $message->to($user_email)
                        ->subject('Order declined');
                });
        }

        $update = $takeaway->update([
            'takeaway_status' => $request->all()['takeaway']['takeaway_status'],
            'restaurant_status' => $request->all()['takeaway']['restaurant_status'],
        ]);

        if ($update) {
            return response()->json([
                'message' => 'success',
                'data' => [
                    'takeaway' => $takeaway
                ]
            ]);
        } else {
            return response()->json([
                'message' => 'failed',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Takeaway $takeaway
     * @return \Illuminate\Http\Response
     */
    public function destroy(Takeaway $takeaway)
    {
        //
    }
}
