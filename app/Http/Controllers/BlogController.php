<?php

/// app/Http/Controllers/BlogController.php
namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('blog.index', compact('posts'));
    }

    public function create()
    {
        return view('blog.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('blog.index')->with('success', 'Post created successfully.');
    }

    public function show(Post $post)
    {
        $comments = $post->comments()->get();
        return view('blog.show', compact('post', 'comments'));
    }

    public function edit(Post $post)
    {
        return view('blog.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        $post->update($request->only('title', 'content'));

        return redirect()->route('blog.index')->with('success', 'Post updated successfully.');
    }

    public function comment(Request $request, Post $post)
    {
        $request->validate([
            'content' => 'required',
        ]);

        Comment::create([
            'content' => $request->content,
            'user_id' => Auth::id(),
            'post_id' => $post->id,
        ]);

        return back()->with('success', 'Comment added successfully.');
    }
}

