<x-main title="{{$ad->title}}">

    <div class="row mt-5">        

        <div id="carouselExampleIndicators" class="carousel slide mt-5 col-12 col-lg-9">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://picsum.photos/id/27/1200/600" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://picsum.photos/id/28/1200/600" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://picsum.photos/id/29/1200/600" class="d-block w-100" alt="...">
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
    
        <div class="col-12 col-lg-3 mt-5 d-flex flex-column justify-content-between ">
            <div class="card">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item display-6">€ {{$ad->price}}</li>
                    <li class="list-group-item fw-bold">{{$ad->title}}</li>
                    <li class="list-group-item">{{$ad->description}}</li>                      
                </ul>
            </div>     
            <div class="card">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item text-muted fst-italic">{{$ad->user->name}}</li>                                             
                </ul>
            </div>             
        </div>        
            
    </div>

</x-main>