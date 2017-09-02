@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    @forelse($posts as $post)
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="level">
                                    <h4 class="flex">
                                        <a href="{{ '/post/'.$post->id }}">
                                            {{ $post->title }}
                                        </a>
                                    </h4>
                                </div>
                            </div>

                            <div class="panel-body">
                                <div class="body">{!! $post->body !!}</div>
                                <hr>
                                <div class="level">
                                    <span class="flex">
                                        <a href="{{ route('post.show', ['id' => $post->id]) }}" class="btn btn-primary">
                                            читать
                                        </a>
                                    <a href="{{ route('post.edit',['id' => $post->id]) }}" class="btn btn-default">
                                        редактировать
                                    </a>
                                    </span>

                                    <div>
                                        <form method="post" action="{{ route('post.destroy', ['post'=>$post->id]) }}">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger">удалить</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p>No results for now</p>
                    @endforelse

                </div>
            </div>
        </div>
    </div>
@endsection