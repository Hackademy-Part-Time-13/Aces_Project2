<x-main title="Inserisci Annuncio">

    {{-- Form provvisorio segnaposto--}}

    <form>
        <div class="mb-3">
        <label class="form-label">Titolo dell'annuncio </label>
        <input type="text" name="title">
        </div>
        <div class="mb-3">
        <label class="form-label">Descrizione</label>
        <input type="text" name="description">
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</x-main>