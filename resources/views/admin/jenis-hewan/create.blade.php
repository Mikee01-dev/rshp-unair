@extends('layouts.lte.main')


@section('content')
<div class="container">
    <link rel="stylesheet" href="{{ asset('css/page.css') }}">
    <div class="row justify-content-center mt-3">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Jenis Hewan</div>
                <div class="card-body">
                    <form action="{{ route('jenis-hewan.store') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="nama_jenis_hewan">Nama Jenis Hewan</label>
                            <input type="text" 
                                   name="nama_jenis_hewan" 
                                   id="nama_jenis_hewan"
                                   class="form-control @error('nama_jenis_hewan') is-invalid @enderror"
                                   value="{{ old('nama_jenis_hewan') }}" 
                                   required>

                            @error('nama_jenis_hewan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mt-3 d-flex gap-2">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('jenis-hewan.index') }}" class="btn btn-secondary">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
