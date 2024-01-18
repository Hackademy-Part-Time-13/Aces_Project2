<header class="mt-lg-5 row pt-lg-5 mb-4">    
    <div class="card my-auto col-12 col-md-5 offset-md-1 col-xl-3 offset-xl-3" style="height: 16rem">
      <div class="card-body p-4 h-100 d-flex flex-column justify-content-around">        
        <h1 class="card-title ">
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
