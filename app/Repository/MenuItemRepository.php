<?php
/**
 * Created by PhpStorm.
 * User: janaka
 * Date: 08/03/19
 * Time: 5:48 PM
 */

namespace App\Repository;

use App\Addon;
use App\AddonClone;
use App\AddonMenuItem;
use App\MenuItem;
use App\MenuItemClone;
use App\MenuItemVariant;
use App\Variant;
use App\VariantClone;
use Illuminate\Support\Facades\DB;

/**
 * Class MenuItemRepository
 * @package App\Repository
 */
class MenuItemRepository
{
    /**
     * @param array $request
     * @return MenuItemClone
     */
    public function createClone(array $request)
    {
        $menu_item = new MenuItemClone($request);
        $menu_item->save();
        return $menu_item;
    }

    /**
     * @param array $variant_array
     * @return VariantClone
     */
    public function createVariantClone(array $variant_array)
    {
        $variant = new VariantClone($variant_array);
        $variant->save();
        return $variant;
    }

    /**
     * @param array $addon_array
     * @return AddonClone
     */
    public function createAddonClone(array $addon_array)
    {
        $addon = new AddonClone($addon_array);
        $addon->save();
        return $addon;
    }

    /**
     * @param int $menu_item_id
     * @return mixed
     */
    public function deleteVariantClone(int $menu_item_id)
    {
        return VariantClone::where('menu_item_id', '=', $menu_item_id)->delete();
    }

    /**
     * @param int $menu_item_id
     * @return mixed
     */
    public function deleteAddonClone(int $menu_item_id)
    {
        return AddonClone::where('menu_item_id', '=', $menu_item_id)->delete();
    }


    /**
     * @param int $menu_item_id
     * @return mixed
     */
    public function getClone(int $menu_item_id)
    {
        return MenuItemClone::whereMenuItemId($menu_item_id)->withTrashed()->first();
    }

    /**
     * @param int $menu_id
     * @param string $name
     * @param string $description
     * @param float $price
     * @param array $menu_item_clone
     * @return MenuItem
     */
    public function create(int $menu_id, string $name, string $description, float $price, array $menu_item_clone)
    {
        $menu_item = new MenuItem([
            'menu_id' => $menu_id,
            'name' => $name,
            'logo' => $menu_item_clone['logo'],
            'description' => $description,
            'price' => $price,
            'delivery' => $menu_item_clone['delivery'],
            'takeaway' => $menu_item_clone['takeaway'],
            'promo_code' => $menu_item_clone['promo_code'],
            'promo_type' => $menu_item_clone['promo_type'],
            'promo_value' => $menu_item_clone['promo_value'],
            'promo_usage' => $menu_item_clone['promo_usage'],
            'promo_date' => $menu_item_clone['promo_date'],
            'vat_category' => $menu_item_clone['vat_category'],
        ]);

        $menu_item->save();

        return $menu_item;
    }

    /**
     * @param $request
     * @return MenuItem
     */
    public function createByRequest($request)
    {
        $menu_item = new MenuItem($request);
        $menu_item->save();
        return $menu_item;
    }

    /**
     * @param int $menu_item_id
     * @param string $name
     * @param string $description
     * @param float $price
     * @param array $menu_item_clone
     * @return mixed
     */
    function update(int $menu_item_id, string $name, string $description, float $price, array $menu_item_clone)
    {
        return MenuItem::whereId($menu_item_id)->update([
            'name' => $name,
            'logo' => $menu_item_clone['logo'],
            'description' => $description,
            'price' => $price,
            'delivery' => $menu_item_clone['delivery'],
            'takeaway' => $menu_item_clone['takeaway'],
            'promo_code' => $menu_item_clone['promo_code'],
            'promo_type' => $menu_item_clone['promo_type'],
            'promo_value' => $menu_item_clone['promo_value'],
            'promo_usage' => $menu_item_clone['promo_usage'],
            'promo_date' => $menu_item_clone['promo_date'],
            'vat_category' => $menu_item_clone['vat_category'],
        ]);
    }

    /**
     * @param int $menu_item_id
     * @return mixed
     */
    public function deleteClones(int $menu_item_id)
    {
        return MenuItemClone::whereId($menu_item_id)->withTrashed()->forceDelete();
    }

    /**
     * @param int $menu_item_id
     * @return mixed
     */
    public function get(int $menu_item_id)
    {
        return MenuItem::whereId($menu_item_id)->withTrashed()->first();
    }

    /**
     * @param int $menu_item_id
     * @return mixed
     */
    public function deleteVariant(int $menu_item_id)
    {
        return Variant::where('menu_item_id', '=', $menu_item_id)->delete();
    }

    /**
     * @param array $variant_array
     * @return Variant
     */
    public function createVariant(array $variant_array)
    {
        $variant = new Variant($variant_array);
        $variant->save();
        return $variant;
    }

    /**
     * @param int $menu_item_id
     * @return mixed
     */
    public function deleteAddon(int $menu_item_id)
    {
        return Addon::where('menu_item_id', '=', $menu_item_id)->delete();
    }

    /**
     * @param array $addon_array
     * @return Addon
     */
    public function createAddon(array $addon_array)
    {
        $addon = new Addon($addon_array);
        $addon->save();
        return $addon;
    }

    /**
     * @param int $menu_item_id
     * @param int $selected_addon
     * @return mixed
     */
    public function getAddon(int $menu_item_id, int $selected_addon)
    {
        return MenuItem::where('menu_items.id', '=', $menu_item_id)->withTrashed()->first()->addons()->withTrashed()->where('addons.id', '=', $selected_addon)->first();
    }

    /**
     * @param int $menu_item_id
     * @param int $selected_variant
     * @return mixed
     */
    public function getVariant(int $menu_item_id, int $selected_variant)
    {
        return MenuItem::where('menu_items.id', '=', $menu_item_id)->withTrashed()->first()->variants()->where('variants.id', '=', $selected_variant)->withTrashed()->first();
    }

    /**
     * @param string $promocode
     * @return mixed
     */
    public function getMenuItemsByPromocode(string $promocode)
    {
        return MenuItem::where('promo_code', '=', $promocode)->get();
    }

    /**
     * @param int $menu_id
     * @param string $name
     * @param string $description
     * @param float $price
     * @return mixed
     */
    public function guessClone(int $menu_id, string $name, string $description, float $price)
    {

//        dd(DB::select(DB::raw("select * from menu_item_clones where menu_id='$menu_id' and name like '$name' and description like '$description' and price='$price'")));


        return MenuItemClone::whereMenuId($menu_id)
            ->whereName($name)
//            ->whereDescription($description)
//            ->wherePrice($price)
            ->withTrashed()
            ->first();
    }

    /**
     * @param array $menu_item
     * @return mixed
     */
    public function firstOrCreateClone(array $menu_item)
    {
        return MenuItemClone::firstOrCreate($menu_item);
    }

    /**
     * @return mixed
     */
    public function deleteAllClones()
    {
        return MenuItemClone::whereNotNull('created_at')->forceDelete();
    }

    /**
     * @param array $variant
     * @return mixed
     */
    public function firstOrCreateVariant(array $variant)
    {
        return Variant::firstOrCreate($variant);
    }

    /**
     * @param array $addon
     * @return mixed
     */
    public function firstOrCreateAddon(array $addon)
    {
        return Addon::firstOrCreate($addon);
    }

    /**
     * @param int $menu_item_id
     * @param int $addon_id
     * @return mixed
     */
    public function getSelectedAddonMenuItem(int $menu_item_id, int $addon_id)
    {
        return AddonMenuItem::whereMenuItemId($menu_item_id)->whereAddonId($addon_id)->first();
    }

    /**
     * @param int $menu_item_id
     * @param int $variant_id
     * @return mixed
     */
    public function getSelectedMenuItemVariant(int $menu_item_id, int $variant_id)
    {
        return MenuItemVariant::whereMenuItemId($menu_item_id)->whereVariantId($variant_id)->first();
    }
}
