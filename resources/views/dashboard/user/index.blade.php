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
                  @elseif(session()->has('error'))
                    <div class="alert alert-danger alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{ session('error') }}
                    </div>
                  @endif
                    <a href="/dashboard/users/create" class="btn btn-primary">
                        <i class="fa fa-plus"></i>
                        <span>Add new user</span>
                    </a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>No.</th>
                      <th>Nama User</th>
                      <th>Email</th>
                      <th>Role</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if (Auth::user()->id == 1)
                    {{-- Jika user id 1 maka tampilkan semua user --}}
                        @foreach ($users as $user)
                        <tr>
                          {{-- Table --}}
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $user->name }}</td>
                          <td>{{ $user->email }}</td>
                          @if ($user->role == 1)
                            <td>Admin</td>
                          @else
                            <td>User</td>
                          @endif
                          <td>
                            <a href="/dashboard/users/{{ $user->username }}/edit" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                              <form action="/dashboard/users/{{ $user->username }}" method="POST" class="d-inline">
                                  @csrf
                                  @method('delete')
                                  <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="fa fa-trash"></i></button>
                              </form>
                          {{-- End Table --}}
                          </td>
                        </tr>
                        @endforeach
                    @else
                    {{-- Jika user id bukan 1 maka tampilkan user dengan skip id 1 --}}
                        @foreach ($users->skip(1) as $user)
                        <tr>
                          {{-- Table --}}
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $user->name }}</td>
                          <td>{{ $user->email }}</td>
                          @if ($user->role == 1)
                            <td>Admin</td>
                          @else
                            <td>User</td>
                          @endif
                          <td>
                            <a href="/dashboard/users/{{ $user->username }}/edit" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                              <form action="/dashboard/users/{{ $user->username }}" method="POST" class="d-inline">
                                  @csrf
                                  @method('delete')
                                  <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="fa fa-trash"></i></button>
                              </form>
                          {{-- End Table --}}
                          </td>
                        </tr>
                        @endforeach
                    {{-- END SKIP ID --}}
                    @endif
                    </tbody>
                    <tfoot>
                    <tr>
                      <th>No.</th>
                      <th>Nama User</th>
                      <th>Email</th>
                      <th>Role</th>
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