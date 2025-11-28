@extends('layouts.lte.main')

@section('content')

{{-- HEADER NON-INDEX --}}
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row align-items-center">

            <div class="col-sm-6">
                <h3 class="fw-bold mb-0">
                    <i class="bi bi-clipboard-pulse text-warning me-2"></i>
                    Edit Data Triage
                </h3>
            </div>

            <div class="col-sm-6 text-end">
                <a href="{{ route('perawat.rekam-medis.index') }}" 
                   class="btn btn-secondary shadow-sm">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>

        </div>
    </div>
</div>


{{-- CONTENT --}}
<div class="app-content">
    <div class="container-fluid">

        <form action="{{ route('perawat.rekam-medis.update', $rm->idrekam_medis) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row justify-content-center">

                {{-- CARD PASIEN --}}
                <div class="col-md-4">
                    <div class="card shadow-sm border-0">
                        <div class="card-header bg-warning text-white text-center fw-bold">
                            <i class="bi bi-person-bounding-box me-1"></i>
                            Data Pasien
                        </div>

                        <div class="card-body text-center">
                            <h3 class="text-primary fw-bold mb-1">{{ $rm->pet->nama }}</h3>
                            <p class="text-muted">{{ $rm->pet->ras->nama_ras ?? '-' }}</p>

                            <hr>

                            <strong>Pemilik:</strong><br>
                            {{ $rm->pet->pemilik->user->nama ?? '-' }}
                        </div>
                    </div>
                </div>

                {{-- CARD EDIT --}}
                <div class="col-md-8">
                    <div class="card shadow-sm border-warning border-2">

                        <div class="card-header bg-warning text-white fw-bold">
                            <i class="bi bi-pencil-square me-2"></i>
                            Koreksi Data Medis Awal
                        </div>

                        <div class="card-body">

                            {{-- ANAMNESA --}}
                            <div class="mb-3">
                                <label class="fw-semibold">Anamnesa (Keluhan Utama)</label>
                                <textarea name="anamnesa"
                                          class="form-control shadow-sm"
                                          rows="3" required>{{ $rm->anamnesa }}</textarea>
                            </div>

                            {{-- TEMUAN KLINIS --}}
                            <div class="mb-3">
                                <label class="fw-semibold">Temuan Klinis (Vital Signs)</label>
                                <textarea name="temuan_klinis"
                                          class="form-control shadow-sm"
                                          rows="3" required>{{ $rm->temuan_klinis }}</textarea>
                            </div>

                            {{-- DOKTER --}}
                            <div class="mb-3">
                                <label class="fw-semibold">Dokter Pemeriksa</label>
                                <select name="dokter_pemeriksa" 
                                        class="form-select shadow-sm" required>
                                    @foreach($dokters as $d)
                                        <option value="{{ $d->idrole_user }}"
                                            {{ $rm->dokter_pemeriksa == $d->idrole_user ? 'selected' : '' }}>
                                            drh. {{ $d->user->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                        </div>

                        <div class="card-footer text-end bg-light">
                            <button type="submit" class="btn btn-warning px-4 shadow-sm">
                                <i class="bi bi-save me-1"></i> Simpan Perubahan
                            </button>
                        </div>

                    </div>
                </div>

            </div>

        </form>

    </div>
</div>

@endsection
