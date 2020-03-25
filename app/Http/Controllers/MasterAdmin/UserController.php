<?php

namespace App\Http\Controllers\MasterAdmin;

use App\Repository\UserRepository;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class UserController
 * @package App\Http\Controllers\MasterAdmin
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

        return view('master-admin.user.index');
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getUsers()
    {
        $users = $this->user->all();

        foreach ($users as $user) {
            if ($user->deleted_at) {
                $user->deleted = false;
            } else {
                $user->deleted = true;
            }

            if ($user->deleted_at) {
                $user->deactivated = true;
            } else {
                $user->deactivated = false;
            }

            $user_takeaway_count = $user->takeaways()->count();
            $user_delivery_count = $user->deliveries()->count();

            $user_takeaway_total = 0;
            $user_delivery_total = 0;

            $user_takeaways = $user->takeaways;

            $user_deliveries = $user->deliveries;

            foreach ($user_takeaways as $user_takeaway) {
                $user_takeaway_items = $user_takeaway->takeawayItems;
                foreach ($user_takeaway_items as $user_takeaway_item) {
                    if ($user_takeaway_item->menuItem) {
                        $user_takeaway_total += $user_takeaway_item->quantity * $user_takeaway_item->menuItem->price;
                    }
                }
            }

            foreach ($user_deliveries as $user_delivery) {
                $user_delivery_items = $user_delivery->deliveryItems;
                foreach ($user_delivery_items as $user_delivery_item) {
                    if ($user_delivery_item->menuItem) {
                        $user_delivery_total += $user_delivery_item->quantity * $user_delivery_item->menuItem->price;
                    }
                }
            }


            $user->orders = $user_takeaway_count + $user_delivery_count;

            $user->order_total = $user_takeaway_total + $user_delivery_total;
        }

        return response()->json([
            'message' => 'success',
            'data' => [
                'users' => $users
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
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * @param User $user
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(User $user)
    {
        $delete = $user->delete();

        if ($delete) {
            return response()->json([
                'message' => 'success',
                'data' => []
            ]);
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function restore(Request $request)
    {
        $user_id = $request->user_id;
        $restore = $this->user->restore($user_id);
        if ($restore) {
            return response()->json([
                'message' => 'success',
                'data' => []
            ]);
        }
    }
}
