<x-main>
  @guest
  <header class="mt-4 d-flex align-items-center justify-content-around @if(Route::currentRouteName() == 'adsByCategory') d-none @endif">    
    <div class="card" style="width: 25rem; height: 16rem">
      <div class="card-body p-4 h-100 d-flex flex-column justify-content-between">
        <h1 class="card-title mb-4">Ready to declutter your basement?</h5>
        <div>
          <button class="btn btn-primary w-100 mb-4" data-bs-toggle="modal" data-bs-target="#loginregistermodal">Sell now</button>
        </div>
      </div>
    </div>
    <div>      
    </div>     
  </header> 
  @endguest 

  <div class="row my-lg-5">
    @if(Route::currentRouteName() == 'ads.index')
    <h3 class="my-4">Our last items</h3>
    @elseif(Route::currentRouteName() == 'adsByCategory')
    <h3 class="my-4">{{$categoryName}}</h3>
    @elseif(Route::currentRouteName() == 'ads.favs')
    <h3 class="my-4">Your favourites</h3>
    @endif

    @if($ads->count() > 0)
    @foreach($ads as $ad)
    <div class="col-12 col-lg-4 my-3">
      <div class="card p-1 mx-auto h-100" style="width: 18rem;">
        <a href="{{route('ad.show',$ad)}}">
          <img class="card-img-top" src="https://picsum.photos/id/{{$ad->id}}/286/180" alt="Card image cap">
        </a>     
        <div class="card-body pb-0">
          <a href="{{route('ad.show',$ad)}}" class="card-title fs-5 card-link">{{$ad->title}}</a>
          <div class="d-flex justify-content-between mt-3 mb-0">
            <p class="card-text text-muted small">€ {{number_format($ad->price, 2, ',', '.')}}</p>
            <p class="card-text text-muted small">{{$ad->user->name}}</p>
          </div>                  
        </div>
        @auth
        <livewire:favourite-ad-button adId="{{ $ad->id }}" />
        @endauth
      </div>    
    </div>
    @endforeach
    {{ $ads->links() }}
    @else
    <p class="fst-italic">Sorry, no articles found for this category.</p>
    @endif
  </div>
 
</x-main>