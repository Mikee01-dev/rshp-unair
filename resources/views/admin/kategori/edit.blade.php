@extends('layouts.lte.main')

@section('content')

{{-- HEADER NON-INDEX --}}
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row align-items-center">

            <div class="col-sm-6">
                <h3 class="fw-bold mb-0">
                    <i class="bi bi-tags-fill me-2 text-warning"></i>
                    Edit Kategori
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
                        Form Edit Kategori
                    </div>

                    <div class="card-body">

                        {{-- FORM --}}
                        <form action="{{ route('kategori.update', $kategori->idkategori) }}" method="POST">
                            @csrf
                            @method('PUT')

                            {{-- INPUT --}}
                            <div class="mb-3">
                                <label class="fw-semibold">Nama Kategori</label>
                                <input type="text"
                                       name="nama_kategori"
                                       class="form-control shadow-sm @error('nama_kategori') is-invalid @enderror"
                                       value="{{ old('nama_kategori', $kategori->nama_kategori) }}"
                                       required>

                                @error('nama_kategori')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- BUTTON --}}
                            <div class="text-end mt-4">
                                <a href="{{ route('kategori.index') }}" class="btn btn-secondary px-4 me-2">
                                    <i class="bi bi-x-circle me-1"></i>Batal
                                </a>

                                <button type="submit" class="btn btn-warning text-dark px-4 shadow-sm">
                                    <i class="bi bi-save me-1"></i>Simpan Perubahan
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
