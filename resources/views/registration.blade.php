@extends('layout')
@section('title', 'registration')
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
        <form action="{{route('registration.post')}}" method="POST" class ="ms-auto me-auto mt-3" style="width:500px; margin-bottom : 5rem">
            @csrf
            <div class="mb-3">
              <label class="form-label">Name</label>
              <input style="background-color: aliceblue" type="text" class="form-control" name = "name">
            </div>
            
            <div class="mb-3">
              <label class="form-label">Email address</label>
              <input style="background-color: aliceblue" type="email" class="form-control" name = "email">
              {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
              {{-- @error('email')
              <p class="text-red-500 text-xs mt-1">{{message}}</p>
              @enderror --}}
            </div>

            <div class="mb-3">
              <label class="form-label">Password</label>
              <input style="background-color: aliceblue" type="password" class="form-control" name="password">
            </div>
            {{-- @error('password')
              <p class="text-red-500 text-xs mt-1">{{message}}</p>
              @enderror --}}
            <div class="mb-3">
              <label class="form-label">Confirm Password</label>
              <input style="background-color: aliceblue" type="password" class="form-control" name="password_confirmation">
            </div>
            {{-- @error('password_confitmation')
              <p class="text-red-500 text-xs mt-1">{{message}}</p>
              @enderror --}}
            {{-- <div class="mb-3 form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div> --}}
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
@endsection