<div class = "top-bar d-flex flex-d-row justify-around">
  <div class="col-md-4 col-sm-3 left px-4 py-2 welcome-msg"> 
    <p>Sweet Tooth  | A top branded Sweet shop</p>
  </div>
  <form class="d-flex col-md-3 col-sm-3 ml-4 mt-2" role="search">
    <input class="form-control me-2 " type="search" placeholder="Search" aria-label="Search">
    <button type="button" class="btn btn-outline-warning">Search</button>
  </form>
  <div class="px-10 mt-1">
    <nav class="navbar navbar-expand-lg bg-body-tertiary ml-10">
      <ul class="navbar-nav">
          @auth
            <li class="nav-item">
              <a class="nav-link" href="{{route('logout')}}">Log-out</a>
            </li>
            @else
            <li class="nav-item">
              <a class="nav-link" href="{{route('login')}}">Log-in</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('registration')}}">Registration</a>
            </li>
            @endauth
          </ul>
          @auth
          {{auth()->user()->name}}
          @endauth
        </ul>
    </nav>
  </div>
</div>
<div class = "bottom-bar">
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('home')}}">Home</a>
          </li>
          @auth
          <li class="nav-item">
            <a class="nav-link" href="{{route('logout')}}">Log-out</a>
          </li>
          @else
          <li class="nav-item">
            <a class="nav-link" href="{{route('login')}}">Log-in</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('registration')}}">Registration</a>
          </li>
          @endauth
        </ul>
        @auth
        {{auth()->user()->name}}
        @endauth
      </div>
    </div>
  </nav>
</div>

  {{-- <nav class="position-fixed navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">{{config('app, name')}}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('home')}}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Features</a>
          </li>
          @auth
          <li class="nav-item">
            <a class="nav-link" href="{{route('logout')}}">Log-out</a>
          </li>
          @else
          <li class="nav-item">
            <a class="nav-link" href="{{route('login')}}">Log-in</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('registration')}}">Registration</a>
          </li>
          @endauth
        </ul>
        @auth
        {{auth()->user()->name}}
        @endauth
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav> --}}

 
