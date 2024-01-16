<x-main>

    <div class="container">
        <div class="row">
            <div class="col-6 mt-5">
                <h1>Un utente ha richiesto di lavorare con noi</h1>
                <form action="{{route('work.mail')}}" method="POST">
                    @csrf
                    <input type="text" class="d-none" name="email" value={{auth()->user()->email}}>
                    <button type="submit">Invia richiesta</button>
                </form>
               
            </div>
        </div>
    </div>



</x-main>