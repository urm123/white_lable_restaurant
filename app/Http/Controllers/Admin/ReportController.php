<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

/**
 * Class ReportController
 * @package App\Http\Controllers\Admin
 */
class ReportController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.report.index');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function data(Request $request)
    {
        $restaurant = Auth::user()->restaurant()->withTrashed()->first();

        $type = $request->type;
        $from_date = $request->from_date;
        $to_date = $request->to_date;
//        $created_from = $request->created_from;
//        $created_to = $request->created_to;
        $sort = $request->sort;

        if (!$sort) {
            $sort = 'payment_asc';
        }

        $results = [];

        if ($type == 'delivery') {
            $results = $restaurant->deliveries()
                ->whereRaw("date(time)>='$from_date'")
                ->whereRaw("date(time)<='$to_date'")
//                ->whereRaw("date(created_at)>='$created_from'")
//                ->whereRaw("date(created_at)<='$created_to'")
                ->get();
            foreach ($results as $result) {
                $total = 0;
                $item_count = 0;
                foreach ($result->deliveryItems as $delivery_item) {
                    if ($delivery_item->menuItem) {
                        $item_count++;
                    }
                }
                $result->item_count = $item_count;
            }
        }

        if ($type == 'reservation') {
            $results = $restaurant->reservations()
                ->whereRaw("date(time)>='$from_date'")
                ->whereRaw("date(time)<='$to_date'")
//                ->whereRaw("date(created_at)>='$created_from'")
//                ->whereRaw("date(created_at)<='$created_to'")
                ->get();
        }

        if ($type == 'takeaway') {
            $results = $restaurant->takeaways()
                ->whereRaw("date(time)>='$from_date'")
                ->whereRaw("date(time)<='$to_date'")
//                ->whereRaw("date(created_at)>='$created_from'")
//                ->whereRaw("date(created_at)<='$created_to'")
                ->get();
            foreach ($results as $result) {
                $total = 0;
                $item_count = 0;
                foreach ($result->takeawayItems as $takeaway_item) {
                    if ($takeaway_item->menuItem) {
                        $item_count++;
                    }
                }
                $result->item_count = $item_count;
            }
        }

        foreach ($results as $result) {
            $result->date = Carbon::parse($result->time)->toFormattedDateString();
            $result->display_time = Carbon::parse($result->time)->format('g:i A');
            $result->created_date = Carbon::parse($result->created_at)->toFormattedDateString();
            $result->created_display_time = Carbon::parse($result->created_at)->format('g:i A');
            $result->customer = $result->user->first_name . ' ' . $result->user->last_name;
            if ($type == 'delivery' || $type == 'takeaway') {
                $result->payment = json_decode($result->payment, true);
            }
        }

        switch ($sort) {
            case 'payment_asc':
                if ($type == 'delivery' || $type == 'takeaway') {
                    $results = collect($results);
                    $sorted = $results->sortBy(function ($item) {
                        return $item->payment['type'];
                    });
                    $results = $sorted->values()->all();
                }
                break;
            case 'payment_desc':
                if ($type == 'delivery' || $type == 'takeaway') {
                    $results = collect($results);
                    $sorted = $results->sortByDesc(function ($item) {
                        return $item->payment['type'];
                    });
                    $results = $sorted->values()->all();
                }
                break;
            case 'customer_asc':

                $results = collect($results);
                $sorted = $results->sortBy('customer');
                $results = $sorted->values()->all();

                break;
            case 'customer_desc':
                $results = collect($results);
                $sorted = $results->sortByDesc('customer');
                $results = $sorted->values()->all();
                break;
            case 'order_id_asc':
                $results = collect($results);
                $sorted = $results->sortBy('id');
                $results = $sorted->values()->all();
                break;
            case 'order_id_desc':
                $results = collect($results);
                $sorted = $results->sortByDesc('id');
                $results = $sorted->values()->all();
                break;
        }

        return response()->json([
            'message' => 'success',
            'data' => [
                'results' => $results
            ]
        ]);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function dataBar()
    {
        $restaurant = Auth::user()->restaurant()->withTrashed()->first();

        $from_date = Carbon::now()->subMonths(11);

        $delivery_data = [];
        $takeaway_data = [];

        for ($i = 0; $i < 12; $i++) {
            $delivery_data[] = [
                'data' => $restaurant->deliveries()
                    ->whereRaw("month(time)='$from_date->month'")
                    ->whereRaw("year(time)='$from_date->year'")
                    ->get(),
                'month' => $from_date->englishMonth . ' ' . $from_date->year
            ];

            $takeaway_data[] = [
                'data' => $restaurant->takeaways()
                    ->whereRaw("month(time)='$from_date->month'")
                    ->whereRaw("year(time)='$from_date->year'")
                    ->get(),
                'month' => $from_date->englishMonth . ' ' . $from_date->year
            ];

            $from_date->addMonth();

        }

        foreach ($delivery_data as $key => $delivery_datum) {

            $delivery_data[$key]['total'] = 0;

            foreach ($delivery_datum['data'] as $delivery_item) {

                $delivery_data[$key]['total'] += $delivery_item->total;
            }
        }

        foreach ($takeaway_data as $key => $takeaway_datum) {

            $takeaway_data[$key]['total'] = 0;

            foreach ($takeaway_datum['data'] as $takeaway_item) {

                $takeaway_data[$key]['total'] += $takeaway_item->total;
            }
        }

        return response()->json([
            'message' => 'success',
            'data' => [
                'results' => [
                    'takeaway_data' => $takeaway_data,
                    'delivery_data' => $delivery_data,
                ]
            ]
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function total(Request $request)
    {
        $restaurant = Auth::user()->restaurant()->withTrashed()->first();
        $from_date = $request->from_date;
        $to_date = $request->to_date;
//        $created_from = $request->created_from;
//        $created_to = $request->created_to;

        $delivery_totals = $restaurant->deliveries()
            ->whereRaw("date(time)>='$from_date'")
            ->whereRaw("date(time)<='$to_date'")
//            ->whereRaw("date(created_at)>='$created_from'")
//            ->whereRaw("date(created_at)<='$created_to'")
            ->get();

        $takeaway_totals = $restaurant->takeaways()
            ->whereRaw("date(time)>='$from_date'")
            ->whereRaw("date(time)<='$to_date'")
//            ->whereRaw("date(created_at)>='$created_from'")
//            ->whereRaw("date(created_at)<='$created_to'")
            ->get();

        foreach ($delivery_totals as $delivery_total) {
            $delivery_total->payment = json_decode($delivery_total->payment, true);
        }

        foreach ($takeaway_totals as $takeaway_total) {
            $takeaway_total->payment = json_decode($takeaway_total->payment, true);
        }

        return response()->json([
            'message' => 'success',
            'data' => [
                'delivery_totals' => $delivery_totals,
                'takeaway_totals' => $takeaway_totals,
            ]
        ]);
    }
}
