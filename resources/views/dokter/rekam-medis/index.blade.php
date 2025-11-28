@extends('layouts.lte.main')

@section('content')

{{-- HEADER INDEX --}}
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row align-items-center">

            <div class="col-sm-6">
                <h3 class="fw-bold mb-0">
                    <i class="bi bi-archive text-info me-2"></i>
                    Arsip Rekam Medis
                </h3>
            </div>

            <div class="col-sm-6 text-end">
                {{-- Tidak ada tombol aksi untuk halaman ini --}}
            </div>

        </div>
    </div>
</div>


{{-- CONTENT --}}
<div class="app-content">
    <div class="container-fluid">

        <div class="card shadow-sm border-0">

            {{-- FILTER --}}
            <div class="card-header bg-light">
                <form action="{{ route('dokter.rekam-medis.index') }}" method="GET" class="mb-0">
                    <div class="input-group" style="max-width: 280px;">
                        <input type="text"
                               name="search"
                               class="form-control"
                               placeholder="Cari Nama Hewan..."
                               value="{{ request('search') }}">
                        <button class="btn btn-outline-secondary">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </form>
            </div>

            {{-- TABLE --}}
            <div class="card-body p-0">
                <table class="table table-striped table-hover align-middle mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th style="width:130px">Tanggal</th>
                            <th>Pasien</th>
                            <th>Dokter</th>
                            <th>Diagnosa</th>
                            <th class="text-center" style="width:100px">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($riwayat as $item)
                        <tr>
                            <td>{{ $item->created_at->format('d M Y') }}</td>

                            <td>
                                <strong class="text-primary">{{ $item->pet->nama }}</strong><br>
                                <small class="text-muted">{{ $item->pet->ras->nama_ras ?? '' }}</small>
                            </td>

                            <td>{{ $item->dokter->user->nama ?? '-' }}</td>

                            <td>
                                {{ Str::limit($item->diagnosa, 40) }}
                            </td>

                            <td class="text-center">
                                <a href="{{ route('dokter.rekam-medis.show', $item->idrekam_medis) }}"
                                   class="btn btn-sm btn-info text-white">
                                    <i class="bi bi-eye"></i>
                                </a>
                            </td>
                        </tr>

                        @empty
                        <tr>
                            <td colspan="5" class="text-center py-4 text-muted">
                                <i class="bi bi-journal-x fs-3 d-block mb-2"></i>
                                Tidak ada data rekam medis.
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
