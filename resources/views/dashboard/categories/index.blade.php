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
                    <a href="/dashboard/categories/create" class="btn btn-primary">
                        <i class="fa fa-plus"></i>
                        <span>Add new category</span>
                    </a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>No.</th>
                      <th>Nama Kategori</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($categories as $category)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $category->name }}</td>
                      <td>
                        {{-- edit --}}
                        <a href="/dashboard/categories/{{ $category->slug }}/edit" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                        <form action="/dashboard/categories/{{ $category->slug }}" method="POST" class="d-inline">
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
                      <th>Nama Kategori</th>
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