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
                <form action="{{ route('dokter.rekam-medis.index') }}" method="GET">
                    <div class="input-group" style="width: 300px;">
                        <input type="text" name="search" class="form-control" placeholder="Cari Nama Hewan..." value="{{ request('search') }}">
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
                        @forelse($riwayat as $item)
                        <tr>
                            <td>{{ $item->created_at->format('d M Y') }}</td>
                            <td>
                                <strong>{{ $item->pet->nama }}</strong><br>
                                <small class="text-muted">{{ $item->pet->ras->nama_ras ?? '' }}</small>
                            </td>
                            <td>{{ $item->dokter->user->nama ?? '-' }}</td>
                            <td>{{ Str::limit($item->diagnosa, 40) }}</td>
                            <td class="text-center">
                                <a href="{{ route('dokter.rekam-medis.show', $item->idrekam_medis) }}" class="btn btn-info btn-sm text-white">
                                    <i class="bi bi-eye"></i> Detail
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="5" class="text-center py-4">Data tidak ditemukan.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection