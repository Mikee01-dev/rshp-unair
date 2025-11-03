@extends('layouts.admin')

@section('content')
<div class="container">
    <link rel="stylesheet" href="{{ asset('css/page.css') }}">
    <h2 class="judul-halaman">Tambah Kategori Klinis</h2>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('kategori-klinis.store') }}" method="POST">
                @csrf

                <div class="form-group mb-3">
                    <label for="nama_kategori_klinis">Nama Kategori Klinis</label>
                    <input
                        type="text"
                        name="nama_kategori_klinis"
                        id="nama_kategori_klinis"
                        class="form-control @error('nama_kategori_klinis') is-invalid @enderror"
                        value="{{ old('nama_kategori_klinis') }}"
                        required
                    >
                    @error('nama_kategori_klinis')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('kategori-klinis.index') }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
