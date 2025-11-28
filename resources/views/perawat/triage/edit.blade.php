@extends('layouts.lte.main')

@section('content')
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6"><h3>Edit Data Triage</h3></div>
            <div class="col-sm-6 text-end">
                <a href="{{ route('perawat.rekam-medis.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>
</div>

<div class="app-content">
    <div class="container-fluid">
        <form action="{{ route('perawat.rekam-medis.update', $rm->idrekam_medis) }}" method="POST">
            @csrf
            @method('PUT') <div class="row">
                <div class="col-md-4">
                    <div class="card card-warning card-outline">
                        <div class="card-header text-center bg-light">
                            <h5 class="card-title m-0">Data Pasien</h5>
                        </div>
                        <div class="card-body text-center">
                            <h2 class="text-primary">{{ $rm->pet->nama }}</h2>
                            <p class="text-muted">{{ $rm->pet->ras->nama_ras ?? '-' }}</p>
                            <hr>
                            <strong>Pemilik:</strong><br>
                            {{ $rm->pet->pemilik->user->nama ?? '-' }}
                        </div>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="card card-primary card-outline">
                        <div class="card-header"><h5 class="card-title">Koreksi Data Medis Awal</h5></div>
                        <div class="card-body">
                            
                            <div class="mb-3">
                                <label class="fw-bold">Anamnesa (Keluhan Utama)</label>
                                <textarea name="anamnesa" class="form-control" rows="3" required>{{ $rm->anamnesa }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label class="fw-bold">Temuan Klinis (Vital Signs)</label>
                                <textarea name="temuan_klinis" class="form-control" rows="3" required>{{ $rm->temuan_klinis }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label class="fw-bold">Dokter Pemeriksa:</label>
                                <select name="dokter_pemeriksa" class="form-select" required>
                                    @foreach($dokters as $d)
                                        <option value="{{ $d->idrole_user }}" 
                                            {{ $rm->dokter_pemeriksa == $d->idrole_user ? 'selected' : '' }}>
                                            drh. {{ $d->user->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                        <div class="card-footer text-end">
                            <button type="submit" class="btn btn-warning">
                                <i class="bi bi-save"></i> Simpan Perubahan
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection