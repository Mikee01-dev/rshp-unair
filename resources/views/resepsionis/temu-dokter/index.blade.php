@extends('layouts.lte.main')

@section('content')

{{-- HEADER INDEX (TITLE ATAS) --}}
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <h3 class="fw-bold mb-0">
                    <i class="bi bi-calendar-week text-primary me-2"></i>
                    Jadwal Temu Dokter
                </h3>
            </div>
            <div class="col-sm-6 text-end">
                <a href="{{ route('resepsionis.temu-dokter.create') }}" class="btn btn-primary">
                    <i class="bi bi-calendar-plus"></i> Buat Jadwal
                </a>
            </div>
        </div>
    </div>
</div>


{{-- CARD WRAPPER INDEX --}}
<div class="app-content">
    <div class="container-fluid">

        {{-- FILTER --}}
        <form method="GET" class="mb-3">
            <div class="input-group" style="max-width: 300px;">
                <span class="input-group-text">Tanggal</span>
                <input type="date" name="tanggal" class="form-control"
                       value="{{ $tanggal }}" onchange="this.form.submit()">
            </div>
        </form>


        {{-- CARD LIST --}}
        <div class="card card-primary card-outline shadow-sm">

            {{-- HEADER BIRU PERSIS SEPERTI CONTOH --}}
            <div class="card-header bg-primary text-white fw-bold">
                <i class="bi bi-list-ul me-2"></i> Daftar Temu Dokter
            </div>

            {{-- TABLE --}}
            <div class="card-body p-0">
                <table class="table table-hover table-striped align-middle mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th class="text-center" style="width:70px">No</th>
                            <th style="width:120px">Waktu</th>
                            <th>Pasien</th>
                            <th style="width:120px">Status</th>
                            <th class="text-center" style="width:100px">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($antrian as $item)
                        <tr>
                            <td class="text-center fw-bold fs-6 text-primary">{{ $item->no_urut }}</td>

                            <td>
                                <i class="bi bi-clock text-primary me-1"></i>
                                {{ \Carbon\Carbon::parse($item->waktu_daftar)->format('H:i') }}
                            </td>

                            <td>
                                <strong>{{ $item->pet->nama }}</strong><br>
                                <small class="text-muted">
                                    Owner: {{ $item->pet->pemilik->user->nama ?? '-' }}
                                </small>
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

                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="{{ route('resepsionis.temu-dokter.edit', $item->idreservasi_dokter) }}"
                                       class="btn btn-sm btn-outline-warning">
                                        <i class="bi bi-pencil"></i>
                                    </a>

                                    <form action="{{ route('resepsionis.temu-dokter.status', $item->idreservasi_dokter) }}"
                                          method="POST"
                                          onsubmit="return confirm('Batalkan jadwal ini?');">
                                        @csrf @method('PATCH')
                                        <input type="hidden" name="status" value="M">
                                        <button class="btn btn-sm btn-outline-danger">
                                            <i class="bi bi-x-lg"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>

                        @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-4">
                                <i class="bi bi-calendar-x fs-4 d-block mb-2"></i>
                                Tidak ada jadwal pada tanggal ini.
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
