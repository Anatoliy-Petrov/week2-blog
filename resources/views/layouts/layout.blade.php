<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>My laravel blog</title>

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.1.1/basic.css" rel="stylesheet">
    <link href="/css/bootstrap-grid.min.css" rel="stylesheet">
    <link href="/css/app.css" rel="stylesheet">


    <!-- Custom styles for this template -->
    <link href="/css/blog.css" rel="stylesheet">
</head>

<body>

<div class="container">

    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
            <div class="top-right links">
                @if (Auth::check())
                    <a href="{{ url('/home') }}" class="btn btn-primary btn-sm">Home</a>
                @else
                    <a href="{{ url('/login') }}" class="btn btn-primary btn-sm">Login</a>
                    <a href="{{ url('/register') }}" class="btn btn-primary btn-sm">Register</a>
                @endif
            </div>
        @endif
    </div>

    {{--@include('layouts.nav')--}}

    @yield('content')

</div><!-- /.container -->
<script src="/js/ckeditor/ckeditor.js"></script>
<script src="/js/bootstrap-filestyle.min.js"></script>
</body>
</html>
