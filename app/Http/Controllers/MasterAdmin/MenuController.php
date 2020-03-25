<?php

namespace App\Http\Controllers\MasterAdmin;

use App\Menu;
use App\Repository\MenuRepository;
use App\Repository\RestaurantRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class MenuController
 * @package App\Http\Controllers\MasterAdmin
 */
class MenuController extends Controller
{
    protected $menu;
    protected $restaurant;

    /**
     * MenuController constructor.
     * @param MenuRepository $menu_repository
     * @param RestaurantRepository $restaurant_repository
     */
    public function __construct(MenuRepository $menu_repository, RestaurantRepository $restaurant_repository)
    {
        $this->menu = $menu_repository;
        $this->restaurant = $restaurant_repository;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $restaurant = $this->restaurant->getRestaurant($request->restaurant);

        return view('master-admin.menu.index', [
            'restaurant' => $restaurant,
            'menus' => $restaurant->menus,
        ]);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getMenus(Request $request)
    {
        $restaurant = $this->restaurant->getRestaurant($request->restaurant);
        $menus = $restaurant->menus;

        return response()->json([
            'message' => 'success',
            'data' => [
                'menus' => $menus
            ]
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getMenu(Request $request)
    {
        $restaurant = $this->restaurant->getRestaurant($request->restaurant);
        $menu = $restaurant->menus()->where('id', '=', $request->menu_id)->first();

        $menu->menu_items = $menu->menuItems()->withTrashed()->get();

        foreach ($menu->menu_items as $menu_item) {
            $menu_item->variants = $menu_item->variants()->get();
            $menu_item->addons = $menu_item->addons()->get();
            $menu_item->logo = getStorageUrl() . $menu_item->logo;
            if ($menu_item->trashed()) {
                $menu_item->deleted = false;
            } else {
                $menu_item->deleted = true;
            }
        }

        return response()->json([
            'message' => 'success',
            'data' => [
                'menu' => $menu
            ]
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $request->request->set('restaurant_id', Auth::user()->restaurant->id);

        $menu = $this->menu->create($request->all());

        if ($menu) {
            return response()->json([
                'message' => 'success',
                'data' => [
                    'menu' => $menu
                ]
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Menu $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Menu $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Menu $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Menu $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        //
    }
}
