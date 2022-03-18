<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        if (request('category')) {
            $category = Category::firstWhere('slug', request()->category);
            $title = "Post Category : " . $category->name;
            $active = "categories";
        } elseif (request('author')) {
            $author = User::firstWhere('username', request()->author);
            $title = "Post Author : " . $author->name;
            $active = "posts";
        } else {
            $title = "All Posts";
            $active = "posts";
        }

        return view('blog', [
            "title" => $title,
            "active" => $active,
            // "posts" => Post::all(),
            "posts" => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(7)->withQueryString(),
        ]);
    }

    public function show(Post $post)
    {
        return view('post', [
            "title" => $post->title,
            "active" => "posts",
            "posts" => $post,
        ]);
    }
}
