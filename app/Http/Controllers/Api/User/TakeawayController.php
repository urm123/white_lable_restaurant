<?php

namespace App\Http\Controllers\Api\User;

use App\Repository\TakeawayRepository;
use App\Support\Socket;
use App\Takeaway;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Stripe\Charge;
use Stripe\Stripe;

/**
 * Class TakeawayController
 * @package App\Http\Controllers\Api\User
 */
class TakeawayController extends Controller
{
    protected $takeaway;

    protected $socket;

    /**
     * TakeawayController constructor.
     * @param TakeawayRepository $takeaway_repository
     * @param Socket $socket
     */
    public function __construct(TakeawayRepository $takeaway_repository, Socket $socket)
    {
        $this->takeaway = $takeaway_repository;
        $this->socket = $socket;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $takeaways = Auth::user()->takeaways;

        foreach ($takeaways as $takeaway) {
            $takeaway->takeaway_items = $takeaway->takeawayItems;


            foreach ($takeaway->takeaway_items as $takeaway_item) {
                $takeaway->restaurant = $takeaway_item->menuItem->menu->restaurant;
                $takeaway_item->menu_item = $takeaway->menuItem;
            }

            $takeaway->time = Carbon::parse($takeaway->time)->diffForHumans();

            switch ($takeaway->status) {
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
        }

        if ($takeaways) {
            return response()->json([
                'message' => 'success',
                'data' => [
                    'takeaways' => $takeaways
                ]
            ]);
        } else {
            return response()->json([
                'message' => 'Failed'
            ], 400);
        }
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
     * @throws \Pusher\PusherException
     */
    public function store(Request $request)
    {
        $request->request->set('user_id', Auth::id());

        $request->request->set('time', Carbon::parse($request->date . ' ' . $request->time)->toDateTimeString());

        $request->request->set('status', 'initiated');

        $takeaway = $this->takeaway->create($request->all());

        $cart = $request->cart;

        $token = $request->token;

        $total = 0;

        $vat = 0;

        foreach ($cart as $item) {
            $takeaway_item = $this->takeaway->createTakeawayItem([
                'takeaway_id' => $takeaway->id,
                'menu_item_id' => $item['menu_item_id'],
                'quantity' => $item['quantity'],
            ]);

            $total += $item['quantity'] * $takeaway_item->menuItem()->first()->price;

            $vat += $item['quantity'] * $takeaway_item->menuItem()->first()->price * getVat()[$this->takeaway->menuItem->vat_category];

        }

        $total = $total + $vat;


        $this->socket->push($takeaway->attributesToArray(), 'create takeaway', config('app.name').'_'. $request->restaurant_id);

        $charge = null;

        if ($request->stripeToken) {

            Stripe::setApiKey('sk_live_skoYZM5IFV0rCiRWBy25ggVB00muZnJs9E');

            $charge = Charge::create(['amount' => round($total, 2) * 100, 'currency' => 'eur', 'source' => $token]);
        }

        if ($takeaway) {
            if ($charge && $request->payment == 'card') {

                $payment = json_encode([
                    'type' => 'card',
                    'payment' => $charge
                ]);

                $takeaway->update(['payment' => $payment]);

                return response()->json([
                    'message' => 'success',
                    'data' => [
                        'takeaway' => $takeaway,
                        'charge' => $charge
                    ]
                ]);
            } else {

                $takeaway->update(['payment' => json_encode([
                    'type' => 'cash',
                    'payment' => null
                ])]);

                return response()->json([
                    'message' => 'success',
                    'data' => [
                        'takeaway' => $takeaway,
                        'charge' => 'cash'
                    ]
                ]);
            }
        } else {
            return response()->json([
                'message' => 'Takeaway create failed. Please try again'
            ], 400);
        }
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
        //
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
