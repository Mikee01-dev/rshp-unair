@extends('layouts.lte.main')

@section('content')
<div class="container">
    <link rel="stylesheet" href="{{ asset('css/page.css') }}">
    <div class="row justify-content-center mt-3">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Tindakan Terapi</div>
                <div class="card-body">
            <form action="{{ route('kode-tindakan-terapi.update', $kodeTindakanTerapi->idkode_tindakan_terapi) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group mb-3">
                    <label for="kode">Kode</label>
                    <input
                        type="text"
                        name="kode"
                        id="kode"
                        class="form-control @error('kode') is-invalid @enderror"
                        value="{{ old('kode', $kodeTindakanTerapi->kode) }}"
                        required
                    >
                    @error('kode')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="deskripsi_tindakan_terapi">Deskripsi Tindakan Terapi</label>
                    <textarea
                        name="deskripsi_tindakan_terapi"
                        id="deskripsi_tindakan_terapi"
                        class="form-control @error('deskripsi_tindakan_terapi') is-invalid @enderror"
                        rows="4"
                        required
                    >{{ old('deskripsi_tindakan_terapi', $kodeTindakanTerapi->deskripsi_tindakan_terapi) }}</textarea>
                    @error('deskripsi_tindakan_terapi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('kode-tindakan-terapi.index') }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
