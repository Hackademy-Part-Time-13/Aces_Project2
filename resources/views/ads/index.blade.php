<x-main>
       
  <div class="row">
    @if(Route::currentRouteName() == 'ads.index')
    <h3 class="my-4">Our last items</h3>
    @elseif(Route::currentRouteName() == 'adsByCategory')
    <h3 class="my-4">{{$categoryName}}</h3>
    @elseif(Route::currentRouteName() == 'ads.favs')
    <h3 class="my-4">Your favourites</h3>
    @elseif(Route::currentRouteName() == 'ads.search')
    <h3 class="my-4">Items about {{$query}}</h3>
    @elseif(Route::currentRouteName() == 'adsByUser')
    <h3 class="my-4">Items by {{$userName}}</h3>
    @endif
    
    @forelse($ads as $ad)
    <x-card :ad="$ad"/>
    @empty
    <p class="fst-italic">Sorry, no items found here.</p>
    @endforelse
    {{ $ads->links() }}
  </div>
   
</x-main>