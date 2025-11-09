@extends('layouts.admin')

@section('content')
<div class="container">
    <link rel="stylesheet" href="{{ asset('css/page.css') }}">
    <h2 class="judul-halaman">Edit Role</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul style="margin: 0;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('role.update', $role->idrole) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nama_role">Nama Role</label>
            <input type="text" name="nama_role" id="nama_role" value="{{ old('nama_role', $role->nama_role) }}" required>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-primary">Simpan</button>
            <a href="{{ route('role.index') }}" class="btn-secondary">Batal</a>
        </div>
    </form>
</div>
@endsection
