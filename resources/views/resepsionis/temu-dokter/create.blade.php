@extends('layouts.lte.main')

@section('content')
<div class="app-content-header">
    <div class="container-fluid"><h3>Buat Jadwal Baru</h3></div>
</div>

<div class="app-content">
    <div class="container-fluid">
        <div class="card card-success card-outline col-md-6">
            <form action="{{ route('resepsionis.temu-dokter.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    
                    <div class="mb-3">
                        <label>Pilih Pasien</label>
                        <select name="idpet" class="form-select select2" required>
                            <option value="">-- Cari Pasien --</option>
                            @foreach($pets as $pet)
                                <option value="{{ $pet->idpet }}">
                                    {{ $pet->nama }} ({{ $pet->pemilik->user->nama ?? '-' }})
                                </option>
                            @endforeach
                        </select>
                        <div class="form-text">Pasien belum ada? <a href="{{ route('resepsionis.pet.create') }}">Daftar Baru</a></div>
                    </div>

                    <div class="mb-3">
                        <label>Rencana Datang</label>
                        <input type="datetime-local" name="waktu_daftar" class="form-control" value="{{ date('Y-m-d\TH:i') }}" required>
                    </div>

                </div>
                <div class="card-footer">
                    <button class="btn btn-success">Simpan Jadwal</button>
                    <a href="{{ route('resepsionis.temu-dokter.index') }}" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection