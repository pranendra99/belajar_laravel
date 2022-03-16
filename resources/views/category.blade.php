@extends('layouts.main')

@section('content')
    <h1 class="mb-5">Posts Category : {{ $category }}</h1>

    @foreach ($posts as $post)
    <article class="mb-5">
        <h2><a href="/posts/{{ $post->slug }}">{{ $post->title }}</a></h2>
        <p>Category : <a href="/categories/{{ $post->category->slug}}">{{ $post->category->name }}</a></p>
        {{-- <h5>By : {{ $post["author"] }}</h5> --}}
        <p>{{ $post->excerpt }}</p>
    </article>
    @endforeach    
    
@endsection