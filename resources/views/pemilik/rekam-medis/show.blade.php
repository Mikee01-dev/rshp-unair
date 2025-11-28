@extends('layouts.lte.main')

@section('content')
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Detail Rekam Medis #{{ $rm->idrekam_medis }}</h3>
            </div>
            <div class="col-sm-6 text-end">

                <a href="{{ route('dokter.rekam-medis.index') }}" class="btn btn-secondary">
                    Kembali
                </a>
            </div>
        </div>
    </div>
</div>

<div class="app-content">
    <div class="container-fluid">
        
        <div class="row">
            <div class="col-md-4">
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <i class="bi bi-gitlab display-1 text-secondary"></i>
                        </div>
                        <h3 class="profile-username text-center mt-3">{{ $rm->pet->nama }}</h3>
                        <p class="text-muted text-center">
                            {{ $rm->pet->ras->nama_ras }} <br>
                            ({{ $rm->pet->ras->jenisHewan->nama_jenis_hewan ?? 'Hewan' }})
                        </p>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Pemilik</b> <a class="float-end text-decoration-none">{{ $rm->pet->pemilik->user->nama ?? '-' }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Gender</b> 
                                <a class="float-end text-decoration-none">
                                    {{ $rm->pet->jenis_kelamin == 'J' ? 'Jantan' : 'Betina' }}
                                </a>
                            </li>
                            <li class="list-group-item">
                                <b>Warna</b> <a class="float-end text-decoration-none">{{ $rm->pet->warna_tanda }}</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Info Pemeriksaan</h3>
                    </div>
                    <div class="card-body">
                        <strong><i class="bi bi-calendar-event me-1"></i> Tanggal Periksa</strong>
                        <p class="text-muted">{{ \Carbon\Carbon::parse($rm->created_at)->format('d F Y, H:i') }} WIB</p>
                        <hr>
                        <strong><i class="bi bi-person-badge me-1"></i> Dokter Pemeriksa</strong>
                        <p class="text-muted">drh. {{ $rm->dokter->user->nama ?? '-' }}</p>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card card-success card-outline mb-4">
                    <div class="card-header">
                        <h5 class="card-title">Hasil Diagnosa & Pemeriksaan</h5>
                    </div>
                    <div class="card-body">
                        <strong><i class="bi bi-chat-left-text me-1"></i> Anamnesa (Keluhan)</strong>
                        <p class="text-muted">{{ $rm->anamnesa ?? '-' }}</p>
                        
                        <hr>

                        <strong><i class="bi bi-activity me-1"></i> Temuan Klinis (Vital Signs)</strong>
                        <p class="text-muted">{{ $rm->temuan_klinis ?? '-' }}</p>

                        <hr>

                        <strong><i class="bi bi-file-medical me-1"></i> Diagnosa Utama</strong>
                        <div class="alert alert-light border mt-2">
                            <h4 class="text-danger fw-bold mb-0">{{ $rm->diagnosa }}</h4>
                        </div>
                    </div>
                </div>

                <div class="card card-warning card-outline">
                    <div class="card-header">
                        <h5 class="card-title">Resep Obat & Tindakan</h5>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Kode</th>
                                    <th>Nama Tindakan / Obat</th>
                                    <th>Dosis / Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($rm->details as $detail)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><span class="badge bg-secondary">{{ $detail->tindakan->kode ?? '?' }}</span></td>
                                    <td>{{ $detail->tindakan->deskripsi_tindakan_terapi ?? '-' }}</td>
                                    <td>{{ $detail->detail }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center text-muted py-4">
                                        Tidak ada obat atau tindakan medis yang tercatat.
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection