@extends('layouts.lte.main')

@section('content')

{{-- HEADER INDEX STANDARD --}}
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
                {{-- Tidak ada tombol tambah di page ini --}}
            </div>

        </div>
    </div>
</div>


<div class="app-content">
    <div class="container-fluid">

        {{-- FILTER --}}
        <div class="card shadow-sm border-0 mb-3 col-md-5 p-0">
            <div class="card-body">
                <form action="{{ route('perawat.rekam-medis.index') }}" method="GET" class="d-flex gap-2">

                    <input type="text" 
                           name="search" 
                           class="form-control shadow-sm"
                           placeholder="Cari Nama Pasien / Diagnosa..."
                           value="{{ request('search') }}">

                    <button class="btn btn-primary shadow-sm">
                        <i class="bi bi-search"></i>
                    </button>

                </form>
            </div>
        </div>


        {{-- TABLE --}}
        <div class="card shadow-sm border-0">
            <div class="card-body p-0">

                <table class="table table-hover table-striped align-middle mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th style="width: 120px">Tanggal</th>
                            <th>Pasien</th>
                            <th>Dokter</th>
                            <th>Diagnosa</th>
                            <th class="text-center" style="width: 110px">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($riwayat as $rm)
                        <tr>
                            <td>{{ \Carbon\Carbon::parse($rm->created_at)->format('d M Y') }}</td>

                            <td>
                                <strong class="text-primary">{{ $rm->pet->nama }}</strong><br>
                                <small class="text-muted">{{ $rm->pet->ras->nama_ras ?? '' }}</small>
                            </td>

                            <td>{{ $rm->dokter->user->nama ?? '-' }}</td>

                            <td>
                                <span class="badge bg-secondary text-wrap" style="max-width:250px;">
                                    {{ Str::limit($rm->diagnosa, 50) }}
                                </span>
                            </td>

                            <td class="text-center">
                                <div class="btn-group">

                                    <a href="{{ route('perawat.rekam-medis.show', $rm->idrekam_medis) }}" 
                                       class="btn btn-sm btn-info text-white">
                                        <i class="bi bi-eye"></i>
                                    </a>

                                    <a href="{{ route('perawat.rekam-medis.edit', $rm->idrekam_medis) }}" 
                                       class="btn btn-sm btn-warning">
                                        <i class="bi bi-pencil"></i>
                                    </a>

                                    <form action="{{ route('rekam-medis.destroy', $rm->idrekam_medis) }}"
                                          method="POST"
                                          onsubmit="return confirm('Hapus rekam medis ini?')">
                                        @csrf 
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger" title="Hapus">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>

                                </div>
                            </td>
                        </tr>

                        @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-4">
                                <i class="bi bi-clipboard-x fs-4 mb-2 d-block"></i>
                                Data rekam medis tidak ditemukan.
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
