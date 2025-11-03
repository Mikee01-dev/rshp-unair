@extends('layouts.admin')

@section('content')
<div class="container">
    <link rel="stylesheet" href="{{ asset('css/page.css') }}">
    <h2 class="judul-halaman">Tambah Kode Tindakan Terapi</h2>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('kode-tindakan-terapi.store') }}" method="POST">
                @csrf

                <div class="form-group mb-3">
                    <label for="kode">Kode</label>
                    <input
                        type="text"
                        name="kode"
                        id="kode"
                        class="form-control @error('kode') is-invalid @enderror"
                        value="{{ old('kode') }}"
                        required
                    >
                    @error('kode')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="deskripsi_tindakan_terapi">Deskripsi Tindakan Terapi</label>
                    <textarea
                        name="deskripsi_tindakan_terapi"
                        id="deskripsi_tindakan_terapi"
                        class="form-control @error('deskripsi_tindakan_terapi') is-invalid @enderror"
                        rows="4"
                        required
                    >{{ old('deskripsi_tindakan_terapi') }}</textarea>
                    @error('deskripsi_tindakan_terapi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="idkategori">Kategori</label>
                    <select name="idkategori" id="idkategori" class="form-control" required>
                        <option value="">-- Pilih Kategori --</option>
                        @foreach ($kategori as $kat)
                            <option value="{{ $kat->idkategori }}" {{ old('idkategori') == $kat->idkategori ? 'selected' : '' }}>
                                {{ $kat->nama_kategori }}
                            </option>
                        @endforeach
                    </select>
                    @error('idkategori')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="idkategori_klinis">Kategori Klinis</label>
                    <select name="idkategori_klinis" id="idkategori_klinis" class="form-control" required>
                        <option value="">-- Pilih Kategori Klinis --</option>
                        @foreach ($kategoriKlinis as $klin)
                            <option value="{{ $klin->idkategori_klinis }}" {{ old('idkategori_klinis') == $klin->idkategori_klinis ? 'selected' : '' }}>
                                {{ $klin->nama_kategori_klinis }}
                            </option>
                        @endforeach
                    </select>
                    @error('idkategori_klinis')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('kode-tindakan-terapi.index') }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
