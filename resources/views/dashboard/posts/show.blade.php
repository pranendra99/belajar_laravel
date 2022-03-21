@extends('dashboard.layouts.main')

@section('contentAdmin')

        <div class="row justify-content-center">
            <div class="col-lg-10">
                <h1 class="my-3">{{ $posts->title }}</h1>

                <a href="/dashboard/posts/" class="btn btn-primary mx-1"><i class="fa fa-arrow-left"></i> Kembali</a>
                <a href="/dashboard/posts/{{ $posts->slug }}/edit" class="btn btn-warning mx-1"><i class="fa fa-edit"></i> Edit</a>
                <form action="/dashboard/posts/{{ $posts->slug }}" method="POST" class="d-inline">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger mx-1"><i class="fa fa-trash"></i> Hapus</button>
                </form>

                <img src="https://source.unsplash.com/1200x400?{{ $posts->category->name }}" class="card-img-top my-3" alt="{{ $posts->title }}" class="img-fluid">
                {{-- <h5>{{$posts["author"]}}</h5> --}}
                <article class="my-3 fs-6">
                    {!! $posts->body !!}
                </article>

            </div>
        </div>

@endsection