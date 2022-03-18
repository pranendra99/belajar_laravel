@extends('layouts.main')

@section('content')

    <h1 class="mb-3 text-center">{{ $title }}</h1>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="/posts">

                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                @if (request('author'))
                    <input type="hidden" name="author" value="{{ request('author') }}">
                @endif

                <div class="input-group mb-4">
                    <input type="text" name="search" class="form-control" placeholder="Cari..." value="{{ request('search') }}">
                    <div class="input-group-append">
                        <button class="btn btn-danger" type="submit">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @if ($posts->count())
        <div class="card mb-3">
            <img src="https://source.unsplash.com/1200x400?{{ $posts[0]->category->name }}" class="card-img-top" alt="{{ $posts[0]->title }}">
            <div class="card-body text-center">
            <h3 class="card-title"><a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none text-dark">{{ $posts[0]->title }}</a></h3>
            
            <p class="card-text">
                <small class="text-muted">
                    <p>By <a href="/posts?author={{ $posts[0]->author->username }}" class="text-decoration-none">{{ $posts[0]->author->name }}</a> in <a href="/posts?category={{ $posts[0]->category->slug}}" class="text-decoration-none">{{ $posts[0]->category->name }} </a>{{ $posts[0]->created_at->diffForHumans() }}</p>
                </small>
            </p>

            <p class="card-text">{{ $posts[0]->excerpt }}</p>
            </div>
        </div>
        
        <div class="container">
            <div class="row">
                
                @foreach ($posts->skip(1) as $post)    
                <div class="col-md-4 mb-3">
                    <div class="card">
                        
                        <div class="position-absolute bg-dark px-3 py-2">
                            <a href="/posts?category={{ $post->category->slug}}" class="text-decoration-none text-white">{{ $post->category->name }}</a>
                        </div>
                        
                        <img src="https://source.unsplash.com/500x400?{{ $post->category->name }}" class="card-img-top" alt="{{ $post->title }}">
                        
                        <div class="card-body">
                            
                            <h5 class="card-title"><a href="/posts/{{ $post->slug }}" class="text-decoration-none text-dark">{{ $post->title }}</a></h5>
                            
                            <p class="card-text">
                                <small class="text-muted">
                                    <p>By <a href="/posts?author={{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }} </a>{{ $post->created_at->diffForHumans() }}</p>
                                </small>
                            </p>
                            
                            <p class="card-text">{{ $post->excerpt }}</p>
                            
                        </div>
                    </div>
                </div>
                @endforeach
                
            </div>
        </div>
    
    @else
        <p class="text-center fs-4">No posts found.</p>
    @endif

    <nav aria-label="page">
        <ul class="pagination justify-content-center">
            {{ $posts->links() }}
        </ul>
    </nav>

    
    {{-- @foreach ($posts->skip(1) as $post)
        <article class="mb-5 border-bottom pb-5">
            <h2><a href="/posts/{{ $post->slug }}" class="text-decoration-none">{{ $post->title }}</a></h2>
            <p>By <a href="/authors/{{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a>
                in <a href="/categories/{{ $post->category->slug}}" class="text-decoration-none">{{ $post->category->name }}</a></p>
                {{-- <h5>By : {{ $post["author"] }}</h5>
        <p>{{ $post->excerpt }}</p> 

        <a href="/posts/{{ $post->slug }}" class="btn btn-primary">Read More..</a>
    </article>
    @endforeach --}}

@endsection