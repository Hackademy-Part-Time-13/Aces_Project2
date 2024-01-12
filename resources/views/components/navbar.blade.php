<div class="modalnav fixed-top">
  <nav class="navbar navbar-expand-lg bg-body-tertiary border border-bottom">
  
    <div class="container-lg">
      <a class="navbar-brand text-primary" href={{route('home')}}>{{config('app.name')}}</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link @if(Route::currentRouteName() == 'home') active @endif" href={{route('home')}}>Home</a>
          </li>
          <!-- categorie -->
          <li class="nav-item dropdown">
            <a  class="nav-link dropdown-toggle" href="#" id="categoriesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Categories
            </a>
            <ul class="dropdown-menu" aria-labelledby="categoriesDropdown">
                @foreach ($categories as $category)
                <li><a class="dropdown-item" href={{route('adsByCategory',$category)}}>{{
                  ($category->name)}}</a>
                </li>                    
                @endforeach
            </ul>
          </li>
          <!-- categorie -->
          
          <li class="nav-item">
            <a class="nav-link disabled" aria-disabled="true">Disabled</a>
          </li>
        </ul>
       
        <ul class="navbar-nav">
          @auth
          <div class="me-3">
            <a href="{{ route('insert') }}" class="btn btn-primary">Sell now</a>
          </div>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{Auth::user()->name}}
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li><a class="dropdown-item" href="#">Account</a></li>
              <li><a class="dropdown-item" href="#">Ads</a></li>
              <li><hr class="dropdown-divider"></li>
              <li>
                <form class="dropdown-item" action={{route('logout')}} method="post">
                  @csrf
                  <button class="btn p-0 " type="submit">Log out</button>
                </form>
              </li>
            </ul>
          </li>
          @endauth
          
          @guest
  
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-outline-primary mb-2 mb-lg-0" data-bs-toggle="modal" data-bs-target="#loginregistermodal">
            Sign up | Login
          </button>
  
          <!-- Modal -->
          <div class="modal fade" id="loginregistermodal" tabindex="-1" aria-labelledby="loginregistermodalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                  <h2 class="text-center display-6 mb-4">Join and sell pre-loved items with no fees</h2>
                  <a class="my-5 btn btn-outline-success col-12 col-md-8 col-lg-6 mx-auto" href="/auth/google"><i class="fa-brands fa-google"></i> Continue with Google</a>
                  <p>Or register with <a href={{route('register')}}>Email</a></p>
                  <p>Already have an account? <a href={{route('login')}}>Log in</a></p>
                </div>              
              </div>
            </div>
          </div>
          <button type="button" class="btn btn-primary ms-lg-3 " data-bs-toggle="modal" data-bs-target="#loginregistermodal">
            Sell now
          </button>  
          @endguest
                  
        </ul>
        
      </div>
    </div>  
    
  </nav>

  <nav class="navbar bg-body-tertiary border-bottom">
    <div class="container-lg">
      @foreach($categories as $category)
      <a class="nav-link text-extramuted category-nav" href={{route('adsByCategory',$category)}}>{{$category->name}}</a>
      @endforeach
    </div>
  </nav>

</div>
