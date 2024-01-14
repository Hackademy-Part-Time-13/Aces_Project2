<x-main>
  @if(Route::currentRouteName() == 'home')
  <header class="mt-lg-4 row">    
    <div class="card my-auto col-12 col-md-5 offset-md-2 col-lg-3 offset-lg-3" style="height: 16rem">
      <div class="card-body p-4 h-100 d-flex flex-column justify-content-around">        
        <h1 class="card-title mb-4">
          @guest 
            Ready to declutter your basement? 
          @endguest
          @auth 
            @php
            $firstName = strtok(auth()->user()->name, ' ');
            @endphp
            Welcome back, {{$firstName}}! 
          @endauth
        </h1>
        <div>
          @guest
            <button class="btn btn-primary w-100 mb-4" data-bs-toggle="modal" data-bs-target="#loginregistermodal">Sell now</button>
          @endguest
          @auth          
            <a class="btn btn-primary w-100 mb-4" href={{route('ad.create')}}>Sell now</a>
          @endauth
        </div>  
      </div>
    </div>  
  </header> 
  @endif
  
  <div class="row my-lg-5">
    @if(Route::currentRouteName() == 'home')
    <h3 class="my-4">Our last items</h3>
    @elseif(Route::currentRouteName() == 'adsByCategory')
    <h3 class="my-4">{{$categoryName}}</h3>
    @elseif(Route::currentRouteName() == 'ads.favs')
    <h3 class="my-4">Your favourites</h3>
    @elseif(Route::currentRouteName() == 'ads.search')
    <h3 class="my-4">Items about: {{$query}}</h3>
    @endif
    
    @forelse($ads as $ad)
    <div class="col-12 col-md-4 col-lg-3 my-3">
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
        @guest
        <div>
          <i role="button" class="d-inline fa-regular fa-heart mb-3 ms-3 opacity-50" data-bs-toggle="modal" data-bs-target="#loginregistermodal"></i>
          <p class="small opacity-50 d-inline">{{$ad->favBy()->count()}}</p>
        </div>
        @endguest
        <div class="card-footer small opacity-75 mt-2 d-flex justify-content-between">
          <div>
            <i class="fa-solid fa-tag"></i>
            <a href="{{route('adsByCategory',$ad->category)}}" class="card-link d-inline">{{$ad->category->name}}</a>
          </div>
          <div>
            <i class="fa-solid fa-calendar-days"></i>
            {{$ad->created_at->format('d/m/y')}}
          </div>
        </div>
      </div>    
    </div>
    @empty
    <p class="fst-italic">Sorry, no items found here.</p>
    @endforelse
    {{ $ads->links() }}
  </div>
 
</x-main>