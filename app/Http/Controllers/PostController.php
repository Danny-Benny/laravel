<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Post::all();
        foreach ($data as $post) {
            $post->author = User::find($post->author)->name;
        }
        return view('dashboard', [
            'posts' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->author = Auth::user()->id;
        $post->time = now();
        $post->save();
        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $post->author_id = $post->author;
        $post->author = User::find($post->author)->name;
        return view('post.view', [
            'post' => $post,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('post.edit', [
            'post' => $post,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        if ($post->author == Auth::user()->id) {
            $post->title = $request->title;
            $post->content = $request->content;
            $post->save();
        } else
            abort(403);
        return redirect()->route('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if ($post->author == Auth::user()->id)
            $post->delete();
        else
            abort(403);
        return redirect()->route('dashboard');
    }
}
