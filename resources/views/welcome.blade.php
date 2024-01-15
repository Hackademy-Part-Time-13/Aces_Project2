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
  
  
  
  <div class="row my-md-5">
    
    <div class="mb-3 d-flex justify-content-between align-items-center">
      <h4>Our last items</h4>
      <a class="see-all p-2" href="{{route('ads.index')}}">See all</a>
    </div>
    
    @forelse($ads as $ad)
    <x-card :ad="$ad"/>
    @empty
    <p class="fst-italic">Sorry, no items found here.</p>
    @endforelse
    
  </div>
 
</x-main>