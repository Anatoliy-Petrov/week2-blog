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

                            {{--@can('update', $thread)
                            <form action="{{ $thread->path() }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-danger">delete thread</button>
                            </form>
                            @endcan--}}

                        </div>
                    </div>

                    <div class="panel-body">
                        <p>
                            <img src="{{ asset('/img/'.$post->image) }}" alt="{{ $post->title }}" class="post-image">
                        </p>
                        {!! $post->body !!}
                        <div>
                            {{--<form method="post" action="/post/{{$post->id}}">
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-default" {{ $reply->isFavorited() ? 'disabled' : '' }}>
                                    {{ $reply->favorites_count }} {{ str_plural('favorite', $reply->favorites_count) }}
                                </button>
                            </form>--}}
                        </div>

                    </div>
                </div>

                {{--@foreach($replies as $reply)
                    @include('threads.reply')
                @endforeach
                {{ $replies->links() }}--}}

                {{--@if(auth()->check())
                    <form method="post" action="{{$thread->path().'/replies'}}" class="form">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <textarea name="body" id="body" rows="4" class="form-control" placeholder="хотите что-то сказать?">{{ old('body') }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">опубликовать</button>
                    </form>
                @else <p class="text-center">Пожалуйста <a href="{{route('login')}}">авторизуйтесь</a> для добавления комментария.</p>
                @endif--}}
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <p>
                            Пост был опубликован {{ $post->created_at->diffForHumans() }}<br>
                            пользователем <a href="#">{{ $post->user->name }}</a><br>
                            {{--has {{ $thread->replies_count }} {{ str_plural('comment', $thread->replies_count) }}--}}
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
