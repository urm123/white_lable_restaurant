<?php


namespace App;


use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * Class AddonMenuItem
 * @package App
 */
class AddonMenuItem extends Pivot
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function deliveryItems()
    {
        return $this->belongsToMany(DeliveryItem::class, 'addon_menu_item_delivery_item', 'addon_menu_item_id', 'delivery_item_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function takeawayItems()
    {
        return $this->belongsToMany(TakeawayItem::class, 'addon_menu_item_takeaway_item', 'addon_menu_item_id', 'takeaway_item_id');
    }
}
