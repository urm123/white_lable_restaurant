<?php

namespace App\Http\Controllers\Api\User;

use App\Address;
use App\Repository\AddressRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

/**
 * Class AddressController
 * @package App\Http\Controllers\Api\User
 */
class AddressController extends Controller
{
    protected $address;

    /**
     * AddressController constructor.
     * @param AddressRepository $address_repository
     */
    public function __construct(AddressRepository $address_repository)
    {
        $this->address = $address_repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $addresses = Auth::user()->addresses()->orderBy('default', 'desc')->get();
        if ($addresses) {
            return response()->json([
                'message' => 'success',
                'data' => [
                    'addresses' => $addresses
                ]
            ]);
        } else {
            return response()->json([
                'message' => 'You don\'t have any saved addresses'
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->request->set('user_id', Auth::id());

        $address = $this->address->create($request->all());

        if ($address) {
            return response()->json([
                'message' => 'Address saved successfully',
                'data' => [
                    'address' => $address
                ]
            ]);
        } else {
            return response()->json([
                'message' => 'Address save failed.'
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Address $address
     * @return \Illuminate\Http\Response
     */
    public function show(Address $address)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Address $address
     * @return \Illuminate\Http\Response
     */
    public function edit(Address $address)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Address $address
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Address $address)
    {

        Auth::user()->addresses()->update([
            'default' => false
        ]);

        $update = $address->update($request->all());


        if ($update) {
            return response()->json([
                'message' => 'Address updated successfully',
                'data' => [
                    'address' => $address
                ]
            ]);
        } else {
            return response()->json([
                'message' => 'Address update failed.'
            ], 400);
        }
    }

    /**
     * @param Address $address
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Address $address)
    {
        $delete = $address->delete();
        if ($delete) {
            return response()->json([
                'message' => 'Address deleted successfully',
            ]);
        } else {
            return response()->json([
                'message' => 'Address delete failed.'
            ], 400);
        }
    }
}
