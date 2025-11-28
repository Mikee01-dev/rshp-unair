@extends('layouts.lte.main')
@section('content')
<div class="app-content-header"><div class="container-fluid"><h3>Jadwal Kunjungan</h3></div></div>
<div class="app-content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body p-0">
                <table class="table table-striped">
                    <thead><tr><th>Tanggal/Jam</th><th>Hewan</th><th>Status</th></tr></thead>
                    <tbody>
                        @forelse($jadwal as $item)
                        <tr>
                            <td>{{ \Carbon\Carbon::parse($item->waktu_daftar)->format('d M Y, H:i') }}</td>
                            <td>{{ $item->pet->nama }}</td>
                            <td>
                                @if($item->status == 'B') <span class="badge bg-warning text-dark">Menunggu</span>
                                @elseif($item->status == 'P') <span class="badge bg-info">Sedang Diperiksa</span>
                                @elseif($item->status == 'S') <span class="badge bg-success">Selesai</span>
                                @else <span class="badge bg-danger">Batal</span> @endif
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="3" class="text-center">Belum ada riwayat kunjungan.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection