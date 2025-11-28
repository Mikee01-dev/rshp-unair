@extends('layouts.lte.main')

@section('content')
<div class="app-content-header">
    <div class="container-fluid">
        <h3 class="fw-bold mb-0">
            <i class="bi bi-plus-circle text-primary me-2"></i>
            Input Header Rekam Medis
        </h3>
    </div>
</div>

<div class="app-content">
    <div class="container-fluid">

        <form action="{{ route('rekam-medis.store') }}" method="POST" class="mt-3">
            @csrf

            <div class="row g-3">

                {{-- Kolom Kiri --}}
                <div class="col-md-4">
                    <div class="card shadow-sm border-0">
                        <div class="card-header bg-primary text-white fw-bold">
                            <i class="bi bi-person-vcard me-2"></i>Identitas Pasien
                        </div>

                        <div class="card-body">

                            <div class="mb-3">
                                <label class="form-label fw-semibold">
                                    <i class="bi bi-shield-plus text-primary me-1"></i> Pasien Hewan
                                </label>
                                <select name="idpet" class="form-select select2 shadow-sm" required>
                                    <option value="">-- Pilih Pasien --</option>
                                    @foreach($pets as $pet)
                                        <option value="{{ $pet->idpet }}">
                                            {{ $pet->nama }} (Owner: {{ $pet->pemilik->user->nama ?? '-' }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">
                                    <i class="bi bi-person-badge text-primary me-1"></i> Dokter Pemeriksa
                                </label>
                                <select name="dokter_pemeriksa" class="form-select shadow-sm" required>
                                    <option value="">-- Pilih Dokter --</option>
                                    @foreach($dokters as $d)
                                        <option value="{{ $d->idrole_user }}">
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

                        <div class="card-header bg-success text-white fw-bold">
                            <i class="bi bi-journal-medical me-2"></i>Hasil Pemeriksaan
                        </div>

                        <div class="card-body">

                            <div class="row">

                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-semibold">
                                        <i class="bi bi-chat-left-dots text-success me-1"></i> Anamnesa (Keluhan)
                                    </label>
                                    <textarea name="anamnesa" class="form-control shadow-sm"
                                              rows="3" placeholder="Tuliskan keluhan utama..."></textarea>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-semibold">
                                        <i class="bi bi-clipboard-data text-success me-1"></i> Temuan Klinis
                                    </label>
                                    <textarea name="temuan_klinis" class="form-control shadow-sm"
                                              rows="3" placeholder="Tuliskan hasil pemeriksaan fisik..."></textarea>
                                </div>

                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold text-danger">
                                    <i class="bi bi-activity me-1"></i> Diagnosa Utama
                                </label>
                                <textarea name="diagnosa" class="form-control shadow-sm"
                                          rows="2" required 
                                          placeholder="Isi diagnosa penyakit disini..."></textarea>
                            </div>

                        </div>

                        <div class="card-footer text-end bg-light">
                            <a href="{{ route('rekam-medis.index') }}" class="btn btn-secondary shadow-sm px-4 me-2">
                                <i class="bi bi-x-circle me-1"></i>
                                Batal
                            </a>
                            <button type="submit" class="btn btn-primary px-4 shadow-sm">
                                <i class="bi bi-save me-1"></i> Simpan Header
                            </button>
                        </div>

                    </div>
                </div>

            </div>
        </form>

    </div>
</div>
@endsection
