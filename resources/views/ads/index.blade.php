<x-main>
       
  <div class="d-flex justify-content-between align-items-center">    
    <h3 class="my-4">{{$title}}</h3>

    {{-- ordinamento annunci --}}   
    <form action={{route(Route::currentRouteName(),$id ?? '')}} method="GET">
      <input type="hidden" name="searched" value={{ $query ?? ''}}>
      <select class="form-select" name="orderby" onchange="submit()">
        <option {{ $orderby === 'default' ? 'selected' : '' }} value="default">In evidenza</option>
        <option {{ $orderby === 'asc' ? 'selected' : '' }} value="asc">Dal più economico</option>
        <option {{ $orderby === 'desc' ? 'selected' : '' }} value="desc">Dal più costoso</option>
      </select>
    </form>
    
  </div>

  <div class="row">
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
          <a class="text-white nav-link" href="{{route('ads.favs')}}">Browse</a>
        </button>
      </div>    

    @endforelse
    {{ $ads->links() }}

  </div>
   
</x-main>