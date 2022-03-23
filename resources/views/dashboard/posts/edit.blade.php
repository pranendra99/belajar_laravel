@extends('dashboard.layouts.main')

@section('contentAdmin')
    
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card my-3">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fa fa-plus"></i>
                        <span>Edit post</span>
                    </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="/dashboard/posts/{{ $post->slug }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="title">Judul</label>
                            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $post->title) }}" placeholder="Judul" required>
                            @error('title')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="slug">Slug</label>
                            <input type="text" name="slug" id="slug" class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug', $post->slug) }}" placeholder="Slug" required>
                            @error('slug')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="category_id">Kategori</label>
                            <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror" required>
                                <option value="">Pilih kategori</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="body">Body</label>
                            <input id="body" type="hidden" name="body" class="form-control @error('body') is-invalid @enderror" value="{{ old('body', $post->body) }}" required>
                            <trix-editor input="body"></trix-editor>
                            @error('body')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        {{-- <div class="form-group">
                            <label for="image">Gambar</label>
                            <input type="file" name="image" id="image" class="form-control">
                            @error('image')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div> --}}
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-save"></i>
                                <span>Simpan</span>
                            </button>
                            <a href="/dashboard/posts" class="btn btn-secondary">
                                <i class="fa fa-arrow-left"></i>
                                <span>Kembali</span>
                            </a>
                        </div>
                    </form>
                </div>
        </div>
    </div>

    <script>
        // checkSlug
        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');
    
        title.addEventListener('keyup', function() {
            slug.value = title.value.toLowerCase().replace(/ /g, '-').replace(/[^\w-]+/g, '');
            
            // fetch('/dashboard/posts/checkSlug?title=' + title.value)
            //     .then(response => response.json())
            //     .then(data => slug.value = data.slug);

        });
        
        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        });
    
    </script>

@endsection