<x-main>
       
  <div class="row">
    @if(Route::currentRouteName() == 'ads.index')
    <h3 class="my-4">Our last items</h3>
    @elseif(Route::currentRouteName() == 'adsByCategory')
    <h3 class="my-4">{{$categoryName}}</h3>
    @elseif(Route::currentRouteName() == 'ads.favs')
    <h3 class="my-4">Your favourite items</h3>
    @elseif(Route::currentRouteName() == 'ads.search')
    <h3 class="my-4">Items about {{$query}}</h3>
    @elseif(Route::currentRouteName() == 'adsByUser')
    <h3 class="my-4">Items by {{$userName}}</h3>
    @endif
    
    @forelse($ads as $ad)
    <x-card :ad="$ad"/>
    @empty

      <div>
        @if(Route::currentRouteName() == 'ads.favs')
          <p class="fst-italic my-5 text-center">Favourite some items and find them here.</p>
        @else
          <p class="fst-italic my-5 text-center">Sorry, no items found here.</p>
        @endif
        <button class="btn btn-primary d-block mx-auto">
          <a class="text-white nav-link" href="{{route('ads.index')}}">Browse</a>
        </button>
      </div>    

    @endforelse
    {{ $ads->links() }}
  </div>
   
</x-main>