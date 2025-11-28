@extends('layouts.lte.main')

@section('content')

{{-- HEADER HALAMAN (Judul saja, tanpa tombol) --}}
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row align-items-center">

            <div class="col-sm-12">
                <h3 class="fw-bold mb-0">
                    <i class="bi bi-ui-checks-grid me-2 text-success"></i>
                    Tambah Ras Hewan
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
                        <i class="bi bi-plus-circle me-2"></i>
                        Form Tambah Ras Hewan
                    </div>

                    <div class="card-body">

                        <form action="{{ route('ras-hewan.store') }}" method="POST">
                            @csrf

                            {{-- NAMA RAS --}}
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Nama Ras Hewan</label>
                                <input type="text"
                                       id="nama_ras"
                                       name="nama_ras"
                                       class="form-control shadow-sm @error('nama_ras') is-invalid @enderror"
                                       value="{{ old('nama_ras') }}"
                                       required>
                                @error('nama_ras')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- JENIS HEWAN --}}
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Jenis Hewan</label>
                                <select name="idjenis_hewan"
                                        id="idjenis_hewan"
                                        class="form-select shadow-sm"
                                        required>
                                    <option value="">-- Pilih Jenis Hewan --</option>
                                    @foreach ($jenisHewan as $jenis)
                                        <option value="{{ $jenis->idjenis_hewan }}"
                                            {{ old('idjenis_hewan') == $jenis->idjenis_hewan ? 'selected' : '' }}>
                                            {{ $jenis->nama_jenis_hewan }}
                                        </option>
                                    @endforeach
                                </select>

                                @error('idjenis_hewan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- BUTTON --}}
                            <div class="text-end mt-4">
                                <a href="{{ route('ras-hewan.index') }}" class="btn btn-secondary px-4">
                                    <i class="bi bi-x-circle me-1"></i> Batal
                                </a>

                                <button type="submit" class="btn btn-primary shadow-sm px-4">
                                    <i class="bi bi-save me-1"></i> Simpan
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
