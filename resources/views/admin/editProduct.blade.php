

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

    .form-container {
        margin: 20px;
        padding: 20px;
        background: #f8f9fa;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    label {
        display: block;
        margin-bottom: 5px;
        color: #333;
    }
    input[type="text"], input[type="number"], textarea {
        width: 100%;
        padding: 8px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }
    button {
        padding: 10px 20px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
    button:hover {
        background-color: #0056b3;
    }
    .border {
    border: 1px solid #e5e7eb; /* Border color */
    }

    .border-gray-200 {
        border-color: #e5e7eb; /* Border color */
    }

    .rounded {
        border-radius: 0.375rem; /* Border radius */
    }

    .p-2 {
        padding: 0.5rem; /* Padding */
    }

    .w-full {
        width: 100%; /* Full width */
    }
    .image-preview {
        margin-bottom: 20px; /* Space below the image preview */
    }

    .image-preview img {
        width: 50%; /* Full width of its container */
        max-width: 150px; /* Maximum width to control image size */
        border-radius: 8px; /* Rounded corners */
    }
    
    .button{
        margin-top: 2rem;
    }
    .checkbox-group{
        width: 20%;
        display: flex;
        justify-content: space-evenly;
    }

</style>


<div class="form-container">
    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="image-preview">
            <img src="{{ $product->image ? asset('products/' . $product->image) : asset('images/temppic.jpeg') }}" alt="Product Image">
        </div>

        <!-- Checkbox to remove the image -->
        <div class="checkbox-group" >
            <input type="checkbox" id="remove_image" name="remove_image" class="mb-2">
            <label for="remove_image" class="inline-block text-lg">
                Remove Image
            </label>
        </div>

        <!-- File input to select a new image -->
        <div>
            <label for="image" class="inline-block text-lg mb-2">Select New Image</label>
            <input type="file" id="image" name="image" class="border border-gray-200 rounded p-2 w-full" accept="image/*">
        </div>

        {{-- <label for="logo" class="inline-block text-lg mb-2">
            Image
        </label>
        <input
            type="file"
            class="border border-gray-200 rounded p-2 w-full"
            name="image"
            value="{{$product->image}}"
        /> --}}
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{ $product->name }}" required>

        <label for="price">Price:</label>
        <input type="number" id="price" name="price" value="{{ $product->price }}" required>

        {{-- <label for="type">Type:</label>
        <input type="text" id="type" name="type" value="{{ $product->type }}" required>
        <div class="form-group">
            <label for="type">Type:</label>
            <select id="type" name="type" required>
                <option value="Bakery">Bakery</option>
                <option value="Sweets">Sweets</option>
                <option value="Snacks">Snacks</option>
                {{-- <option value="Home & Garden">Home & Garden</option> 
            </select>
        </div> --}}
        <div class="form-group">
            <label for="type">Type:</label>
            <select id="type" name="type" required>
                <option value="Bakery" {{ $product->type == 'Bakery' ? 'selected' : '' }}>Bakery</option>
                <option value="Sweets" {{ $product->type == 'Sweets' ? 'selected' : '' }}>Sweets</option>
                <option value="Snacks" {{ $product->type == 'Snacks' ? 'selected' : '' }}>Snacks</option>
                <!-- The Home & Garden option is commented out as indicated -->
                {{-- <option value="Home & Garden" {{ $product->type == 'Home & Garden' ? 'selected' : '' }}>Home & Garden</option> --}}
            </select>
        </div>
        

        <label for="description">Description:</label>
        <textarea id="description" name="description" required>{{ $product->description }}</textarea>

        <button type="submit" class="btn btn-info">Update Product</button>
        <button type="button" class="btn btn-secondary" onclick="window.location='{{ route('products.show', $product->id) }}'">Back</button>
        {{-- <button class="btn btn-info" type="button" onclick="location.href='{{ route('products.update', $product->id) }}'">Update</button> --}}
    </form>
</div>
@endsection

@section('customJs')
<script>
    console.log('Dashboard Page');
</script>
@endsection
