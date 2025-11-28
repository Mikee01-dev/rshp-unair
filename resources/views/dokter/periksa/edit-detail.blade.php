@extends('layouts.lte.main')

@section('content')

{{-- HEADER NON-INDEX --}}
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row align-items-center">

            <div class="col-sm-6">
                <h3 class="fw-bold mb-0">Ruang Pemeriksaan</h3>
            </div>

            <div class="col-sm-6 text-end">
                <a href="{{ route('dokter.dashboard') }}" class="btn btn-secondary shadow-sm">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>

        </div>
    </div>
</div>


{{-- CONTENT --}}
<div class="app-content">
    <div class="container-fluid">

        @if(session('success'))
            <div class="alert alert-success shadow-sm">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger shadow-sm">{{ session('error') }}</div>
        @endif


        <div class="row g-3">

            {{-- SIDEBAR PASIEN --}}
            <div class="col-md-4">

                <div class="card card-primary card-outline shadow-sm mb-3">
                    <div class="card-body text-center">

                        <i class="bi bi-gitlab display-4 text-primary mb-2"></i>

                        <h3 class="fw-bold">{{ $rm->pet->nama }}</h3>
                        <p class="text-muted">{{ $rm->pet->ras->nama_ras }}</p>

                        <ul class="list-group list-group-unbordered text-start mt-3">
                            <li class="list-group-item">
                                <b>Pemilik</b>
                                <span class="float-end">{{ $rm->pet->pemilik->user->nama ?? '-' }}</span>
                            </li>
                            <li class="list-group-item">
                                <b>Gender</b>
                                <span class="float-end">{{ $rm->pet->jenis_kelamin == 'J' ? 'Jantan' : 'Betina' }}</span>
                            </li>
                            <li class="list-group-item">
                                <b>Warna</b>
                                <span class="float-end">{{ $rm->pet->warna_tanda }}</span>
                            </li>
                        </ul>

                    </div>
                </div>


                {{-- TRIAGE --}}
                <div class="card card-info card-outline shadow-sm mb-3">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Data Triage (Perawat)</h5>
                    </div>
                    <div class="card-body">
                        <strong><i class="bi bi-chat-left-text me-1"></i> Anamnesa</strong>
                        <p class="text-muted">{{ $rm->anamnesa }}</p>

                        <hr>

                        <strong><i class="bi bi-activity me-1"></i> Temuan Klinis</strong>
                        <p class="text-muted">{{ $rm->temuan_klinis }}</p>
                    </div>
                </div>


                {{-- SELESAI --}}
                <form action="{{ route('dokter.periksa.selesai', $rm->idrekam_medis) }}" method="POST">
                    @csrf
                    <button class="btn btn-success btn-lg w-100 fw-bold shadow-sm"
                            onclick="return confirm('Pastikan diagnosa & obat sudah lengkap. Selesaikan pemeriksaan?')">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        Selesai & Pulangkan
                    </button>
                </form>

            </div>



            {{-- MAIN AREA --}}
            <div class="col-md-8">

                {{-- DIAGNOSA --}}
                <div class="card card-warning card-outline shadow-sm mb-4">
                    <div class="card-header">
                        <h5 class="card-title mb-0">1. Diagnosa Dokter</h5>
                    </div>

                    <form action="{{ route('dokter.periksa.update-diagnosa', $rm->idrekam_medis) }}" method="POST">
                        @csrf @method('PUT')

                        <div class="card-body">

                            <div class="mb-3">
                                <label class="fw-bold text-danger">Diagnosa Utama (Wajib)</label>
                                <textarea name="diagnosa" rows="3"
                                          class="form-control @error('diagnosa') is-invalid @enderror"
                                          required>{{ $rm->diagnosa }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label>Catatan Tambahan (Opsional)</label>
                                <textarea name="anamnesa" rows="2" class="form-control">
                                    {{ $rm->anamnesa }}
                                </textarea>
                            </div>

                        </div>

                        <div class="card-footer text-end bg-light">
                            <button class="btn btn-warning shadow-sm">
                                <i class="bi bi-save me-1"></i> Simpan Diagnosa
                            </button>
                        </div>
                    </form>
                </div>



                {{-- OBAT & TINDAKAN --}}
                <div class="card card-primary card-outline shadow-sm">
                    <div class="card-header">
                        <h5 class="card-title mb-0">2. Resep Obat & Tindakan</h5>
                    </div>

                    <div class="card-body p-0">
                        <table class="table table-striped align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Nama Obat / Tindakan</th>
                                    <th>Keterangan</th>
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
                                        <form action="{{ route('dokter.periksa.destroy-detail', $detail->iddetail_rekam_medis) }}"
                                              method="POST">
                                            @csrf @method('DELETE')
                                            <button class="btn btn-danger btn-sm shadow-sm">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3" class="text-center text-muted py-3">
                                        Belum ada obat atau tindakan.
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{-- FORM TAMBAH --}}
                    <div class="card-footer bg-light">
                        <h6 class="fw-bold mb-2">Tambah Item:</h6>

                        <form action="{{ route('dokter.periksa.store-detail', $rm->idrekam_medis) }}"
                              method="POST" class="row g-2">
                            @csrf

                            <div class="col-md-5">
                                <select name="idkode_tindakan_terapi" class="form-select select2" required>
                                    <option value="">-- Pilih Tindakan/Obat --</option>
                                    @foreach($tindakan as $t)
                                        <option value="{{ $t->idkode_tindakan_terapi }}">
                                            {{ $t->kode }} - {{ $t->deskripsi_tindakan_terapi }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-5">
                                <input type="text" name="detail" class="form-control"
                                       placeholder="Dosis / Keterangan">
                            </div>

                            <div class="col-md-2">
                                <button class="btn btn-primary w-100 shadow-sm">
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
