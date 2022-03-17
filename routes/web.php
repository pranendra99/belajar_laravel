<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Models\Category;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('home', [
        "title" => "Home",
    ]);
});

Route::get('/about', function () {
    return view('about',[
        "title" => "About",
        "nama" => "Evan Fauzi",
        "img" => "evan.jpg",
    ]);
});

Route::get('/posts', [PostController::class, 'index']);

Route::get('/posts/{post:slug}', [PostController::class, 'show']);

Route::get('/categories', function () {
    return view('categories', [
        "title" => "Post Categories",
        "categories" => Category::all(),
    ]);
});

Route::get('/categories/{category:slug}', function  (Category $category) {
<<<<<<< HEAD
<<<<<<< HEAD
    return view('blog', [
        'title' => "Post Category : " . $category->name,
        'posts' => $category->posts->load('category', 'author'),
=======
=======
>>>>>>> 178970435b1bac7323e867e03ac941084553d809
    return view('category', [
        'title' => $category->name,
        'posts' => $category->posts,
        'category' => $category->name,
<<<<<<< HEAD
>>>>>>> 178970435b1bac7323e867e03ac941084553d809
=======
>>>>>>> 178970435b1bac7323e867e03ac941084553d809
    ]);
});

Route::get('/authors/{author:username}', function  (User $author) {
    return view('blog', [
<<<<<<< HEAD
<<<<<<< HEAD
        'title' => "Post By " . $author->name,
        'posts' => $author->posts->load('category', 'author'),
    ]);
});
=======
        'title' => "Post by " . $author->name,
        'posts' => $author->posts,
    ]);
});
>>>>>>> 178970435b1bac7323e867e03ac941084553d809
=======
        'title' => "Post by " . $author->name,
        'posts' => $author->posts,
    ]);
});
>>>>>>> 178970435b1bac7323e867e03ac941084553d809
