@extends('layouts.lte.main')

@section('content')

{{-- HEADER NON-INDEX --}}
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row align-items-center">

            <div class="col-sm-6">
                <h3 class="fw-bold mb-0">
                    <i class="bi bi-clipboard-pulse text-primary me-2"></i>
                    Input Data Awal (Triage)
                </h3>
            </div>

            <div class="col-sm-6 text-end">
                <a href="{{ route('perawat.dashboard') }}" class="btn btn-secondary shadow-sm">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>

        </div>
    </div>
</div>


{{-- CONTENT --}}
<div class="app-content">
    <div class="container-fluid">

        <form action="{{ route('perawat.triage.store') }}" method="POST">
            @csrf

            <input type="hidden" name="idreservasi_dokter" value="{{ $reservasi->idreservasi_dokter }}">
            <input type="hidden" name="idpet" value="{{ $reservasi->idpet }}">

            <div class="row justify-content-center">

                {{-- SIDE CARD PASIEN --}}
                <div class="col-md-4">
                    <div class="card shadow-sm border-0">
                        <div class="card-header bg-primary text-white text-center fw-bold">
                            <i class="bi bi-person-bounding-box me-1"></i>
                            Data Pasien
                        </div>

                        <div class="card-body text-center">
                            <h3 class="text-primary fw-bold mb-1">{{ $reservasi->pet->nama }}</h3>
                            <p class="text-muted m-0">{{ $reservasi->pet->ras->nama_ras }}</p>

                            <hr>

                            <strong>Pemilik:</strong> <br>
                            {{ $reservasi->pet->pemilik->user->nama ?? '-' }}
                        </div>
                    </div>
                </div>

                {{-- MAIN FORM --}}
                <div class="col-md-8">
                    <div class="card shadow-sm border-primary border-2">

                        <div class="card-header bg-primary text-white fw-bold">
                            <i class="bi bi-clipboard-data me-2"></i>
                            Data Medis Awal
                        </div>

                        <div class="card-body">

                            <div class="mb-3">
                                <label class="fw-semibold">Anamnesa (Keluhan Pemilik)</label>
                                <textarea name="anamnesa"
                                          class="form-control shadow-sm"
                                          rows="3" required
                                          placeholder="Contoh: Muntah 3x, lemas, tidak mau makan..."></textarea>
                            </div>

                            <div class="mb-3">
                                <label class="fw-semibold">Temuan Klinis (Vital Signs)</label>
                                <textarea name="temuan_klinis"
                                          class="form-control shadow-sm"
                                          rows="3" required
                                          placeholder="Contoh: Suhu: 39.2°C, Berat: 5kg, Mukosa pucat..."></textarea>
                            </div>

                            <div class="mb-3">
                                <label class="fw-semibold">Dokter Pemeriksa</label>
                                <select name="dokter_pemeriksa" class="form-select shadow-sm" required>
                                    <option value="">-- Pilih Dokter --</option>

                                    @foreach($dokters as $d)
                                        <option value="{{ $d->idrole_user }}">
                                            drh. {{ $d->user->nama }}
                                        </option>
                                    @endforeach

                                </select>
                                <div class="form-text">Pilih dokter yang menangani pasien ini.</div>
                            </div>

                        </div>

                        <div class="card-footer text-end bg-light">
                            <button type="submit" class="btn btn-primary px-4 shadow-sm">
                                <i class="bi bi-check-circle me-1"></i>
                                Simpan & Teruskan ke Dokter
                            </button>
                        </div>

                    </div>
                </div>

            </div>
        </form>

    </div>
</div>

@endsection
