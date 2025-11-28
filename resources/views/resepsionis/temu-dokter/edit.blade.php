@extends('layouts.lte.main')

@section('content')
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Edit Jadwal Temu Dokter</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="{{ route('resepsionis.temu-dokter.index') }}">Kembali</a></li>
                    <li class="breadcrumb-item active">Edit Jadwal</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="app-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card card-warning card-outline">
                    <div class="card-header">
                        <h5 class="card-title">Form Perubahan Data</h5>
                    </div>
                    
                    <form action="{{ route('resepsionis.temu-dokter.update', $temu->idreservasi_dokter) }}" method="POST">
                        @csrf
                        @method('PUT') <div class="card-body">
                            
                            <div class="mb-3">
                                <label class="form-label">Pasien Hewan</label>
                                <select name="idpet" class="form-select select2" required>
                                    <option value="">-- Pilih Pasien --</option>
                                    @foreach($pets as $pet)
                                        <option value="{{ $pet->idpet }}" 
                                            {{ $temu->idpet == $pet->idpet ? 'selected' : '' }}>
                                            
                                            {{ $pet->nama }} ({{ $pet->pemilik->user->nama ?? 'No Owner' }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Rencana Waktu Datang</label>
                                <input type="datetime-local" name="waktu_daftar" class="form-control" 
                                       value="{{ date('Y-m-d\TH:i', strtotime($temu->waktu_daftar)) }}" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Status Kehadiran</label>
                                <select name="status" class="form-select">
                                    <option value="B" {{ $temu->status == 'B' ? 'selected' : '' }}>Menunggu (Belum)</option>
                                    <option value="P" {{ $temu->status == 'P' ? 'selected' : '' }}>Sedang Diperiksa</option>
                                    <option value="S" {{ $temu->status == 'S' ? 'selected' : '' }}>Selesai</option>
                                    <option value="M" {{ $temu->status == 'M' ? 'selected' : '' }}>Batal / Missed</option>
                                </select>
                            </div>

                        </div>

                        <div class="card-footer d-flex justify-content-between">
                            <a href="{{ route('resepsionis.temu-dokter.index') }}" class="btn btn-secondary">Batal</a>
                            <button type="submit" class="btn btn-warning">
                                <i class="bi bi-save"></i> Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection