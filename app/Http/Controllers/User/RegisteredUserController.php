<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\AddedMovie;
use App\Models\Movie;
use App\Models\Review;
use Illuminate\Http\Request;

class RegisteredUserController extends Controller
{
    // Use construct to check if user is logged in
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index(Request $request)
    {
        $user = auth()->user();

        $added_movies = auth()->user()->addedMovies()->pluck('movie_id');
        $movies = Movie::whereIn('id', $added_movies)->get();

        $reviews = Review::where('user_id', $user->id)->get();

        return view('pages.account')
            ->with([
                'user' => $user,
                'movies' => $movies,
                'reviews' => $reviews,
            ]);
    }
}
