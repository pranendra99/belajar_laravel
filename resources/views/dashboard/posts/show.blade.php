@extends('dashboard.layouts.main')

@section('contentAdmin')

        <div class="row justify-content-center">
            <div class="card my-3 col-lg-10">
                <div class="card-header">
                    <h1 class="my-3">{{ $posts->title }}</h1>
                </div>
                <div class="card-body">
                    
                    <a href="/dashboard/posts/" class="btn btn-primary mx-1"><i class="fa fa-arrow-left"></i> Kembali</a>
                    <a href="/dashboard/posts/{{ $posts->slug }}/edit" class="btn btn-warning mx-1"><i class="fa fa-edit"></i> Edit</a>
                    <form action="/dashboard/posts/{{ $posts->slug }}" method="POST" class="d-inline">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger mx-1" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="fa fa-trash"></i> Hapus</button>
                    </form>

                    @if ($posts->image)
                        <div style="max-height: 350px; overflow: hidden;">
                            <img src="{{ asset('/images/' . $posts->image) }}" alt="{{ $posts->title }}" class="card-img-top mt-4 img-fluid">
                        </div>
                    @else
                        <img src="https://source.unsplash.com/1200x400?{{ $posts->category->name }}" class="card-img-top mt-4 img-fluid" alt="{{ $posts->title }}">                    
                    @endif
                    
                    {{-- <h5>{{$posts["author"]}}</h5> --}}
                    <article class="my-3 fs-6">
                        {!! $posts->body !!}
                    </article>
                    
                </div>
            </div>
        </div>

@endsection