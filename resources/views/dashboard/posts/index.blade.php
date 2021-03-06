@extends('dashboard.layouts.main')

@section('contentAdmin')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                  @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{ session('success') }}
                    </div>
                  @endif
                    <a href="/dashboard/posts/create" class="btn btn-primary">
                        <i class="fa fa-plus"></i>
                        <span>Add new post</span>
                    </a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>No.</th>
                      <th>Judul</th>
                      <th>Kategori</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($posts as $post)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $post->title }}</td>
                      <td>{{ $post->category->name }}</td>
                      <td>
                        {{-- show --}}
                        <a href="/dashboard/posts/{{ $post->slug }}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                        {{-- edit --}}
                        <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                        <form action="/dashboard/posts/{{ $post->slug }}" method="POST" class="d-inline">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="fa fa-trash"></i></button>
                        </form>
                    </td>
                    </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                      <th>No.</th>
                      <th>Judul</th>
                      <th>Kategori</th>
                      <th>Action</th>
                    </tr>
                    </tfoot>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
        </div>
    </div>

@endsection