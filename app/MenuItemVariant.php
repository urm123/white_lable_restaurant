<?php


namespace App;


use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * Class MenuItemVariant
 * @package App
 */
class MenuItemVariant extends Pivot
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function deliveryItems()
    {
        return $this->hasMany(DeliveryItem::class, 'menu_item_variant_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function takeawayItems()
    {
        return $this->hasMany(TakeawayItem::class, 'menu_item_variant_id');
    }
}
