@extends('layouts.main')

@section('content')

    <article class="mb-5">
        <h1 class="text-center my-3">About</h1>
        <img class="rounded-circle mx-auto d-block my-3" src="/img/{{ $img }}" alt="{{ $nama }}" width="200px">
        <h3 class="text-center">{{ $nama }}</h3>
    </article>

@endsection