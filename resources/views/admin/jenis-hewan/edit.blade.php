@extends('layouts.lte.main')

@section('title', 'Edit Jenis Hewan')

@section('content')

{{-- HEADER --}}
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row align-items-center">

            <div class="col-sm-6">
                <h3 class="fw-bold mb-0">
                    <i class="bi bi-grid-3x3-gap-fill me-2 text-warning"></i>
                    Edit Jenis Hewan
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

                    <div class="card-header bg-warning text-dark fw-bold py-3">
                        <i class="bi bi-pencil-square me-2"></i>
                        Form Edit Jenis Hewan
                    </div>

                    <div class="card-body">

                        <form action="{{ route('jenis-hewan.update', $jenisHewan->idjenis_hewan) }}" method="POST">
                            @csrf
                            @method('PUT')

                            {{-- INPUT --}}
                            <div class="mb-3">
                                <label for="nama_jenis_hewan" class="fw-semibold">Nama Jenis Hewan</label>
                                <input 
                                    type="text"
                                    id="nama_jenis_hewan"
                                    name="nama_jenis_hewan"
                                    class="form-control shadow-sm @error('nama_jenis_hewan') is-invalid @enderror"
                                    value="{{ old('nama_jenis_hewan', $jenisHewan->nama_jenis_hewan) }}"
                                    required
                                >
                                @error('nama_jenis_hewan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- BUTTON --}}
                            <div class="text-end mt-4">

                                <a href="{{ route('jenis-hewan.index') }}" class="btn btn-secondary shadow-sm px-4 me-2">
                                    <i class="bi bi-x-circle me-1"></i> Batal
                                </a>

                                <button type="submit" class="btn btn-warning shadow-sm px-4">
                                    <i class="bi bi-save me-1"></i> Simpan Perubahan
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
