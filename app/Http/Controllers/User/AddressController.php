<?php

namespace App\Http\Controllers\User;

use App\Address;
use App\Repository\AddressRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

/**
 * Class AddressController
 * @package App\Http\Controllers\User
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
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'address' => 'required',
            'street' => 'required',
//            'county' => 'required',
            'city' => 'required',
            'postcode' => 'required',
        ]);

        if ($request->default) {
            $request->request->set('default', true);
        }

        $request->request->set('user_id', Auth::id());

        $address = $this->address->create($request->all());

        if ($address) {
            $request->session()->flash('success', 'Saved successfully!');
            if (session('delivery_redirect')) {
                return redirect(route('delivery.create'));
            } else {
                return redirect(route('user.address'));
            }
        } else {
            return redirect(route('user.address'))->withErrors(['Address save failed']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Address $address
     * @return \Illuminate\Http\Response
     */
    public function show(Address $address)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Address $address
     * @return \Illuminate\Http\Response
     */
    public function edit(Address $address)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Address $address
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
                'message' => 'success',
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
                'message' => 'success',
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

    public function updateAddress(Request $request)
    {
        $address = $request->address;

        $update = $this->address->update($address);

        if ($update) {
            return response()->json(['message' => 'success']);
        }
    }
}
