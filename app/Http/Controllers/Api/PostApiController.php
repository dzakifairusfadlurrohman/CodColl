<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostApiController extends Controller
{
    public function index(Request $request)
    {
        $query = Post::select('title', 'slug', 'created_at')->latest();

        if ($request->has('search') && $request->search !== null) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        $posts = $query->paginate(10);

        return response()->json($posts);
    }


    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();

        return response()->json([
            'title' => $post->title,
            'slug' => $post->slug,
            'content' => $post->content,
            'created_at' => $post->created_at,
        ]);
    }
}
