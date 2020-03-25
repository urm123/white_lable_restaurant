<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PaymentMethod
 * @package App
 */
class PaymentMethod extends Model
{
    protected $fillable = ['name', 'logo'];
}
