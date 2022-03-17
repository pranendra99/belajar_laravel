@extends('layouts.main')

@section('content')
    <h1 class="mb-5">Posts Category</h1>

    @foreach ($categories as $category)
    <ul class="list-group">
        <li class="list-group-item">
            <a href="/categories/{{ $category->slug }}">{{ $category->name }}</a>
        </li>
    </ul>
    @endforeach    
    
@endsection