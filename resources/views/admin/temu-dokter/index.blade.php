@extends('layouts.lte.main')

@section('content')
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6"><h3 class="mb-0">Data Temu Dokter</h3></div>
            <div class="col-sm-6 text-end">
                <a href="{{ route('temu-dokter.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-lg"></i> Tambah Data
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
                            <th style="width: 80px" class="text-center">ID</th>
                            <th>Waktu Daftar</th>
                            <th>Pasien (Hewan)</th>
                            <th>Pemilik</th>
                            <th>Status</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($antrian as $item)
                        <tr>
                            <td class="text-center fw-bold">#{{ $item->idreservasi_dokter }}</td>
                            
                            <td>
                                {{ \Carbon\Carbon::parse($item->waktu_daftar)->format('d M Y') }} <br>
                                <small class="text-muted">{{ \Carbon\Carbon::parse($item->waktu_daftar)->format('H:i') }} WIB</small>
                            </td>
                            <td>
                                <strong>{{ $item->pet->nama }}</strong><br>
                                <span class="badge bg-secondary">{{ $item->pet->ras->nama_ras ?? '-' }}</span>
                            </td>
                            <td>{{ $item->pet->pemilik->user->nama ?? '-' }}</td>
                            <td>
                                @if($item->status == 'B') <span class="badge bg-warning text-dark">Menunggu</span>
                                @elseif($item->status == 'P') <span class="badge bg-info">Proses</span>
                                @elseif($item->status == 'S') <span class="badge bg-success">Selesai</span>
                                @elseif($item->status == 'M') <span class="badge bg-danger">Batal</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('temu-dokter.edit', $item->idreservasi_dokter) }}" class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('temu-dokter.destroy', $item->idreservasi_dokter) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus data ID #{{ $item->idreservasi_dokter }}?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="6" class="text-center py-4">Tidak ada data temu dokter.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection