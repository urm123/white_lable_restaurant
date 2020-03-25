<?php


namespace App\Http\Controllers\Api\Web;


use App\Http\Controllers\Controller;
use App\Menu;
use App\Repository\RestaurantRepository;
use Carbon\Carbon;

/**
 * Class MenuController
 * @package App\Http\Controllers\Api\Web
 */
class MenuController extends Controller
{

    protected $restaurant;

    /**
     * MenuController constructor.
     * @param RestaurantRepository $restaurant_repository
     */
    public function __construct(RestaurantRepository $restaurant_repository)
    {
        $this->restaurant = $restaurant_repository;
    }

    public function all()
    {
        $restaurant = $this->restaurant->getFirst(1);
        $menus = $restaurant->menus()->get();

        $popular = Menu::hydrate([[
            'id' => 0,
            'restaurant_id' => $restaurant->id,
            'name' => 'Popular',
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString(),
            'deleted_at' => null
        ]])->first();

        $popular->selected = true;


        $restaurant_menus = [];
        $restaurant_menus[] = $popular;

        foreach ($menus as $menu) {
            if ($menu->name != 'Popular') {
                $menu->selected = false;
                $restaurant_menus[] = $menu;
            }
        }

        $restaurant->menus = $restaurant_menus;

        return response()->json([
            'status' => 'success',
            'data' => $restaurant->menus
        ]);
    }
}
