@extends('layouts.lte.main')

@section('content')
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <h3 class="fw-bold mb-0">
                    <i class="bi bi-journal-medical text-primary me-2"></i>
                    Data Rekam Medis (Header)
                </h3>
            </div>
            <div class="col-sm-6 text-end">
                <a href="{{ route('rekam-medis.create') }}" class="btn btn-primary shadow-sm">
                    <i class="bi bi-plus-lg"></i> Buat Rekam Medis Baru
                </a>
            </div>
        </div>
    </div>
</div>

<div class="app-content">
    <div class="container-fluid">

        {{-- Alert sukses --}}
        @if(session('success'))
            <div class="alert alert-success shadow-sm alert-dismissible fade show mt-2">
                <i class="bi bi-check-circle-fill me-1"></i>
                {{ session('success') }}
                <button class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        {{-- Card data --}}
        <div class="card shadow-sm border-0 mt-3">

            <div class="card-header bg-primary text-white py-3">
                <h5 class="mb-0">
                    <i class="bi bi-list-ul me-2"></i>
                    Daftar Rekam Medis
                </h5>
            </div>

            <div class="card-body p-0">

                <table class="table table-hover table-striped align-middle mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th style="width: 90px">ID</th>
                            <th style="width: 160px">Tanggal</th>
                            <th>Pasien</th>
                            <th>Dokter</th>
                            <th>Diagnosa</th>
                            <th class="text-center" style="width: 130px">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($riwayat as $rm)
                        <tr>

                            {{-- ID --}}
                            <td class="fw-semibold text-primary">
                                #{{ $rm->idrekam_medis }}
                            </td>

                            {{-- Tanggal --}}
                            <td>
                                <span class="d-block text-dark">
                                    <i class="bi bi-calendar-event me-1 text-primary"></i>
                                    {{ \Carbon\Carbon::parse($rm->created_at)->format('d M Y') }}
                                </span>
                                <small class="text-muted">
                                    <i class="bi bi-clock me-1"></i>
                                    {{ \Carbon\Carbon::parse($rm->created_at)->format('H:i') }} WIB
                                </small>
                            </td>

                            {{-- Pasien --}}
                            <td>
                                <strong>{{ $rm->pet->nama }}</strong><br>
                                <small class="text-muted">
                                    <i class="bi bi-person-circle me-1"></i>
                                    {{ $rm->pet->pemilik->user->nama ?? '-' }}
                                </small>
                            </td>

                            {{-- Dokter --}}
                            <td>
                                <i class="bi bi-person-badge me-1 text-info"></i>
                                {{ $rm->dokter->user->nama ?? '-' }}
                            </td>

                            {{-- Diagnosa --}}
                            <td>
                                <span class="badge bg-info text-dark px-3 py-2 rounded-pill"
                                      style="font-size: .85rem;">
                                    {{ Str::limit($rm->diagnosa, 45) }}
                                </span>
                            </td>

                            {{-- Aksi --}}
                            <td class="text-center">
                                <div class="btn-group">

                                    {{-- Detail --}}
                                    <a href="{{ route('rekam-medis.show', $rm->idrekam_medis) }}"
                                       class="btn btn-sm btn-outline-info"
                                       title="Detail">
                                        <i class="bi bi-list-check"></i>
                                    </a>

                                    {{-- Edit --}}
                                    <a href="{{ route('rekam-medis.edit', $rm->idrekam_medis) }}"
                                       class="btn btn-sm btn-outline-warning"
                                       title="Edit">
                                        <i class="bi bi-pencil"></i>
                                    </a>

                                    {{-- Hapus --}}
                                    <form action="{{ route('rekam-medis.destroy', $rm->idrekam_medis) }}"
                                          method="POST"
                                          onsubmit="return confirm('Hapus rekam medis ini?')">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger" title="Hapus">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>

                                </div>
                            </td>

                        </tr>

                        @empty
                        <tr>
                            <td colspan="6" class="text-center py-4 text-muted">
                                <i class="bi bi-clipboard-x fs-3 d-block mb-1"></i>
                                Belum ada data rekam medis.
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
