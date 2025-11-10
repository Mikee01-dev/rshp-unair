@extends('layouts.lte.main')

@section('title', 'Edit Jenis Hewan')

@section('content')
<div class="container">
    <link rel="stylesheet" href="{{ asset('css/page.css') }}">
        <div class="row justify-content-center mt-3">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Jenis Hewan</div>
                <div class="card-body">
                    <form action="{{ route('jenis-hewan.update', $jenisHewan->idjenis_hewan) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group mb-3">
                            <label for="nama_jenis_hewan">Nama Jenis Hewan</label>
                            <input
                                type="text"
                                id="nama_jenis_hewan"
                                name="nama_jenis_hewan"
                                class="form-control @error('nama_jenis_hewan') is-invalid @enderror"
                                value="{{ old('nama_jenis_hewan', $jenisHewan->nama_jenis_hewan) }}"
                                required
                            >
                            @error('nama_jenis_hewan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('jenis-hewan.index') }}" class="btn btn-secondary">Batal</a>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
