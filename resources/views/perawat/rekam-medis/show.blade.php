@extends('layouts.lte.main')

@section('content')

{{-- HEADER STANDARD DETAIL --}}
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row align-items-center">

            <div class="col-sm-6">
                <h3 class="fw-bold mb-0">
                    <i class="bi bi-file-medical text-primary me-2"></i>
                    Detail Rekam Medis
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

        <div class="row g-3">

            {{-- CARD PASIEN --}}
            <div class="col-md-4">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-primary text-white fw-bold">
                        <i class="bi bi-person-bounding-box me-2"></i>Data Pasien
                    </div>

                    <div class="card-body">
                        <h4 class="text-primary fw-bold mb-1">{{ $rm->pet->nama }}</h4>
                        <p class="text-muted mb-2">{{ $rm->pet->ras->nama_ras }}</p>

                        <hr>

                        <p class="mb-1">
                            <strong>Pemilik:</strong><br>
                            {{ $rm->pet->pemilik->user->nama ?? '-' }}
                        </p>

                        <p class="mb-1">
                            <strong>Dokter Pemeriksa:</strong><br>
                            drh. {{ $rm->dokter->user->nama ?? '-' }}
                        </p>

                        <p class="mb-0">
                            <strong>Tanggal Pemeriksaan:</strong><br>
                            {{ $rm->created_at->format('d M Y, H:i') }}
                        </p>
                    </div>
                </div>
            </div>



            {{-- CARD HASIL PEMERIKSAAN --}}
            <div class="col-md-8">

                <div class="card shadow-sm border-success border-2 mb-3">
                    <div class="card-header bg-success text-white fw-bold">
                        <i class="bi bi-heart-pulse me-2"></i>
                        Hasil Pemeriksaan
                    </div>

                    <div class="card-body">

                        <div class="row">
                            <div class="col-6 mb-2">
                                <label class="fw-semibold text-muted">Anamnesa</label>
                                <p class="mb-0">{{ $rm->anamnesa }}</p>
                            </div>

                            <div class="col-6 mb-2">
                                <label class="fw-semibold text-muted">Temuan Klinis</label>
                                <p class="mb-0">{{ $rm->temuan_klinis }}</p>
                            </div>
                        </div>

                        <hr>

                        <label class="fw-semibold text-muted">Diagnosa Dokter</label>
                        <h5 class="text-danger fw-bold">{{ $rm->diagnosa }}</h5>
                    </div>
                </div>

                {{-- CARD TINDAKAN & OBAT --}}
                <div class="card shadow-sm border-warning border-2">
                    <div class="card-header bg-warning text-white fw-bold">
                        <i class="bi bi-capsule-pill me-2"></i>
                        Obat & Tindakan
                    </div>

                    <div class="card-body p-0">

                        <table class="table table-hover table-striped mb-0 align-middle">
                            <thead class="table-dark">
                                <tr>
                                    <th>Nama Tindakan / Obat</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($rm->details as $detail)
                                <tr>
                                    <td>{{ $detail->tindakan->deskripsi_tindakan_terapi ?? '-' }}</td>
                                    <td>{{ $detail->detail }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="2" class="text-center text-muted py-3">
                                        <i class="bi bi-clipboard-x me-1"></i>
                                        Belum ada tindakan.
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
