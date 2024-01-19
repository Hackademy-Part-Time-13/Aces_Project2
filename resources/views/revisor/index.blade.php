    <x-main>
        
        <div class="row mb-3 mt-3">
            <h4 class="text-center text-primary">
                {!!$ad_to_check ? 'There are some ads that need your attention <i class="fa-solid fa-mug-hot"></i>' : 'Good work, no more ads to check! <i class="fa-solid fa-umbrella-beach"></i>'!!}
            </h4>
        </div>
        
        @if($ad_to_check)
            
            <div class="row">
                {{-- carosello --}}
                <div class="col-12 col-md-4">
                    <div id="carouselExampleIndicators" class="carousel slide">
                        <div class="carousel-indicators">
                          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                          <div class="carousel-item active">
                            <img src="https://picsum.photos/id/{{$ad_to_check->id}}/900/900" class="d-block w-100" alt="...">
                          </div>
                          <div class="carousel-item">
                            <img src="https://picsum.photos/id/{{$ad_to_check->id+1}}/900/900" class="d-block w-100" alt="...">
                          </div>
                          <div class="carousel-item">
                            <img src="https://picsum.photos/id/{{$ad_to_check->id+3}}/900/900" class="d-block w-100" alt="...">
                          </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
                {{-- fine carosello --}}

                {{-- inizio dati + azioni --}}
                <div class="col-12 col-md-8 p-2">
                    <p><strong>Title:</strong> {{$ad_to_check->title}}</p>
                    <p><strong>Price:</strong> € {{number_format($ad_to_check->price, 2, ',', '.')}}</p>
                    <p><strong>Category:</strong> {{$ad_to_check->category->name}}</p>
                    <p><strong>Description:</strong> {{$ad_to_check->description}}</p>
                    <p><strong>Seller:</strong> {{$ad_to_check->user->name}}</p>
                    <p><strong>Date:</strong> {{$ad_to_check->created_at->format('d/m/y')}}</p>
                    <div class="d-flex gap-2 mt-5">
                        <form action="{{route('revisor.accept_ad',['ad'=>$ad_to_check])}}" method="POST">
                            @csrf
                            @method('PATCH') 
                                <button type="submit" class="btn btn-outline-primary">Accept</button>
                        </form>
                        <form action="{{route('revisor.reject_ad',['ad'=>$ad_to_check])}}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-outline-danger">Reject</button>
                        </form>
                    </div>
                </div>
                {{-- fine dati + azioni --}}
            </div>            

        @endif

        <div class="row mt-5 history-section">
            <div class="d-flex justify-content-between mt-4">
                <h2 class="text-center">History</h2>
                {{-- <div class="btn-group" role="group" aria-label="Filter Ads">
                    <a href="{{route('revisor.history')}}" class="btn btn-secondary">All Ads</a>
                    <a href="{{route('revisor.history', ['status' => 'accepted'])}}" class="btn btn-secondary">Accepted Ads</a>
                    <a href="{{route('revisor.history', ['status' => 'rejected'])}}" class="btn btn-secondary">Rejected Ads</a>
                </div> --}}
            </div>

            <div class="col-12 col-md-6">
              <h5 class="text-danger my-3">Ads rejected</h5>
              <table class="table table-striped small">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Category</th>
                    
                    <th scope="col">Price</th>
                    <th scope="col">Seller</th>
                    
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($rejected_ads as $rejected_ad)
                        <tr>
                            <th scope="row">{{$rejected_ad->id}}</th>
                            <td>{{$rejected_ad->title}}</td>
                            <td>{{$rejected_ad->category->name}}</td>
                            
                            <td>€ {{number_format($rejected_ad->price, 2, ',', '.')}}</td>
                            <td>{{$rejected_ad->user->name}}</td>
                            
                            <td>
                                
                              <a class="btn btn-outline-success" href="{{route('revisor.restore', $rejected_ad)}}">Restore</a>
                               
                            </td>
                        </tr>
                    @endforeach
                </tbody>
              </table>
              {{ $rejected_ads->links() }}
            </div>

            <div class="col-12 col-md-6">
              <h5 class="text-primary my-3">Ads accepted</h5>
              <table class="table table-striped small">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Category</th>
                    
                    <th scope="col">Price</th>
                    <th scope="col">Seller</th>
                    
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($accepted_ads as $accepted_ad)
                        <tr>
                            <th scope="row">{{$accepted_ad->id}}</th>
                            <td>{{$accepted_ad->title}}</td>
                            <td>{{$accepted_ad->category->name}}</td>
                            
                            <td>€ {{number_format($accepted_ad->price, 2, ',', '.')}}</td>
                            <td>{{$accepted_ad->user->name}}</td>
                            
                            <td>
                                
                              <a class="btn btn-outline-danger" href="{{route('revisor.back', $accepted_ad)}}">Revoke</a>
                               
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $accepted_ads->links() }}
            </div>
            
            
            
                
            

        </div>
    </x-main>
        
