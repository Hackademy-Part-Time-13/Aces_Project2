<x-main>
        
  <div class="row mb-3 mt-3">
    @if($ad_to_check)
      <div class="text-primary d-flex align-items-center justify-content-center gap-2">
        <h4>{{__('ui.revisor_ads')}}</h4>
        <i class="fa-solid fa-mug-hot"></i>
      </div>
      @else
      <div class="text-primary d-flex align-items-center justify-content-center gap-2">
        <h4>{{__('ui.revisor_no_ads')}}</h4>
        <i class="fa-solid fa-umbrella-beach"></i>
      </div>
    @endif
  </div>
        
  @if($ad_to_check)
      
    <div class="row">
      
      {{-- carosello --}}
      <div class="col-12 col-md-5">
        @if($ad_to_check->images->count() > 0)
        <div id="carouselExampleIndicators" class="carousel slide">
          
          <div class="carousel-inner">
            @foreach ($ad_to_check->images as $img)
            
              <div class="carousel-item @if($loop->first) active @endif" id="{{$img->id}}" data-adult="{{$img->adult}}" data-spoof="{{$img->spoof}}" data-medical="{{$img->medical}}" data-violence="{{$img->violence}}" data-racy="{{$img->racy}}" data-labels="{{ is_array($img->labels) ? implode(", ", $img->labels) : '' }}"
                >                
                <img src="{{$img->getUrl(600,600)}}" class="d-block w-100">                
              </div>
            @endforeach
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
        @else
        <p class="fst-italic">Questo annuncio non ha foto.</p>
        @endif
      </div>      
      {{-- fine carosello --}}

      <div class="col-12 col-md-7">
        <div class="row">          
          <div class="col-12 col-md-6">
            <div class="card m-0 ">
              <div class="card-header fw-semibold">
                Content warning
              </div>
              <ul class="list-group list-group-flush">
                <li class="list-group-item">Adult: <i id="adult-warning" class="fas fa-circle "></i></li>
                <li class="list-group-item">Spoof: <i id="spoof-warning" class="fas fa-circle "></i></li>
                <li class="list-group-item">Medical: <i id="medical-warning" class="fas fa-circle "></i></li>
                <li class="list-group-item">Violence: <i id="violence-warning" class="fas fa-circle "></i></li>
                <li class="list-group-item">Racy: <i id="racy-warning" class="fas fa-circle "></i></li>
              </ul>
            </div>
          </div>
          
          <div class="col-12 col-md-6">
            <div class="card m-0 ">
              <div class="card-header fw-semibold">
                Tags
              </div>
               <div class="py-2 px-3">
                @foreach($ad_to_check->images as $image)
                  @if($image->labels)
                   <p id="labels"></p>
                  @else
                  <p>Nessuna label</p>
                  @endif
                @endforeach
               </div>
             
                
              
  
          </div>
        </div>
        <div class="row mt-3">
          <p><strong>{{__('ui.title')}}:</strong> {{$ad_to_check->title}}</p>
          <p><strong>{{__('ui.price')}}:</strong> € {{number_format($ad_to_check->price, 2, ',', '.')}}</p>
          <p><strong>{{__('ui.category')}}:</strong> 
            @if (app()->getLocale() == 'it')
            {{ $ad_to_check->category->title_it }}
          @elseif (app()->getLocale() == 'en')
            {{ $ad_to_check->category->title_en }}
          @elseif (app()->getLocale() == 'es')
            {{ $ad_to_check->category->title_es }}
          @else
            {{ $ad_to_check->category->title_en }} 
          @endif
          </p>
          <p><strong>{{__('ui.description')}}:</strong> {{$ad_to_check->description}}</p>
          <p><strong>{{__('ui.seller')}}:</strong> {{$ad_to_check->user->name}}</p>
          <p><strong>{{__('ui.date')}}:</strong> {{$ad_to_check->created_at->format('d/m/y')}}</p>
        </div>
       
        
        </div>
      </div>   
    </div>

    <div>
      {{-- inizio dati + azioni --}}
      <div class="row mb-5">
        

        <div class="d-flex justify-content-around mt-5">
          <form action="{{route('revisor.accept_ad',['ad'=>$ad_to_check])}}" method="POST">
            @csrf
            @method('PATCH') 
            <button type="submit" class="btn btn-outline-primary">{{__('ui.accept')}}</button>
          </form>
          <form action="{{route('revisor.reject_ad',['ad'=>$ad_to_check])}}" method="POST">
            @csrf
            @method('PATCH')
            <button type="submit" class="btn btn-outline-danger">{{__('ui.reject')}}</button>
          </form>
        </div>
      </div>
      {{-- fine dati + azioni --}}
    </div>            

  @endif

  <div class="row mt-5 history-section bg-body-secondary border rounded-3">
    
    <h2 class="text-center my-4">{{__('ui.history')}}</h2>    

    <div class="col-12 col-md-6 table-responsive">
      <h5 class="text-primary my-3">{{__('ui.accepted_ads')}}</h5>
      <table class="table table-striped small">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">{{__('ui.title')}}</th>
            <th scope="col">{{__('ui.category')}}</th>            
            <th scope="col">{{__('ui.price')}}</th>
            <th scope="col">{{__('ui.seller')}}</th>            
            <th scope="col">{{__('ui.actions')}}</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($accepted_ads as $accepted_ad)
                <tr>
                    <th scope="row">{{$accepted_ad->id}}</th>
                    <td>{{$accepted_ad->title}}</td>
                    <td>
                      @if (app()->getLocale() == 'it')
                          {{ $accepted_ad->category->title_it }}
                          @elseif (app()->getLocale() == 'en')
                            {{ $accepted_ad->category->title_en }}
                          @elseif (app()->getLocale() == 'es')
                            {{ $accepted_ad->category->title_es }}
                          @else
                            {{ $accepted_ad->category->title_en }} 
                          @endif
                    </td>                    
                    <td>€ {{number_format($accepted_ad->price, 2, ',', '.')}}</td>
                    <td>{{$accepted_ad->user->name}}</td>                    
                    <td>
                      <a class="btn btn-outline-danger" href="{{route('revisor.back', $accepted_ad)}}">{{__('ui.revoke')}}</a>                        
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>
      {{ $accepted_ads->links() }}
    </div>

    <div class="col-12 col-md-6 table-responsive">
      <h5 class="text-danger my-3">{{__('ui.rejected_ads')}}</h5>
      <table class="table table-striped small">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">{{__('ui.title')}}</th>
            <th scope="col">{{__('ui.category')}}</th>
            
            <th scope="col">{{__('ui.price')}}</th>
            <th scope="col">{{__('ui.seller')}}</th>
            
            <th scope="col">{{__('ui.actions')}}</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($rejected_ads as $rejected_ad)
                <tr>
                    <th scope="row">{{$rejected_ad->id}}</th>
                    <td>{{$rejected_ad->title}}</td>
                    <td>
                      @if (app()->getLocale() == 'it')
                      {{ $rejected_ad->category->title_it }}
                      @elseif (app()->getLocale() == 'en')
                        {{ $rejected_ad->category->title_en }}
                      @elseif (app()->getLocale() == 'es')
                        {{ $rejected_ad->category->title_es }}
                      @else
                        {{ $rejected_ad->category->title_en }} 
                      @endif
                    </td>
                    
                    <td>€ {{number_format($rejected_ad->price, 2, ',', '.')}}</td>
                    <td>{{$rejected_ad->user->name}}</td>
                    
                    <td>
                        
                      <a class="btn btn-outline-success" href="{{route('revisor.restore', $rejected_ad)}}">{{__('ui.restore')}}</a>
                        
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>
      {{ $rejected_ads->links() }}
    </div>

    

  </div>

  <script>
    document.addEventListener('DOMContentLoaded', () => {
      

    const carousel = document.querySelector('#carouselExampleIndicators');
    
    // Funzione per aggiornare i content warning
    const updateContentWarnings = (activeItem) => {
      if (!activeItem) return;

      const warnings = {
        adult: activeItem.dataset.adult,
        spoof: activeItem.dataset.spoof,
        medical: activeItem.dataset.medical,
        violence: activeItem.dataset.violence,
        racy: activeItem.dataset.racy
      };

      const labels = activeItem.dataset.labels;

      clearAndAddClass('adult-warning', warnings.adult);
      clearAndAddClass('spoof-warning', warnings.spoof);
      clearAndAddClass('medical-warning', warnings.medical);
      clearAndAddClass('violence-warning', warnings.violence);
      clearAndAddClass('racy-warning', warnings.racy);

      clearAndAddLabels('labels', labels)

    };

    // Imposta i content warning per la prima slide all'avvio
    const initialActiveItem = carousel.querySelector('.carousel-item.active');
    updateContentWarnings(initialActiveItem);

    // Aggiorna i content warning al cambio di slide
    carousel.addEventListener('slid.bs.carousel', () => {
        const activeItem = carousel.querySelector('.carousel-item.active');
        updateContentWarnings(activeItem);
    });

    function clearAndAddLabels(elementId, labels){
      const element = document.getElementById(elementId);
      if(element){
        element.textContent = '';
        if(labels){
          element.textContent = labels;
        }
      }
    };
   
    function clearAndAddClass(elementId, classString) {
        const element = document.getElementById(elementId);
        if(element) {
            element.className = '';
            if (classString) {
            // Dividi la stringa di classi in un array e aggiungi ogni classe individualmente
              const classes = classString.split(' ');
              classes.forEach(className => {
                if (className) element.classList.add(className);
            });
          }
        }
      }
    });
  </script>
  
</x-main>
        