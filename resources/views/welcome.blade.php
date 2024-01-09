<x-main>

  <h1>Ciao amici! Ce la faremo!</h1>
    {{-- Bottone “inserisci annuncio” in home disponibile solo a utenti loggati. --}}
  @auth
  <div class="text-center mt-4">
    <a href="{{ route('insert') }}" class="btn btn-outline-success ">Inserisci annuncio</a>
  </div>

    
  @endauth  

</x-main>