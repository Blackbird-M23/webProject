{{-- @extends('admin.layouts.app')
@section('content')

<div class="d-grid gap-2">
    <button class="btn btn-primary" type="button" style="margin-left: 20px; margin-top:5px; width: 10rem;">Add Product</button>
</div>

@foreach ($products as $product)
  <h2>
    <a href="{{ route('products.show', $product->id) }}">{{ $product->name }}</a>
  </h2>
  <p>Price: ${{ number_format($product->price, 2) }}</p>
  <p>Type: {{ $product->type }}</p>
@endforeach



                @endsection
                @section('customJs')
                <script>
                    console.log('Dashboard Page');
                </script>
                @endsection --}}

                {{-- <style>
                  /* Layout and background */
                  body, html {
                      font-family: 'Arial', sans-serif;
                      background-color: #f4f4f4;
                      padding: 20px;
                  }
              
                  /* Styling the grid container */
                  .d-grid {
                      margin-bottom: 20px;
                  }
              
                  /* Product list styling */
                  .product-list {
                      display: grid;
                      grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
                      gap: 20px;
                      padding: 0;
                  }
              
                  /* Product item styling */
                  .product-item {
                      background: white;
                      border: 1px solid #ddd;
                      padding: 15px;
                      border-radius: 8px;
                      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
                  }
              
                  .product-image img {
                      width: 300px; /* Fixed width for images */
                      height: auto; /* Maintain aspect ratio */
                      margin-right: 20px; /* Space between image and text */
                      border-radius: 8px; /* Optional: rounds the corners of the image */
                  }

              
                  .product-details h2 {
                      margin-top: 0;
                      color: #333;
                  }
              
                  .product-details h2 a {
                      color: #007bff;
                      text-decoration: none;
                  }
              
                  .product-details h2 a:hover {
                      text-decoration: underline;
                  }
              
                  .product-details p {
                      color: #666;
                      font-size: 16px;
                  }
              
                  button.btn-primary {
                      font-size: 16px;
                      padding: 10px 20px;
                      border-radius: 5px;
                      background-color: #007bff;
                      color: white;
                      border: none;
                      cursor: pointer;
                  }
              
                  button.btn-primary:hover {
                      background-color: #0056b3;
                  }
              </style>
              

                @extends('admin.layouts.app')

                @section('content')
                
                <div class="d-grid gap-2">
                    <button class="btn btn-primary" type="button" style="margin-left: 20px; margin-top:5px; width: 10rem;">Add Product</button>
                </div>
                
                <div class="product-list">
                    @foreach ($products as $product)
                        <div class="product-item">
                            <img src="{{asset('images/temppic.jpeg')}}" alt="Image of {{ $product->name }}" class="product-image">
                            <div class="product-details">
                                <h2><a href="{{ route('products.show', $product->id) }}">{{ $product->name }}</a></h2>
                                <p>Price: ${{ number_format($product->price, 2) }}</p>
                                <p>Type: {{ $product->type }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
                
                @endsection
                
                @section('customJs')
                <script>
                    console.log('Dashboard Page');
                </script>
                @endsection
                 --}}

@extends('admin.layouts.app')

@section('content')
    <style>
       /* General styles */
body {
    font-family: 'Arial', sans-serif;
    background-color: #f5f5f5;
    color: #333;
    margin: 0;
    padding: 0;
}

/* Button styles */
.btn-primary {
    background-color: #007bff;
    border: none;
    color: white;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.btn-primary:hover {
    background-color: #0056b3;
}

/* News details styles */
.news-details {
    background-color: white;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    margin: 20px;
    padding: 20px;
}

.news-info h2 {
    font-size: 1.5rem;
    margin: 0 0 10px 0;
}

.news-info a {
    text-decoration: none;
    color: #007bff;
    transition: color 0.3s ease;
}

.news-info a:hover {
    color: #0056b3;
}

/* Pagination styles */
.pagination {
    display: flex;
    justify-content: center;
    margin-top: 20px;
}

.pagination a {
    color: #007bff;
    padding: 8px 16px;
    text-decoration: none;
    transition: background-color 0.3s ease;
    border: 1px solid #ddd;
    margin: 0 4px;
    border-radius: 5px;
}

.pagination a:hover {
    background-color: #007bff;
    color: white;
}

.pagination .active a {
    background-color: #007bff;
    color: white;
    border: 1px solid #007bff;
}

    </style>

    <div class="d-grid gap-2">
        {{-- <button class="btn btn-primary" type="button" style="margin-left: 20px; margin-top: 5px; margin-bottom: 15px; width: 10rem;">Add Product</button> --}}
        <a href="{{ route('news.create') }}" class="btn btn-primary" style="margin-left: 20px; margin-top: 5px; margin-bottom: 15px; width: 10rem;">Add News</a>
    </div>

    @foreach ($news as $new)
        <div class="news-details">
            <div class="news-info">
                <span>ID = {{$new->id}} </span>
                <h2><a href="{{ route('news.show', $new->id) }}">{{ $new->content }}</a></h2>
            </div>
        </div>
    @endforeach
    <div style="margin-top: 2rem; margin-left:2rem; padding: 4px;">
        {{ $news ->links() }}
    </div>
@endsection

@section('customJs')
    <script>
        console.log('Dashboard Page');
    </script>
@endsection
