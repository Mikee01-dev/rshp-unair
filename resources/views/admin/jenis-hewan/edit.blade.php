@extends('layouts.admin')

@section('title', 'Edit Jenis Hewan')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <h2 class="mb-4">Edit Jenis Hewan</h2>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card">
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
