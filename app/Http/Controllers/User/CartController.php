<?php

namespace App\Http\Controllers\User;

use App\Cart;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
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
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        if ($request->cart) {
            $request->session()->put('cart', $request->cart);
//        }
        if ($request->requests) {
            $request->session()->put('requests', $request->requests);
        }
        if ($request->type) {
            $request->session()->put('type', $request->type);
        }
        if ($request->cart_date) {
            $request->session()->put('cart_date', $request->cart_date);
        }
        if ($request->cart_time) {
            $request->session()->put('cart_time', $request->cart_time);
        }
        if ($request->restaurant_id) {
            $request->session()->put('restaurant_id', $request->restaurant_id);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Cart $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Cart $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Cart $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Cart $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
