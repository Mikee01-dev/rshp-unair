@extends('layouts.lte.main')

@section('content')
<div class="app-content-header">
    <div class="container-fluid">
        <h3>Input Header Rekam Medis</h3>
    </div>
</div>

<div class="app-content">
    <div class="container-fluid">
        <form action="{{ route('rekam-medis.store') }}" method="POST">
            @csrf
            
            <div class="row">
                <div class="col-md-4">
                    <div class="card card-primary card-outline">
                        <div class="card-header"><h5 class="card-title">Identitas</h5></div>
                        <div class="card-body">
                            
                            <div class="mb-3">
                                <label>Pasien Hewan</label>
                                <select name="idpet" class="form-select select2" required>
                                    <option value="">-- Pilih Pasien --</option>
                                    @foreach($pets as $pet)
                                        <option value="{{ $pet->idpet }}">
                                            {{ $pet->nama }} (Owner: {{ $pet->pemilik->user->nama ?? '-' }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label>Dokter Pemeriksa</label>
                                <select name="dokter_pemeriksa" class="form-select" required>
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

                <div class="col-md-8">
                    <div class="card card-success card-outline">
                        <div class="card-header"><h5 class="card-title">Hasil Pemeriksaan</h5></div>
                        <div class="card-body">
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label>Anamnesa (Keluhan)</label>
                                    <textarea name="anamnesa" class="form-control" rows="3"></textarea>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Temuan Klinis</label>
                                    <textarea name="temuan_klinis" class="form-control" rows="3"></textarea>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="fw-bold text-danger">Diagnosa Utama</label>
                                <textarea name="diagnosa" class="form-control" rows="2" required placeholder="Isi diagnosa penyakit disini..."></textarea>
                            </div>

                        </div>
                        <div class="card-footer text-end">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save"></i> Simpan Header
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection