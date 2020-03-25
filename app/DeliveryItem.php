<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DeliveryItem
 * @package App
 */
class DeliveryItem extends Model
{
    protected $fillable = [
        'delivery_id',
        'menu_item_id',
        'quantity',
        'menu_item_variant_id'
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function delivery()
    {
        return $this->belongsTo(Delivery::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function menuItem()
    {
        return $this->belongsTo(MenuItem::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function addonMenuItems()
    {
        return $this->belongsToMany(AddonMenuItem::class, 'addon_menu_item_delivery_item', 'delivery_item_id', 'addon_menu_item_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function menuItemVariants()
    {
        return $this->belongsTo(MenuItemVariant::class, 'menu_item_variant_id');
    }
}
