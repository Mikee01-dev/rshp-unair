@extends('layouts.lte.main')

@section('content')
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6"><h3>Ruang Pemeriksaan</h3></div>
            <div class="col-sm-6 text-end">
                <a href="{{ route('dokter.dashboard') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>
</div>

<div class="app-content">
    <div class="container-fluid">
        
        @if(session('success')) <div class="alert alert-success">{{ session('success') }}</div> @endif
        @if(session('error')) <div class="alert alert-danger">{{ session('error') }}</div> @endif

        <div class="row">
            <div class="col-md-4">
                <div class="card card-primary card-outline mb-3">
                    <div class="card-body box-profile text-center">
                        <div class="text-center mb-2">
                            <i class="bi bi-gitlab display-4 text-primary"></i>
                        </div>
                        <h3 class="profile-username">{{ $rm->pet->nama }}</h3>
                        <p class="text-muted">{{ $rm->pet->ras->nama_ras }}</p>
                        <ul class="list-group list-group-unbordered mb-3 text-start">
                            <li class="list-group-item">
                                <b>Pemilik</b> <a class="float-end">{{ $rm->pet->pemilik->user->nama ?? '-' }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Gender</b> <a class="float-end">{{ $rm->pet->jenis_kelamin == 'J' ? 'Jantan' : 'Betina' }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Warna</b> <a class="float-end">{{ $rm->pet->warna_tanda }}</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="card card-info mb-3">
                    <div class="card-header"><h3 class="card-title">Data Triage (Perawat)</h3></div>
                    <div class="card-body">
                        <strong><i class="bi bi-chat-left-text me-1"></i> Anamnesa / Keluhan</strong>
                        <p class="text-muted">{{ $rm->anamnesa }}</p>
                        <hr>
                        <strong><i class="bi bi-activity me-1"></i> Tanda Vital / Fisik</strong>
                        <p class="text-muted">{{ $rm->temuan_klinis }}</p>
                    </div>
                </div>

                <form action="{{ route('dokter.periksa.selesai', $rm->idrekam_medis) }}" method="POST">
                    @csrf
                    <button class="btn btn-success btn-lg w-100 py-3 fw-bold" onclick="return confirm('Pastikan Diagnosa dan Obat sudah terisi. Selesaikan pemeriksaan?')">
                        <i class="bi bi-check-circle-fill me-2"></i> SELESAI & PULANGKAN
                    </button>
                </form>
            </div>

            <div class="col-md-8">
                
                <div class="card card-warning card-outline mb-4">
                    <div class="card-header"><h5 class="card-title">1. Diagnosa Dokter</h5></div>
                    <form action="{{ route('dokter.periksa.update-diagnosa', $rm->idrekam_medis) }}" method="POST">
                        @csrf @method('PUT')
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="fw-bold text-danger">Diagnosa Utama (Wajib)</label>
                                <textarea name="diagnosa" class="form-control @error('diagnosa') is-invalid @enderror" rows="3" placeholder="Tulis diagnosa penyakit disini..." required>{{ $rm->diagnosa }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label>Catatan Tambahan (Opsional)</label>
                                <textarea name="anamnesa" class="form-control" rows="2" placeholder="Update anamnesa jika perlu...">{{ $rm->anamnesa }}</textarea>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <button class="btn btn-warning btn-sm"><i class="bi bi-save"></i> Simpan Diagnosa</button>
                        </div>
                    </form>
                </div>

                <div class="card card-success card-outline">
                    <div class="card-header"><h5 class="card-title">2. Resep Obat & Tindakan</h5></div>
                        <div class="card-body p-0">
                            <table class="table table-striped align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>Nama Obat / Tindakan</th>
                                        <th>Dosis / Keterangan</th>
                                        <th class="text-center" width="10%">Hapus</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($rm->details as $detail)
                                    <tr>
                                        <td>
                                            <span class="fw-bold">{{ $detail->tindakan->kode ?? '?' }}</span> - 
                                            {{ $detail->tindakan->deskripsi_tindakan_terapi ?? '-' }}
                                        </td>
                                        <td>{{ $detail->detail }}</td>
                                        <td class="text-center">
                                            <form action="{{ route('dokter.periksa.destroy-detail', $detail->iddetail_rekam_medis) }}" method="POST">
                                                @csrf @method('DELETE')
                                                <button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr><td colspan="3" class="text-center text-muted py-3">Belum ada obat/tindakan yang diberikan.</td></tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                    <div class="card-footer bg-light">
                        <h6 class="mb-2 fw-bold">Tambah Item:</h6>
                        <form action="{{ route('dokter.periksa.store-detail', $rm->idrekam_medis) }}" method="POST" class="row g-2">
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
                                <input type="text" name="detail" class="form-control" placeholder="Dosis (Cth: 3x1 Tablet)">
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-primary w-100"><i class="bi bi-plus-lg"></i> Tambah</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection