@extends('layouts.lte.main')

@section('content')
<div class="app-content-header">
    <div class="container-fluid">
        <h3>Tambah Temu Dokter</h3>
    </div>
</div>

<div class="app-content">
    <div class="container-fluid">
        <div class="card card-primary card-outline">
            <form action="{{ route('temu-dokter.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    
                    <div class="mb-3">
                        <label>Pilih Pasien</label>
                        <select name="idpet" class="form-select select2" required>
                            <option value="">-- Pilih Hewan --</option>
                            @foreach($pets as $pet)
                                <option value="{{ $pet->idpet }}">
                                    {{ $pet->nama }} ({{ $pet->ras->nama_ras }}) - Owner: {{ $pet->pemilik->user->nama ?? '-' }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>Waktu Rencana Datang</label>
                        <input type="datetime-local" name="waktu_daftar" class="form-control" value="{{ date('Y-m-d\TH:i') }}" required>
                    </div>

                    <div class="mb-3">
                        <label>Status Awal</label>
                        <select name="status" class="form-select">
                            <option value="B">Menunggu (Belum)</option>
                            <option value="P">Sedang Diperiksa</option>
                            <option value="S">Selesai</option>
                        </select>
                    </div>

                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('temu-dokter.index') }}" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection