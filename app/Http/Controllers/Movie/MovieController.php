<?php

namespace App\Http\Controllers\Movie;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Review $reviewModel)
    {
        // The id param from URL
        $movieId = $request->id;
        $movies = DB::table('movies');
        $reviews = DB::table('reviews');

        // Get movie from DB using ID
        $movie = $movies->where('id', '=', $movieId)->first();

        // Get review(s) from DB for movie using ID
        $reviewsList = $reviews->where([
            'movie_id' => $movieId,
        ])->get();

        // If there are reviews attache user_name to review object
        if (count($reviewsList) > 0) {

            foreach ($reviewsList as $review) {
                $userName = DB::table('users')->where('id', '=', $review->user_id)->first();
                $review->user_name = $userName->name;
            }
        }

        // Default user has review to false
        $userHasReview = false;

        // Default user review to null
        $userReview = null;

        // If user signed in
        $user = auth()->user();

        if ($user) {
            $userId = $user->id;
            $userName = $user->name;

            // Switch reviews list stdClass (object) to searchable array
            $arrayReviewList = $reviewsList->toArray();

            // Search reviews list for user id
            // Return index if found
            $userReview = array_search($userId, array_column($arrayReviewList, 'user_id'));

            // If array search not false, user has a review
            if ($userReview !== false) {
                // Set user has review to true
                $userHasReview = true;

                // Remove user review from review list
                unset($arrayReviewList[$userReview]);

                // Set user review to seperate review
                $userReview = $reviewsList[$userReview];

                // Reindex review list after unser
                $reviewsList = array_values($arrayReviewList);
            }
        }

        // Return data
        // Use json decode/encode to return object

        // Return object to view with movie and review data
        return view('pages.movie')->with([
            'movie' => $movie,
            'reviews' => [
                'list' => $reviewsList,
                'user' => json_decode(json_encode([
                    'hasReview' => $userHasReview,
                    'review' => $userReview,
                ])),
            ],
        ]);
    }
}
