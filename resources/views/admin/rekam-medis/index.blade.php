@extends('layouts.lte.main')

@section('content')
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6"><h3 class="mb-0">Data Rekam Medis (Header)</h3></div>
            <div class="col-sm-6 text-end">
                <a href="{{ route('rekam-medis.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-lg"></i> Buat Rekam Medis Baru
                </a>
            </div>
        </div>
    </div>
</div>

<div class="app-content">
    <div class="container-fluid">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card card-outline card-primary">
            <div class="card-body p-0">
                <table class="table table-striped table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
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
                            <td>#{{ $rm->idrekam_medis }}</td>
                            <td>{{ \Carbon\Carbon::parse($rm->created_at)->format('d M Y') }}</td>
                            <td>
                                <strong>{{ $rm->pet->nama }}</strong><br>
                                <small class="text-muted">{{ $rm->pet->pemilik->user->nama ?? '-' }}</small>
                            </td>
                            <td>{{ $rm->dokter->user->nama ?? '-' }}</td>
                            <td>
                                <span class="badge bg-info text-dark">{{ Str::limit($rm->diagnosa, 30) }}</span>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('rekam-medis.show', $rm->idrekam_medis) }}" class="btn btn-sm btn-info" title="Kelola Obat/Tindakan">
                                    <i class="bi bi-list-check"></i> Detail
                                </a>

                                <a href="{{ route('rekam-medis.edit', $rm->idrekam_medis) }}" class="btn btn-sm btn-warning" title="Edit Diagnosa">
                                    <i class="bi bi-pencil"></i>
                                </a>

                                <form action="{{ route('rekam-medis.destroy', $rm->idrekam_medis) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus rekam medis ini?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="6" class="text-center py-4">Belum ada data rekam medis.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection