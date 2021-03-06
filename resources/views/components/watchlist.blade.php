@for($i = 0; $i < count($movies); $i++)
    <div class="col list-cards">
        {{-- Include cards --}}
        @include('components.cards', ['movies' => $movies])
        <div class="card-footer">
             <form action="{{route('remove_from_watchlist', $movies[$i]->id)}}" method="post" >
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-warning my-2 col-12" onclick="timeout()">Remove</button>
            </form>
        </div>
    </div>
@endfor
