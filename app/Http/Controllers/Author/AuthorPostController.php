<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostStoreRequest;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class AuthorPostController extends Controller
{


    private function checkPostOwner(Post $post)
    {
        if ($post->user_id != auth()->user()->id) {
            abort(403);
        }

    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::where('user_id', auth()->user()->id)->get();

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

        $post = Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $image,
            'user_id' => auth()->user()->id,
        ]);

        if ($request->has('tags')) {
            $post->tags()->attach($request->tags);
        }

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
        $this->checkPostOwner($post);

        $tags = Tag::all();
        return view('author.posts.edit', compact('post', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {

        $this->checkPostOwner($post);

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

        if ($request->has('tags')) {
            $post->tags()->sync($request->tags);
        }


        return to_route('author.posts.index')->with('success', 'Post updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $this->checkPostOwner($post);

        $post->tags()->detach();
        $post->delete();
        return to_route('author.posts.index')->with('warning', 'Post deleted!');
    }
}
