<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdatePostFormRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;
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

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $data['image'] = $this->createOrUpdateImage($data['image']);
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

        if (!$post) {
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
        $data = $request->all();

        if (!$post) {
            return redirect()->back()->with('error', 'Post não encontrado.');
        }

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $data['image'] = $this->createOrUpdateImage($data['image'], $post);
        }

        $post->update($data);
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
        $post = Post::find($id);

        if (!$post) {
            return redirect()->back()->with('error', 'Post não encontrado.');
        }

        if (isset($post) && $post->image) {
            if (Storage::exists("posts/{$post->image}")) {
                Storage::delete("posts/{$post->image}");
            }
        }

        $post->delete();
        return redirect()->route('posts.index');
    }

    public function createOrUpdateImage($image, $post = null)
    {
        //remove imagem se existir
        if (isset($post) && $post->image) {
            if (Storage::exists("posts/{$post->image}")) {
                Storage::delete("posts/{$post->image}");
            }
        }

        // $name = Str::of($image->title)->kebab();
        $name = md5(time() . rand(0, 9999));
        $ext = $image->extension();
        $nameImage = "{$name}.{$ext}";
        // $data['image'] = $nameImage;

        $upload = $image->storeAs('posts', $nameImage);

        if (!$upload) {
            return redirect()->back()->with('errors', ['Falha no upload']);
        }

        return $nameImage;
    }
}
