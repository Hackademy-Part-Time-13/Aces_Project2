<x-main title="Login">
    <h1 class="text-center my-5">Login</h1>
    <form action={{route('login')}} method="post" class="col-12 col-md-8 col-lg-6 mx-auto">
      @csrf
      <div class="form-floating mb-3">
        <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" value={{old('email')}}>
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
      <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="remember" name="remember">
        <label class="form-check-label small" for="remember">Remember me</label>
      </div>
      <button type="submit" class="btn btn-primary col-12">Submit</button>
    </form>

    {{-- <a class="mt-5 btn btn-outline-success col-12 col-md-8 col-lg-6 mx-auto" href="/auth/google">Login with Google</a> --}}
</x-main>