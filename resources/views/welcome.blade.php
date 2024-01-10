<x-main>
  @guest
  <header class="mt-4 d-flex align-items-center justify-content-around ">    
    <div class="card" style="width: 25rem;">
      <div class="card-body p-4">
        <h1 class="card-title mb-4">Ready to declutter your basement?</h5>
        <div>
          <button class="btn btn-primary w-100 mb-4" data-bs-toggle="modal" data-bs-target="#loginregistermodal">Sell now</button>
        </div>
        <a href="#" class="card-link">Card link</a>        
      </div>
    </div>
    <div>      
    </div>     
  </header> 
  @endguest 

  <div class="row">
    <h3>Our last items</h3>
    @foreach($ads as $ad) 
    <div class="col-12 col-lg-4">
      <div class="card m-2 mx-auto" style="width: 18rem;">
        <img class="card-img-top" src="https://picsum.photos/286/180/?{{$ad->id}}" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">{{$ad->title}}</h5>
          <p class="card-text text-muted small">€ {{$ad->price}}</p>
          <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>    
    </div>
    @endforeach
  </div>
 
</x-main>