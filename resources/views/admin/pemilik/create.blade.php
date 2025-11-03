@extends('layouts.admin')

@section('content')
<div class="container">
    <link rel="stylesheet" href="{{ asset('css/page.css') }}">

    <h2 class="judul-halaman">Tambah Pemilik Baru</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul style="margin: 0;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('pemilik.store') }}" method="POST" class="form-container">
        @csrf

        <div class="form-group">
            <label for="nama">Nama Lengkap</label>
            <input type="text" name="nama" id="nama" value="{{ old('nama') }}" required>
        </div>

        <div class="form-group">
            <label for="email">Alamat Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" required>
        </div>

        <div class="form-group">
            <label for="password">Kata Sandi</label>
            <input type="password" name="password" id="password" required>
        </div>

        <div class="form-group">
            <label for="no_wa">Nomor WhatsApp</label>
            <input type="text" name="no_wa" id="no_wa" value="{{ old('no_wa') }}" required>
        </div>

        <div class="form-group">
            <label for="alamat">Alamat Lengkap</label>
            <textarea name="alamat" id="alamat" rows="3" required>{{ old('alamat') }}</textarea>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-primary">Simpan</button>
            <a href="{{ route('pemilik.index') }}" class="btn-secondary">Batal</a>
        </div>
    </form>
</div>
@endsection
