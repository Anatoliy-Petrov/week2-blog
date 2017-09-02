<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
        if($posts = Post::latest()->get()){

            return view('layouts.index', compact('posts'));
        };

        return redirect('/')->with('status', 'Постов пока нет.');


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('layouts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request  $request)
    {

        $this->validate(request(),[

            'title'=>'required',
            'body'=>'required',
            'images' => 'image'
        ]);

        if($request->hasFile('images')){

            $file = $request->file('images');

            $input['images'] = rand(0, 100).date("Ymdhis").$file->getClientOriginalName();

            $file->move(public_path().'/img', $input['images']);
        }

        $post = new Post;

        if(
        $post->create([

            'title'=>request('title'),
            'body' => request('body'),
            'user_id' => auth()->id(),
            'image' => isset($input['images']) ? $input['images'] : ''
        ])
        ){
            return redirect('/post')->with('status', 'Страница создана');
        }
        return redirect('/post')->with('status', 'упс что-то пошло не так');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('layouts.post', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        if($post->likes->count() == 0){
            return back()->with('status', 'лайкайте быстрее, будете первым');
        }

        if($post->canEdit() == auth()->id()){

            return view('layouts.edit', compact('post'));
        }

        return back()->with('status', 'Упс... кто-то лайкнул раньше вас(');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request;

        if(!$post = Post::find($id)){
            return redirect('/post')->with('status', 'такого поста нет.');
        }

        $this->validate(request(),[

            'title'=>'required',
            'body'=>'required',
            'images' => 'image'
        ]);

        if($request->hasFile('images')){

            $file = $request->file('images');
            $newImage = rand(0, 100).date("Ymdhis").$file->getClientOriginalName();
            $file->move(public_path().'/img', $newImage);
            $image = $newImage;
        }
        else {

            $image = $post->image;
        }

        $post->title = $input->title;
        $post->body = $input->body;
        $post->image = $image;

        if($post->update()){

            return redirect('/post')->with('status', 'страница отредактирована');
        }
        return redirect('/post')->with('status', 'упс что-то пошло не так');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        if($post->user_id == auth()->id()){

            $post->delete();
            return redirect('/post')->with('status', 'Страница удалена.');
        }
        return redirect('/post')->with('status', 'Это не вы писали!! что вы делаете?.');
    }
}
