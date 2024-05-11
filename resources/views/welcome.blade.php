@extends('layout')

@section('title', 'Home Page')


@section('content')
@include('include.news')

<style>
    hr {
    padding: 0;
    margin: 0 auto 10px; /* Center horizontally and add margin below */
    display: block; /* Ensures it behaves as a block element */
    width: 150px;
    height: 5px;
    background-color: rgb(0, 0, 0);
    border: none; /* Removes default border styling */
    box-sizing: border-box; /* Include padding and border in the element's total width and height */
}

    .product-box {
        background-color: rgb(64, 196, 249);
        border-radius: 20px;
        margin-right: 3rem;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        border: 4px solid #007BFF; /* Example border color */
        margin: 15px;
        padding: 10px;
        flex-basis: calc(33.333% - 30px); /* Adjusts the box width to fit 3 in a row */
        cursor: pointer;
        transition: transform 0.3s ease;
        /* box-shadow: 0 4px 8px rgba(255, 255, 255, 0.1); Add box shadow */
        box-shadow: 10px 5px 5px rgb(149, 193, 220);
        margin-bottom: 5rem;
    }
    
    .product-box:hover {
        transform: scale(1.05);
    }

    .product-link {
    text-decoration: none;
    color:rgb(15, 52, 67); /* Sets the link color to match the surrounding text */
    transition: color  0.3s ease, text-shadow 0.3s ease;/* Smooth color transition */
    }

    .product-link:hover {
        color: rgb(13, 80, 195); /* Change to desired hover color, example uses a blue shade */
        text-shadow: 0 0 8px rgba(13, 80, 195, 0.5); /* Adds glow effect */
    }

    .product-img img {
        border: 4px solid #ffb0b0; /* Blue color, adjust the hex code for different colors */
        width: auto; /* Keeps the original width of the image */
        height: auto; /* Keeps the original height of the image */
        max-width: 100%; /* Ensures the image is responsive and fits its container */
        display: block; /* Removes bottom space/margin commonly added below images */
        box-sizing: border-box; /* Includes the border in the element's total width and height */
    }


    
    @media (max-width: 768px) {
        .product-box {
            flex-basis: 100%; /* Stacks the boxes on smaller screens */
        }
    }
    </style>
    
<div class="home-page-container">
    <div class="home-page">
        <h1 class="hp-h1">Our Products</h1>
        <hr>
        <br>
        <br>
        <br>
        <div class="products-container" style="display: flex; flex-wrap: wrap; margin-left: 5rem;">
            @foreach($products as $product)
                <div class="product-box" style="margin: 10px; margin-bottom: 5rem; border: 1px solid #ccc; padding: 20px; flex-basis: 30%;">
                    <div class="product-img">
                        @if ($product->image)
                        <img src="{{ asset($product->image) }}" alt="{{ $product->name }}">
                        @else
                            <img src="{{ asset('images/temppic.jpeg') }}" alt="{{ $product->name }}">
                        @endif
                    </div>
                    {{-- <h3>{{ $product->name }}</h3> --}}
                    <div class="product-details" style=" margin-top: 7px;">
                        <h3> <a href="{{ route('product.show', $product->id) }}" class="product-link" style="">
                            {{$product->name}}
                        </a></h3>
                        
                        <p>Price : ৳ {{ $product->price}} </p>
                        {{-- <p>{{ $product->description }}</p> --}}
                    </div>
                   
                </div>
            @endforeach
        </div>
    </div>
    <div style="margin-top: 2rem; margin-left:2rem; padding: 4px;">
        {{ $products->links() }}
    </div>
</div>
@endsection
