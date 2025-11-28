@extends('layouts.lte.main')

@section('content')
<div class="app-content-header">
    <div class="container-fluid">
        <h3 class="mb-0">Halo, drh. {{ Auth::user()->nama }}</h3>
        <p class="text-muted">Berikut adalah pasien yang siap diperiksa hari ini.</p>
    </div>
</div>

<div class="app-content">
    <div class="container-fluid">
        
        @if(session('success')) 
            <div class="alert alert-success">{{ session('success') }}</div> 
        @endif

        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">Antrian Pasien (Siap Periksa)</h3>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th class="text-center">No. Urut</th>
                            <th>Jam Masuk</th>
                            <th>Pasien</th>
                            <th>Pemilik</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($antrian as $item)
                        <tr>
                            <td class="text-center"><h3 class="fw-bold m-0 text-primary">{{ $item->no_urut }}</h3></td>
                            <td>{{ \Carbon\Carbon::parse($item->waktu_daftar)->format('H:i') }}</td>
                            <td>
                                <strong>{{ $item->pet->nama }}</strong><br>
                                <small>{{ $item->pet->ras->nama_ras }}</small>
                            </td>
                            <td>{{ $item->pet->pemilik->user->nama ?? '-' }}</td>
                            <td class="text-center">
                                @if($item->rekamMedis)
                                    <a href="{{ route('dokter.periksa.edit', $item->rekamMedis->idrekam_medis) }}" 
                                       class="btn btn-success fw-bold">
                                        <i class="bi bi-stethoscope"></i> PERIKSA SEKARANG
                                    </a>
                                @else
                                    <button class="btn btn-secondary btn-sm" disabled>Menunggu Triage Perawat</button>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center py-5 text-muted">
                                <i class="bi bi-emoji-smile display-4"></i>
                                <p class="mt-2">Tidak ada pasien yang menunggu.</p>
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