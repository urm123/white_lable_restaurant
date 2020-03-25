<?php


namespace App\Http\Controllers\Api\Web;


use App\Http\Controllers\Controller;
use App\Repository\MenuItemRepository;
use App\Repository\MenuRepository;
use App\Repository\RestaurantRepository;
use Illuminate\Http\Request;

/**
 * Class MenuItemController
 * @package App\Http\Controllers\Api\Web
 */
class MenuItemController extends Controller
{

    protected $menu;

    protected $restaurant;

    protected $menu_item;

    /**
     * MenuItemController constructor.
     * @param MenuRepository $menu_repository
     * @param RestaurantRepository $restaurant_repository
     * @param MenuItemRepository $menu_item_repository
     */
    public function __construct(MenuRepository $menu_repository, RestaurantRepository $restaurant_repository, MenuItemRepository $menu_item_repository)
    {
        $this->menu = $menu_repository;
        $this->restaurant = $restaurant_repository;
        $this->menu_item = $menu_item_repository;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function byMenu(Request $request)
    {
        if ($request->menu_id > 0) {
            $menu = $this->menu->get($request->menu_id);
            $menu_items = $menu->menuItems()->get();
        } else {
            $menu_items = $this->restaurant->getPopularItems(1);
        }

        foreach ($menu_items as $menu_item) {
            $menu_item->logo = getStorageUrl() . $menu_item->logo;
        }

        return response()->json([
            'status' => 'success',
            'data' => $menu_items
        ]);
    }

    public function get(Request $request)
    {
        $id = $request->id;

        $menu_item = $this->menu_item->get($id);

        $menu_item->logo = getStorageUrl() . $menu_item->logo;

        return response()->json([
            'status' => 'success',
            'data' => $menu_item
        ]);
    }
}
