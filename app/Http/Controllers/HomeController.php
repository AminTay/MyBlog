<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function showPost(Post $post)
    {
        $post->update([
                'views' => ((int)$post->views + 1)]
        );


        return view('showPost', compact('post'));
    }

    public function showTag(Tag $tag)
    {

        $posts = Post::whereHas('tags', function ($query) use ($tag) {
            $query->where('id', $tag->id);
        })->get();
        return view('showTag', compact('posts', 'tag'));
    }

    public function search(Request $request)
    {

        $keyword = $request->search;

        $posts = Post::whereHas('tags', function ($query) use ($keyword) {
            $query->where('title', 'like', '%' . $keyword . '%');
        })->orwhere(function ($query) use ($keyword) {
            $query->where('title', 'like', '%' . $keyword . '%')
                ->orWhere('description', 'like', '%' . $keyword . '%');
        })
            ->get();

        return view('search', compact('posts', 'keyword'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
