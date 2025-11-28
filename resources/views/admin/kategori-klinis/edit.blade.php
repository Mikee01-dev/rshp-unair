@extends('layouts.lte.main')

@section('content')

{{-- HEADER (Non-Index) --}}
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row align-items-center">

            <div class="col-sm-6">
                <h3 class="fw-bold mb-0">
                    <i class="bi bi-collection me-2 text-warning"></i>
                    Edit Kategori Klinis
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
                    <div class="card-header bg-warning text-dark fw-bold py-3">
                        <i class="bi bi-pencil-square me-2"></i>
                        Form Edit Kategori Klinis
                    </div>

                    <div class="card-body">

                        <form action="{{ route('kategori-klinis.update', $kategoriKlinis->idkategori_klinis) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label class="fw-semibold">Nama Kategori Klinis</label>
                                <input type="text"
                                    name="nama_kategori_klinis"
                                    class="form-control shadow-sm @error('nama_kategori_klinis') is-invalid @enderror"
                                    value="{{ old('nama_kategori_klinis', $kategoriKlinis->nama_kategori_klinis) }}"
                                    required>

                                @error('nama_kategori_klinis')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="text-end mt-4">
                                <a href="{{ route('kategori-klinis.index') }}" class="btn btn-secondary px-4 me-2">
                                    <i class="bi bi-x-circle me-1"></i>Batal
                                </a>
                                <button type="submit" class="btn btn-warning shadow-sm px-4">
                                    <i class="bi bi-save me-1"></i>
                                    Simpan Perubahan
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
