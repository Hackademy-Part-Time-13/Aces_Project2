<x-main>
  <h1 class="text-center my-5 pt-lg-5">Register</h1>
  <form action={{route('register')}} method="POST" class="col-12 col-md-8 col-lg-6 mx-auto">
    @csrf
    <div class="mb-3">
      <label for="name" class="form-label mb-0 small ms-2 fst-italic">Full Name</label>
      <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="John Doe" value="{{old('name')}}">
      @error('name') 
        <div class="small text-danger">{{$message}}</div>                
      @enderror 
    </div>

    <div class="mb-3">
      <label for="email" class="form-label mb-0 small ms-2 fst-italic">Email address</label>
      <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" value="{{old('email')}}">
      @error('email') 
        <div class="small text-danger">{{$message}}</div>                
      @enderror 
    </div>

    <div class="mb-3">
      <label for="password" class="form-label mb-0 small ms-2 fst-italic">Password</label>
      <div class="input-group">
        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password">
        <span class="input-group-text eye-psw-button"><i class="fa-regular fa-eye-slash mx-auto" id="tooglepsw-button" role="button"></i></span>
      </div>
      @error('password') 
        <div class="small text-danger">{{$message}}</div>                
      @enderror 
    </div>

    <div class="mb-3">
      <label for="confirm_password" class="form-label mb-0 small ms-2 fst-italic">Confirm Password</label>
      <div class="input-group">
        <input type="password" name="password_confirmation" class="form-control" id="confirm_password" placeholder="Password">
        <span class="input-group-text eye-psw-button"><i class="fa-regular fa-eye-slash mx-auto" id="toogle-confirm-psw-button" role="button"></i></span>
      </div>
    </div>
    
    <button type="submit" class="btn btn-primary col-12">Submit</button>
  </form>

  {{-- <a class="mt-5 btn btn-outline-success col-12 col-md-8 col-lg-6 mx-auto" href="/auth/google">Register with Google</a> --}}
</x-main>