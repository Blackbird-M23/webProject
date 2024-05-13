{{-- <div class="top-bar">
  <div class="welcome-msg">
    <p>Sweet Tooth  | A top branded Sweet Shop</p>
  </div>
  <div class="search-bar ">
    <form class="search-form" role="search">
      <input class="form-controll" type="search" placeholder="Search" aria-label="Search">
      <button class="btn" type="submit">Search</button>
    </form>
  </div>
  
  <div class="top-nav ">
    <nav class="navbar-top">
      <ul class="navbar-nav">
        @auth
          <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}">Log-out</a>
          </li>
        @else
          <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">Log-in</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('registration') }}">Registration</a>
          </li>
        @endauth
      </ul>
      <div >
        @auth
        {{ auth()->user()->name }}
        @endauth
      </div>
    </nav>
  </div> 
</div> --}}

<div class = "top-bar">
    <div class="col-md-4 col-sm-3 left mt-2 px-4 py-2 welcome-msg"> 
      <p>Sweet Tooth  | A top branded Sweet Shop</p>
    </div>
    <form class="search-form" action="/">
      <div class="search-holder">
        <div class="">
          <i class="fa fa-search text-gray-400 z-20 hover:text-gray-500"></i>
      </div>
        <input type="text" name="search" class="search-input"
          placeholder="Search" />
        <div class="button-container">
          <button class="search-btn" type="submit">
            Search
          </button>
        </div>
      </div>
    </form>
    
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
          {{-- <nav class="product-nav">
            <ul class="nav"> --}}
              {{-- <li class="nav-item" style="color: white">
                <a class="nav-link active" style="text-decoration: none;" aria-current="page" href="{{route('home')}}">
                  <h4>Products</h4>
                </a> --}}
                <li class="nav-item-dropdown" style="color: white">
                  <a class="nav-link active" href="{{route('home')}}" id="navbarDropdown" role="button" data-toggle="dropdown" aria-current="page">
                    <h4>Products</h4>
                  </a>
                  <div class="product-dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="product-dropdown-item" href="{{route('products.bakery')}}">Bakery</a>
                    <a class="product-dropdown-item" href="{{route('products.sweets')}}">Sweets</a>
                    <a class="product-dropdown-item" href="{{route('products.snacks')}}">Snacks</a>
                  </div>
                </li>
              {{-- </li> --}}
              
            {{-- </ul>
          </nav> --}}
          
        
        
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
            <a class="nav-link active" aria-current="page" href="#contact"><h4>Contact</h4></a>
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

 
