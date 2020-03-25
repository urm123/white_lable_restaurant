<?php

namespace App\Http\Controllers\Api\User;

use App\Repository\ReviewRepository;
use App\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

/**
 * Class ReviewController
 * @package App\Http\Controllers\Api\User
 */
class ReviewController extends Controller
{
    protected $review;

    /**
     * ReviewController constructor.
     * @param ReviewRepository $review_repository
     */
    public function __construct(ReviewRepository $review_repository)
    {
        $this->review = $review_repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->restaurant_id) {
            $reviews = $this->review->allByRestaurant($request->restaurant_id);
        } else {
            $reviews = $this->review->all();
        }

        if ($reviews) {


            $total = 0;
            $count = 0;

            $rating_values = [
                '1' => 0,
                '2' => 0,
                '3' => 0,
                '4' => 0,
                '5' => 0,
            ];


            foreach ($reviews as $review) {


                $review->user = $review->user()->withTrashed()->first();

                $total += $review->rating;
                $count++;
                $rating_values[$review->rating]++;


            }

            $percentages = [
                '1' => 0,
                '2' => 0,
                '3' => 0,
                '4' => 0,
                '5' => 0,
            ];

            if ($count) {
                foreach ($rating_values as $key => $rating_value) {
                    $percentages[$key] = (integer)number_format($rating_value * 100 / $count, 0, '.', '');
                }
            } else {
                foreach ($rating_values as $key => $rating_value) {
                    $percentages[$key] = 0;
                }
            }

            if ($total && $count) {
                $rating = number_format($total / $count, 0, '.', '');
            } else {
                $rating = "5";
            }


            return response()->json([
                'message' => 'success',
                'data' => [
                    'reviews' => $reviews,
                    'rating' => $rating,
                    'percentages' => $percentages,
                ]
            ]);
        } else {
            return response()->json([
                'message' => 'No Reviews Found',
            ], 400);
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->request->set('user_id', Auth::id());

        $review = $this->review->create($request->all());

        if ($review) {

            return response()->json([
                'message' => 'success',
                'data' => [
                    'review' => $review,
                ]
            ]);
        } else {
            return response()->json([
                'message' => 'failed',
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Review $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Review $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Review $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Review $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        //
    }
}
