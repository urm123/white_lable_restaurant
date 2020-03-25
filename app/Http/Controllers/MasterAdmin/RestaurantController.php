<?php

namespace App\Http\Controllers\MasterAdmin;

use App\Http\Controllers\Controller;
use App\Repository\CuisineRepository;
use App\Repository\RestaurantRepository;
use App\Restaurant;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;

/**
 * Class RestaurantController
 * @package App\Http\Controllers\MasterAdmin
 */
class RestaurantController extends Controller
{
    protected $restaurant;

    protected $cuisine;

    /**
     * RestaurantController constructor.
     * @param RestaurantRepository $restaurant_repository
     * @param CuisineRepository $cuisine_repository
     */
    public function __construct(RestaurantRepository $restaurant_repository, CuisineRepository $cuisine_repository)
    {
        $this->restaurant = $restaurant_repository;
        $this->cuisine = $cuisine_repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('master-admin.restaurant.index');
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
        $cuisines = $this->cuisine->all();

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

        foreach ($restaurant->media as $media) {
            $media->path = asset('storage/'.$media->path);
        }

        if ($restaurant->online_from_time) {
            $restaurant->online_from_time = Carbon::parse($restaurant->online_from_time)->format('Y-m-d\TH:i');
        }
        if ($restaurant->online_to_time) {
            $restaurant->online_to_time = Carbon::parse($restaurant->online_to_time)->format('Y-m-d\TH:i');
        }

        return view('master-admin.restaurant.edit', [
            'restaurant' => $restaurant,
            'cuisines' => $cuisines,
            'weekdays' => $weekdays,
            'times' => $times,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Restaurant $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restaurant $restaurant)
    {
        $request->online_from_time = Carbon::parse($request->online_from_time)->toDateTimeString();
        $request->online_to_time = Carbon::parse($request->online_to_time)->toDateTimeString();

        if ($request->id) {
            $restaurant_clone = $this->restaurant->getRequest($request->id);
            $restaurant->update($restaurant_clone->toArray());

            $restaurant->cuisines()->detach();

            if ($restaurant_clone->cuisines) {

                foreach ($restaurant_clone->cuisines as $cuisine) {
                    $restaurant->cuisines()->attach($cuisine->id);
                }

            }
            $restaurant->openingHours()->delete();

            foreach ($restaurant->openingHourClone as $item) {
                $restaurant->openingHours()->create($item->toArray());
            }

            $restaurant->openingHourClone()->forceDelete();

            $restaurant_clone->forceDelete();

            $restaurant->restore();

            if ($restaurant_clone) {
                return response()->json([
                    'message' => 'success',
                    'data' => ''
                ]);
            }
        } else {
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
                                return redirect(route('master-admin.restaurant.edit', $restaurant))
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

            $restaurant->openingHours()->forceDelete();

            if ($request->days) {
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
                            'restaurant' => $restaurant
                        ]
                    ]);
            } else {
                    $request->session()->flash('success', 'Updated successfully!');
                    return redirect(route('master-admin.restaurant.edit', $restaurant));
            }
        }
    }

    /**
     * @param Restaurant $restaurant
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Restaurant $restaurant, Request $request)
    {

        $delete = $restaurant->restaurantClone()->delete();

        $restaurant->openingHourClone()->delete();

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
    public function deactive(Request $request)
    {
        $restaurant_id = $request->restaurant_id;

        $restaurant = $this->restaurant->getRestaurant($restaurant_id);

        if ($restaurant->trashed()) {
            $result = $restaurant->restore();
            $message = 'Restaurant reactivated successfully!';
        } else {
            $result = $restaurant->delete();
            $message = 'Restaurant deactivated successfully!';
        }

        if ($result) {
            return response()->json([
                'message' => 'success',
                'result' => $message,
                'data' => []
            ]);
        }
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function request()
    {
        return view('master-admin.restaurant.request');
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getRequests()
    {
        $requests = $this->restaurant->getRequests();

        foreach ($requests as $request) {
            $request->user = $request->restaurant()->withTrashed()->first()->user()->first();
        }

        return response()->json([
            'message' => 'success',
            'data' => [
                'requests' => $requests
            ]
        ]);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function get()
    {
        $restaurants = $this->restaurant->allWithDeleted();

        foreach ($restaurants as $restaurant) {
            if ($restaurant->trashed()) {
                $restaurant->active = false;
            } else {
                $restaurant->active = true;
            }
        }

        return response()->json([
            'message' => 'success',
            'data' => [
                'restaurants' => $restaurants
            ]
        ]);
    }

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
}
