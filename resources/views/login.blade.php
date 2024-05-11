@extends('layout')
@section('title', 'login')
@section('content')
    <div class = "container">

        <div class="mt-5">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
            @endif

                @if(session()->has('error'))
                <div class="alert alert-danger">
                    {{session()->get('error')}}
                @endif

                @if(session()->has('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                @endif
        </div>
        <form action="{{route('login.post')}}" method="POST" class ="ms-auto me-auto mt-3" style="width:500px; margin-bottom : 5rem">
            @csrf
            <div class="mb-3">
              <label class="form-label">Email address</label>
              <input style="background-color: aliceblue" type="email" class="form-control" name = "email">
              <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
              <label class="form-label">Password</label>
              <input style="background-color: aliceblue" type="password" class="form-control" name="password">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection