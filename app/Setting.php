<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Setting
 * @package App
 */
class Setting extends Model
{

    protected $casts = [
        'discount' => 'boolean',
        'promocode' => 'boolean',
    ];

    protected $fillable = [
        'discount',
        'promocode',
        'discount_type',
        'discount_value',
        'expiry_date',
    ];
}
