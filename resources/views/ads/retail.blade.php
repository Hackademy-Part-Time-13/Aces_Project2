<x-main title="dettaglio annuncio">

<div class="container mt-4">

    <div class="row">

        <div class="col-12">

            <div id="carouselExampleIndicators" class="carousel slide mt-5">
                <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://picsum.photos/id/27/1200/200" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://picsum.photos/id/28/1200/200" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://picsum.photos/id/29/1200/200" class="d-block w-100" alt="...">
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
        
        
        
            <div class="card">
                <div class="card-header">
                <h5 class="card-title">Title: {{$ad->title}}</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">Description: {{$ad->description}}</p>
                <p class="card-text">Price: {{$ad->price}}</p>
                <a href="{{route('home')}}" class="btn btn-primary">Go back</a>   
                  
                </div>
            </div>




    </div>
    </div>  

    </div>





</x-main>