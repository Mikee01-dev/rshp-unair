@extends('layouts.lte.main')

@section('content')

{{-- HEADER INDEX --}}
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row align-items-center">

            <div class="col-sm-6">
                <h3 class="fw-bold mb-0">
                    <i class="bi bi-calendar-event text-primary me-2"></i>
                    Jadwal Kunjungan
                </h3>
            </div>

            <div class="col-sm-6 text-end">
                {{-- Tidak ada tombol tambah di halaman ini --}}
            </div>

        </div>
    </div>
</div>

{{-- CONTENT --}}
<div class="app-content">
    <div class="container-fluid">

        <div class="card shadow-sm border-0 mt-3">

            <div class="card-header bg-primary text-white fw-bold py-3">
                <i class="bi bi-list-ul me-2"></i>
                Daftar Jadwal Kunjungan
            </div>

            <div class="card-body p-0">

                <table class="table table-striped table-hover align-middle mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th style="width: 180px;">Tanggal / Jam</th>
                            <th>Nama Hewan</th>
                            <th style="width: 150px;">Status</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($jadwal as $item)
                        <tr>
                            <td>
                                <i class="bi bi-clock me-1 text-primary"></i>
                                {{ \Carbon\Carbon::parse($item->waktu_daftar)->format('d M Y, H:i') }}
                            </td>

                            <td>
                                <strong class="text-primary">{{ $item->pet->nama }}</strong><br>
                                <small class="text-muted">{{ $item->pet->ras->nama_ras ?? '' }}</small>
                            </td>

                            <td>
                                @if($item->status == 'B')
                                    <span class="badge bg-warning text-dark">
                                        <i class="bi bi-hourglass-split me-1"></i> Menunggu
                                    </span>
                                @elseif($item->status == 'P')
                                    <span class="badge bg-info text-dark">
                                        <i class="bi bi-gear me-1"></i> Proses
                                    </span>
                                @elseif($item->status == 'S')
                                    <span class="badge bg-success">
                                        <i class="bi bi-check-circle me-1"></i> Selesai
                                    </span>
                                @else
                                    <span class="badge bg-danger">
                                        <i class="bi bi-x-circle me-1"></i> Batal
                                    </span>
                                @endif
                            </td>
                        </tr>

                        @empty
                        <tr>
                            <td colspan="3" class="text-center text-muted py-4">
                                <i class="bi bi-calendar-x fs-4 d-block mb-2"></i>
                                Belum ada riwayat kunjungan.
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
