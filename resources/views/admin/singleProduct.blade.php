{{-- @extends('admin.layouts.app')
@section('content')

{{-- <div class="d-grid gap-2">
    <button class="btn btn-primary" type="button" style="margin-left: 20px; margin-top:5px; width: 10rem;">Add Product</button>
  </div> --}}

{{--<section>
    <div class="product-details">
        <h1>{{ $product->name }}</h1>
        <p>Price: ${{ number_format($product->price, 2) }}</p>
        <p>Type: {{ $product->type }}</p>
        <p>Description: {{ $product->description}} </p>
    </div>
</section>
  
<section>
    <div style="display: flex; justify-content: space-evenly">
        <button class="btn btn-info" style="margin-right: 10px" type="button" onclick="location.href='{{ url('products/edit', $product->id) }}'">Update Product</button>
        <button class="btn btn-danger" type="button" onclick="event.preventDefault(); document.getElementById('delete-product-form').submit();">Delete Product</button>
    
        <form id="delete-product-form" action="{{ url('products/delete', $product->id) }}" method="POST" style="display: none;">
            @csrf
            @method('DELETE')
        </form>
    </div>
</section>
@endsection

@section('customJs')
<script>
    console.log('Dashboard Page');
</script>
@endsection --}}

{{-- Place this inside the <head> tag of your admin layout or directly in the Blade file within a <style> block --}}
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
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            margin-bottom: 20px;
            align-items: center;
        }
    
        .product-image img {
            width: 300px; /* Fixed width for images */
            height: auto; /* Maintain aspect ratio */
            margin-right: 20px; /* Space between image and text */
            border-radius: 8px; /* Optional: rounds the corners of the image */
        }
    
        .product-info h1 {
            color: #333;
        }
    
        .product-info p {
            color: #666;
            font-size: 16px;
            margin: 5px 0;
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
    
        button.btn-info {
            background-color: #17a2b8;
        }
    
        button.btn-info:hover {
            background-color: #138496;
        }
    
        button.btn-danger {
            background-color: #dc3545;
        }
    
        button.btn-danger:hover {
            background-color: #c82333;
        }
    
        /* Flexbox Layout for Buttons */
        div.flex-container {
            display: flex;
            justify-content: space-evenly;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
    </style>
    

@extends('admin.layouts.app')

@section('content')
<section>
    <div class="product-details">
        <div class="product-image">
            {{-- <img src="{{ $product->image_url }}" alt="Product Image"> --}}
            {{-- @if ($product->image)
                <img src="{{ asset($product->image) }}" alt="{{ $product->name }}">
                @else
                    <img src="{{ asset('images/temppic.jpeg') }}" alt="{{ $product->name }}">
                @endif --}}
                <img src="{{$product->image ? asset('storage/' . $product->image) : asset('/images/temppic.jpeg')}}" alt="Product_Image">
        </div>
        <div class="product-info">
            <h1>{{ $product->name }}</h1>
            <p>Price: ৳{{ number_format($product->price, 2) }}</p>
            <p>Type: {{ $product->type }}</p>
            <p>Description: {{ $product->description }}</p>
        </div>
    </div>
</section>
  
<section>
    <div class="flex-container">

        <button class="btn btn-info" type="button" onclick="location.href='{{ route('products.edit', $product->id) }}'">Update Product</button>
       
        <button class="btn btn-danger" type="button" onclick="confirmDelete()">Delete Product</button>

        <button type="button" class="btn btn-secondary" onclick="window.location='{{ route('products.all', $product->id) }}'">Back</button>

        <form id="delete-product-form" action="{{ route('products.delete', $product->id) }}" method="POST" style="display: none;">
            @csrf
            @method('DELETE')
        </form>

        <script>
            function confirmDelete() {
                if (confirm('Are you sure you want to delete this product?')) {
                    event.preventDefault();
                    document.getElementById('delete-product-form').submit();
                }
            }
        </script>

        @if(session('success'))
            <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

        
    </div>
</section>
@endsection

@section('customJs')
<script>
    console.log('Dashboard Page');
</script>
@endsection
