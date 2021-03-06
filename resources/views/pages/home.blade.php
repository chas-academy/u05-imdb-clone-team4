@extends('layouts.default')

@section('content')
    <h1 class="mb-5">Welcome to the IMDB Clone by team 4!</h1>

    {{-- Include carousel --}}
    @include('components.carousel', ["movies" => $latestMovies])

    {{-- Do we have movies to show --}}
    @if (count($movies) > 0)
        <h2 class="mt-5 mb-3 h3">Some movies to check out</h2>
        <div class="row g-4 flex-column flex-wrap flex-lg-row flex-lg-nowrap justify-content-evenly align-content-around">
            {{-- Loop movies, stop on COUNT_MOVIES or max 5 --}}
            @for($i = 0; $i < count($movies) && $i < 5; $i++)
                <div class="col movie-cards-col home-cards">
                    {{-- Include cards --}}
                    @include('components.cards', ['movies' => $movies])
                </div>
            @endfor
        </div>
    @endif

@endsection
