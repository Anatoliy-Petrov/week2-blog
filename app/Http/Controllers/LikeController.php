<?php

namespace App\Http\Controllers;

use App\Post;
use App\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Post $post)
    {
        $post->like();
        return back();

    }
    public function destroy(Post $post)
    {
        $post->unLike();
        return back();
    }
}
