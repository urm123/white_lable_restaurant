<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Menu;
use App\MenuItem;
use App\Repository\AddonRepository;
use App\Repository\MenuItemRepository;
use App\Repository\MenuRepository;
use App\Repository\VariantRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

/**
 * Class MenuController
 * @package App\Http\Controllers\Admin
 */
class MenuController extends Controller
{
    protected $menu;

    protected $menu_item;

    protected $variant;

    protected $addon;

    /**
     * MenuController constructor.
     * @param MenuRepository $menu_repository
     * @param MenuItemRepository $menu_item_repository
     * @param VariantRepository $variant_repository
     * @param AddonRepository $addon_repository
     */
    public function __construct(
        MenuRepository $menu_repository,
        MenuItemRepository $menu_item_repository,
        VariantRepository $variant_repository,
        AddonRepository $addon_repository
    )
    {
        $this->menu = $menu_repository;
        $this->menu_item = $menu_item_repository;
        $this->variant = $variant_repository;
        $this->addon = $addon_repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Auth::user()->restaurant()->withTrashed()->first()->menus;

        $variants = $this->variant->all();

        $addons = $this->addon->all();

        return view('admin.menu.index', [
            'menus' => $menus,
            'variants' => $variants,
            'addons' => $addons,
        ]);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getMenus()
    {
        $menus = Auth::user()->restaurant()->withTrashed()->first()->menus()->get();

        return response()->json([
            'message' => 'success',
            'data' => [
                'menus' => $menus
            ]
        ]);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCuisines()
    {
        $cuisines = Auth::user()->restaurant()->withTrashed()->first()->cuisines()->get();

        return response()->json([
            'message' => 'success',
            'data' => [
                'cuisines' => $cuisines
            ]
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getMenu(Request $request)
    {
        if ($request->menu_id == 0) {
            $menu_items = [];

            $menus = Auth::user()->restaurant()->withTrashed()->first()->menus()->get();

            foreach ($menus as $menu) {
                $items = $menu->menuItems()->whereNull('deleted')->paginate(6);

                $menu->menu_items_pagination = [
                    'current_page' => $items->currentPage(),
                    'from' => $items,
                    'last_page' => $items->lastPage(),
                    'path' => $items,
                    'per_page' => $items->perPage(),
                    'to' => $items,
                    'total' => $items->total(),
                ];

                foreach ($items as $item) {
                    $item->variants = $item->variants()->get();
                    $item->addons = $item->addons()->get();
                    $item->cuisine_id = $item->cuisines()->pluck('cuisine_id');
                    if ($item->trashed()) {
                        $item->deleted = true;
                    } else {
                        $item->deleted = false;
                    }

                    $item->logo = asset('storage/'.$item->logo);

                    $menu_items[] = $item;
                }
            }

            $menus[0]->menu_items = $menu_items;
            return response()->json([
                'message' => 'success',
                'data' => [
                    'menu' => $menus[0]
                ]
            ]);

        } else {

            $menu = Auth::user()->restaurant()->withTrashed()->first()->menus()->where('id', '=', $request->menu_id)->first();

            $menu_items_object = $menu->menuItems()->whereNull('deleted')->paginate(10);

            $menu->menu_items = $menu_items_object->items();

            $menu->menu_items_pagination = [
                'current_page' => $menu_items_object->currentPage(),
                'from' => $menu_items_object,
                'last_page' => $menu_items_object->lastPage(),
                'path' => $menu_items_object,
                'per_page' => $menu_items_object->perPage(),
                'to' => $menu_items_object,
                'total' => $menu_items_object->total(),
            ];

            foreach ($menu->menu_items as $menu_item) {
                $menu_item->variants = $menu_item->variants()->get();
                $menu_item->addons = $menu_item->addons()->get();
                $menu_item->cuisine_id = $menu_item->cuisines()->pluck('cuisine_id');
                if ($menu_item->trashed()) {
                    $menu_item->deleted = true;
                } else {
                    $menu_item->deleted = false;
                }
                $menu_item->logo = asset('storage/'.$menu_item->logo);
            }

            return response()->json([
                'message' => 'success',
                'data' => [
                    'menu' => $menu
                ]
            ]);
        }
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
            'name' => 'required|unique:menus,name'
        ]);

        $request->request->set('restaurant_id', Auth::user()->restaurant()->withTrashed()->first()->id);

        if (\config('app.product_type') == 'single') {
            $menu = $this->menu->create($request->restaurant_id, $request->name);
        } else {
            $menu = $this->menu->createClone($request->all());
        }
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
     * @param \App\Menu $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Menu $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        //
    }

    /**
     * @param Request $request
     * @param Menu $menu
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, Menu $menu)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $request->request->set('restaurant_id', Auth::user()->restaurant()->withTrashed()->first()->id);
        if (\config('app.product_type') == 'single') {
            $update = $menu->update($request->all());
        } else {
            $update = $menu->menuClone()->create($request->all());
        }
        if ($update) {
            return response()->json([
                'message' => 'success',
                'data' => [
                    'menu' => $menu
                ]
            ]);
        }
    }

    /**'
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Request $request)
    {
        $menu_name = $request->name;
        $restaurant_id = Auth::user()->restaurant()->withTrashed()->first()->id;
        if (\config('app.product_type') == 'single') {
            $delete = $this->menu->delete($restaurant_id, $menu_name);
        } else {
            $menu_clone = $this->menu->getOrCreate($restaurant_id, $menu_name);
            $delete = $menu_clone->delete();
        }
        if ($delete) {
            return response()->json([
                'message' => 'success',
                'data' => [

                ]
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Menu $menu
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Menu $menu)
    {
        $delete = $menu->delete();

        if ($delete) {
            return response()->json([
                'message' => 'success',
                'data' => [

                ]
            ]);
        }
    }
}
