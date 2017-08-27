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

    @include('layouts.nav')

    <div class="row">

        @yield('content')

    </div><!-- /.row -->

</div><!-- /.container -->
<script src="/js/dropzone.js"></script>
</body>
</html>
