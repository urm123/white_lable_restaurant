<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Repository\RestaurantRepository;
use App\Repository\ReviewRepository;
use App\Review;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class ReviewController
 * @package App\Http\Controllers\User
 */
class ReviewController extends Controller
{
    protected $review;

    protected $restaurant;

    /**
     * ReviewController constructor.
     * @param ReviewRepository $review_repository
     * @param RestaurantRepository $restaurant_repository
     */
    public function __construct(ReviewRepository $review_repository, RestaurantRepository $restaurant_repository)
    {
        $this->review = $review_repository;
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
        $request->request->set('user_id', Auth::id());

        $review = $this->review->create($request->all());

        if (\config('app.product_type') == 'multiple') {
            $review->delete();
        }
//        new code
//        new code
//        new code

        $restaurant = $this->restaurant->getRestaurant($request->restaurant_id);

        $reviews = $restaurant->reviews()->orderBy('created_at', 'desc')->get();

        $total = 0;
        $count = 0;

        $rating_values = [
            '5 ' => 0,
            '4 ' => 0,
            '3 ' => 0,
            '2 ' => 0,
            '1 ' => 0,
        ];

        foreach ($reviews as $review) {
            $total += $review->rating;
            $count++;
            $rating_values[$review->rating . ' ']++;
        }

        $percentages = [
            '5 ' => 0,
            '4 ' => 0,
            '3 ' => 0,
            '2 ' => 0,
            '1 ' => 0,
        ];
        if ($count) {
            foreach ($rating_values as $key => $rating_value) {
                $percentages[$key] = $rating_value * 100 / $count;
            }
        } else {
            foreach ($rating_values as $key => $rating_value) {
                $percentages[$key] = 0;
            }
        }
        if ($total && $count) {
            $rating = number_format($total / $count, 0, '.', '');
        } else {
            $rating = 5;
        }

        foreach ($reviews as $review) {
            $review->user = $review->user()->first();
            $review->date = Carbon::parse($review->created_at)->diffForHumans();
        }


//        new code
//        new code
//        new code

        if ($review) {
            return response()->json([
                'message' => 'success',
                'data' => [
                    'review' => $review,
                    'reviews' => $reviews,
                    'percentages' => $percentages,
                    'rating' => $rating
                ]
            ]);
        } else {
            return response()->json([
                'message' => 'failed'
            ]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Review $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Review $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Review $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Review $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        //
    }
}
