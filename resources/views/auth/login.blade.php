<x-main title="Login">
  <h1 class="text-center my-5 pt-lg-5">Login</h1>
  <form action={{route('login')}} method="post" class="col-12 col-md-8 col-lg-6 mx-auto">
    @csrf
    <div class="mb-3">
      <label for="email" class="form-label mb-0 small ms-2 fst-italic">Email address</label>
      <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" value={{old('email')}}>
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

    <div class="mb-3 form-check">
      <input type="checkbox" class="form-check-input" id="remember" name="remember">
      <label class="form-check-label small" for="remember">Remember me</label>
    </div>
    <button type="submit" class="btn btn-primary col-12">Submit</button>
  </form>

</x-main>