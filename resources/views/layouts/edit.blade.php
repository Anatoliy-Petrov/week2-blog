@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3>редактирование поста</h3></div>
                    <div class="panel-body">
                        <form action="{{ route('post.update', ['id'=>$post->id]) }}" enctype="multipart/form-data" method="post">
                            {{ method_field('PUT') }}
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="title">Заголовок поста: </label>
                                <input type="text" id="title" class="form-control" name="title" value="{{ $post->title }}" required placeholder="Введите название страницы">
                            </div>
                            <div class="form-group">
                                <label for="body">текст поста: </label>
                                <textarea name="body" id="editor" class="form-control" placeholder="введите описание" required>{{ $post->body }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="images">выберите изображение</label>
                                <input type="file" class="filestyle" name="images">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">сохранить</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.error')

    <script src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('js/bootstrap-filestyle.min.js') }}"></script>

    <script>
        CKEDITOR.replace('editor');
    </script>
@endsection