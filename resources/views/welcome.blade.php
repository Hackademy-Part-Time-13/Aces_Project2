<x-main>

  <header class="mt-4 d-flex align-items-center justify-content-around ">
    
    <div class="card" style="width: 25rem;">
      <div class="card-body p-4">
        <h1 class="card-title mb-4">Ready to declutter your basement?</h5>
        {{-- rotta aggiungi annuncio solo per utenti loggati --}}
        @auth
        <div>
          <a href="{{ route('insert') }}" class="btn btn-primary w-100 mb-4">Sell now</a>
        </div>
        @endauth
        {{-- per gli ospiti rotta per la registrazione --}}
        @guest
        <div>
          <button class="btn btn-primary w-100 mb-4" data-bs-toggle="modal" data-bs-target="#loginregistermodal">Sell now</button>
        </div>
        @endguest
        <a href="#" class="card-link">Card link</a>        
      </div>
    </div>
    <div>      
    </div>    
    
  </header>  

</x-main>