<x-main>
  <h1 class="text-center my-3">Register</h1>
  <form action={{route('register')}} method="POST" class="col-12 col-md-8 col-lg-6 mx-auto">
    @csrf
    <div class="form-floating mb-3">
      <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="name@example.com" value="{{old('name')}}">
      <label for="name">Full Name</label>
      @error('name') 
        <div class="small text-danger">{{$message}}</div>                
      @enderror 
    </div>

    <div class="form-floating mb-3">
      <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" value="{{old('email')}}">
      <label for="email">Email address</label>
      @error('email') 
        <div class="small text-danger">{{$message}}</div>                
      @enderror 
    </div>

    <div class="form-floating mb-3">
      <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password">
      <label for="password">Password</label>
      @error('password') 
        <div class="small text-danger">{{$message}}</div>                
      @enderror 
    </div>

    <div class="form-floating mb-3">
      <input type="password" name="password_confirmation" class="form-control" id="password" placeholder="Password">
      <label for="password">Confirm Password</label>      
    </div>
    
    <button type="submit" class="btn btn-primary col-12">Submit</button>
  </form>

  {{-- <a class="mt-5 btn btn-outline-success col-12 col-md-8 col-lg-6 mx-auto" href="/auth/google">Register with Google</a> --}}
</x-main>