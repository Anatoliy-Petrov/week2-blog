@extends('layouts.layout')

@section('content')

    <div class="col-sm-8 blog-main">

        @foreach($posts as $post)

            <div class="jumbotron">
                <h1 class="display-3">{{ $post->title }}</h1>
                <p class="lead">{!! $post->body !!}.</p>
                <hr class="my-4">
                <p class="lead">
                    <a class="btn btn-primary btn-lg" href="/posts/{{$post->id}}" role="button">читать</a>
                </p>
            </div>
        @endforeach

        <nav class="blog-pagination">
            <a class="btn btn-outline-primary" href="#">Older</a>
            <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
        </nav>

    </div><!-- /.blog-main -->
@endsection