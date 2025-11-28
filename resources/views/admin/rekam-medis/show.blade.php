@extends('layouts.lte.main')

@section('content')
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <h3 class="mb-0 fw-bold">
                    <i class="bi bi-journal-medical text-primary me-2"></i>
                    Kelola Detail Rekam Medis #{{ $rm->idrekam_medis }}
                </h3>
            </div>
            <div class="col-sm-6 text-end">
                <a href="{{ route('rekam-medis.index') }}" class="btn btn-secondary shadow-sm">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
    </div>
</div>

<div class="app-content">
    <div class="container-fluid">

        {{-- Alert --}}
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm mt-2">
            <i class="bi bi-check-circle-fill me-1"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif

        <div class="row g-3">

            {{-- KOLom Kiri --}}
            <div class="col-md-4">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-primary text-white fw-bold">
                        <i class="bi bi-info-circle me-1"></i> Informasi Pasien
                    </div>
                    <div class="card-body">

                        <h5 class="fw-bold text-primary mb-1">
                            <i class="bi bi-shield-plus me-1"></i> {{ $rm->pet->nama }}
                        </h5>
                        <small class="text-muted">
                            <i class="bi bi-tags me-1"></i> {{ $rm->pet->ras->nama_ras }}
                        </small>

                        <hr>

                        <strong class="text-warning">Diagnosa Utama:</strong>
                        <p class="lead mb-2">{{ $rm->diagnosa }}</p>

                        <hr>

                        <strong>Anamnesa:</strong>
                        <p class="mb-3">{{ $rm->anamnesa ?? '-' }}</p>

                        <strong>Temuan Klinis:</strong>
                        <p class="mb-3">{{ $rm->temuan_klinis ?? '-' }}</p>

                        <hr>

                        <small class="fw-semibold">
                            <i class="bi bi-person-badge me-1 text-success"></i>
                            Dokter: {{ $rm->dokter->user->nama ?? '-' }}
                        </small>

                    </div>
                </div>
            </div>

            {{-- KOLom kanan --}}
            <div class="col-md-8">
                <div class="card shadow-sm border-0">

                    <div class="card-header bg-success text-white fw-bold">
                        <i class="bi bi-capsule me-1"></i> Daftar Obat & Tindakan
                    </div>

                    <div class="card-body p-0">

                        <table class="table table-hover table-striped mb-0 align-middle">
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
                                    <td class="fw-semibold">{{ $detail->tindakan->kode ?? '-' }}</td>
                                    <td>{{ $detail->tindakan->deskripsi_tindakan_terapi ?? '-' }}</td>
                                    <td>
                                        <span class="badge bg-info text-dark">
                                            {{ $detail->tindakan->kategori->nama_kategori ?? '-' }}
                                        </span>
                                    </td>
                                    <td>{{ $detail->detail }}</td>

                                    <td class="text-center">
                                        <div class="btn-group">
                                            <a href="{{ route('detail-rekam-medis.edit', $detail->iddetail_rekam_medis) }}"
                                               class="btn btn-sm btn-warning">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <form action="{{ route('detail-rekam-medis.destroy', $detail->iddetail_rekam_medis) }}"
                                                  method="POST"
                                                  onsubmit="return confirm('Hapus item ini?')">
                                                @csrf @method('DELETE')
                                                <button class="btn btn-sm btn-danger">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted py-3">
                                        <i class="bi bi-clipboard-x fs-3 d-block"></i>
                                        Belum ada obat atau tindakan.
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>

                    </div>

                    {{-- Tambah Item --}}
                    <div class="card-footer bg-light">
                        <h5 class="fw-bold mb-3">
                            <i class="bi bi-plus-circle text-success me-1"></i> Tambah Item Baru
                        </h5>

                        <form action="{{ route('detail-rekam-medis.store', $rm->idrekam_medis) }}"
                              method="POST"
                              class="row g-2">
                            @csrf

                            <div class="col-md-5">
                                <select name="idkode_tindakan_terapi" class="form-select select2 shadow-sm" required>
                                    <option value="">-- Pilih Obat / Tindakan --</option>
                                    @foreach($tindakan as $t)
                                    <option value="{{ $t->idkode_tindakan_terapi }}">
                                        {{ $t->kode }} - {{ $t->deskripsi_tindakan_terapi }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-5">
                                <input type="text" name="detail" class="form-control shadow-sm"
                                       placeholder="Dosis / Keterangan (misal: 3x1 Tablet)">
                            </div>

                            <div class="col-md-2">
                                <button type="submit" class="btn btn-success w-100 shadow-sm">
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
