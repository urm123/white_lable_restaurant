<?php

namespace App\Http\Controllers\Api\User;

use App\Cuisine;
use App\Repository\CuisineRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class CuisineController
 * @package App\Http\Controllers\Api\User
 */
class CuisineController extends Controller
{
    protected $cuisine;

    /**
     * CuisineController constructor.
     * @param CuisineRepository $cuisine_repository
     */
    public function __construct(CuisineRepository $cuisine_repository)
    {
        $this->cuisine = $cuisine_repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cuisines = $this->cuisine->getPopular();

        foreach ($cuisines as $cuisine) {
            $cuisine->logo = getStorageUrl() . $cuisine->logo;
        }

        return response()->json([
            'message' => 'success',
            'data' => [
                'cuisines' => $cuisines
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
     * @param \App\Cuisine $cuisine
     * @return \Illuminate\Http\Response
     */
    public function show(Cuisine $cuisine)
    {
        $cuisine->restaurants = $cuisine->restaurants()->get();

        $cuisine->logo = getStorageUrl() . $cuisine->logo;

        foreach ($cuisine->restaurants as $key => $restaurant) {
            $restaurant->reviews = $restaurant->reviews()->get();

            $restaurant->rating = 5;

            $total = 0;

            $restaurant->sort = $key;

            $restaurant->logo = getStorageUrl() . $restaurant->logo;

            if (count($restaurant->reviews)) {
                foreach ($restaurant->reviews as $review) {
                    $total += $review->rating;
                }
                $restaurant->rating = number_format($total / count($restaurant->reviews), 2, '.', '');
            }

        }

        return response()->json([
            'message' => 'success',
            'data' => [
                'cuisine' => $cuisine
            ]
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Cuisine $cuisine
     * @return \Illuminate\Http\Response
     */
    public function edit(Cuisine $cuisine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Cuisine $cuisine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cuisine $cuisine)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Cuisine $cuisine
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cuisine $cuisine)
    {
        //
    }
}
