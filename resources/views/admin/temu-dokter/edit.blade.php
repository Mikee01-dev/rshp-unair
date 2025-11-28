@extends('layouts.lte.main')

@section('content')
<div class="app-content-header">
    <div class="container-fluid">
        <h3>Edit Temu Dokter #{{ $temu->idreservasi_dokter }}</h3>
    </div>
</div>

<div class="app-content">
    <div class="container-fluid">
        <div class="card card-warning card-outline">
            <form action="{{ route('temu-dokter.update', $temu->idreservasi_dokter) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="card-body">
                    
                    <div class="mb-3">
                        <label>Pasien</label>
                        <select name="idpet" class="form-select" required>
                            @foreach($pets as $pet)
                                <option value="{{ $pet->idpet }}" {{ $temu->idpet == $pet->idpet ? 'selected' : '' }}>
                                    {{ $pet->nama }} ({{ $pet->pemilik->user->nama ?? '-' }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>Waktu Daftar</label>
                        <input type="datetime-local" name="waktu_daftar" class="form-control" 
                               value="{{ date('Y-m-d\TH:i', strtotime($temu->waktu_daftar)) }}" required>
                    </div>

                    <div class="mb-3">
                        <label>Status</label>
                        <select name="status" class="form-select">
                            <option value="B" {{ $temu->status == 'B' ? 'selected' : '' }}>Menunggu</option>
                            <option value="P" {{ $temu->status == 'P' ? 'selected' : '' }}>Proses</option>
                            <option value="S" {{ $temu->status == 'S' ? 'selected' : '' }}>Selesai</option>
                            <option value="M" {{ $temu->status == 'M' ? 'selected' : '' }}>Batal</option>
                        </select>
                    </div>

                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-warning">Update</button>
                    <a href="{{ route('temu-dokter.index') }}" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection