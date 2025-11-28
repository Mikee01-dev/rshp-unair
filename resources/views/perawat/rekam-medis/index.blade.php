@extends('layouts.lte.main')

@section('content')
<div class="app-content-header">
    <div class="container-fluid">
        <h3 class="mb-0">Arsip Rekam Medis</h3>
    </div>
</div>

<div class="app-content">
    <div class="container-fluid">
        <div class="card card-outline card-info">
            <div class="card-header">
                <form action="{{ route('perawat.rekam-medis.index') }}" method="GET">
                    <div class="input-group" style="width: 300px;">
                        <input type="text" name="search" class="form-control" placeholder="Cari Nama Pasien..." value="{{ request('search') }}">
                        <button class="btn btn-default"><i class="bi bi-search"></i> Cari</button>
                    </div>
                </form>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>Tanggal</th>
                            <th>Pasien</th>
                            <th>Dokter</th>
                            <th>Diagnosa</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($riwayat as $rm)
                        <tr>
                            <td>{{ \Carbon\Carbon::parse($rm->created_at)->format('d M Y') }}</td>
                            <td>
                                <strong>{{ $rm->pet->nama }}</strong><br>
                                <small class="text-muted">{{ $rm->pet->ras->nama_ras ?? '' }}</small>
                            </td>
                            <td>{{ $rm->dokter->user->nama ?? '-' }}</td>
                            <td>
                                <span class="badge bg-secondary text-wrap" style="max-width: 200px;">
                                    {{ Str::limit($rm->diagnosa, 50) }}
                                </span>
                            </td>
                            <td class="text-center">
                            <div class="btn-group">
                                <a href="{{ route('perawat.rekam-medis.show', $rm->idrekam_medis) }}" class="btn btn-sm btn-info text-white">
                                    <i class="bi bi-eye"></i>
                                </a>

                                <a href="{{ route('perawat.rekam-medis.edit', $rm->idrekam_medis) }}" class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil"></i>
                                </a>
                            </div>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="5" class="text-center py-4">Data rekam medis tidak ditemukan.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection