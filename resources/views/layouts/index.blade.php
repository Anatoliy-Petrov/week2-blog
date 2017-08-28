@extends('layouts.layout')

@section('content')

    {{--<div class="col-sm-10 blog-main">--}}
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <br>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            {!! Html::link(route('post.create'),'новый пост',['alt'=>'создание поста', 'class'=>'btn btn-primary btn-lg']) !!}
        </div>
    </div><br>

        @foreach($posts as $post)

            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h1>{{ $post->title }}</h1>
                        </div>

                        <div class="panel-body">
                            <p class="lead">{!! $post->body !!}.</p>
                            <div>

                                {!! Html::link(route('post.show',['id'=>$post->id]),'читать',['alt'=>$post->title, 'class'=>'btn btn-primary btn-lg']) !!}

                                {!! Html::link(route('post.edit',['id'=>$post->id]),'редактировать',['alt'=>$post->title, 'class'=>'btn btn-default btn-lg']) !!}
                            </div>
                            <p>
                                {!! Form::open(['url'=>route('post.destroy',['post'=>$post->id]), 'class'=>'form-horizontal','method' => 'POST']) !!}

                                {{ method_field('DELETE') }}

                                {!! Form::button('Удалить',['class'=>'btn btn-danger','type'=>'submit']) !!}

                                {!! Form::close() !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            {{--<div class="jumbotron">
                <h1 class="display-3">{{ $post->title }}</h1>
                <p class="lead">{!! $post->body !!}.</p>
                <hr class="my-4">
                <p class="lead">
                    <a class="btn btn-primary btn-lg" href="/posts/{{$post->id}}" role="button">читать</a>
                </p>
            </div>--}}
        @endforeach

    {{--</div><!-- /.blog-main -->--}}

@endsection