<header class="mt-lg-5 row pt-lg-5 mb-4">    
    <div class="card my-auto col-12 col-xl-5 offset-xl-1 col-xxl-3 offset-xxl-3" style="height: 16rem">
      <div class="card-body p-4 h-100 d-flex flex-column justify-content-between">        
        <h1 class="card-title">
          @guest 
            {{__('ui.header')}}
          @endguest
          @auth 
            @php
            $firstName = strtok(auth()->user()->name, ' ');
            @endphp
            {{__('ui.welcome')}} {{$firstName}}! 
          @endauth
        </h1>
        <div>
          @guest
            <button class="btn btn-primary w-100 mb-4 text-white" data-bs-toggle="modal" data-bs-target="#loginregistermodal">{{__('ui.sell')}}</button>
          @endguest
          @auth          
            <a class="btn btn-primary w-100 mb-4 text-white" href={{route('ad.create')}}>{{__('ui.sell')}}</a>
          @endauth
        </div>  
      </div>
    </div>  
  </header> 
