@extends('layouts.lte.main')

@section('content')
<div class="container">
    <link rel="stylesheet" href="{{ asset('css/page.css') }}">
    <div class="row justify-content-center mt-3">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit User dan Role</div>
                    <div class="card-body">
                            <form action="{{ route('user-role.update', $user->iduser) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group mb-3">
                                <label for="nama">Nama Lengkap</label>
                                <input  class="form-control" type="text" name="nama" id="nama" class="form-control" value="{{ old('nama', $user->nama) }}" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="email">Alamat Email</label>
                                <input  class="form-control" type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="password">Kata Sandi (Opsional)</label>
                                <input  class="form-control" type="password" name="password" id="password" class="form-control" placeholder="Kosongkan jika tidak ingin mengganti">
                            </div>

                            <div class="form-group mb-3">
                                <label for="idrole">Role Pengguna</label>
                                <select name="idrole" id="idrole" class="form-control" required>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->idrole }}" {{ $roleUser && $roleUser->idrole == $role->idrole ? 'selected' : '' }}>
                                            {{ $role->nama_role }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-actions">
                                <a href="{{ route('user-role.index') }}" class="btn btn-secondary">Batal</a>
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            </div>
                        </form>
                    </div>
            </div>
        </div>
    </div>
</div>

@endsection
