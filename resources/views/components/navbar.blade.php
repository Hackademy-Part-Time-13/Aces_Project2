<nav class="navbar navbar-expand-lg bg-body-tertiary">
  
  <div class="container">
    <a class="navbar-brand" href={{route('home')}}>{{config('app.name')}}</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link @if(Route::currentRouteName() == 'home') active @endif" href={{route('home')}}>Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link disabled" aria-disabled="true">Disabled</a>
        </li>
      </ul>
     
      <ul class="navbar-nav">
        @auth
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
        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#loginregistermodal">
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
                <p>Register with <a href={{route('register')}}>Email</a></p>
                <p>Already have an account? <a href={{route('login')}}>Log in</a></p>
              </div>              
            </div>
          </div>
        </div>
        
        @endguest            
      </ul>
      
    </div>
  </div>
</nav>