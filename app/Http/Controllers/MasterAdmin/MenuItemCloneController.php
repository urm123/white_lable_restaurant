<?php

namespace App\Http\Controllers\MasterAdmin;

use App\Http\Controllers\Controller;
use App\MenuItemClone;
use App\Repository\MenuItemRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MenuItemCloneController extends Controller
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
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
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
     * @param \App\MenuItemClone $menuItemClone
     * @return \Illuminate\Http\Response
     */
    public function show(MenuItemClone $menuItemClone)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\MenuItemClone $menuItemClone
     * @return \Illuminate\Http\Response
     */
    public function edit(MenuItemClone $menuItemClone)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\MenuItemClone $menuItemClone
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MenuItemClone $menuItemClone)
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

        $menu_item = $menuItemClone->update($request->all());

        $this->menu_item->deleteVariant($menuItemClone->id);

        foreach ($request->variants as $variant) {
            $variant['menu_item_id'] = $menuItemClone->id;
            $this->menu_item->createVariant($variant);
        }

        $this->menu_item->deleteAddon($menuItemClone->id);

        foreach ($request->addons as $addon) {
            $addon['menu_item_id'] = $menuItemClone->id;
            $this->menu_item->createAddon($addon);
        }

        if ($request->deleted) {
            $menuItemClone->delete();
        } else {
            $menuItemClone->restore();
        }

        $menuItemClone->logo = getStorageUrl() . $menuItemClone->logo;

        if ($menuItemClone) {
            return response()->json([
                'message' => 'success',
                'data' => [
                    'menu_item' => $menuItemClone
                ]
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\MenuItemClone $menuItemClone
     * @return \Illuminate\Http\Response
     */
    public function destroy(MenuItemClone $menuItemClone)
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

            $descriptions = $request->descriptions;

            $prices = $request->prices;

            $menu_items = $request->menu_items;

            $menu_ids = $request->menu_ids;


            foreach ($names as $key => $name) {
                $menu_item_clone_id = 0;
                if (!$descriptions[$key]) {
                    $descriptions[$key] = '';
                }

                if ($menu_items[$key] == '') {

//                dd($menu_ids[$key] . '<>' . $name . '<>' . $descriptions[$key] . '<>' . $prices[$key]);

                    $menu_item_clone = $this->menu_item->guessClone($menu_ids[$key], $name, $descriptions[$key], $prices[$key]);

                    if (!$menu_item_clone) {
                        $menu_item_clone = [
                            'logo' => '',
                            'delivery' => '',
                            'takeaway' => '',
                            'promo_code' => '',
                            'promo_type' => '',
                            'promo_value' => '',
                            'promo_usage' => '',
                            'promo_date' => ''
                        ];
                    } else {
                        $menu_item_clone_id = $menu_item_clone->id;
                    }

                    $menu_item_clone_param = $menu_item_clone;

                    if (is_object($menu_item_clone)) {
                        $menu_item_clone_param = $menu_item_clone->toArray();
                    }

                    $menu_item = $this->menu_item->create($menu_ids[$key], $name, $descriptions[$key], $prices[$key], $menu_item_clone_param);
                } else {
                    $menu_item_clone = $this->menu_item->getClone($menu_items[$key]);
                    $menu_item_clone_id = $menu_item_clone->id;
                    $this->menu_item->update($menu_items[$key], $name, $descriptions[$key], $prices[$key], $menu_item_clone->toArray());
                    $menu_item = $this->menu_item->get($menu_items[$key]);
                }

                if ($menu_item_clone->deleted) {
                    $menu_item->update([
                        'deleted' => Carbon::now()->toDateTimeString()
                    ]);
                }

                if (!isset($actives[$key]) && !$menu_item->trashed()) {
                    $menu_item->delete();
                }


                if (isset($actives[$key])) {
                    $menu_item->restore();
                }

                if (isset($menu_item->variants)) {
                    $menu_item->variants()->delete();
                }

                if (isset($menu_item->addons)) {
                    $menu_item->addons()->delete();
                }
                if (is_object($menu_item_clone) && $menu_item_clone->addonClones) {
                    foreach ($menu_item_clone->addonClones as $addon_clone) {
                        $menu_item->addons()->create([
                            'name' => $addon_clone->name,
                            'price' => $addon_clone->price,
                        ]);
                    }
                }

                if (is_object($menu_item_clone) && $menu_item_clone->variantClones) {
                    foreach ($menu_item_clone->variantClones as $variant_clone) {
                        $menu_item->variants()->create([
                            'name' => $variant_clone->name,
                            'price' => $variant_clone->price,
                        ]);
                    }
                }

                if ($menu_item_clone_id) {
                    $this->menu_item->deleteClones($menu_item_clone_id);
                }
                if (is_object($menu_item_clone) && $menu_item_clone->addonClones) {
                    $menu_item_clone->addonClones()->forceDelete();
                }
                if (is_object($menu_item_clone) && $menu_item_clone->variantClones) {
                    $menu_item_clone->variantClones()->forceDelete();
                }
            }

            $this->menu_item->deleteAllClones();

            return redirect(route('master-admin.request.menu', $restaurant_id));
        } else {
            $this->menu_item->deleteAllClones();

            return redirect(route('master-admin.request.menu', $restaurant_id));
        }
    }
}
