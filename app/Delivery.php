<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Delivery
 * @package App
 */
class Delivery extends Model
{
    protected $fillable = [
        'user_id',
        'restaurant_id',
        'time',
        'address',
        'street',
        'city',
        'county',
        'postcode',
        'instructions',
        'requests',
        'delivery_status',
        'restaurant_status',
        'payment',
        'phone',
        'email',
        'delivery_charge',
        'vat',
        'total',
        'menu_item_id',
        'promotion_id',
        'site_promotion_id',
        'site_discount',
        'restaurant_discount',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function deliveryItems()
    {
        return $this->hasMany(DeliveryItem::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function ticket()
    {
        return $this->hasOne(Ticket::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function promotion()
    {
        return $this->belongsTo(Promotion::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sitePromotion()
    {
        return $this->belongsTo(SitePromotion::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function menuItem()
    {
        return $this->belongsTo(MenuItem::class);
    }
}
