@extends('layouts.lte.main')

@section('content')

{{-- HEADER (Non-Index) --}}
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row align-items-center">

            <div class="col-sm-6">
                <h3 class="fw-bold mb-0">
                    <i class="bi bi-clipboard2-pulse-fill me-2 text-warning"></i>
                    Edit Tindakan Terapi
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
                        Form Edit Tindakan Terapi
                    </div>

                    <div class="card-body">

                        <form action="{{ route('kode-tindakan-terapi.update', $kodeTindakanTerapi->idkode_tindakan_terapi) }}" method="POST">
                            @csrf
                            @method('PUT')

                            {{-- KODE --}}
                            <div class="mb-3">
                                <label class="fw-semibold">Kode</label>
                                <input
                                    type="text"
                                    name="kode"
                                    id="kode"
                                    class="form-control shadow-sm @error('kode') is-invalid @enderror"
                                    value="{{ old('kode', $kodeTindakanTerapi->kode) }}"
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
                                >{{ old('deskripsi_tindakan_terapi', $kodeTindakanTerapi->deskripsi_tindakan_terapi) }}</textarea>

                                @error('deskripsi_tindakan_terapi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- BUTTON --}}
                            <div class="text-end mt-4">
                                <a href="{{ route('kode-tindakan-terapi.index') }}" class="btn btn-secondary px-4">Batal</a>
                                <button type="submit" class="btn btn-warning px-4">
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
