@extends('layouts.lte.main')

@section('content')

{{-- HEADER (Non-Index) --}}
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row align-items-center">

            <div class="col-sm-6">
                <h3 class="fw-bold mb-0">
                    <i class="bi bi-clipboard2-pulse-fill me-2 text-primary"></i>
                    Tambah Tindakan Terapi
                </h3>
            </div>

        </div>
    </div>
</div>

<div class="app-content">
    <div class="container-fluid">

        <div class="row justify-content-center mt-3">
            <div class="col-md-8">

                <div class="card shadow-sm border-0">

                    {{-- CARD HEADER --}}
                    <div class="card-header bg-primary text-white fw-bold py-3">
                        <i class="bi bi-plus-circle me-2"></i>
                        Form Tambah Tindakan Terapi
                    </div>

                    <div class="card-body">

                        <form action="{{ route('kode-tindakan-terapi.store') }}" method="POST">
                            @csrf

                            {{-- KODE --}}
                            <div class="mb-3">
                                <label class="fw-semibold">Kode</label>
                                <input
                                    type="text"
                                    name="kode"
                                    id="kode"
                                    class="form-control shadow-sm @error('kode') is-invalid @enderror"
                                    value="{{ old('kode') }}"
                                    required
                                >
                                @error('kode')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- DESKRIPSI --}}
                            <div class="mb-3">
                                <label class="fw-semibold">Deskripsi Tindakan Terapi</label>
                                <textarea
                                    name="deskripsi_tindakan_terapi"
                                    id="deskripsi_tindakan_terapi"
                                    class="form-control shadow-sm @error('deskripsi_tindakan_terapi') is-invalid @enderror"
                                    rows="4"
                                    required
                                >{{ old('deskripsi_tindakan_terapi') }}</textarea>
                                @error('deskripsi_tindakan_terapi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- KATEGORI --}}
                            <div class="mb-3">
                                <label class="fw-semibold">Kategori</label>
                                <select name="idkategori" id="idkategori"
                                        class="form-select shadow-sm @error('idkategori') is-invalid @enderror"
                                        required>
                                    <option value="">-- Pilih Kategori --</option>
                                    @foreach ($kategori as $kat)
                                        <option value="{{ $kat->idkategori }}"
                                            {{ old('idkategori') == $kat->idkategori ? 'selected' : '' }}>
                                            {{ $kat->nama_kategori }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('idkategori')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- KATEGORI KLINIS --}}
                            <div class="mb-3">
                                <label class="fw-semibold">Kategori Klinis</label>
                                <select name="idkategori_klinis" id="idkategori_klinis"
                                        class="form-select shadow-sm @error('idkategori_klinis') is-invalid @enderror"
                                        required>
                                    <option value="">-- Pilih Kategori Klinis --</option>
                                    @foreach ($kategoriKlinis as $klin)
                                        <option value="{{ $klin->idkategori_klinis }}"
                                            {{ old('idkategori_klinis') == $klin->idkategori_klinis ? 'selected' : '' }}>
                                            {{ $klin->nama_kategori_klinis }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('idkategori_klinis')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- BUTTON --}}
                            <div class="text-end mt-4">
                                <a href="{{ route('kode-tindakan-terapi.index') }}" class="btn btn-secondary px-4">Batal</a>
                                <button type="submit" class="btn btn-primary px-4">
                                    <i class="bi bi-save me-1"></i>
                                    Simpan
                                </button>
                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

@endsection
