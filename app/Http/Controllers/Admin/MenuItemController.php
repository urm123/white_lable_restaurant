<?php

namespace App\Http\Controllers\Admin;

use App\CuisineMenuItem;
use App\Http\Controllers\Controller;
use App\MenuItem;
use App\Repository\MenuItemRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

/**
 * Class MenuItemController
 * @package App\Http\Controllers\Admin
 */
class MenuItemController extends Controller
{

    protected $menu_item;

    /**
     * MenuItemController constructor.
     * @param MenuItemRepository $menu_item_repository
     */
    public function __construct(MenuItemRepository $menu_item_repository)
    {
        $this->menu_item = $menu_item_repository;
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
            'cuisinename' => 'required',
            'menu_id' => 'required',
            'name' => 'required|unique:menu_items,name',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|max:255',
//            'logo' => 'required',
        ], [
            'cuisinename.required' => 'Cuisine is required',
            'menu_id.required' => 'Category is required',
            ]);

        $request->request->set('user_id', Auth::id());

        $logo = $request->logo;

        if ($logo) {

            $extension = explode(';', explode('image/', $logo)[1])[0];

            $result = substr($logo, strpos($logo, 'image/', '6'), 4);

            $file_name = 'cuisines/logo_' . Carbon::now()->format('YmdHis') . '.' . $extension;

            $logo = str_replace('data:image/' . $extension . ';base64,', '', $logo);
            $logo = str_replace(' ', '+', $logo);

            Storage::disk('local')->put($file_name, base64_decode($logo));

            $request->request->set('logo', $file_name);

        }
        if (\config('app.product_type') == 'single') {
            $menu_item = $this->menu_item->createByRequest($request->all());
            foreach ($request->cuisinename as $cuisine_id) {
                $menu_item->cuisines()->attach($cuisine_id);
            }

            foreach ($request->variants as $variant) {
                $variant_array = ['name' => $variant['name']];
                $variant_object = $this->menu_item->firstOrCreateVariant($variant_array);
                $menu_item->variants()->attach($variant_object->id, ['price' => $variant['pivot']['price']]);
            }

            foreach ($request->addons as $addon) {
                $addon_array = ['name' => $addon['name']];
                $addon_object = $this->menu_item->firstOrCreateAddon($addon_array);
                $menu_item->addons()->attach($addon_object->id, ['price' => $addon['pivot']['price']]);
            }
        } else {
            $menu_item = $this->menu_item->createClone($request->all());

            foreach ($request->variants as $variant) {
                $variant['menu_item_id'] = $menu_item->id;
                $this->menu_item->createVariantClone($variant);
            }

            foreach ($request->addons as $addon) {
                $addon['menu_item_id'] = $menu_item->id;
                $this->menu_item->createAddonClone($addon);
            }
        }


        $menu_item->logo = asset('storage/'.$menu_item->logo);

        if ($menu_item) {
            return response()->json([
                'message' => 'success',
                'data' => [
                    'menu_item' => $menu_item
                ]
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\MenuItem $menuItem
     * @return \Illuminate\Http\Response
     */
    public function show(MenuItem $menuItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\MenuItem $menuItem
     * @return \Illuminate\Http\Response
     */
    public function edit(MenuItem $menuItem)
    {
        //
    }

    /**
     * @param Request $request
     * @param MenuItem $menuItem
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, MenuItem $menuItem)
    {
        $this->validate($request, [
            'cuisine_id' => 'required',
            'menu_id' => 'required',
            'name' => ['required'],
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|max:255',
        ], [
            'cuisine_id.required' => 'Cuisine is required',
            'menu_id.required' => 'Category is required'
            ]);

        $request->request->set('user_id', Auth::id());
        $request->request->set('menu_item_id', $menuItem->id);

        if ($request->logo) {

            $logo = $request->logo;

            $extension = explode(';', explode('image/', $logo)[1])[0];

            $result = substr($logo, strpos($logo, 'image/', '6'), 4);

            $file_name = 'cuisines/logo_' . Carbon::now()->format('YmdHis') . '.' . $extension;

            $logo = str_replace('data:image/' . $extension . ';base64,', '', $logo);
            $logo = str_replace(' ', '+', $logo);

            Storage::disk('local')->put($file_name, base64_decode($logo));

            $request->request->set('logo', $file_name);
        } else {
            $request->request->set('logo', $menuItem->logo);
        }

        $request->request->set('menu_id', $menuItem->menu()->first()->id);

        if (\config('app.product_type') == 'single') {
            $menuItem->update($request->except(['_token', 'addons', 'variants', 'deleted', 'user_id']));

            CuisineMenuItem::where('menu_item_id', '=', $menuItem->id)->delete();
            if (is_array($request->cuisine_id)) {
                foreach ($request->cuisine_id as $cuisine_id) {
                    $assignedCuisine = New CuisineMenuItem();
                    $assignedCuisine->cuisine_id = $cuisine_id;
                    $assignedCuisine->menu_item_id = $menuItem->id;
                    $assignedCuisine->save();
                }
            }

            $variants_ids = [];

            foreach ($request->variants as $variant) {
                $variant_object = $menuItem->variants()->updateOrCreate([
                    'variants.id' => $variant['id'],
                ], [
                    'name' => $variant['name'],
                ]);
                $variants_ids[$variant_object->id] = ['price' => $variant['pivot']['price']];
                if (!$variant_object->wasRecentlyCreated) {
                    $variant_object->update($variant);
                }
            }

            $addons_ids = [];


            foreach ($request->addons as $addon) {
                $addon_object = $menuItem->addons()->updateOrCreate([
                    'addons.id' => $addon['id'],
                ], [
                    'name' => $addon['name'],
                ]);
                $addons_ids[$addon_object->id] = ['price' => $addon['pivot']['price']];
                if (!$addon_object->wasRecentlyCreated) {
                    $addon_object->update($addon);
                }
            }

            $menuItem->variants()->sync($variants_ids);

            $menuItem->addons()->sync($addons_ids);


        } else {


            $menu_item = $menuItem->menuItemClone()->firstOrCreate($request->except(['_token', 'addons', 'variants', 'deleted', 'user_id']));

            $this->menu_item->deleteVariantClone($menu_item->id);

            foreach ($request->variants as $variant) {
                $variant['menu_item_id'] = $menu_item->id;
                $this->menu_item->createVariantClone($variant);
            }

            $this->menu_item->deleteAddonClone($menu_item->id);

            foreach ($request->addons as $addon) {
                $addon['menu_item_id'] = $menu_item->id;
                $this->menu_item->createAddonClone($addon);
            }

            if ($request->deleted) {
                $menu_item->delete();
            }
        }

        $menuItem->logo = asset('storage/'.$menuItem->logo);

        if ($menuItem) {
            return response()->json([
                'message' => 'success',
                'data' => [
                    'menu_item' => $menuItem
                ]
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\MenuItem $menuItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(MenuItem $menuItem)
    {

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function forceDelete(Request $request)
    {
        $menu_item_id = $request->menu_item_id;

        $menu_item = $this->menu_item->get($menu_item_id);

        $menu_item->menu_item_id = $menu_item_id;

        $menu_item_clone = $this->menu_item->firstOrCreateClone($menu_item->toArray());

        $update = $menu_item_clone->update([
            'deleted' => Carbon::now()->toDateTimeString()
        ]);

        $menu_item->delete();

        if ($update) {
            return response()->json([
                'message' => 'success',
                'data' => [

                ]
            ]);
        }
    }
}
