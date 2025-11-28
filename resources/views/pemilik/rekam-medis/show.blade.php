@extends('layouts.lte.main')

@section('content')

{{-- HEADER SHOW --}}
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row align-items-center">

            <div class="col-sm-6">
                <h3 class="fw-bold mb-0">
                    <i class="bi bi-journal-medical text-primary me-2"></i>
                    Detail Rekam Medis #{{ $rm->idrekam_medis }}
                </h3>
            </div>

            <div class="col-sm-6 text-end">
                <a href="{{ route('dokter.rekam-medis.index') }}" class="btn btn-secondary shadow-sm">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>

        </div>
    </div>
</div>

{{-- CONTENT --}}
<div class="app-content">
    <div class="container-fluid">

        <div class="row">

            {{-- SIDEBAR DETAIL PASIEN --}}
            <div class="col-md-4">

                <div class="card shadow-sm border-0 mb-3">
                    <div class="card-body box-profile text-center">

                        <i class="bi bi-gitlab display-1 text-secondary"></i>

                        <h3 class="profile-username mt-3">{{ $rm->pet->nama }}</h3>
                        <p class="text-muted mb-1">
                            {{ $rm->pet->ras->nama_ras }}  
                        </p>
                        <small class="text-muted">
                            ({{ $rm->pet->ras->jenisHewan->nama_jenis_hewan ?? 'Hewan' }})
                        </small>

                        <hr>

                        <ul class="list-group list-group-unbordered text-start">
                            <li class="list-group-item">
                                <b>Pemilik</b>
                                <span class="float-end">{{ $rm->pet->pemilik->user->nama ?? '-' }}</span>
                            </li>

                            <li class="list-group-item">
                                <b>Gender</b>
                                <span class="float-end">
                                    {{ $rm->pet->jenis_kelamin == 'J' ? 'Jantan' : 'Betina' }}
                                </span>
                            </li>

                            <li class="list-group-item">
                                <b>Warna</b>
                                <span class="float-end">{{ $rm->pet->warna_tanda }}</span>
                            </li>
                        </ul>

                    </div>
                </div>

                {{-- CARD INFO PEMERIKSAAN --}}
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-info text-white fw-bold">
                        <i class="bi bi-calendar-check me-1"></i> Info Pemeriksaan
                    </div>

                    <div class="card-body">
                        <strong>Tanggal Periksa</strong>
                        <p class="text-muted mb-2">
                            {{ \Carbon\Carbon::parse($rm->created_at)->format('d F Y, H:i') }} WIB
                        </p>

                        <strong>Dokter Pemeriksa</strong>
                        <p class="text-muted">
                            drh. {{ $rm->dokter->user->nama ?? '-' }}
                        </p>
                    </div>
                </div>

            </div>

            {{-- COLUMN KANAN --}}
            <div class="col-md-8">

                {{-- DIAGNOSA --}}
                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-header bg-success text-white fw-bold">
                        <i class="bi bi-heart-pulse me-2"></i> Hasil Pemeriksaan & Diagnosa
                    </div>

                    <div class="card-body">

                        {{-- ANAMNESA --}}
                        <strong><i class="bi bi-chat-left-text me-1"></i> Anamnesa</strong>
                        <p class="text-muted">{{ $rm->anamnesa ?? '-' }}</p>

                        <hr>

                        {{-- TEMUAN --}}
                        <strong><i class="bi bi-activity me-1"></i> Temuan Klinis</strong>
                        <p class="text-muted">{{ $rm->temuan_klinis ?? '-' }}</p>

                        <hr>

                        {{-- DIAGNOSA --}}
                        <strong><i class="bi bi-file-medical me-1"></i> Diagnosa Utama</strong>
                        <div class="alert alert-light border mt-2">
                            <h4 class="text-danger fw-bold mb-0">{{ $rm->diagnosa }}</h4>
                        </div>

                    </div>
                </div>

                {{-- RESEP & TINDAKAN --}}
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-warning fw-bold">
                        <i class="bi bi-capsule me-2"></i> Resep Obat & Tindakan
                    </div>

                    <div class="card-body p-0">

                        <table class="table table-striped align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th style="width: 40px">#</th>
                                    <th style="width: 90px;">Kode</th>
                                    <th>Nama Item</th>
                                    <th>Dosis / Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($rm->details as $detail)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <span class="badge bg-secondary">
                                            {{ $detail->tindakan->kode ?? '?' }}
                                        </span>
                                    </td>
                                    <td>{{ $detail->tindakan->deskripsi_tindakan_terapi ?? '-' }}</td>
                                    <td>{{ $detail->detail }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center text-muted py-4">
                                        Tidak ada obat atau tindakan tercatat.
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
