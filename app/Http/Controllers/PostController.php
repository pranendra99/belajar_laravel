<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('blog', [
            "title" => "Posts",
            // "posts" => Post::all(),
            "posts" => Post::with([
                'category',
                'author',
            ])->latest()->get(),
        ]);
    }

    public function show(Post $post)
    {
        return view('post', [
            "title" => $post->title,
            "posts" => $post,
        ]);
    }
}
