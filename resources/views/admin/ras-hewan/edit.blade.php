@extends('layouts.lte.main')

@section('content')

{{-- HEADER HALAMAN (Standar) --}}
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row align-items-center">

            <div class="col-sm-6">
                <h3 class="fw-bold mb-0">
                    <i class="bi bi-ui-checks-grid me-2 text-primary"></i>
                    Edit Ras Hewan
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
                    
                    <div class="card-header bg-primary text-white fw-bold py-3">
                        <i class="bi bi-pencil-square me-2"></i>
                        Form Edit Ras Hewan
                    </div>

                    <div class="card-body">

                        <form action="{{ route('ras-hewan.update', $rasHewan->idras_hewan) }}" method="POST">
                            @csrf
                            @method('PUT')

                            {{-- NAMA RAS --}}
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Nama Ras Hewan</label>
                                <input type="text"
                                       name="nama_ras"
                                       class="form-control shadow-sm @error('nama_ras') is-invalid @enderror"
                                       value="{{ old('nama_ras', $rasHewan->nama_ras) }}"
                                       required>
                                @error('nama_ras')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- JENIS HEWAN --}}
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Jenis Hewan</label>
                                <select name="idjenis_hewan"
                                        class="form-select shadow-sm"
                                        required>
                                    @foreach ($jenisHewan as $jenis)
                                        <option value="{{ $jenis->idjenis_hewan }}"
                                            {{ old('idjenis_hewan', $rasHewan->idjenis_hewan) == $jenis->idjenis_hewan ? 'selected' : '' }}>
                                            {{ $jenis->nama_jenis_hewan }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- BUTTON --}}
                            <div class="text-end mt-4">
                                <a href="{{ route('ras-hewan.index') }}" class="btn btn-secondary px-4">
                                    <i class="bi bi-x-circle me-1"></i> Batal
                                </a>

                                <button type="submit" class="btn btn-primary px-4 shadow-sm">
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
