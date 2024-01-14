<x-main>
  
  <header class="mt-lg-5 row">    
    <div class="card my-auto col-12 col-md-5 offset-md-1 col-xl-3 offset-xl-3" style="height: 16rem">
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
  
  <div class="row">
    <div class="col-12 mt-2">
        @if(session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{session('success')}}
        </div>
        @endif

        @if(session()->has('error'))
        <div class="alert alert-danger" role="alert">
            {{session('error')}}
        </div>
        @endif
    </div>
  </div>
  
  <div class="row my-md-5">
    
    <div class="mb-3 d-flex justify-content-between align-items-center">
      <h4>Our last items</h4>
      <a class="see-all p-2" href="{{route('ads.index')}}">See all</a>
    </div>
    
    @forelse($ads as $ad)
    <div class="col-12 col-md-6 col-lg-4 col-xl-3 my-3">
      <div class="card p-1 mx-auto h-100" style="width: 18rem;">
        <a href="{{route('ad.show',$ad)}}">
          <img class="card-img-top" src="https://picsum.photos/id/{{$ad->id}}/286/180" alt="Card image cap">
        </a>     
        <div class="card-body pb-0">
          <a href="{{route('ad.show',$ad)}}" class="card-title fs-6 fw-semibold card-link">{{$ad->title}}</a>
          <div class="d-flex justify-content-between mt-3 mb-0">
            <p class="card-text text-muted small">€ {{number_format($ad->price, 2, ',', '.')}}</p>
            <p class="card-text text-muted small">{{$ad->user->name}}</p>            
          </div>                    
        </div>        
        @auth
        <div class="ms-3">
          <livewire:favourite-ad-button adId="{{ $ad->id }}" />
        </div>
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
            <a href="{{route('adsByCategory',$ad->category)}}" class="d-inline nav-link text-extramuted">{{$ad->category->name}}</a>
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
    
  </div>
 
</x-main>