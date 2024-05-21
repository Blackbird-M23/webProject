@extends('layout')

@section('title', 'Product Details')
@section('content')

{{-- <form class="search-form" action="/">
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
  </form> --}}
    <div class="single-product-container">
        <div class="single-product-details">
            <div class="product-image">
                {{-- <img src="{{ $product->image_url }}" alt="Product Image"> --}}
                @if ($product->image)
                    <img src="{{ asset($product->image) }}" alt="{{ $product->name }}">
                    @else
                        <img src="{{ asset('images/temppic.jpeg') }}" alt="{{ $product->name }}">
                    @endif
            </div>
            <div class="product-info">
                <h1>{{ $product->name }}</h1>
                <h4 style="color: orange">Price: ৳{{ number_format($product->price, 2) }}</h4>
                <p><strong>Type: </strong> {{ $product->type }}</p>
                <p><strong>Description:</strong> {{ $product->description }}</p>
                
                <form action="{{route('addToCart')}}" method="POST">
                  @csrf
                  <div class="quantity-input">
                    <div class="quantity">
                        <input type="number" step="1" min="1" max="5" name="quantity" value="1" title="Qty" class="input-text qty text" size="4" pattern="[0-9]*" inputmode="numeric">
                    </div>
                    <input type="hidden" name="id" value="{{$product->id}}">
                    <button type="submit" name="addToCart" class="add-to-cart-btn">Add to Cart</button>
                  </div>
                </form>
                
                
            </div>
        </div>
    </div>
@endsection

