@extends('layouts.main')

@section('content')

    <article>
        <h2>{{ $posts->title }}</h2>
        {{-- <h5>{{$posts["author"]}}</h5> --}}
        <p>{!! $posts->body !!}</p>
    </article>

    <a href="/posts">Kembali</a>
@endsection