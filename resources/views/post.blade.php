@extends('layouts.main')

@section('content')

    <article>
        <h2>{{ $posts->title }}</h2>
        <p>Author : <a href="/authors/{{ $posts->author->username }}" class="text-decoration-none">{{ $posts->author->name }}</a><br>
        Category : <a href="/categories/{{ $posts->category->slug}}" class="text-decoration-none">{{ $posts->category->name }}</a></p>
        {{-- <h5>{{$posts["author"]}}</h5> --}}
        <p>{!! $posts->body !!}</p>
    </article>

    <a href="/posts" class="btn btn-primary">Kembali</a>
@endsection