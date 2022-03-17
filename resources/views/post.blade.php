@extends('layouts.main')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="mb-3">{{ $posts->title }}</h1>

                <small class="text-muted">
                    <p>By <a href="/authors/{{ $posts->author->username }}" class="text-decoration-none">{{ $posts->author->name }}</a> in <a href="/categories/{{ $posts->category->slug}}" class="text-decoration-none">{{ $posts->category->name }} </a>{{ $posts->created_at->diffForHumans() }}</p>
                </small>

                <img src="https://source.unsplash.com/1200x400?{{ $posts->category->name }}" class="card-img-top" alt="{{ $posts->title }}" class="img-fluid">
                {{-- <h5>{{$posts["author"]}}</h5> --}}
                <article class="my-3 fs-6">
                    {!! $posts->body !!}
                </article>

                <a href="/posts" class="btn btn-primary">Kembali</a>
            </div>
        </div>
    </div>

@endsection