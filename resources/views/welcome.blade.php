<x-main>

  <header class="my-0">
    @auth
    <div class="text-center mt-4">
      <a href="{{ route('insert') }}" class="btn btn-outline-success ">Inserisci annuncio</a>
    </div>    
    @endauth
  </header>  

</x-main>