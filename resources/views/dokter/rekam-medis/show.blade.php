@extends('layouts.lte.main')

@section('content')
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6"><h3>Detail Rekam Medis</h3></div>
            <div class="col-sm-6 text-end">
                
                <a href="{{ route('dokter.periksa.edit', $rm->idrekam_medis) }}" class="btn btn-warning me-2">
                    <i class="bi bi-pencil-square"></i> Revisi / Edit
                </a>

                <a href="{{ route('dokter.rekam-medis.index') }}" class="btn btn-secondary">Kembali</a>
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
                        <strong class="text-primary">{{ $rm->pet->nama }}</strong> <br>
                        <small>{{ $rm->pet->ras->nama_ras }}</small>
                        <hr>
                        <strong>Pemilik:</strong> {{ $rm->pet->pemilik->user->nama ?? '-' }} <br>
                        <strong>Tanggal Periksa:</strong> {{ $rm->created_at->format('d M Y') }} <br>
                        <strong>Dokter:</strong> {{ $rm->dokter->user->nama ?? '-' }}
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card card-success card-outline mb-3">
                    <div class="card-header"><strong>Hasil Diagnosa</strong></div>
                    <div class="card-body">
                        <strong>Anamnesa:</strong> <br> {{ $rm->anamnesa }} <hr>
                        <strong>Temuan Klinis:</strong> <br> {{ $rm->temuan_klinis }} <hr>
                        <strong>Diagnosa:</strong> <br> <h5 class="text-danger">{{ $rm->diagnosa }}</h5>
                    </div>
                </div>
                <div class="card card-warning card-outline">
                    <div class="card-header"><strong>Obat & Tindakan</strong></div>
                    <div class="card-body p-0">
                        <table class="table table-sm table-striped">
                            <thead><tr><th>Tindakan</th><th>Dosis</th></tr></thead>
                            <tbody>
                                @foreach($rm->details as $detail)
                                <tr>
                                    <td>{{ $detail->tindakan->deskripsi_tindakan_terapi }}</td>
                                    <td>{{ $detail->detail }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection