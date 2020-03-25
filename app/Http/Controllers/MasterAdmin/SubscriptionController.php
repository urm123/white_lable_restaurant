<?php

namespace App\Http\Controllers\MasterAdmin;

use App\Repository\SubscriptionRepository;
use App\Subscription;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class SubscriptionController
 * @package App\Http\Controllers\MasterAdmin
 */
class SubscriptionController extends Controller
{

    protected $subscription;

    /**
     * SubscriptionController constructor.
     * @param SubscriptionRepository $subscription_repository
     */
    public function __construct(SubscriptionRepository $subscription_repository)
    {
        $this->subscription = $subscription_repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('master-admin.subscription.index');
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getSubscriptions()
    {
        $subscriptions = $this->subscription->all();

        foreach ($subscriptions as $subscription) {
            $subscription->points = $subscription->points()->get();
        }

        return response()->json([
            'message' => 'success',
            'data' => [
                'subscriptions' => $subscriptions
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subscription $subscription
     * @return \Illuminate\Http\Response
     */
    public function show(Subscription $subscription)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subscription $subscription
     * @return \Illuminate\Http\Response
     */
    public function edit(Subscription $subscription)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Subscription $subscription
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subscription $subscription)
    {
        $update = $subscription->update($request->all());

        $subscription->points()->delete();

        foreach ($request->points as $point) {
            $subscription->points()->create($point);
        }

        if ($update) {
            return response()->json([
                'message' => 'success',
                'data' => []
            ]);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subscription $subscription
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subscription $subscription)
    {
        //
    }
}
