<?php

namespace App\Http\Controllers\Admin;

use App\Repository\ReviewRepository;
use App\Review;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

/**
 * Class ReviewController
 * @package App\Http\Controllers\Admin
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
    public function index()
    {
        $reviews = Auth::user()->restaurant()->withTrashed()->first()->reviews()->orderBy('created_at', 'desc')->get();

        foreach ($reviews as $review) {
            $review->user = $review->user()->first();
            $review->date = Carbon::parse($review->created_at)->toFormattedDateString();
        }

        return view('admin.review.index', ['reviews' => $reviews]);
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
        $update = $review->update($request->all());
        if ($update) {
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
     * @param \App\Review $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        //
    }
}
