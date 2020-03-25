<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repository\CuisineRepository;
use App\Repository\RestaurantRepository;
use App\Restaurant;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Validator;

/**
 * Class RestaurantController
 * @package App\Http\Controllers\Admin
 */
class RestaurantController extends Controller
{
    protected $cuisine;

    protected $restaurant;

    /**
     * RestaurantController constructor.
     * @param CuisineRepository $cuisine_repository
     * @param RestaurantRepository $restaurant_repository
     */
    public function __construct(CuisineRepository $cuisine_repository, RestaurantRepository $restaurant_repository)
    {
        $this->cuisine = $cuisine_repository;
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Restaurant $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Restaurant $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {
        $weekdays = [
            1 => __('Monday'),
            2 => __('Tuesday'),
            3 => __('Wednesday'),
            4 => __('Thursday'),
            5 => __('Friday'),
            6 => __('Saturday'),
            0 => __('Sunday'),
        ];

        $times = [
            '12 AM',
            '12.30 AM',
            '1 AM',
            '1.30 AM',
            '2 AM',
            '2.30 AM',
            '3 AM',
            '3.30 AM',
            '4 AM',
            '4.30 AM',
            '5 AM',
            '5.30 AM',
            '6 AM',
            '6.30 AM',
            '7 AM',
            '7.30 AM',
            '8 AM',
            '8.30 AM',
            '9 AM',
            '9.30 AM',
            '10 AM',
            '10.30 AM',
            '11 AM',
            '11.30 AM',
            '12 PM',
            '12.30 PM',
            '1 PM',
            '1.30 PM',
            '2 PM',
            '2.30 PM',
            '3 PM',
            '3.30 PM',
            '4 PM',
            '4.30 PM',
            '5 PM',
            '5.30 PM',
            '6 PM',
            '6.30 PM',
            '7 PM',
            '7.30 PM',
            '8 PM',
            '8.30 PM',
            '9 PM',
            '9.30 PM',
            '10 PM',
            '10.30 PM',
            '11 PM',
            '11.30 PM',
        ];

        $cuisines = $this->cuisine->all();

        foreach ($restaurant->media as $media) {
            $media->path = asset('storage/'.$media->path);
        }

        if ($restaurant->online_from_time) {
            $restaurant->online_from_time = Carbon::parse($restaurant->online_from_time)->format('Y-m-d\TH:i');
        }
        if ($restaurant->online_to_time) {
            $restaurant->online_to_time = Carbon::parse($restaurant->online_to_time)->format('Y-m-d\TH:i');
        }

        return view('admin.restaurant.edit', [
            'restaurant' => $restaurant,
            'weekdays' => $weekdays,
            'times' => $times,
            'cuisines' => $cuisines,
        ]);
    }

    /**
     * @param Request $request
     * @param Restaurant $restaurant
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function update(Request $request, Restaurant $restaurant)
    {
        if (\config('app.product_type') == 'single') {

            $filtered = [];

            $request->request->set('discount_type', $request->restaurant_discount_type);

            if ($request->days) {
                foreach ($request->days as $day) {
                    $filtered = Arr::where($request->days, function ($value, $key) use ($day) {
                        return $value['day'] == $day['day'];
                    });
                }
            }

            foreach ($filtered as $key => $filter) {
                $filtered[$key]['opening_time'] = Carbon::parse($filter['opening_time'])->toDateTimeString();
                $filtered[$key]['closing_time'] = Carbon::parse($filter['closing_time'])->toDateTimeString();
            }

            $filtered = collect($filtered);


            $filtered = $filtered->sortBy(function ($filter) {
                return [$filter['day'], $filter['opening_time']];
            })->toArray();

            sort($filtered);

            $weekdays = [
                1 => __('Monday'),
                2 => __('Tuesday'),
                3 => __('Wednesday'),
                4 => __('Thursday'),
                5 => __('Friday'),
                6 => __('Saturday'),
                0 => __('Sunday'),
            ];

            foreach ($filtered as $key => $item) {
                if (array_key_exists($key + 1, $filtered)) {
                    if ($item['day'] == $filtered[$key + 1]['day']) {
                        if (Carbon::parse($filtered[$key + 1]['opening_time'])->lt(Carbon::parse($item['closing_time']))) {
                            $validator = Validator::make($request->all(), [
                                'days' => [
                                    function ($attribute, $value, $fail) use ($weekdays, $item) {
                                        $fail($weekdays[$item['day']] . ' has time conflicts. Please resolve to proceed');
                                    }
                                ]
                            ]);
                            if ($validator->fails()) {
                                return redirect(route('admin.restaurant.edit', $restaurant))
                                    ->withErrors($validator)
                                    ->withInput();
                            }
                        }
                    }
                }
            }

            $request->online_from_time = Carbon::parse($request->online_from_time)->toDateTimeString();
            $request->online_to_time = Carbon::parse($request->online_to_time)->toDateTimeString();

            if ($request->parking == 'true') {
                $request->request->set('parking', true);
            } else {
                $request->request->set('parking', false);
            }

            if ($request->delivery == 'true') {
                $request->request->set('delivery', true);
            } else {
                $request->request->set('delivery', false);
            }

            if ($request->takeaway == 'true') {
                $request->request->set('takeaway', true);
            } else {
                $request->request->set('takeaway', false);
            }

            if ($request->reserve == 'true') {
                $request->request->set('reserve', true);
            } else {
                $request->request->set('reserve', false);
            }

            if ($request->image) {
                $path = $request->file('image')->store('restaurant/logo');
                $request->request->set('logo', $path);
            } else {
                $request->request->set('logo', $restaurant->logo);
            }

            $media = $restaurant->media;

            $media_deletes = [];

            if ($request->sliders) {
                foreach ($request->sliders as $key => $slider) {
                    foreach ($media as $item) {
                        if ($key == $item->id) {
                            $media_deletes[] = $item->id;
                        }
                    }
                }
            }

            foreach ($media_deletes as $media_delete) {
                $restaurant->media()->whereId($media_delete)->delete();
            }

            if ($request->sliders) {
                foreach ($request->sliders as $key => $slider) {
                    $path = $slider->store('restaurant/slider');
                    $restaurant->media()->create([
                        'path' => $path,
                        'name' => $restaurant->name,
                    ]);
                }
            }


            $restaurant->update($request->except([
                'days',
                '_token',
                '_method',
                'street',
                'selected',
                'cuisines',
                'image',
                'sliders'
            ]));


            $restaurant->cuisines()->detach();

            $restaurant->update([
                'online_from_time' => $request->online_from_time,
                'online_to_time' => $request->online_to_time,
            ]);


            if ($request->cuisines) {
                foreach ($request->cuisines as $cuisine) {
                    $restaurant->cuisines()->attach($cuisine);
                }
            }

            if ($request->days) {
                $restaurant->openingHours()->forceDelete();
                foreach ($request->days as $key => $day) {
                    if ($day['opening_time'] || $day['closing_time']) {
                        $day['restaurant_id'] = $restaurant->id;
                        $restaurant->openingHours()->create($day);
                    }
                }
            }

            if ($request->wantsJson()) {
                return response()->json([
                    'message' => 'success',
                    'data' => [

                    ]
                ]);
            } else {
                $request->session()->flash('success', 'Updated successfully!');
                return redirect(route('admin.restaurant.edit', $restaurant));
            }

        } else {

            if ($request->discount_type) {

                $count = $restaurant->restaurantClone()->count();


                if (!$count) {
                    $restaurant->restaurantClone()->create($restaurant->toArray());
                }


                $restaurant->restaurantClone()->update([
                    'discount_type' => $request->restaurant_discount_type,
                    'discount_value' => $request->discount_value,
                    'start_date' => $request->start_date,
                    'expiry_date' => $request->expiry_date,
                    'discount' => $request->discount,
                    'update_type' => 'discount',
                ]);

                if ($request->wantsJson()) {
                    return response()->json([
                        'message' => 'success',
                        'data' => [

                        ]
                    ]);
                } else {
                    return redirect(route('admin.restaurant.edit', $restaurant));
                }
            } else {

                $filtered = [];

                if ($request->days) {
                    foreach ($request->days as $day) {
                        $filtered = Arr::where($request->days, function ($value, $key) use ($day) {
                            return $value['day'] == $day['day'];
                        });
                    }
                }

                foreach ($filtered as $key => $filter) {
                    $filtered[$key]['opening_time'] = Carbon::parse($filter['opening_time'])->toDateTimeString();
                    $filtered[$key]['closing_time'] = Carbon::parse($filter['closing_time'])->toDateTimeString();
                }

                $filtered = collect($filtered);


                $filtered = $filtered->sortBy(function ($filter) {
                    return [$filter['day'], $filter['opening_time']];
                })->toArray();

                sort($filtered);

                $weekdays = [
                    1 => __('Monday'),
                    2 => __('Tuesday'),
                    3 => __('Wednesday'),
                    4 => __('Thursday'),
                    5 => __('Friday'),
                    6 => __('Saturday'),
                    0 => __('Sunday'),
                ];

                foreach ($filtered as $key => $item) {
                    if (array_key_exists($key + 1, $filtered)) {
                        if ($item['day'] == $filtered[$key + 1]['day']) {
                            if (Carbon::parse($filtered[$key + 1]['opening_time'])->lt(Carbon::parse($item['closing_time']))) {
                                $validator = Validator::make($request->all(), [
                                    'days' => [
                                        function ($attribute, $value, $fail) use ($weekdays, $item) {
                                            $fail($weekdays[$item['day']] . ' has time conflicts. Please resolve to proceed.');
                                        }
                                    ]
                                ]);
                                if ($validator->fails()) {
                                    return redirect(route('admin.restaurant.edit', $restaurant))
                                        ->withErrors($validator)
                                        ->withInput();
                                }
                            }
                        }
                    }
                }

                $request->online_from_time = Carbon::parse($request->online_from_time)->toDateTimeString();
                $request->online_to_time = Carbon::parse($request->online_to_time)->toDateTimeString();


                $count = $restaurant->restaurantClone()->count();

                if ($request->parking == 'true') {
                    $request->request->set('parking', true);
                } else {
                    $request->request->set('parking', false);
                }

                if ($request->delivery == 'true') {
                    $request->request->set('delivery', true);
                } else {
                    $request->request->set('delivery', false);
                }

                if ($request->takeaway == 'true') {
                    $request->request->set('takeaway', true);
                } else {
                    $request->request->set('takeaway', false);
                }

                if ($request->reserve == 'true') {
                    $request->request->set('reserve', true);
                } else {
                    $request->request->set('reserve', false);
                }

                if ($request->image) {
                    $path = $request->file('image')->store('restaurant/logo');
                    $request->request->set('logo', $path);
                } else {
                    $request->request->set('logo', $restaurant->logo);
                }

                $media = $restaurant->media;

                $media_deletes = [];

                if ($request->sliders) {
                    foreach ($request->sliders as $key => $slider) {
                        foreach ($media as $item) {
                            if ($key == $item->id) {
                                $media_deletes[] = $item->id;
                            }
                        }
                    }
                }

                foreach ($media_deletes as $media_delete) {
                    $restaurant->media()->whereId($media_delete)->delete();
                }

                if ($request->sliders) {
                    foreach ($request->sliders as $key => $slider) {
                        $path = $slider->store('restaurant/slider');
                        $restaurant->media()->create([
                            'path' => $path,
                            'name' => $restaurant->name,
                        ]);
                    }
                }

                if (!$count) {
                    $restaurant->restaurantClone()->create($restaurant->toArray());
                }

                $restaurant->restaurantClone()->update($request->except([
                    'days',
                    '_token',
                    '_method',
                    'street',
                    'selected',
                    'cuisines',
                    'image',
                    'sliders'
                ]));


                $restaurant->restaurantClone()->first()->cuisines()->detach();

                $restaurant->update([
                    'online_from_time' => $request->online_from_time,
                    'online_to_time' => $request->online_to_time,
                ]);


                if ($request->cuisines) {
                    foreach ($request->cuisines as $cuisine) {
                        $restaurant->restaurantClone()->first()->cuisines()->attach($cuisine);
                    }
                }
                $restaurant->openingHourClone()->forceDelete();
                $restaurant->openingHours()->forceDelete();
                if ($request->days) {
                    foreach ($request->days as $key => $day) {
                        if ($day['opening_time'] || $day['closing_time']) {
                            $day['restaurant_id'] = $restaurant->id;
//                    $day['day'] = $key;
                            $clone = $restaurant->openingHourClone()->create($day);
                            $clone = $restaurant->openingHours()->create($day);
                        }
                    }
                }

                if ($request->wantsJson()) {
                    return response()->json([
                        'message' => 'success',
                        'data' => [

                        ]
                    ]);
                } else {
                    return redirect(route('admin.restaurant.edit', $restaurant));
                }
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Restaurant $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        //
    }

    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function own()
    {
        $restaurant = Auth::user()->restaurant()->withTrashed()->first();
        return redirect(route('admin.restaurant.edit', $restaurant));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function removeSlider(Request $request)
    {
        $slider_id = $request->slider_id;

        if ($slider_id) {
            $delete = $this->restaurant->deleteSlider($slider_id);
        } else {
            $delete = true;
        }
        if ($delete) {
            return response()->json([
                'message' => 'success'
            ]);
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function postOnline(Request $request)
    {
        $restaurant = Auth::user()->restaurant()->first();

        $update = $restaurant->update($request->all());

        if ($update) {
            return response()->json([
                'message' => 'success'
            ]);
        }
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getOnline()
    {
        $restaurant = Auth::user()->restaurant()->first();
        if ($restaurant) {
            return response()->json([
                'restaurant' => $restaurant
            ]);
        }
    }
}
