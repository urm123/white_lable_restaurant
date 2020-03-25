<?php

namespace App\Http\Controllers\MasterAdmin;

use App\Repository\DeliveryRepository;
use App\Repository\ReservationRepository;
use App\Repository\RestaurantRepository;
use App\Repository\TakeawayRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class OrderController
 * @package App\Http\Controllers\MasterAdmin
 */
class OrderController extends Controller
{
    protected $delivery;
    protected $takeaway;
    protected $reservation;
    protected $restaurant;

    /**
     * OrderController constructor.
     * @param DeliveryRepository $delivery_repository
     * @param TakeawayRepository $takeaway_repository
     * @param ReservationRepository $reservations_repository
     */
    public function __construct(DeliveryRepository $delivery_repository, TakeawayRepository $takeaway_repository, ReservationRepository $reservations_repository, RestaurantRepository $restaurant_repository)
    {
        $this->delivery = $delivery_repository;
        $this->takeaway = $takeaway_repository;
        $this->reservation = $reservations_repository;
        $this->restaurant = $restaurant_repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurants = $this->restaurant->allWithDeleted();
        return view('master-admin.order.index', ['restaurants' => $restaurants]);
    }

    public function get(Request $request)
    {
        $type = $request->type;
        $from_date = $request->from_date;
        $to_date = $request->to_date;
        $restaurant = $request->restaurant;

        $orders = [];


        if ($type == 'delivery') {
            $deliveries = $this->delivery->object();

            if ($from_date) {
                $deliveries = $deliveries->where('created_at', '>=', $from_date);
            }

            if ($to_date) {
                $deliveries = $deliveries->where('created_at', '<=', $to_date);
            }

            if ($restaurant) {
                $deliveries = $deliveries->whereRestaurantId($restaurant);
            }

            $deliveries = $deliveries->get();

            foreach ($deliveries as $delivery) {
                $delivery->type = 'delivery';
                $orders[] = $delivery;
            }
        } elseif ($type == 'takeaway') {
            $takeaways = $this->takeaway->object();

            if ($from_date) {
                $takeaways = $takeaways->where('created_at', '>=', $from_date);
            }

            if ($to_date) {
                $takeaways = $takeaways->where('created_at', '<=', $to_date);
            }

            if ($restaurant) {
                $takeaways = $takeaways->whereRestaurantId($restaurant);
            }


            $takeaways = $takeaways->get();

            foreach ($takeaways as $takeaway) {
                $takeaway->type = 'takeaway';
                $orders[] = $takeaway;
            }
        } elseif ($type == 'reservation') {
            $reservations = $this->reservation->object();

            if ($from_date) {
                $reservations = $reservations->where('created_at', '>=', $from_date);
            }

            if ($to_date) {
                $reservations = $reservations->where('created_at', '<=', $to_date);
            }

            if ($restaurant) {
                $reservations = $reservations->whereRestaurantId($restaurant);
            }

            $reservations = $reservations->get();

            foreach ($reservations as $reservation) {
                $reservation->type = 'reservation';
                $orders[] = $reservation;
            }
        } else {
            $deliveries = $this->delivery->object();

            if ($from_date) {
                $deliveries = $deliveries->where('created_at', '>=', $from_date);
            }

            if ($to_date) {
                $deliveries = $deliveries->where('created_at', '<=', $to_date);
            }

            if ($restaurant) {
                $deliveries = $deliveries->whereRestaurantId($restaurant);
            }

            $takeaways = $this->takeaway->object();

            if ($from_date) {
                $takeaways = $takeaways->where('created_at', '>=', $from_date);
            }

            if ($to_date) {
                $takeaways = $takeaways->where('created_at', '<=', $to_date);
            }

            if ($restaurant) {
                $takeaways = $takeaways->whereRestaurantId($restaurant);
            }

            $reservations = $this->reservation->object();

            if ($from_date) {
                $reservations = $reservations->where('created_at', '>=', $from_date);
            }

            if ($to_date) {
                $reservations = $reservations->where('created_at', '<=', $to_date);
            }

            if ($restaurant) {
                $reservations = $reservations->whereRestaurantId($restaurant);
            }

            $deliveries = $deliveries->get();

            foreach ($deliveries as $delivery) {
                $delivery->type = 'delivery';
                $orders[] = $delivery;
            }

            $takeaways = $takeaways->get();

            foreach ($takeaways as $takeaway) {
                $takeaway->type = 'takeaway';
                $orders[] = $takeaway;
            }

            $reservations = $reservations->get();

            foreach ($reservations as $reservation) {
                $reservation->type = 'reservation';
                $orders[] = $reservation;
            }
        }

        foreach ($orders as $order) {
            $order->restaurant = $order->restaurant()->withTrashed()->first();
            $order->user = $order->user()->first();
            if ($order->type == 'delivery') {
                $order->items = $order->deliveryItems()->get();

                foreach ($order->items as $item) {
                    $item->menuItem = $item->menuItem()->withTrashed()->first();
                }
            }
            if ($order->type != 'reservation') {
                $order->payment = json_decode($order->payment, true);
            }
            if ($order->type == 'takeaway') {
                $order->items = $order->takeawayItems()->get();

                foreach ($order->items as $item) {
                    $item->menuItem = $item->menuItem()->withTrashed()->first();
                }
            }


        }


        return response()->json(['orders' => $orders]);
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
     * @param \App\Order $order
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Order $order
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Order $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Order $order
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //
    }
}
