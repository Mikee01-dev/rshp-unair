@extends('layouts.lte.main')

@section('content')
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6"><h3>Detail Rekam Medis</h3></div>
            <div class="col-sm-6 text-end">
                <a href="{{ route('perawat.dashboard') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>
</div>

<div class="app-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="card card-primary card-outline">
                    <div class="card-body">
                        <strong class="text-primary">{{ $rm->pet->nama }}</strong>
                        <p class="text-muted">{{ $rm->pet->ras->nama_ras }}</p>
                        <hr>
                        <strong>Pemilik:</strong> {{ $rm->pet->pemilik->user->nama ?? '-' }}
                        <hr>
                        <strong>Dokter:</strong> drh. {{ $rm->dokter->user->nama ?? '-' }}
                        <br>
                        <strong>Tanggal:</strong> {{ $rm->created_at->format('d M Y, H:i') }}
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card card-success card-outline mb-3">
                    <div class="card-header"><strong>Hasil Pemeriksaan</strong></div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <label class="text-muted">Anamnesa</label>
                                <p>{{ $rm->anamnesa }}</p>
                            </div>
                            <div class="col-6">
                                <label class="text-muted">Temuan Klinis</label>
                                <p>{{ $rm->temuan_klinis }}</p>
                            </div>
                        </div>
                        <hr>
                        <label class="text-muted">Diagnosa Dokter</label>
                        <h5 class="text-danger">{{ $rm->diagnosa }}</h5>
                    </div>
                </div>

                <div class="card card-warning card-outline">
                    <div class="card-header"><strong>Obat & Tindakan</strong></div>
                    <div class="card-body p-0">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Nama Tindakan/Obat</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($rm->details as $detail)
                                <tr>
                                    <td>{{ $detail->tindakan->deskripsi_tindakan_terapi ?? '-' }}</td>
                                    <td>{{ $detail->detail }}</td>
                                </tr>
                                @empty
                                <tr><td colspan="2" class="text-center">Belum ada tindakan.</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection