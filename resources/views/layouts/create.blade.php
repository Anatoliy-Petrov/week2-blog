@extends('layouts.layout')

@section('content')

    <div class="col-sm-8 blog-main">

        <h1>Create post</h1>

        <hr>

        <form method="post" action="/posts" enctype="multipart/form-data">

            {{ csrf_field() }}

            <div class="form-group">
                <label for="title">title</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>

            <div class="form-group">
                <label for="body">body</label>
                <textarea name="body" id="body" class="form-control"></textarea>
            </div>

            {{--<div class="form-group">
                <input type="file" multiple name="file[]">
            </div>--}}

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Publish</button>
            </div>


            @include('layouts.error')

        </form>
    </div>
    {{--<script src="{{ URL::to('js/tinymce/js/tinymce/tinymce.min.js') }}"></script>--}}
    <script src="/js/tinymce/js/tinymce/tinymce.min.js"></script>
    <script>
        var editor_config = {

            path_absolute:"{{ URL::to('/') }}",
            selector: "textarea",
            plugins: [
                    "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                    "searchreplace wordcount visualblocks visualchars code fullscreen",
                    "insertdatetime media nonbreaking save table contextmenu directionality",
                    "emoticons template paste textcolor colorpicker textpattern"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
            relative_url: false,
            file_browser_callback: function(field_name, url, type, win){

                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                var y = window.innerHeight || document.documentElement.clientHeight || document.getElementsByTagName('body')[0].clientHeight;

                var cmsUrl = editor_config.path_absolute + '/laravel-filemanager?field_name=' +field_name;
                if (type = 'image'){

                    cmsUrl = cmsUrl +"&type=Images";
                }else {
                    cmsUrl = cmsUrl +"&type=Files";
                }

                tinyMCE.activeEditor.windowManager.open({

                    file: cmsUrl,
                    title: 'Filemanager',
                    width: x*0.8,
                    height: y*0.8,
                    resizable: "yes",
                    close_previous: "no"

                });
            }
        };
        tinymce.init(editor_config);
    </script>
@endsection
