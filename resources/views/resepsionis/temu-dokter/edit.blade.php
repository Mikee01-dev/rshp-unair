@extends('layouts.lte.main')

@section('content')

{{-- HEADER (STANDAR HALAMAN EDIT) --}}
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row align-items-center">

            <div class="col-sm-6">
                <h3 class="fw-bold mb-0">
                    <i class="bi bi-pencil-square text-warning me-2"></i>
                    Edit Jadwal Temu Dokter
                </h3>
            </div>

            <div class="col-sm-6 text-end">
                <a href="{{ route('resepsionis.temu-dokter.index') }}" class="btn btn-secondary shadow-sm">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>

        </div>
    </div>
</div>



<div class="app-content">
    <div class="container-fluid">

        <div class="row justify-content-center">
            <div class="col-md-6">

                <div class="card card-warning card-outline shadow-sm border-0">

                    <div class="card-header bg-warning text-white fw-bold">
                        <i class="bi bi-clipboard-check me-2"></i> Form Perubahan Data
                    </div>

                    <form action="{{ route('resepsionis.temu-dokter.update', $temu->idreservasi_dokter) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="card-body">

                            {{-- PASIEN --}}
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Pasien Hewan</label>
                                <select name="idpet" class="form-select select2 shadow-sm" required>
                                    <option value="">-- Pilih Pasien --</option>

                                    @foreach($pets as $pet)
                                        <option value="{{ $pet->idpet }}" 
                                            {{ $temu->idpet == $pet->idpet ? 'selected' : '' }}>
                                            
                                            {{ $pet->nama }} ({{ $pet->pemilik->user->nama ?? 'No Owner' }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- WAKTU --}}
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Rencana Waktu Datang</label>
                                <input type="datetime-local" 
                                       name="waktu_daftar" 
                                       class="form-control shadow-sm"
                                       value="{{ date('Y-m-d\TH:i', strtotime($temu->waktu_daftar)) }}"
                                       required>
                            </div>

                            {{-- STATUS --}}
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Status Kehadiran</label>
                                <select name="status" class="form-select shadow-sm">
                                    <option value="B" {{ $temu->status == 'B' ? 'selected' : '' }}>Menunggu (Belum)</option>
                                    <option value="P" {{ $temu->status == 'P' ? 'selected' : '' }}>Sedang Diperiksa</option>
                                    <option value="S" {{ $temu->status == 'S' ? 'selected' : '' }}>Selesai</option>
                                    <option value="M" {{ $temu->status == 'M' ? 'selected' : '' }}>Batal / Missed</option>
                                </select>
                            </div>

                        </div>

                        <div class="card-footer bg-light text-end">
                            <button type="submit" class="btn btn-warning shadow-sm px-4">
                                <i class="bi bi-save me-1"></i> Simpan Perubahan
                            </button>
                        </div>

                    </form>

                </div>

            </div>
        </div>

    </div>
</div>

@endsection
