@extends('layouts.lte.main')

@section('content')
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6"><h3>Jadwal Temu Dokter</h3></div>
            <div class="col-sm-6 text-end">
                <a href="{{ route('resepsionis.temu-dokter.create') }}" class="btn btn-primary">
                    <i class="bi bi-calendar-plus"></i> Buat Jadwal
                </a>
            </div>
        </div>
    </div>
</div>

<div class="app-content">
    <div class="container-fluid">
        
        <form method="GET" class="mb-3">
            <div class="input-group" style="width: 300px;">
                <span class="input-group-text">Tanggal</span>
                <input type="date" name="tanggal" class="form-control" value="{{ $tanggal }}" onchange="this.form.submit()">
            </div>
        </form>

        <div class="card card-outline card-success">
            <div class="card-body p-0">
                <table class="table table-striped align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th> <th>Waktu</th>
                            <th>Pasien</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($antrian as $item)
                        <tr>
                            <td class="text-center fw-bold fs-5">{{ $item->no_urut }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->waktu_daftar)->format('H:i') }}</td>
                            <td>
                                <strong>{{ $item->pet->nama }}</strong><br>
                                <small>Owner: {{ $item->pet->pemilik->user->nama ?? '-' }}</small>
                            </td>
                            <td>
                                @if($item->status == 'B') <span class="badge bg-warning text-dark">Menunggu</span>
                                @elseif($item->status == 'P') <span class="badge bg-info">Proses</span>
                                @elseif($item->status == 'S') <span class="badge bg-success">Selesai</span>
                                @else <span class="badge bg-danger">Batal</span> @endif
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('resepsionis.temu-dokter.edit', $item->idreservasi_dokter) }}" class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i></a>
                                    
                                    <form action="{{ route('resepsionis.temu-dokter.status', $item->idreservasi_dokter) }}" method="POST" onsubmit="return confirm('Batalkan jadwal ini?')">
                                        @csrf @method('PATCH')
                                        <input type="hidden" name="status" value="M">
                                        <button class="btn btn-sm btn-danger"><i class="bi bi-x-lg"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="5" class="text-center py-4">Tidak ada jadwal pada tanggal ini.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection