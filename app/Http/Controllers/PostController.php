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
<<<<<<< HEAD
            "posts" => Post::with([
                'category',
                'author',
            ])->latest()->get(),
=======
            "posts" => Post::latest()->get(),
>>>>>>> 178970435b1bac7323e867e03ac941084553d809
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
