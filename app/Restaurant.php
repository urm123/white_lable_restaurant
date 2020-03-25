<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Restaurant
 * @package App
 */
class Restaurant extends Model
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
        'price_range' => 'string',
    ];

    protected $fillable = [
        'user_id',
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
        'online',
        'things_to_know',
        'online_from_time',
        'online_to_time',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function cuisines()
    {
        return $this->belongsToMany(Cuisine::class)->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function assignedCuisines()
    {
        return $this->hasMany(Cuisine::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function openingHours()
    {
        return $this->hasMany(OpeningHour::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function media()
    {
        return $this->hasMany(RestaurantMedia::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function menus()
    {
        return $this->hasMany(Menu::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function deliveries()
    {
        return $this->hasMany(Delivery::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function takeaways()
    {
        return $this->hasMany(Takeaway::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function restaurantClone()
    {
        return $this->hasOne(RestaurantClone::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function openingHourClone()
    {
        return $this->hasMany(OpeningHourClone::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function deliveryLocations()
    {
        return $this->hasMany(DeliveryLocation::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function takeawayLocations()
    {
        return $this->hasMany(TakeawayLocation::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function deliveryLocationClone()
    {
        return $this->hasMany(DeliveryLocationClone::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function takeawayLocationClone()
    {
        return $this->hasMany(TakeawayLocationClone::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function promotions()
    {
        return $this->hasMany(Promotion::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function promotionClones()
    {
        return $this->hasMany(PromotionClone::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function menuClones()
    {
        return $this->hasMany(MenuClone::class);
    }
}
