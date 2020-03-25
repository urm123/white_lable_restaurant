<?php

namespace App\Http\Controllers\MasterAdmin;

use App\Http\Controllers\Controller;
use App\PaymentMethod;
use App\Repository\PaymentMethodRepository;
use Illuminate\Http\Request;

/**
 * Class PaymentMethodController
 * @package App\Http\Controllers\MasterAdmin
 */
class PaymentMethodController extends Controller
{

    protected $payment_method;

    public function __construct(PaymentMethodRepository $payment_method_repository)
    {
        $this->payment_method = $payment_method_repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payment_methods = $this->payment_method->all();

        return view('master-admin.payment-method.index', ['payment_methods' => $payment_methods]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('master-admin.payment-method.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required|unique:payment_methods|alpha']);

        $payment_method = $this->payment_method->create($request->all());

        if ($payment_method) {
            return redirect(route('master-admin.payment-method.create'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\PaymentMethod $paymentMethod
     * @return \Illuminate\Http\Response
     */
    public function show(PaymentMethod $paymentMethod)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\PaymentMethod $paymentMethod
     * @return \Illuminate\Http\Response
     */
    public function edit(PaymentMethod $paymentMethod)
    {
        return view('master-admin.payment-method.edit', ['payment_method' => $paymentMethod]);
    }

    /**
     * @param Request $request
     * @param PaymentMethod $paymentMethod
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, PaymentMethod $paymentMethod)
    {
        $this->validate($request, ['name' => 'required']);

        $payment_method = $paymentMethod->update($request->all());

        if ($payment_method) {
            return redirect(route('master-admin.payment-method.edit', $paymentMethod));
        }
    }

    /**
     * @param PaymentMethod $paymentMethod
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(PaymentMethod $paymentMethod)
    {
        $delete = $paymentMethod->delete();

        if ($delete) {
            return response()->json([
                'message' => 'success'
            ]);
        }
    }
}
