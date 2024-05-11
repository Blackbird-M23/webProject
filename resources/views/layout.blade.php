<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'custom auth laravel')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="{{asset('css/header.css')}}">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/news.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/footer.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/homePage.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/singleProduct.css')}}">
    <link rel="stylesheet" href="{{asset('java.js')}}">
  </head>
  <body>
    @include('include.header')
    @yield('content')
    @include('include.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" ></script>
  </body>
</html>