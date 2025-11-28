@extends('layouts.lte.main')
@section('content')
<div class="app-content-header"><div class="container-fluid"><h3>Riwayat Kesehatan</h3></div></div>
<div class="app-content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body p-0">
                <table class="table table-striped">
                    <thead><tr><th>Tanggal</th><th>Hewan</th><th>Diagnosa</th><th>Aksi</th></tr></thead>
                    <tbody>
                        @forelse($riwayat as $rm)
                        <tr>
                            <td>{{ $rm->created_at->format('d M Y') }}</td>
                            <td>{{ $rm->pet->nama }}</td>
                            <td>{{ Str::limit($rm->diagnosa, 40) }}</td>
                            <td>
                                <a href="{{ route('pemilik.rekam-medis.show', $rm->idrekam_medis) }}" class="btn btn-sm btn-primary"><i class="bi bi-eye"></i> Detail</a>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="4" class="text-center">Belum ada riwayat sakit.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection