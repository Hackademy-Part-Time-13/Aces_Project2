<x-main>

    <div class="container mt-5">
        <div class="row">
            <div class="col-6">
              <form method="POST" action="{{route('become.revisor')}}">
                @csrf
                <div class="mb-3">
                    <label class="name">Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="email">Email</label>
                    <input type="text" name="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="name">Msg</label>
                    <input type="text" name="msg" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary">Become revisor</button>
              </form>

              
            </div>
        </div>
    </div>

    {{-- <a href="{{route('become.revisor')}}" class="btn btn-primary">Become revisor</a> --}}






</x-main>