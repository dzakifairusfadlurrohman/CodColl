<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use \Illuminate\Routing\Middleware\Middleware;

use Illuminate\Routing\Controller as BaseController;

class PostController extends BaseController
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $posts = Post::latest()->paginate(10);
        return view('posts.index', compact('posts'));
    }


    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required',
        ]);

        Post::create([
            'title'   => $request->title,
            'slug'    => Str::slug($request->title),
            'content' => $request->content,
        ]);

        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }


    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required',
        ]);

        $post = Post::findOrFail($id);
        $post->update([
            'title'   => $request->title,
            'slug'    => Str::slug($request->title),
            'content' => $request->content,
        ]);

        return redirect()->route('posts.index')->with('success', 'Post updated successfully.');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }
}
