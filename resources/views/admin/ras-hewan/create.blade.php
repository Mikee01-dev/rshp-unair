@extends('layouts.lte.main')

@section('content')
<div class="container">
    <link rel="stylesheet" href="{{ asset('css/page.css') }}">
    <div class="row justify-content-center mt-3">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Ras Hewan</div>
                <div class="card-body">
                    <form action="{{ route('ras-hewan.store') }}" method="POST">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="nama_ras">Nama Ras Hewan</label>
                            <input type="text" 
                                   id="nama_ras" 
                                   name="nama_ras" 
                                   class="form-control @error('nama_ras') is-invalid @enderror"
                                   value="{{ old('nama_ras') }}" required>
                            @error('nama_ras')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="idjenis_hewan">Jenis Hewan</label>
                            <select name="idjenis_hewan" id="idjenis_hewan" class="form-control" required>
                                <option value="">-- Pilih Jenis Hewan --</option>
                                @foreach ($jenisHewan as $jenis)
                                    <option value="{{ $jenis->idjenis_hewan }}" {{ old('idjenis_hewan') == $jenis->idjenis_hewan ? 'selected' : '' }}>
                                        {{ $jenis->nama_jenis_hewan }}
                                    </option>
                                @endforeach
                            </select>
                            @error('id_jenis_hewan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('ras-hewan.index') }}" class="btn btn-secondary">Batal</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
