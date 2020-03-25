<?php

namespace App\Http\Controllers\MasterAdmin;

use App\Http\Controllers\Controller;
use App\Repository\RestaurantRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;

/**
 * Class ReportController
 * @package App\Http\Controllers\MasterAdmin
 */
class ReportController extends Controller
{
    protected $restaurant;

    /**
     * ReportController constructor.
     * @param RestaurantRepository $restaurant_repository
     */
    public function __construct(RestaurantRepository $restaurant_repository)
    {
        $this->restaurant = $restaurant_repository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function sales()
    {
        $restaurants = $this->restaurant->all();
        return view('master-admin.report.sales', [
            'restaurants' => $restaurants
        ]);
    }

    public function salesData(Request $request)
    {
        $from_date = $request->from_date;
        $to_date = $request->to_date;
        $restaurant_id = $request->restaurant_id;


        $restaurant = $this->restaurant->getRestaurant($restaurant_id);

        $results = [];

        if ($request->type) {
            if ($request->type == 'delivery') {
                $deliveries = $restaurant->deliveries()
                    ->where('restaurant_id', '=', $restaurant_id)
                    ->whereRaw("date(time)>='$from_date'")
                    ->whereRaw("date(time)<='$to_date'")
                    ->get();

                foreach ($deliveries as $delivery) {
                    $delivery->type = 'Delivery';
                    $delivery->items = $delivery->deliveryItems()->get();
                    $delivery->item_count = count($delivery->items);
                    $delivery->date = Carbon::parse($delivery->time)->toFormattedDateString();
                    $delivery->display_time = Carbon::parse($delivery->time)->format('g:i A');
                    $results[] = $delivery;
                }

                return response()->json([
                    'message' => 'success',
                    'data' => [
                        'results' => $results
                    ]
                ]);
            }
            if ($request->type == 'takeaway') {
                $takeaways = $restaurant->takeaways()
                    ->where('restaurant_id', '=', $restaurant_id)
                    ->whereRaw("date(time)>='$from_date'")
                    ->whereRaw("date(time)<='$to_date'")
                    ->get();

                foreach ($takeaways as $takeaway) {
                    $takeaway->type = 'Takeaway';
                    $takeaway->items = $takeaway->takeawayItems()->get();
                    $takeaway->item_count = count($takeaway->items);
                    $takeaway->date = Carbon::parse($takeaway->time)->toFormattedDateString();
                    $takeaway->display_time = Carbon::parse($takeaway->time)->format('g:i A');
                    $results[] = $takeaway;
                }

                return response()->json([
                    'message' => 'success',
                    'data' => [
                        'results' => $results
                    ]
                ]);
            }
        }

        $deliveries = $restaurant->deliveries()
            ->where('restaurant_id', '=', $restaurant_id)
            ->whereRaw("date(time)>='$from_date'")
            ->whereRaw("date(time)<='$to_date'")
            ->get();

        foreach ($deliveries as $delivery) {
            $delivery->type = 'Delivery';
            $delivery->items = $delivery->deliveryItems()->get();
            $delivery->item_count = count($delivery->items);
            $delivery->date = Carbon::parse($delivery->time)->toFormattedDateString();
            $delivery->display_time = Carbon::parse($delivery->time)->format('g:i A');
            $results[] = $delivery;
        }

        $takeaways = $restaurant->takeaways()
            ->where('restaurant_id', '=', $restaurant_id)
            ->whereRaw("date(time)>='$from_date'")
            ->whereRaw("date(time)<='$to_date'")
            ->get();

        foreach ($takeaways as $takeaway) {
            $takeaway->type = 'Takeaway';
            $takeaway->items = $takeaway->takeawayItems()->get();
            $takeaway->item_count = count($takeaway->items);
            $takeaway->date = Carbon::parse($takeaway->time)->toFormattedDateString();
            $takeaway->display_time = Carbon::parse($takeaway->time)->format('g:i A');
            $results[] = $takeaway;
        }

        foreach ($results as $result) {
            $payment = json_decode($result->payment_method, true);
            if ($payment['type'] == '"cash"') {
                $result->payment_method = 'Cash';
            } elseif ($payment['type'] == 'ticket') {
                $result->payment_method = 'Restaurant Ticket';
            } elseif ($payment['type'] == 'paypal') {
                $result->payment_method = 'Paypal';
            } else {
                if (isset($payment['payment']['source'])) {
                    $result->payment_method = 'XXXX XXXX XXXX ' . $payment['payment']['source']['last4'] . ' | ' . $payment['payment']['source']['brand'] . ' | ' . $payment['payment']['source']['exp_year'] . '-' . $payment['payment']['source']['exp_month'];
                } else {
                    $result->payment_method = 'Card';
                }
            }
        }

        return response()->json([
            'message' => 'success',
            'data' => [
                'results' => $results
            ]
        ]);

    }

    public function salesBar()
    {
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function revenue()
    {
        return view('master-admin.report.revenue');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function revenueData(Request $request)
    {
        $from_date = $request->from_date;
        $to_date = $request->to_date;

        $restaurants = $this->restaurant->allWithDeleted();

        foreach ($restaurants as $restaurant) {

            $restaurant->delivery_total = 0;
            $restaurant->takeaway_total = 0;

            $deliveries = $restaurant->deliveries()
                ->whereRaw("date(time)>='$from_date'")
                ->whereRaw("date(time)<='$to_date'")
                ->get();

            foreach ($deliveries as $delivery) {
                $restaurant->site_promotions += $delivery->site_discount;
                $restaurant->restaurant_promotions += $delivery->restaurnt_discount;
                if ($delivery->menuItem) {
                    if ($delivery->menuItem->promo_type == 'flat_rate') {
                        $restaurant->menu_item_promotions += $delivery->menuItem->promo_value;
                    } else {
                        $restaurant->menu_item_promotions += $delivery->menuItem->promo_value * ($delivery->total - $delivery->vat - $delivery->delivery_charge);
                    }
                }
                $delivery->items = $delivery->deliveryItems()->get();

                $restaurant->delivery_total += $delivery->total;

            }

            $takeaways = $restaurant->takeaways()
                ->whereRaw("date(time)>='$from_date'")
                ->whereRaw("date(time)<='$to_date'")
                ->get();

            foreach ($takeaways as $takeaway) {
                $restaurant->site_promotions += $takeaway->site_discount;
                $restaurant->restaurant_promotions += $takeaway->restaurnt_discount;
                if ($takeaway->menuItem) {
                    if ($takeaway->menuItem->promo_type == 'flat_rate') {
                        $restaurant->menu_item_promotions += $takeaway->menuItem->promo_value;
                    } else {
                        $restaurant->menu_item_promotions += $takeaway->menuItem->promo_value * ($takeaway->total - $takeaway->vat);
                    }
                }
                $takeaway->items = $takeaway->takeawayItems()->get();

                $restaurant->takeaway_total += $takeaway->total;
            }

            if (!$restaurant->site_promotions) {
                $restaurant->site_promotions = 0;
            }
            if (!$restaurant->restaurant_promotions) {
                $restaurant->restaurant_promotions = 0;
            }
            if (!$restaurant->menu_item_promotions) {
                $restaurant->menu_item_promotions = 0;
            }


        }

        return response()->json([
            'message' => 'success',
            'data' => [
                'results' => $restaurants,
            ]
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function subscription()
    {
        return view('master-admin.report.subscription');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function subscriptionData(Request $request)
    {
        $from_date = $request->from_date;
        $to_date = $request->to_date;

        $restaurants = $this->restaurant->allWithDeleted();

        return response()->json([
            'message' => 'success',
            'data' => [
                'results' => $restaurants,
            ]
        ]);
    }
}
