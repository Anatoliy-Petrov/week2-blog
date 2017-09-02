<form method="post" action="/post/{{$post->id}}/likes">
    {{ csrf_field() }}
    <button type="submit" class="btn btn-primary" {{ $post->isLiked() ? 'disabled' : '' }}>
        like
    </button>
</form>