<?php

namespace App\Http\Controllers\MasterAdmin;

use App\MenuItem;
use App\Repository\MenuItemRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

/**
 * Class MenuItemController
 * @package App\Http\Controllers\MasterAdmin
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
            'menu_id' => 'required',
            'name' => 'required',
            'price' => 'required',
//            'logo' => 'required',
        ], ['menu_id.required' => 'Category is required']);

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
        $menu_item = $this->menu_item->create($request->all());

        foreach ($request->variants as $variant) {
            $variant['menu_item_id'] = $menu_item->id;
            $this->menu_item->createVariant($variant);
        }

        foreach ($request->addons as $addon) {
            $addon['menu_item_id'] = $menu_item->id;
            $this->menu_item->createAddon($addon);
        }

        $menu_item->logo = getStorageUrl() . $menu_item->logo;

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
            'menu_id' => 'required',
            'name' => 'required',
            'price' => 'required'
        ], ['menu_id.required' => 'Category is required']);

        $request->request->set('user_id', Auth::id());

        if ($request->logo) {

            $logo = $request->logo;

            $extension = explode(';', explode('image/', $logo)[1])[0];

            $result = substr($logo, strpos($logo, 'image/', '6'), 4);

            $file_name = 'cuisines/logo_' . Carbon::now()->format('YmdHis') . '.' . $extension;

            $logo = str_replace('data:image/' . $extension . ';base64,', '', $logo);
            $logo = str_replace(' ', '+', $logo);

            Storage::disk('local')->put($file_name, base64_decode($logo));

            $request->request->set('logo', $file_name);
        }

        $menu_item = $menuItem->update($request->all());

        $this->menu_item->deleteVariant($menuItem->id);

        foreach ($request->variants as $variant) {
            $variant['menu_item_id'] = $menuItem->id;
            $this->menu_item->createVariant($variant);
        }

        $this->menu_item->deleteAddon($menuItem->id);

        foreach ($request->addons as $addon) {
            $addon['menu_item_id'] = $menuItem->id;
            $this->menu_item->createAddon($addon);
        }

        if ($request->deleted) {
            $menuItem->delete();
        } else {
            $menuItem->restore();
        }

        $menuItem->logo = getStorageUrl() . $menuItem->logo;

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
        //
    }
}
