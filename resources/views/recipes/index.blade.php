@extends('layout')

@section('title', 'Recipes')

@section('content')

<style>
.container {
    max-width: 900px;
    margin: 0 auto;
    padding: 20px;
}

h2 {
    text-align: center;
    margin-bottom: 30px;
    font-size: 2.5em;
    color: #333;
}

.alert {
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid transparent;
    border-radius: 5px;
}

.alert-success {
    color: #155724;
    background-color: #d4edda;
    border-color: #c3e6cb;
}

.btn {
    display: inline-block;
    padding: 10px 20px;
    margin-bottom: 20px;
    font-size: 1.1em;
    color: #fff;
    background-color: #007bff;
    border: none;
    border-radius: 5px;
    text-align: center;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.btn-primary {
    background-color: #007bff;
}

.btn-primary:hover {
    background-color: #0056b3;
}

.recipe-list {
    display: flex;
    text-align: center;
    flex-direction: column;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: center;
}

.recipe-item {
    background-color: #f8f9fa;
    border: 1px solid #ddd;
    border-radius: 10px;
    padding: 15px;
    width: 90%
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.recipe-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
}

.recipe-item img {
    max-width: 30%;
    height: auto;
    border-radius: 10px;
    margin-bottom: 10px;
}

.recipe-item h3 {
    font-size: 1.5em;
    margin: 10px 0;
    color: #333;
}

.recipe-item p {
    font-size: 1em;
    color: #666;
}

</style>
<div class="container">
    <h2>Recipes</h2>
    @if(Session::has('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif
    <a href="{{ route('recipes.create') }}" class="btn btn-primary">Share Your Recipe</a>
    <div class="recipe-list">
        @foreach($recipes as $recipe)
        <div class="recipe-item">
            <div class="product-img">
                <img src="{{ $recipe->image ? asset('recipes_pic/' . $recipe->image) : asset('images/temppic.jpeg') }}" alt="Product Image">
            </div>
            <h3>{{ $recipe->title }}</h3>
            By : {{ $recipe->user_name }}
            <p>{{ $recipe->description }}</p>
        </div>
        @endforeach
    </div>
</div>
@endsection
