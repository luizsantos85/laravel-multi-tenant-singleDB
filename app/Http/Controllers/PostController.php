<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdatePostFormRequest;
use App\Models\Post;
use Illuminate\Support\Str;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $loggedUserId = auth()->user()->tenant->id;
        $posts = Post::get();

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdatePostFormRequest $request)
    {

        $data = $request->all();
        if($request->hasFile('image') && $request->file('image')->isValid()){
            $name = Str::of($request->title)->kebab();
            $ext = $request->image->extension();
            $nameImage = "{$name}.{$ext}";
            $data['image'] = $nameImage;

            $upload = $request->image->storeAs('posts', $nameImage);

            if(!$upload){
                return redirect()->back()->with('errors',['Falha no upload']);
            }
        }

        $post = $request->user()->posts()->create($data);
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);

        if (!$post) {
            return redirect()->back()->with('error', 'Post não encontrado.');
        }

        return view('posts.show', compact('post'));
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

        if(!$post){
            return redirect()->back()->with('error', 'Post não encontrado.');
        }

        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdatePostFormRequest $request, $id)
    {
        $post = Post::find($id);

        if (!$post) {
            return redirect()->back()->with('error', 'Post não encontrado.');
        }

        $post->update($request->all());
        return redirect()->route('posts.index');

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
    }
}
