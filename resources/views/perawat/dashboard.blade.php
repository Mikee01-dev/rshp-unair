@extends('layouts.lte.main')

@section('content')

{{-- HEADER INDEX --}}
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row align-items-center">

            <div class="col-sm-6">
                <h3 class="fw-bold mb-0">
                    <i class="bi bi-heart-pulse-fill text-info me-2"></i>
                    Dashboard Perawat (Triage)
                </h3>
            </div>

            <div class="col-sm-6 text-end">
                {{-- Tidak ada button di index ini --}}
            </div>

        </div>
    </div>
</div>


{{-- CONTENT --}}
<div class="app-content">
    <div class="container-fluid">

        {{-- SUCCESS MESSAGE --}}
        @if(session('success'))
            <div class="alert alert-success shadow-sm mt-2">
                <i class="bi bi-check-circle-fill me-1"></i>
                {{ session('success') }}
            </div>
        @endif

        {{-- CARD TABLE --}}
        <div class="card shadow-sm border-0 mt-3">
            <div class="card-header bg-info text-white fw-bold">
                <i class="bi bi-people-fill me-2"></i>
                Antrian Menunggu Pemeriksaan Awal
            </div>

            <div class="card-body p-0">
                <table class="table table-hover table-striped align-middle mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th class="text-center" style="width:100px">No. Urut</th>
                            <th style="width:120px">Jam</th>
                            <th>Pasien</th>
                            <th>Pemilik</th>
                            <th class="text-center" style="width:180px">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($antrian as $item)
                        <tr>
                            {{-- NOMOR --}}
                            <td class="text-center fw-bold fs-4 text-primary">
                                {{ $item->no_urut }}
                            </td>

                            {{-- JAM --}}
                            <td>
                                <i class="bi bi-clock text-primary me-1"></i>
                                {{ \Carbon\Carbon::parse($item->waktu_daftar)->format('H:i') }}
                            </td>

                            {{-- PASIEN --}}
                            <td>
                                <strong>{{ $item->pet->nama }}</strong><br>
                                <small class="text-muted">
                                    {{ $item->pet->ras->nama_ras }}
                                </small>
                            </td>

                            {{-- PEMILIK --}}
                            <td>
                                <i class="bi bi-person me-1 text-info"></i>
                                {{ $item->pet->pemilik->user->nama ?? '-' }}
                            </td>

                            {{-- AKSI --}}
                            <td class="text-center">
                                <a href="{{ route('perawat.triage.create', $item->idreservasi_dokter) }}" 
                                   class="btn btn-info btn-sm shadow-sm">
                                    <i class="bi bi-clipboard-pulse me-1"></i>
                                    Proses Data Awal
                                </a>
                            </td>
                        </tr>

                        @empty
                        <tr>
                            <td colspan="5" class="text-center py-4 text-muted">
                                <i class="bi bi-clipboard-x fs-3 d-block"></i>
                                Tidak ada pasien menunggu.
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
