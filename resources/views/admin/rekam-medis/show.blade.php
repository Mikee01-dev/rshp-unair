@extends('layouts.lte.main')

@section('content')
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Kelola Detail Rekam Medis #{{ $rm->idrekam_medis }}</h3>
            </div>
            <div class="col-sm-6 text-end">
                <a href="{{ route('rekam-medis.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>
</div>

<div class="app-content">
    <div class="container-fluid">
        
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="row">
            <div class="col-md-4">
                <div class="card card-primary card-outline">
                    <div class="card-body">
                        <strong class="text-primary">{{ $rm->pet->nama }}</strong> <br>
                        <small class="text-muted">{{ $rm->pet->ras->nama_ras }}</small>
                        <hr>
                        <strong>Diagnosa Utama:</strong>
                        <p class="lead">{{ $rm->diagnosa }}</p>
                        <hr>
                        <strong>Anamnesa:</strong> <br> {{ $rm->anamnesa ?? '-' }} <br><br>
                        <strong>Temuan Klinis:</strong> <br> {{ $rm->temuan_klinis ?? '-' }}
                        <hr>
                        <small>Dokter: {{ $rm->dokter->user->nama ?? '-' }}</small>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card card-outline card-success">
                    <div class="card-header">
                        <h3 class="card-title">Daftar Obat & Tindakan</h3>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-striped align-middle">
                            <thead class="table-dark">
                                <tr>
                                    <th>Kode</th>
                                    <th>Nama Tindakan</th>
                                    <th>Kategori</th>
                                    <th>Detail / Dosis</th>
                                    <th class="text-center" style="width: 120px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($rm->details as $detail)
                                <tr>
                                    <td>{{ $detail->tindakan->kode ?? '?' }}</td>
                                    <td>{{ $detail->tindakan->deskripsi_tindakan_terapi ?? '-' }}</td>
                                    <td>{{ $detail->tindakan->kategori->nama_kategori ?? '-' }}</td>
                                    <td>{{ $detail->detail }}</td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <a href="{{ route('detail-rekam-medis.edit', $detail->iddetail_rekam_medis) }}" class="btn btn-sm btn-warning">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <form action="{{ route('detail-rekam-medis.destroy', $detail->iddetail_rekam_medis) }}" method="POST" onsubmit="return confirm('Hapus item ini?')">
                                                @csrf @method('DELETE')
                                                <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr><td colspan="5" class="text-center text-muted">Belum ada obat/tindakan.</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="card-footer bg-light">
                        <h5 class="mb-3">Tambah Item Baru</h5>
                        <form action="{{ route('detail-rekam-medis.store', $rm->idrekam_medis) }}" method="POST" class="row g-2">
                            @csrf
                            <div class="col-md-5">
                                <select name="idkode_tindakan_terapi" class="form-select select2" required>
                                    <option value="">-- Pilih Obat / Tindakan --</option>
                                    @foreach($tindakan as $t)
                                        <option value="{{ $t->idkode_tindakan_terapi }}">
                                            {{ $t->kode }} - {{ $t->deskripsi_tindakan_terapi }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-5">
                                <input type="text" name="detail" class="form-control" placeholder="Dosis / Keterangan (Cth: 3x1 Tablet)">
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-success w-100">
                                    <i class="bi bi-plus-lg"></i> Tambah
                                </button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection