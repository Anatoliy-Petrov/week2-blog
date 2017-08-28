@extends('layouts.layout')

@section('content')

    <div class="wrapper container-fluid">

        {!! Form::open(['url' => route('post.update', ['id'=>$post->id]),'class'=>'form-horizontal','method'=>'POST','enctype'=>'multipart/form-data']) !!}

        {{ method_field('PUT') }}

        {{--{{ csrf_field() }}--}}

        <div class="form-group">

            {!! Form::label('title','Заголовок',['class' => 'col-xs-2 control-label'])   !!}
            <div class="col-xs-8">
                {!! Form::text('title',$post->title,['class' => 'form-control','placeholder'=>'Введите название страницы'])!!}
            </div>

        </div>

        <div class="form-group">
            {!! Form::label('body', 'Текст:',['class'=>'col-xs-2 control-label']) !!}
            <div class="col-xs-8">
                {!! Form::textarea('body', $post->body, ['id'=>'editor','class' => 'form-control','placeholder'=>'Введите текст страницы']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('images', 'Изображение:',['class'=>'col-xs-2 control-label']) !!}
            <div class="col-xs-8">
                {!! Form::file('images', ['class' => 'filestyle','data-buttonText'=>'Выберите изображение','data-buttonName'=>"btn-primary",'data-placeholder'=>"Файла нет"]) !!}
            </div>
        </div>


        <div class="form-group">
            <div class="col-xs-offset-2 col-xs-10">
                {!! Form::button('Сохранить', ['class' => 'btn btn-primary','type'=>'submit']) !!}
            </div>
        </div>



        {!! Form::close() !!}

    </div>

            @include('layouts.error')

{{--        </form>
    </div>--}}
    <script src="/js/ckeditor/ckeditor.js"></script>
    <script src="/js/bootstrap-filestyle.min.js"></script>
    <script>
        CKEDITOR.replace('editor');
    </script>
@endsection
