<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class MenuItemClone
 * @package App
 */
class MenuItemClone extends Model
{
    protected $casts = [
        'delivery' => 'boolean',
        'takeaway' => 'boolean',
    ];

    protected $fillable = [
        'menu_id',
        'menu_item_id',
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
    public function variantClones()
    {
        return $this->hasMany(VariantClone::class, 'menu_item_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function addonClones()
    {
        return $this->hasMany(AddonClone::class, 'menu_item_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function menuItem()
    {
        return $this->belongsTo(MenuItem::class);
    }

}
