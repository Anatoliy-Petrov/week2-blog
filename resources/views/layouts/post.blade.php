@extends('layouts.layout')

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
            {!! Html::image('img/'.$post->image,'title_image', array('class'=>'rounded', 'width'=>'250', 'height'=>'200')) !!}
        </p>
        <p>
            {!! $post->body !!}
        </p>
        <p>
            {{ $post->image }}
        </p>
    </div>


@endsection