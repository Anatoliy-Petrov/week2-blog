<form method="post" action="/post/{{$post->id}}/likes">
    {{ csrf_field() }}
    {{ method_field('delete') }}
    <button type="submit" class="btn btn-default">
        unlike
    </button>
</form>