<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class MenuItem
 * @package App
 */
class MenuItem extends Model
{
    protected $casts = [
        'delivery' => 'boolean',
        'takeaway' => 'boolean',
    ];

    protected $fillable = [
        'menu_id',
        'name',
        'logo',
        'description',
        'price',
        'delivery',
        'takeaway',
        'promo_code',
        'promo_type',
        'promo_value',
        'promo_usage',
        'promo_date',
        'deleted',
        'vat_category',
    ];

    protected $dates = ['deleted_at'];

    use SoftDeletes;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function deliveryItems()
    {
        return $this->hasMany(DeliveryItem::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function variants()
    {
        return $this->belongsToMany(Variant::class)->using(MenuItemVariant::class)->withPivot('price');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function cuisines()
    {
        return $this->belongsToMany(Cuisine::class)->using(CuisineMenuItem::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function addons()
    {
        return $this->belongsToMany(Addon::class)->using(AddonMenuItem::class)->withPivot('price');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function variantClones()
    {
        return $this->hasMany(VariantClone::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function addonClones()
    {
        return $this->hasMany(AddonClone::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function menuItemClone()
    {
        return $this->hasOne(MenuItemClone::class);
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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
