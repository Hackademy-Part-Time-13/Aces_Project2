<div class="col-12 col-md-6 col-lg-4 my-3">
    <div class="card mx-auto h-100" style="width: 300px;">
      <a href={{route('ad.show',$ad)}}>
        <img class="card-img-top" src="https://picsum.photos/id/{{$ad->id}}/300/300" alt="Card image cap">
      </a>     
      <div class="card-body pb-0">
        <a href={{route('ad.show',$ad)}} class="card-title fs-6 fw-semibold card-link">{{$ad->title}}</a>
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
        <p class="small opacity-50 d-inline ms-1">{{$ad->favBy()->count()}}</p>
      </div>
      @endguest
      <div class="card-footer small opacity-75 mt-2 d-flex justify-content-between">
        <div>
          <i class="fa-solid fa-tag me-1"></i>
          <a href="{{route('adsByCategory',$ad->category)}}" class="d-inline nav-link text-extramuted">{{$ad->category->name}}</a>
        </div>
        <div>
          <i class="fa-solid fa-calendar-days me-1"></i>
          <p class="small d-inline text-muted">{{$ad->created_at->format('d/m/y')}}</p>
        </div>
      </div>
    </div>    
</div>