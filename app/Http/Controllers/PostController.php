<?php

namespace App\Http\Controllers;

use App\Post;
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
        $posts = Post::latest()->get();

        return view('layouts.index', compact('posts'));
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
            'body'=>'required'
        ]);

        if($request->hasFile('images')){

            $file = $request->file('images');

            $input['images'] = $file->getClientOriginalName();

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
    public function show($id/*Post $post*/)
    {
        //
        $post = Post::find($id);


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

        //dd($post);

        return view('layouts.edit', compact('post'));
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

        $post = Post::find($id);

        ///dd($post);

        $this->validate(request(),[

            'title'=>'required',
            'body'=>'required',
            'images' => 'image'
        ]);

        if($request->hasFile('images')){

            $file = $request->file('images');
            $file->move(public_path().'/img', $file->getClientOriginalName());
            $image = $file->getClientOriginalName();
        }
        else {

            $image = $post->image;
        }
        //unset($input['old_images']);

        //$post->fill($input);
        $post->title = $input->title;
        $post->body = $input->body;
        $post->image = $image;

        if($post->update()){

            return redirect('/post')->with('status', 'страница отредактирована');
        }

        return redirect('/post')->with('status', 'упс что-то пошло не так');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Post::find($id)->delete();

        return redirect('/post')->with('status', 'Страница удалена.');
    }

}
