@extends('layouts.lte.main')

@section('content')
<div class="container">
    <link rel="stylesheet" href="{{ asset('css/page.css') }}">
    <div class="row justify-content-center mt-3">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah User dan Role</div>
                    <div class="card-body">
                        <form action="{{ route('user-role.store') }}" method="POST">
                            @csrf

                            <div class="form-group mb-3">
                                <label for="nama">Nama Lengkap</label>
                                <input class="form-control" type="text" name="nama" id="nama" class="form-control" required value="{{ old('nama') }}">
                            </div>

                            <div class="form-group mb-3">
                                <label for="email">Alamat Email</label>
                                <input class="form-control" type="email" name="email" id="email" class="form-control" required value="{{ old('email') }}">
                            </div>

                            <div class="form-group mb-3">
                                <label for="password">Kata Sandi</label>
                                <input class="form-control" type="password" name="password" id="password" class="form-control" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="idrole">Role Pengguna</label>
                                <select name="idrole" id="idrole" class="form-control" required>
                                    <option value="">-- Pilih Role --</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->idrole }}">{{ $role->nama_role }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-actions">
                                <a href="{{ route('user-role.index') }}" class="btn btn-secondary">Batal</a>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
            </div>
        </div>
    </div>
</div>

@endsection
