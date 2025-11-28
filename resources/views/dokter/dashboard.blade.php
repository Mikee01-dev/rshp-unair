@extends('layouts.lte.main')

@section('content')

{{-- HEADER INDEX --}}
<div class="app-content-header">
    <div class="container-fluid">

        <div class="row align-items-center">
            <div class="col-sm-6">
                <h3 class="fw-bold mb-0">
                    <i class="bi bi-heart-pulse text-primary me-2"></i>
                    Halo, drh. {{ Auth::user()->nama }}
                </h3>
                <p class="text-muted mb-0">Berikut adalah pasien yang siap diperiksa hari ini.</p>
            </div>

            <div class="col-sm-6 text-end">
                {{-- Tidak ada tombol aksi, jadi biarkan kosong --}}
            </div>
        </div>

    </div>
</div>


{{-- CONTENT --}}
<div class="app-content">
    <div class="container-fluid">

        @if(session('success'))
            <div class="alert alert-success shadow-sm">
                <i class="bi bi-check-circle me-1"></i> {{ session('success') }}
            </div>
        @endif

        <div class="card shadow-sm border-0 mt-3">
            <div class="card-header bg-primary text-white fw-bold">
                <i class="bi bi-people-fill me-2"></i>
                Antrian Pasien (Siap Periksa)
            </div>

            <div class="card-body p-0">
                <table class="table table-hover table-striped align-middle mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th class="text-center" style="width: 90px">No. Urut</th>
                            <th style="width: 120px">Jam Masuk</th>
                            <th>Pasien</th>
                            <th>Pemilik</th>
                            <th class="text-center" style="width: 180px">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($antrian as $item)
                        <tr>
                            <td class="text-center fw-bold fs-5 text-primary">
                                {{ $item->no_urut }}
                            </td>

                            <td>
                                <i class="bi bi-clock me-1 text-primary"></i>
                                {{ \Carbon\Carbon::parse($item->waktu_daftar)->format('H:i') }}
                            </td>

                            <td>
                                <strong>{{ $item->pet->nama }}</strong><br>
                                <span class="badge bg-secondary">{{ $item->pet->ras->nama_ras }}</span>
                            </td>

                            <td>
                                <i class="bi bi-person-circle me-1 text-info"></i>
                                {{ $item->pet->pemilik->user->nama ?? '-' }}
                            </td>

                            <td class="text-center">
                                @if($item->rekamMedis)
                                    <a href="{{ route('dokter.periksa.edit', $item->rekamMedis->idrekam_medis) }}"
                                       class="btn btn-primary shadow-sm fw-bold">
                                        <i class="bi bi-stethoscope me-1"></i>
                                        Periksa Sekarang
                                    </a>
                                @else
                                    <span class="badge bg-warning text-dark px-3 py-2">
                                        <i class="bi bi-hourglass-split me-1"></i>
                                        Menunggu Triage
                                    </span>
                                @endif
                            </td>
                        </tr>

                        @empty
                        <tr>
                            <td colspan="5" class="text-center py-5 text-muted">
                                <i class="bi bi-emoji-smile fs-1 d-block mb-2"></i>
                                Tidak ada pasien yang menunggu.
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
