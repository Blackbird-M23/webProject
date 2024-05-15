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
        margin-top: 2rem;
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
        <h2>Add New News</h2>
        <form action="{{ route('news.store') }}" method="POST" >
            @csrf
            <div class="form-group">
                <label for="ID">ID :</label>
                <input type="text" id="id" name="id" required>
            </div>
            <div class="form-group">
                <label for="Content">Content :</label>
                <input type="text" id="content" name="content" required>
            <button type="submit" class="btn btn-primary">Add News</button>
        </form>
    </div>
@endsection

@section('customJs')
    <script>
        console.log('Add Product Page');
    </script>
@endsection
