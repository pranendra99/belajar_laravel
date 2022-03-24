@extends('dashboard.layouts.main')

@section('contentAdmin')
    
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card my-3">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fa fa-plus"></i>
                        <span>Add new category</span>
                    </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="/dashboard/categories" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nama Kategori</label>
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Nama Kategori" required>
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="slug">Slug</label>
                            <input type="text" name="slug" id="slug" class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug') }}" placeholder="Slug" required>
                            @error('slug')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-save"></i>
                                <span>Simpan</span>
                            </button>
                            <a href="/dashboard/categories" class="btn btn-secondary">
                                <i class="fa fa-arrow-left"></i>
                                <span>Kembali</span>
                            </a>
                        </div>
                    </form>
                </div>
        </div>
    </div>

    <script>
        const nameCat = document.querySelector('#name');
        const slug = document.querySelector('#slug');
        
        nameCat.addEventListener('change', function() {
            slug.value = nameCat.value.toLowerCase().replace(/ /g, '-').replace(/[^\w-]+/g, '');
        });
    </script>
@endsection