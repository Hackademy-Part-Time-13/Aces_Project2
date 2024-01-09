<x-main>

  <h1>Ciao amici! Ce la faremo!</h1>
    {{-- Bottone “inserisci annuncio” in home disponibile solo a utenti loggati. --}}
  @auth
    {{-- <a href="{{ route('InserisciAnnuncio') }}" class="btn btn-outline-success btn-sm">Inserisci annuncio</a> --}}
    
  @endauth  

</x-main>