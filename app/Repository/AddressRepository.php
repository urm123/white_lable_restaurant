<?php
/**
 * Created by PhpStorm.
 * User: janaka
 * Date: 28/02/19
 * Time: 11:10 AM
 */

namespace App\Repository;


use App\Address;

/**
 * Class AddressRepository
 * @package App\Repository
 */
class AddressRepository
{
    /**
     * @param array $request
     * @return Address
     */
    public function create(array $request)
    {
        $address = new Address($request);
        $address->save();
        return $address;
    }

    /**
     * @param array $address
     * @return mixed
     */
    public function update(array $address)
    {
        return Address::whereId($address['id'])->update([
            'address' => $address['address'],
            'street' => $address['street'],
            'city' => $address['city'],
            'county' => $address['county'],
            'postcode' => $address['postcode'],
        ]);
    }
}