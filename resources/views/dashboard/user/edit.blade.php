@extends('dashboard.layouts.main')

@section('contentAdmin')
    
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card my-3">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fa fa-plus"></i>
                        <span>Edit user</span>
                    </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="/dashboard/users/{{ $user->id }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Nama User</label>
                            <input type="hidden" name="id" value="{{ $user->id }}">
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $user->name) }}" placeholder="Nama User" required disabled>
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        {{-- username --}}
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username', $user->username) }}" placeholder="Username" required disabled>
                            @error('username')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}" placeholder="Email" required disabled>
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        {{-- <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" placeholder="Password" required>
                            @error('password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div> --}}

                        @if (Auth::user()->id == 1)
                        {{-- Jika user id 1 maka tampilkan semua user --}}
                            <div class="form-group">
                                <label for="role">Role</label>
                                <input type="text" name="role" id="role" class="form-control @error('role') is-invalid @enderror" value="{{ old('role', ($user->role) ? 'Admin' : 'User') }}" placeholder="Role" required disabled>
                                @error('role')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        @else
                            {{-- role --}}
                            <div class="form-group">
                                <label for="role">Role</label>
                                <select name="role" id="role" class="form-control @error('role') is-invalid @enderror">
                                    <option value="">Pilih Role</option>
                                    <option value="1" {{ $user->role == '1' ? 'selected' : '' }}>Admin</option>
                                    <option value="0" {{ $user->role == '0' ? 'selected' : '' }}>User</option>
                                </select>
                                @error('role')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        @endif

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-save"></i>
                                <span>Simpan</span>
                            </button>
                            <a href="/dashboard/users" class="btn btn-secondary">
                                <i class="fa fa-arrow-left"></i>
                                <span>Kembali</span>
                            </a>
                        </div>
                    </form>
                </div>
        </div>
    </div>

    {{-- <script>
        const name = document.querySelector('#name');
        const username = document.querySelector('#username');
        
        name.addEventListener('keyup', function() {
            // username to lowercase and remove space
            username.value = name.value.toLowerCase().replace(/\s/g, '');
        });
        
    </script> --}}

@endsection