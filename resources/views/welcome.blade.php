<x-main>
    <h1>Ciao amici! Ce la faremo!</h1>

    {{-- Bottone “inserisci annuncio” in home disponibile solo a utenti loggati. --}}
<form method="POST" action="{{route('InserisciAnnuncio')}}">
      @csrf

      @auth
        <button class="btn btn-outline-success btn-sm" type="submit">Inserisci annuncio</button>
      @endauth  

      @guest
      <p>Registrati per inserire il tuo primo annuncio!</p>
      <a href="{{ route('register') }}" class="btn btn-primary">Registrati</a>
      <a href="{{ route('login') }}" class="btn btn-primary">Accedi</a>
      @endguest

</form>

</x-main>