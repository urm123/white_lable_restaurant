<?php


namespace App\Repository;


use App\PaymentMethod;

/**
 * Class PaymentMethodRepository
 * @package App\Repository
 */
class PaymentMethodRepository
{
    /**
     * @return PaymentMethod[]|\Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return PaymentMethod::all();
    }

    /**
     * @param array $request
     * @return PaymentMethod
     */
    public function create(array $request)
    {
        $payment_method = new PaymentMethod($request);

        $payment_method->save();

        return $payment_method;
    }
}