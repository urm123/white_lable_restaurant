<?php

/**
 * @return string
 */
function getStorageUrl()
{
    return config('STORAGE_URL');
}

/**
 * @return float
 */
function getVat()
{
//    return 0.05;

    return [
        'food' => setting('food_vat'),
        'alcohol' => setting('alcohol_vat'),
        'delivery' => setting('delivery_vat'),
    ];
}
