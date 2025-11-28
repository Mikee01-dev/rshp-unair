@extends('layouts.lte.main')

@section('content')

{{-- HEADER --}}
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row align-items-center">

            <div class="col-sm-6">
                <h3 class="fw-bold mb-0">
                    <i class="bi bi-journal-medical text-primary me-2"></i>
                    Detail Rekam Medis
                </h3>
            </div>

            <div class="col-sm-6 text-end">

                <a href="{{ route('dokter.periksa.edit', $rm->idrekam_medis) }}"
                   class="btn btn-warning shadow-sm me-2">
                    <i class="bi bi-pencil-square"></i> Revisi / Edit
                </a>

                <a href="{{ route('dokter.rekam-medis.index') }}"
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

        <div class="row">

            {{-- LEFT CARD --}}
            <div class="col-md-4 mb-3">
                <div class="card shadow-sm border-0">
                    <div class="card-body">

                        <h4 class="text-primary fw-bold mb-1">{{ $rm->pet->nama }}</h4>
                        <p class="text-muted mb-2">{{ $rm->pet->ras->nama_ras ?? '-' }}</p>

                        <hr>

                        <p class="mb-1"><strong>Pemilik:</strong> <br> {{ $rm->pet->pemilik->user->nama ?? '-' }}</p>
                        <p class="mb-1"><strong>Tanggal Periksa:</strong> <br> {{ $rm->created_at->format('d M Y, H:i') }}</p>
                        <p class="mb-1"><strong>Dokter:</strong> <br> drh. {{ $rm->dokter->user->nama ?? '-' }}</p>

                    </div>
                </div>
            </div>


            {{-- RIGHT PANELS --}}
            <div class="col-md-8">

                {{-- PANEL 1: DIAGNOSA --}}
                <div class="card shadow-sm border-0 mb-3">
                    <div class="card-header bg-success text-white fw-bold">
                        <i class="bi bi-clipboard2-pulse me-2"></i> Hasil Diagnosa
                    </div>

                    <div class="card-body">

                        <label class="text-muted fw-semibold">Anamnesa</label>
                        <p>{{ $rm->anamnesa }}</p>
                        <hr>

                        <label class="text-muted fw-semibold">Temuan Klinis</label>
                        <p>{{ $rm->temuan_klinis }}</p>
                        <hr>

                        <label class="text-muted fw-semibold">Diagnosa Dokter</label>
                        <h5 class="text-danger fw-bold">{{ $rm->diagnosa }}</h5>

                    </div>
                </div>



                {{-- PANEL 2: OBAT & TINDAKAN --}}
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-warning fw-bold">
                        <i class="bi bi-capsule me-2"></i> Obat & Tindakan
                    </div>

                    <div class="card-body p-0">
                        <table class="table table-striped table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Nama Tindakan / Obat</th>
                                    <th style="width: 35%">Dosis / Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse($rm->details as $detail)
                                <tr>
                                    <td>
                                        <strong>{{ $detail->tindakan->kode ?? '' }}</strong> — 
                                        {{ $detail->tindakan->deskripsi_tindakan_terapi ?? '-' }}
                                    </td>
                                    <td>{{ $detail->detail }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="2" class="text-center text-muted py-3">
                                        <i class="bi bi-clipboard-x fs-4 d-block"></i>
                                        Belum ada obat atau tindakan.
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
