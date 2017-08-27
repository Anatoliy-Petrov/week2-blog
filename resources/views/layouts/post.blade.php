@extends('layouts.layout')

@section('content')
    <div class="col-sm-10 card">
        <h2 class="blog-post-title">

            {{ $post->title }}

        </h2>
        <hr>

        <p class="blog-post-meta">
            {{ $post->created_at->toFormattedDateString() }}
            by <span class="font-weight-bold">{{ $post->user->name }}</span>
        </p>
        <p>
            {!! $post->body !!}
        </p>
        <p>
            {{ $post->image }}
        </p>
    </div>

@endsection