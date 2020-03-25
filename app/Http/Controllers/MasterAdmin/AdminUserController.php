<?php

namespace App\Http\Controllers\MasterAdmin;

use App\Repository\UserRepository;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

/**
 * Class AdminUserController
 * @package App\Http\Controllers\MasterAdmin
 */
class AdminUserController extends Controller
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

        return view('master-admin.admin-user.index');
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getUsers()
    {
        $users = $this->user->allAdmins();

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
        $this->validate($request, [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required'
        ]);

        $user = New User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->role = $request->role;
        $user->save();

        if ($user) {
            return response()->json([
                'message' => 'success',
                'data' => [
                    'user' => $user
                ]
            ]);
        }
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

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function profile()
    {
        $user = Auth::user();
        return view('master-admin.admin-user.profile', [
            'user' => $user
        ]);
    }

    public function profilePost(Request $request)
    {
        $user_id = $request->user_id;

        if ($request->password) {
            $this->validate($request, [
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'password' => 'required|confirmed',
            ]);

            $password = $this->user->update($request->user_id, [
                'password' => bcrypt($request->password),
            ]);

        } else {
            $this->validate($request, [
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required',
                'phone' => 'required',
            ]);
        }

        $update = $this->user->update($request->user_id, [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'country' => $request->country,
            'city' => $request->city,
            'province' => $request->province,
            'postcode' => $request->postcode,
        ]);

        if ($update) {
            $request->session()->flash('success', 'Updated successfully!');
            return redirect(route('master-admin.admin-user.profile'));
        }
    }
}
