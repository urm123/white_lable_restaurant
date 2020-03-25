<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class RestaurantClone
 * @package App
 */
class RestaurantClone extends Model
{
    protected $dates = ['deleted_at'];

    use SoftDeletes;

    protected $casts = [
        'rating' => 'int',
        'reserve' => 'boolean',
        'takeaway' => 'boolean',
        'delivery' => 'boolean',
        'discount' => 'boolean',
        'menu_discount' => 'boolean',
        'promocode' => 'boolean',
    ];

    protected $fillable = [
        'restaurant_id',
        'name',
        'category',
        'takeaway',
        'delivery',
        'reserve',
        'county',
        'city',
        'province',
        'country',
        'postcode',
        'phone',
        'email',
        'website',
        'description',
        'logo',
        'price_range',
        'seats',
        'parking',
        'subscription',
        'discount',
        'menu_discount',
        'promocode',
        'discount_type',
        'discount_value',
        'start_date',
        'expiry_date',
//        'online',
        'things_to_know',
        'online_from_time',
        'online_to_time',
        'update_type',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function cuisines()
    {
        return $this->belongsToMany(Cuisine::class)->withTimestamps();
    }
}
