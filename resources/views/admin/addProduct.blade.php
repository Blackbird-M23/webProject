<!-- resources/views/admin/addProduct.blade.php -->
<style>
    /* Form Layout */
    .product-form {
        background-color: white;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        margin-top: 20px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    label {
        font-weight: bold;
    }

    input[type="text"],
    input[type="number"],
    textarea {
        width: 100%;
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #ccc;
    }

    button.btn-primary {
        padding: 10px 20px;
        font-size: 16px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
        background-color: #007bff;
        color: white;
    }

    button.btn-primary:hover {
        background-color: #0056b3;
    }
</style>


@extends('admin.layouts.app')

@section('content')
    <div class="product-form">
        <h2>Add New Product</h2>
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="image" class="inline-block text-lg mb-2">
                    Product Image
                </label>
                <input
                type="file"
                class="border border-gray-200 rounded p-2 w-full"
                name="image"
                />
                {{-- <input type="file" class="border border-gray-200 rounded p-2 w-full" id="logo" name="logo" onchange="previewImage(event)">
                <img id="imagePreview" src="#" alt="Image Preview" style="display: none; max-width: 100%; max-height: 200px; margin-top: 10px;"> --}}
              
            </div>
            <div class="form-group">
                <label for="name">Product Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" id="price" name="price" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="type">Type:</label>
                <select id="type" name="type" required>
                    <option value="Bakery">Bakery</option>
                    <option value="Sweets">Sweets</option>
                    <option value="Snacks">Snacks</option>
                    {{-- <option value="Home & Garden">Home & Garden</option> --}}
                </select>
            </div>
            {{-- <div class="form-group">
                <label for="type">Type:</label>
                <input type="text" id="type" name="type" required>
            </div> --}}
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea id="description" name="description" rows="4" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Add Product</button>
        </form>
    </div>
@endsection

@section('customJs')
    <script>
        console.log('Add Product Page');
        // function previewImage(event) {
        //     var input = event.target;
        //     var imagePreview = document.getElementById('imagePreview');
            
        //     if (input.files && input.files[0]) {
        //         var reader = new FileReader();

        //         reader.onload = function(e) {
        //             imagePreview.src = e.target.result;
        //             imagePreview.style.display = 'block';
        //         }

        //         reader.readAsDataURL(input.files[0]); // Convert the selected file to a data URL
        //     } else {
        //         imagePreview.src = '#'; // Clear the image source
        //         imagePreview.style.display = 'none';
        //     }
        // }
    </script>
@endsection
