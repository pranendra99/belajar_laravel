<?php

namespace App\Http\Controllers;

use SNMP;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.posts.index', [
            "title" => "Posts",
            "active" => "posts",
            "posts" => Post::where('user_id', auth()->user()->id)->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.posts.create', [
            "title" => "Create Post",
            "active" => "posts",
            "categories" => Category::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $validasi = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:posts',
            'category_id' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'body' => 'required',
        ]);

        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = date('YmdHis') . '-' . $image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);
            $validasi['image'] = $imageName;
        }

        $validasi['user_id'] = auth()->user()->id;
        $validasi['excerpt'] = Str::limit(strip_tags($request->body), 100);
        
        Post::create($validasi);

        return redirect('/dashboard/posts')->with('success', 'Post created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        // return $post;
        return view('dashboard.posts.show', [
            "title" => $post->title,
            "active" => "posts",
            "posts" => $post,
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('dashboard.posts.edit', [
            "title" => "Edit Post",
            "active" => "posts",
            "post" => $post,
            "categories" => Category::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $rules = [
            'title' => 'required|max:255',
            'category_id' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'body' => 'required',
        ];

        if($request->slug != $post->slug) {
            $rules['slug'] = 'required|unique:posts';
        }
        
        $validasi = $request->validate($rules);

        if($request->hasFile('image')){
            if($request->old_image){
                unlink(public_path('/images/' . $request->old_image));
            }
            $image = $request->file('image');
            $imageName = date('YmdHis') . '-' . $image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);
            $validasi['image'] = $imageName;
        }

        $validasi['user_id'] = auth()->user()->id;
        $validasi['excerpt'] = Str::limit(strip_tags($request->body), 100);

        Post::where('id', $post->id)->update($validasi);
        return redirect('/dashboard/posts')->with('success', 'Post updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if($post->image){
            unlink(public_path('/images/' . $post->image));
        }
        Post::destroy($post->id);
        return redirect('/dashboard/posts')->with('success', 'Post deleted successfully');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
