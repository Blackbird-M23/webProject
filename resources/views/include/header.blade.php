<div class = "top-bar w-2 d-flex flex-d-row justify-around">
    <div class="col-md-4 col-sm-3 left mt-2 px-4 py-2 welcome-msg"> 
      <p>Sweet Tooth  | A top branded Sweet Shop</p>
    </div>
    <div class="headerSearch mt-2 mr-1.5 me-5">
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
    
  <div class="topNav mt-1 ml-1.5 px-10 ">
    <nav class="navbar-top">
      <ul class="navbarTopUl">
          @auth
            <li class="nav-item">
              <a class="nav-link" href="{{route('logout')}}">Log-out   </a>
            </li>
            @else
            <li class="nav-item ml-2">
              <a class="nav-link" href="{{route('login')}}">Log-in   </a>
            </li>
            <li class="nav-item ml-2">
              <a class="nav-link" href="{{route('registration')}}">Registration   </a>
            </li>
            @endauth
          </ul>
          <div style="margin-left: 5px">
            @auth
            {{auth()->user()->name}}
            @endauth
          </div>
          
        </ul>
    </nav>
  </div> 
</div>
<div class = "bottom-bar" style="background-color: #77d8f0; height:100px">
  <div class="bottom-bar-pic">
    <img id="image" src="{{asset('images/sweet2.jpeg')}}" alt="logo" class="logo" height="80px" width="80px">
  </div>
  <div class="bottomNavDiv" style="background-color: #77d8f0">
  <nav class="navbar-bottom" style="background-color: #f59494;">
        <ul class="navbar-nav" style="background-color: #f59494;">
          <li class="nav-item" style="color: white">
            <a class="nav-link active" aria-current="page" href="{{route('home')}}"><h4>Home</h4></a>
          </li>
          <li class="nav-item" style="color: white">
            <a class="nav-link active" aria-current="page" href="{{route('home')}}"><h4>Products</h4></a>
          </li>
          <li class="nav-item" style="color: white">
            <a class="nav-link active" aria-current="page" href="{{route('home')}}"><h4>Showroom</h4></a>
          </li>
          <li class="nav-item" style="color: white">
            <a class="nav-link active" aria-current="page" href="{{route('home')}}"><h4>About Us</h4></a>
          </li>
          <li class="nav-item" style="color: white">
            <a class="nav-link active" aria-current="page" href="{{route('home')}}"><h4>Event</h4></a>
          </li>
          <li class="nav-item" style="color: white">
            <a class="nav-link active" aria-current="page" href="{{route('home')}}"><h4>Gallery</h4></a>
          </li>
          <li class="nav-item" style="color: white">
            <a class="nav-link active" aria-current="page" href="{{route('home')}}"><h4>Contact</h4></a>
          </li>
        </ul>
  </nav>
</div>
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

 
