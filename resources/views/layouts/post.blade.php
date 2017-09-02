{{--@extends('layouts.layout')

@section('content')

    <div class="">
        <h2 >
            {{ $post->title }}
        </h2>
        <hr>
        <div>
            <p class="">
                {{ $post->created_at->toFormattedDateString() }}
                by <span class="font-weight-bold">{{ $post->user->name }}</span>
            </p>
        </div>

        <p>
            <img src="{{ asset('/img/'.$post->image) }}" alt="{{ $post->title }}" class="post-image">
        </p>
        <p>
            {!! $post->body !!}
        </p>
        --}}{{--<p>
            {{ $post->image }}
        </p>--}}{{--
    </div>


@endsection--}}

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="level">
                            <span class="flex">
                                <h2>{{ $post->title }}</h2>
                            </span>
                        </div>
                    </div>
                    <div class="panel-body">
                        <p>
                            <img src="{{ asset('/img/'.$post->image) }}" alt="{{ $post->title }}" class="post-image">
                        </p>
                        {!! $post->body !!}
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <p>
                            Пост был опубликован {{ $post->created_at->diffForHumans() }}<br>
                            пользователем <a href="#">{{ $post->user->name }}</a><br>
                        </p>

                        @if(Auth::check())
                            @if(!$post->isLiked())
                                @include('layouts.like')
                            @else @include('layouts.unlike')
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
