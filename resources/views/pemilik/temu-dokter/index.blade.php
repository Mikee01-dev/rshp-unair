@extends('layouts.pemilik')

@section('content')
<div class="container">
    <div class="card shadow-sm">
        <div class="card-header bg-success text-white">
            <h3 class="mb-0">Riwayat Temu Dokter</h3>
        </div>
        
        <div class="card-body">
            @if ($temuDokter->isEmpty())
                <div class="alert alert-warning text-center" role="alert">
                    Anda belum memiliki riwayat temu dokter untuk Pet Anda.
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered table-striped mt-3">
                        <thead>
                            <tr>
                                <th style="width: 15%;">Pet</th>
                                <th style="width: 15%;">Tanggal Daftar</th>
                                <th style="width: 10%;">Waktu</th>
                                <th style="width: 10%;">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($temuDokter as $temu)
                            <tr>
                                <td>{{ $temu->pet->nama ?? 'Pet Dihapus' }}</td>
                                <td>{{ $temu->waktu_daftar ? \Carbon\Carbon::parse($temu->waktu_daftar)->format('d M Y') : 'N/A' }}</td>
                                <td>{{ $temu->waktu_daftar ? \Carbon\Carbon::parse($temu->waktu_daftar)->format('H:i') : 'N/A' }}</td>
                                <td>{{ ucfirst($temu->status) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
