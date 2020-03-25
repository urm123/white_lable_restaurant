<?php

namespace App\Http\Controllers\MasterAdmin;

use App\Http\Controllers\Controller;
use App\MenuClone;
use App\Repository\MenuRepository;
use App\Repository\RestaurantRepository;
use Illuminate\Http\Request;

class MenuCloneController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getMenus(Request $request)
    {
        $restaurant = $this->restaurant->getRestaurant($request->restaurant);
        $menus = $restaurant->menuClones;

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
        $menu = $restaurant->menuClones()->where('id', '=', $request->menu_id)->first();

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
     * @param \App\MenuClone $menuClone
     * @return \Illuminate\Http\Response
     */
    public function show(MenuClone $menuClone)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\MenuClone $menuClone
     * @return \Illuminate\Http\Response
     */
    public function edit(MenuClone $menuClone)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\MenuClone $menuClone
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MenuClone $menuClone)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\MenuClone $menuClone
     * @return \Illuminate\Http\Response
     */
    public function destroy(MenuClone $menuClone)
    {
        //
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function approve(Request $request)
    {
        $restaurant_id = $request->restaurant_id;

        if ($request->approve == 'Approve') {
            $names = $request->names;

            $actives = $request->actives;

            $menus = $request->menus;


            if ($names) {

                foreach ($names as $key => $name) {
                    if ($menus[$key] == '') {
                        $menu = $this->menu->firstOrCreate($restaurant_id, $name);
                    } else {
                        $menu = $this->menu->get($menus[$key]);
                        $menu->update(['name' => $name]);
                    }

                    if (!isset($actives[$key])) {
                        $menu->delete();
                    }
                }

            }

            $this->menu->deleteClones($restaurant_id);

            return redirect(route('master-admin.request.index', $restaurant_id));
        } else {
            $this->menu->deleteClones($restaurant_id);

            return redirect(route('master-admin.request.index', $restaurant_id));
        }


    }
}
