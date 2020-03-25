<?php
/**
 * Created by PhpStorm.
 * User: janaka
 * Date: 08/03/19
 * Time: 12:19 PM
 */

namespace App\Repository;

use App\Menu;
use App\MenuClone;

/**
 * Class MenuRepository
 * @package App\Repository
 */
class MenuRepository
{
    /**
     * @param array $request
     * @return MenuClone
     */
    public function createClone(array $request)
    {
        $menu = new MenuClone($request);
        $menu->save();
        return $menu;
    }

    /**
     * @param int $restaurant_id
     * @param string $name
     * @return Menu
     */
    public function create(int $restaurant_id, string $name)
    {
        $menu = new Menu([
            'restaurant_id' => $restaurant_id,
            'name' => $name
        ]);
        $menu->save();
        return $menu;
    }

    /**
     * @param int $restaurant_id
     * @return mixed
     */
    public function deleteClones(int $restaurant_id)
    {
        return MenuClone::where('restaurant_id', '=', $restaurant_id)->forceDelete();
    }

    /**
     * @param int $menu_id
     * @param string $name
     * @return mixed
     */
    public function update(int $menu_id, string $name)
    {
        return Menu::where('id', '=', $menu_id)->update(['name' => $name]);
    }

    /**
     * @param int $menu_id
     * @return mixed
     */
    public function get(int $menu_id)
    {
        return Menu::whereId($menu_id)->withTrashed()->first();
    }

    /**
     * @return Menu[]|\Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return Menu::all();
    }

    /**
     * @param int $restaurant_id
     * @param string $menu_name
     * @return mixed
     */
    public function getOrCreate(int $restaurant_id, string $menu_name)
    {
        return MenuClone::firstOrCreate([
            'restaurant_id' => $restaurant_id,
            'name' => $menu_name
        ]);
    }

    /**
     * @param int $restaurant_id
     * @param string $name
     * @return mixed
     */
    public function firstOrCreate(int $restaurant_id, string $name)
    {
        return Menu::firstOrCreate([
            'restaurant_id' => $restaurant_id,
            'name' => $name
        ]);
    }

    /**
     * @param int $restaurant_id
     * @param string $menu_name
     * @return mixed
     */
    public function delete(int $restaurant_id, string $menu_name)
    {
        return Menu::whereRestaurantId($restaurant_id)->whereName($menu_name)->delete();
    }
}
