@extends('layout')

@section('title', 'Create Recipe')

@section('content')
<style>
    /* public/css/custom.css */

/* General container styling */
.container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
}

/* Form styling */
.form-group {
    margin-bottom: 15px;
}

.form-group label {
    display: block;
    margin-bottom: 5px;
}

.form-control {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

/* Button styling */
.btn {
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.btn-primary {
    background-color: #007bff;
    color: white;
}

.btn-primary:hover {
    background-color: #0056b3;
}

/* Recipe list styling */
.recipe-list {
    margin-top: 20px;
}

.recipe-item {
    border: 1px solid #ddd;
    padding: 15px;
    border-radius: 5px;
    margin-bottom: 15px;
}

.recipe-item h3 {
    margin-top: 0;
}

.recipe-item img {
    max-width: 100%;
    height: auto;
    display: block;
    margin: 10px 0;
}

</style>
<div class="container">
    <h2>Create Recipe</h2>
    <form action="{{ route('recipes.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="description" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="image">Image:</label>
            <input type="file" name="image" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
