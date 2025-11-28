@extends('layouts.lte.main')

@section('content')
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <h3 class="fw-bold mb-0">
                    <i class="bi bi-people-fill me-2 text-primary"></i>
                    Data Temu Dokter
                </h3>
            </div>
            <div class="col-sm-6 text-end">
                <a href="{{ route('temu-dokter.create') }}" class="btn btn-primary shadow-sm">
                    <i class="bi bi-plus-lg"></i> Tambah Data
                </a>
            </div>
        </div>
    </div>
</div>

<div class="app-content">
    <div class="container-fluid">

        @if(session('success'))
            <div class="alert alert-success shadow-sm alert-dismissible fade show mt-2">
                <i class="bi bi-check-circle-fill me-1"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="card shadow-sm border-0 mt-3">
            <div class="card-header bg-primary text-white fw-bold">
                <i class="bi bi-list-task me-2"></i> Daftar Antrian Temu Dokter
            </div>

            <div class="card-body p-0">
                <table class="table table-hover table-striped align-middle mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th class="text-center" style="width: 80px">ID</th>
                            <th>Waktu Daftar</th>
                            <th>Pasien (Hewan)</th>
                            <th>Pemilik</th>
                            <th>Status</th>
                            <th class="text-center" style="width: 120px">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($antrian as $item)
                        <tr>
                            <td class="text-center fw-semibold text-primary">
                                #{{ $item->idreservasi_dokter }}
                            </td>

                            <td>
                                <i class="bi bi-calendar-event text-primary me-1"></i>
                                {{ \Carbon\Carbon::parse($item->waktu_daftar)->format('d M Y') }}<br>
                                <small class="text-muted">
                                    <i class="bi bi-clock me-1"></i>
                                    {{ \Carbon\Carbon::parse($item->waktu_daftar)->format('H:i') }} WIB
                                </small>
                            </td>

                            <td>
                                <strong class="text-dark">{{ $item->pet->nama }}</strong><br>
                                <span class="badge bg-secondary">{{ $item->pet->ras->nama_ras ?? '-' }}</span>
                            </td>

                            <td>
                                <i class="bi bi-person-circle me-1 text-info"></i>
                                {{ $item->pet->pemilik->user->nama ?? '-' }}
                            </td>

                            <td>
                                @if($item->status == 'B')
                                    <span class="badge bg-warning text-dark"><i class="bi bi-hourglass-split me-1"></i>Menunggu</span>
                                @elseif($item->status == 'P')
                                    <span class="badge bg-info text-dark"><i class="bi bi-gear me-1"></i>Proses</span>
                                @elseif($item->status == 'S')
                                    <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i>Selesai</span>
                                @elseif($item->status == 'M')
                                    <span class="badge bg-danger"><i class="bi bi-x-circle me-1"></i>Batal</span>
                                @endif
                            </td>

                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="{{ route('temu-dokter.edit', $item->idreservasi_dokter) }}"
                                       class="btn btn-sm btn-outline-warning">
                                        <i class="bi bi-pencil"></i>
                                    </a>

                                    <form action="{{ route('temu-dokter.destroy', $item->idreservasi_dokter) }}"
                                          method="POST"
                                          onsubmit="return confirm('Yakin hapus data ID #{{ $item->idreservasi_dokter }}?')">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>

                        @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-4">
                                <i class="bi bi-clipboard-x fs-3 d-block"></i>
                                Tidak ada data temu dokter.
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
