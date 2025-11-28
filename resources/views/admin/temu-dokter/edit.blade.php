@extends('layouts.lte.main')

@section('content')
<div class="app-content-header">
    <div class="container-fluid">
        <h3 class="fw-bold mb-0">
            <i class="bi bi-pencil-square text-warning me-2"></i>
            Edit Temu Dokter #{{ $temu->idreservasi_dokter }}
        </h3>
    </div>
</div>

<div class="app-content">
    <div class="container-fluid">

        <div class="card shadow-sm border-0 mt-3">
            <div class="card-header bg-warning text-white fw-bold">
                <i class="bi bi-calendar-check me-2"></i> Form Edit Temu Dokter
            </div>

            <form action="{{ route('temu-dokter.update', $temu->idreservasi_dokter) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="card-body">

                    {{-- PASIEN --}}
                    <div class="mb-3">
                        <label class="form-label fw-semibold">
                            <i class="bi bi-shield-plus text-warning me-1"></i> Pasien
                        </label>
                        <select name="idpet" class="form-select shadow-sm" required>
                            @foreach($pets as $pet)
                                <option value="{{ $pet->idpet }}" {{ $temu->idpet == $pet->idpet ? 'selected' : '' }}>
                                    {{ $pet->nama }} ({{ $pet->pemilik->user->nama ?? '-' }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- WAKTU --}}
                    <div class="mb-3">
                        <label class="form-label fw-semibold">
                            <i class="bi bi-clock-history text-warning me-1"></i> Waktu Daftar
                        </label>
                        <input type="datetime-local"
                               name="waktu_daftar"
                               class="form-control shadow-sm"
                               value="{{ date('Y-m-d\TH:i', strtotime($temu->waktu_daftar)) }}"
                               required>
                    </div>

                    {{-- STATUS --}}
                    <div class="mb-3">
                        <label class="form-label fw-semibold">
                            <i class="bi bi-info-circle text-warning me-1"></i> Status
                        </label>
                        <select name="status" class="form-select shadow-sm">
                            <option value="B" {{ $temu->status == 'B' ? 'selected' : '' }}>Menunggu</option>
                            <option value="P" {{ $temu->status == 'P' ? 'selected' : '' }}>Proses</option>
                            <option value="S" {{ $temu->status == 'S' ? 'selected' : '' }}>Selesai</option>
                            <option value="M" {{ $temu->status == 'M' ? 'selected' : '' }}>Batal</option>
                        </select>
                    </div>

                </div>

                <div class="card-footer bg-light text-end">
                    <a href="{{ route('temu-dokter.index') }}" class="btn btn-secondary shadow-sm">
                        <i class="bi bi-x-circle me-1"></i> Batal
                    </a>
                    <button type="submit" class="btn btn-warning shadow-sm px-4">
                        <i class="bi bi-save me-1"></i> Update
                    </button>
                </div>

            </form>
        </div>

    </div>
</div>
@endsection
