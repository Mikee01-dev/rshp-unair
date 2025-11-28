@extends('layouts.lte.main')

@section('content')
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6"><h3 class="mb-0">Dashboard Perawat (Triage)</h3></div>
        </div>
    </div>
</div>

<div class="app-content">
    <div class="container-fluid">
        
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">Antrian Menunggu Pemeriksaan Awal</h3>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped align-middle">
                    <thead class="table-light">
                        <tr>
                            <th class="text-center">No. Urut</th>
                            <th>Jam</th>
                            <th>Pasien</th>
                            <th>Pemilik</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($antrian as $item)
                        <tr>
                            <td class="text-center"><h3 class="fw-bold m-0">{{ $item->no_urut }}</h3></td>
                            <td>{{ \Carbon\Carbon::parse($item->waktu_daftar)->format('H:i') }}</td>
                            <td>
                                <strong>{{ $item->pet->nama }}</strong><br>
                                <small>{{ $item->pet->ras->nama_ras }}</small>
                            </td>
                            <td>{{ $item->pet->pemilik->user->nama ?? '-' }}</td>
                            <td class="text-center">
                                <a href="{{ route('perawat.triage.create', $item->idreservasi_dokter) }}" 
                                   class="btn btn-primary">
                                    <i class="bi bi-clipboard-pulse"></i> Proses Data Awal
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center py-5 text-muted">Tidak ada pasien menunggu.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection