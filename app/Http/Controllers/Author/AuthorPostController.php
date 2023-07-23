<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostStoreRequest;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class AuthorPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();

        return view('author.posts.index', compact('posts',));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tags = Tag::all();
        return view('author.posts.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostStoreRequest $request)
    {
        $image = substr($request->file('image')->store('public/posts'), 7);

        Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $image
        ]);

        return to_route('author.posts.index')->with('success', 'Post created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('author.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostStoreRequest $request, Post $post)
    {

//        dd($request);
        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);

        $image = $post->image;
        if ($request->hasFile('image')) {
            $image = substr($request->file('image')->store('public/posts'), 7);
        }

        $post->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $image,
        ]);

        return to_route('author.posts.index')->with('success', 'Post updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return to_route('author.posts.index')->with('warning', 'Post deleted!');
    }
}
