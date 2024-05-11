@extends('layout')

@section('title', 'Product Details')
@section('content')
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
                <div class="quantity-input">
                    <div class="quantity">
                        <input type="number" step="1" min="1" max="" name="quantity" value="1" title="Qty" class="input-text qty text" size="4" pattern="[0-9]*" inputmode="numeric">
                    </div>
                    <button class="add-to-cart-btn">Add to Cart</button>
                </div>
                
            </div>
        </div>
    </div>
@endsection
