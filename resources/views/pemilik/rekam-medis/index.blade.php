@extends('layouts.lte.main')

@section('content')

{{-- HEADER INDEX --}}
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row align-items-center">

            <div class="col-sm-6">
                <h3 class="fw-bold mb-0">
                    <i class="bi bi-heart-pulse-fill text-primary me-2"></i>
                    Riwayat Kesehatan Hewan
                </h3>
            </div>

            <div class="col-sm-6 text-end">
                {{-- Tidak ada tombol create untuk page ini --}}
            </div>

        </div>
    </div>
</div>

{{-- CONTENT --}}
<div class="app-content">
    <div class="container-fluid">

        <div class="card shadow-sm border-0 mt-3">

            <div class="card-header bg-primary text-white fw-bold py-3">
                <i class="bi bi-list-ul me-2"></i> Daftar Riwayat Pemeriksaan
            </div>

            <div class="card-body p-0">

                <table class="table table-hover table-striped align-middle mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th style="width: 140px;">Tanggal</th>
                            <th>Nama Hewan</th>
                            <th>Diagnosa</th>
                            <th class="text-center" style="width: 100px;">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($riwayat as $rm)
                        <tr>

                            {{-- TANGGAL --}}
                            <td>{{ $rm->created_at->format('d M Y') }}</td>

                            {{-- HEWAN --}}
                            <td>
                                <strong class="text-primary">{{ $rm->pet->nama }}</strong><br>
                                <small class="text-muted">{{ $rm->pet->ras->nama_ras ?? '' }}</small>
                            </td>

                            {{-- DIAGNOSA --}}
                            <td>
                                <span class="d-inline-block text-wrap" style="max-width: 280px;">
                                    {{ Str::limit($rm->diagnosa, 50) }}
                                </span>
                            </td>

                            {{-- AKSI --}}
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="{{ route('pemilik.rekam-medis.show', $rm->idrekam_medis) }}"
                                       class="btn btn-sm btn-outline-info text-info">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                </div>
                            </td>

                        </tr>

                        @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted py-4">
                                <i class="bi bi-journal-x fs-4 d-block mb-2"></i>
                                Belum ada riwayat kesehatan untuk hewan Anda.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>

                </table>

            </div>
        </div>

    </div>
</div>

@endsection
