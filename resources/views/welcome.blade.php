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

  <div class="row my-5">
    @if(Route::currentRouteName() == 'home')
    <h3>Our last items</h3>
    @elseif(Route::currentRouteName() == 'adsByCategory')
    <h3>{{$categoryName}}</h3>
    @endif
    @foreach($ads as $ad)
    <div class="col-12 col-lg-4">
      <a href="{{route('adsRetail',$ad)}}" class="card p-1 m-2 mx-auto btn btn-light" style="width: 18rem;">
        <img class="card-img-top" src="https://picsum.photos/286/180/?{{$ad->id}}" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">{{$ad->title}}</h5>
          <div class="d-flex justify-content-between ">
            <p class="card-text text-muted small">€ {{$ad->price}}</p>
            <p class="card-text text-muted small">{{$ad->user->name}}</p>

          </div>
          
        </div>
      </a>    
    </div>
    @endforeach
  </div>
 
</x-main>