<?php

namespace App\Http\Controllers\MasterAdmin;

use App\Repository\ReviewRepository;
use App\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
    public function index()
    {
        return view('master-admin.review.index');
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getReviews(Request $request)
    {
        $from_date = $request->from_date;
        $to_date = $request->to_date;

        $reviews = $this->review->allByDate($from_date, $to_date);

        foreach ($reviews as $review) {
            $review->user = $review->user()->withTrashed()->first();
            $review->restaurant = $review->restaurant()->withTrashed()->first();
            $review->deleted = false;
            if ($review->trashed()) {
                $review->deleted = true;
            }
        }

        return response()->json([
            'reviews' => $reviews
        ]);
    }

    public function setStatus(Request $request)
    {
        $review_id = $request->review_id;
        $status = $request->status;

        $review = $this->review->get($review_id);

        if ($status) {
            $result = $review->restore();
            $message = 'Review approved!';
        } else {
            $result = $review->delete();
            $message = 'Review blocked!';
        }
        if ($result) {
            return response()->json([
                'status' => true,
                'message' => $message
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Update failed!'
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
