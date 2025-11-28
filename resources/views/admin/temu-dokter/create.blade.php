@extends('layouts.lte.main')

@section('content')
<div class="app-content-header">
    <div class="container-fluid">
        <h3 class="fw-bold mb-0">
            <i class="bi bi-calendar-plus text-primary me-2"></i>
            Tambah Temu Dokter
        </h3>
    </div>
</div>

<div class="app-content">
    <div class="container-fluid">

        <div class="card shadow-sm border-0 mt-3">
            <div class="card-header bg-primary text-white fw-bold">
                <i class="bi bi-journal-medical me-2"></i> Form Input Temu Dokter
            </div>

            <form action="{{ route('temu-dokter.store') }}" method="POST">
                @csrf

                <div class="card-body">

                    {{-- PILIH PASIEN --}}
                    <div class="mb-3">
                        <label class="form-label fw-semibold">
                            <i class="bi bi-shield-plus text-primary me-1"></i> Pilih Pasien
                        </label>
                        <select name="idpet" class="form-select select2 shadow-sm" required>
                            <option value="">-- Pilih Hewan --</option>
                            @foreach($pets as $pet)
                                <option value="{{ $pet->idpet }}">
                                    {{ $pet->nama }} ({{ $pet->ras->nama_ras }}) - Owner: {{ $pet->pemilik->user->nama ?? '-' }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- WAKTU --}}
                    <div class="mb-3">
                        <label class="form-label fw-semibold">
                            <i class="bi bi-clock-history text-primary me-1"></i> Waktu Rencana Datang
                        </label>
                        <input type="datetime-local"
                               name="waktu_daftar"
                               class="form-control shadow-sm"
                               value="{{ date('Y-m-d\TH:i') }}"
                               required>
                    </div>

                    {{-- STATUS --}}
                    <div class="mb-3">
                        <label class="form-label fw-semibold">
                            <i class="bi bi-info-circle text-primary me-1"></i> Status Awal
                        </label>
                        <select name="status" class="form-select shadow-sm">
                            <option value="B">Menunggu (Belum)</option>
                            <option value="P">Sedang Diperiksa</option>
                            <option value="S">Selesai</option>
                        </select>
                    </div>

                </div>

                <div class="card-footer bg-light text-end">
                    <a href="{{ route('temu-dokter.index') }}" class="btn btn-secondary shadow-sm">
                        <i class="bi bi-x-circle me-1"></i> Batal
                    </a>
                    <button type="submit" class="btn btn-primary shadow-sm px-4">
                        <i class="bi bi-save me-1"></i> Simpan
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection
