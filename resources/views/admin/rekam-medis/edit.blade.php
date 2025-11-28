@extends('layouts.lte.main')

@section('content')

<div class="app-content-header">
    <div class="container-fluid">
        <h3 class="fw-bold mb-0">
            <i class="bi bi-pencil-square me-2 text-warning"></i>
            Edit Header Rekam Medis #{{ $rm->idrekam_medis }}
        </h3>
    </div>
</div>

<div class="app-content">
    <div class="container-fluid">

        <form action="{{ route('rekam-medis.update', $rm->idrekam_medis) }}" method="POST" class="mt-3">
            @csrf
            @method('PUT')

            <div class="row g-3">

                {{-- Kolom Kiri --}}
                <div class="col-md-4">
                    <div class="card shadow-sm border-0">
                        <div class="card-header bg-warning text-white fw-bold">
                            <i class="bi bi-clipboard2-pulse me-2"></i>Informasi Dasar
                        </div>

                        <div class="card-body">

                            <div class="mb-3">
                                <label class="form-label fw-semibold">
                                    <i class="bi bi-shield-plus me-1 text-primary"></i> Pasien Hewan
                                </label>
                                <select name="idpet" class="form-select shadow-sm" required>
                                    @foreach($pets as $pet)
                                        <option value="{{ $pet->idpet }}" 
                                            {{ $rm->idpet == $pet->idpet ? 'selected' : '' }}>
                                            {{ $pet->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">
                                    <i class="bi bi-person-badge me-1 text-primary"></i> Dokter Pemeriksa
                                </label>
                                <select name="dokter_pemeriksa" class="form-select shadow-sm" required>
                                    @foreach($dokters as $d)
                                        <option value="{{ $d->idrole_user }}" 
                                            {{ $rm->dokter_pemeriksa == $d->idrole_user ? 'selected' : '' }}>
                                            drh. {{ $d->user->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                    </div>
                </div>

                {{-- Kolom Kanan --}}
                <div class="col-md-8">
                    <div class="card shadow-sm border-0">

                        <div class="card-header bg-warning text-white fw-bold">
                            <i class="bi bi-journal-medical me-2"></i>Detail Pemeriksaan
                        </div>

                        <div class="card-body">

                            <div class="mb-3">
                                <label class="form-label fw-semibold">
                                    <i class="bi bi-chat-left-dots me-1 text-success"></i> Anamnesa
                                </label>
                                <textarea name="anamnesa" class="form-control shadow-sm" rows="3">{{ $rm->anamnesa }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">
                                    <i class="bi bi-clipboard-data me-1 text-success"></i> Temuan Klinis
                                </label>
                                <textarea name="temuan_klinis" class="form-control shadow-sm" rows="3">{{ $rm->temuan_klinis }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold text-danger">
                                    <i class="bi bi-activity me-1"></i> Diagnosa
                                </label>
                                <textarea name="diagnosa" class="form-control shadow-sm" rows="2" required>{{ $rm->diagnosa }}</textarea>
                            </div>

                        </div>

                        <div class="card-footer text-end bg-light">
                            <a href="{{ route('rekam-medis.index') }}" class="btn btn-secondary shadow-sm px-4 me-2">
                                <i class="bi bi-x-circle me-1"></i>
                                Batal
                            </a>
                            <button type="submit" class="btn btn-warning px-4 shadow-sm">
                                <i class="bi bi-save me-1"></i> Update Header
                            </button>
                        </div>

                    </div>
                </div>

            </div>

        </form>

    </div>
</div>

@endsection
