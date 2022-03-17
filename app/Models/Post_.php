<?php

namespace App\Models;


class Post
{
    private static $posts = [
        [
            "title" => "Blog Post 1",
            "slug" => "blog-post-1",
            "author" => "John Doe",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. 
            Minus quis quaerat officiis accusamus impedit atque excepturi amet! Distinctio, 
            nam explicabo! Vel velit molestiae necessitatibus sapiente! Nisi esse voluptatibus sint omnis!",
        ],
        [
            "title" => "Blog Post 2",
            "slug" => "blog-post-2",
            "author" => "Evan Smith",
            "body" => "Lorem ipsum, dolor sit amet consectetur adipisicing elit. 
            Facilis beatae consequatur incidunt sequi nam rerum quod eligendi a 
            vel neque pariatur aliquid, error, nostrum, magnam distinctio necessitatibus 
            totam ducimus. Laboriosam architecto iure eveniet voluptatum in quisquam inventore, 
            eos cupiditate esse, alias odio asperiores obcaecati nisi excepturi quae ad fuga 
            accusamus cumque necessitatibus. Aperiam nulla sit, voluptate illum minima ipsam 
            hic illo facere cum in obcaecati quas architecto vero dicta libero dolorem repellendus? 
            Cupiditate, laudantium sequi omnis, ad obcaecati optio, ipsum vitae architecto nam quos 
            unde quasi harum ducimus voluptatem enim et laborum tenetur? Accusamus nulla quaerat itaque, 
            dolores molestiae quidem.",
        ],
        [
            "title" => "Blog Post 3",
            "slug" => "blog-post-3",
            "author" => "Jane Smith",
            "body" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis 
            corporis maiores sint sapiente voluptatem rerum dolor omnis reprehenderit placeat, 
            temporibus quisquam possimus laboriosam. Ullam non quaerat iure, ipsum laborum quo 
            natus asperiores. Adipisci pariatur totam possimus quasi tempora nobis dolores? Vero 
            tempore et soluta. Eos nobis reprehenderit quasi numquam a.",
        ],
    ];

    public static function all()
    {
        return collect(self::$posts);
    }

    public static function find($slug)
    {
        $blog_posts = static::all();
        // $post = [];
        // foreach ($blog_posts as $blog_post) {
        //     if ($blog_post['slug'] == $slug) {
        //         $post = $blog_post;
        //     }
        // }
        
        return $blog_posts->firstWhere('slug', $slug);
    }

}
