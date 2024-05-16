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
        /* General Layout Adjustments */
        body, html {
            font-family: 'Arial', sans-serif;
            padding: 20px;
            background-color: #f4f4f4;
        }

        /* Product Details Styling */
        .product-details {
            display: flex;
            background-color: white;
            padding: 10px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            margin-bottom: 20px;
            align-items: center;
        }
        
        .product-image{
            width: 200px;
            margin-left: 5rem;
        }
        .product-image img {
            width: 100px; /* Reduced width for images */
            height: auto; /* Maintain aspect ratio */
            margin-right: 20px; /* Space between image and text */
            border-radius: 8px; /* Optional: rounds the corners of the image */
        }

        .product-info {
            flex: 1; /* Allow text content to expand */
            margin-left: 15rem;
        }

        .product-info h2 {
            color: #333;
            font-size: 18px;
            margin-bottom: 5px;
        }

        .product-info p {
            color: #666;
            font-size: 14px;
            margin: 2px 0;
        }

        /* Button Styling */
        button.btn {
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button.btn-primary {
            background-color: #007bff;
            color: white;
        }

        button.btn-primary:hover {
            background-color: #0056b3;
        }
    </style>

    <div class="d-grid gap-2">
        {{-- <button class="btn btn-primary" type="button" style="margin-left: 20px; margin-top: 5px; margin-bottom: 15px; width: 10rem;">Add Product</button> --}}
        <a href="{{ route('products.create') }}" class="btn btn-primary" style="margin-left: 20px; margin-top: 5px; margin-bottom: 15px; width: 10rem;">Add Product</a>
    </div>

    @foreach ($products as $product)
        <div class="product-details">
            <div class="product-image">
                <img src="{{$product->image ? asset('storage/' . $product->image) : asset('/images/temppic.jpeg')}}" alt="Product_Image">
                {{-- @if ($product->image)
                <img src="{{'storage/app/public/' . $product->image }}" alt="{{ $product->name }}">
                <p>{{ asset('storage/app/public/' . $product->image) }}</p> <!-- Debug: Check constructed URL -->
                @else
                    <img src="{{ asset('images/temppic.jpeg') }}" alt="{{ $product->name }}">
                @endif --}}
            </div>
            {{-- <div class="product-image">
                @if ($product->image)
                <img src="{{ asset('storage/app/public/' . $product->image) }}" alt="Product_Image">
                @else
                    <img src="{{ asset('images/temppic.jpeg') }}" alt="{{ $product->name }}">
                @endif
            </div> --}}
            
            <div class="product-info">
                <h2><a href="{{ route('products.show', $product->id) }}">{{ $product->name }}</a></h2>
                <p>Price: ৳{{ number_format($product->price, 2) }}</p>
                <p>Type: {{ $product->type }}</p>
            </div>
        </div>
    @endforeach
    <div style="margin-top: 2rem; margin-left:2rem; padding: 4px;">
        {{ $products->links() }}
    </div>
@endsection

@section('customJs')
    <script>
        console.log('Dashboard Page');
    </script>
@endsection
