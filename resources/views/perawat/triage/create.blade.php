@extends('layouts.lte.main')

@section('content')
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6"><h3>Input Data Awal (Triage)</h3></div>
            <div class="col-sm-6 text-end">
                <a href="{{ route('perawat.dashboard') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>
</div>

<div class="app-content">
    <div class="container-fluid">
        <form action="{{ route('perawat.triage.store') }}" method="POST">
            @csrf
            
            <input type="hidden" name="idreservasi_dokter" value="{{ $reservasi->idreservasi_dokter }}">
            <input type="hidden" name="idpet" value="{{ $reservasi->idpet }}">

            <div class="row">
                <div class="col-md-4">
                    <div class="card card-primary card-outline">
                        <div class="card-header text-center bg-light">
                            <h5 class="card-title m-0">Pasien</h5>
                        </div>
                        <div class="card-body text-center">
                            <h2 class="text-primary">{{ $reservasi->pet->nama }}</h2>
                            <p class="text-muted">{{ $reservasi->pet->ras->nama_ras }}</p>
                            <hr>
                            <strong>Pemilik:</strong><br>
                            {{ $reservasi->pet->pemilik->user->nama ?? '-' }}
                        </div>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="card card-success card-outline">
                        <div class="card-header"><h5 class="card-title">Data Medis Awal</h5></div>
                        <div class="card-body">
                            
                            <div class="mb-3">
                                <label class="fw-bold">Anamnesa (Keluhan Pemilik)</label>
                                <textarea name="anamnesa" class="form-control" rows="3" required placeholder="Contoh: Muntah kuning 3x, lemas, tidak nafsu makan..."></textarea>
                            </div>

                            <div class="mb-3">
                                <label class="fw-bold">Temuan Klinis (Vital Signs)</label>
                                <textarea name="temuan_klinis" class="form-control" rows="3" required placeholder="Contoh: Suhu: 39.2 C, Berat: 5 Kg, Mukosa: Pucat"></textarea>
                            </div>

                            <div class="mb-3">
                                <label class="fw-bold">Pilih Dokter Pemeriksa</label>
                                <select name="dokter_pemeriksa" class="form-select" required>
                                    <option value="">-- Pilih Dokter --</option>
                                    @foreach($dokters as $d)
                                        <option value="{{ $d->idrole_user }}">drh. {{ $d->user->nama }}</option>
                                    @endforeach
                                </select>
                                <div class="form-text">Pilih dokter yang bertugas menangani pasien ini.</div>
                            </div>

                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-lg btn-success w-100">
                                <i class="bi bi-check-circle"></i> Simpan & Teruskan ke Dokter
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection