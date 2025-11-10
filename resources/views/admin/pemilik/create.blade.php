@extends('layouts.lte.main')

@section('content')
<div class="container">
    <link rel="stylesheet" href="{{ asset('css/page.css') }}">
    <div class="row justify-content-center mt-3">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Pemilik</div>
                    <div class="card-body">
                            <form action="{{ route('pemilik.store') }}" method="POST" class="form-container">
                            @csrf

                            <div class="form-group mb-3">
                                <label for="nama">Nama Lengkap</label>
                                <input class="form-control" type="text" name="nama" id="nama" value="{{ old('nama') }}" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="email">Alamat Email</label>
                                <input class="form-control" type="email" name="email" id="email" value="{{ old('email') }}" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="password">Kata Sandi</label>
                                <input class="form-control" type="password" name="password" id="password" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="no_wa">Nomor WhatsApp</label>
                                <input class="form-control" type="text" name="no_wa" id="no_wa" value="{{ old('no_wa') }}" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="alamat">Alamat Lengkap</label>
                                <textarea class="form-control" name="alamat" id="alamat" rows="3" required>{{ old('alamat') }}</textarea>
                            </div>

                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{ route('pemilik.index') }}" class="btn btn-secondary">Batal</a>
                            </div>
                        </form>
                    </div>
                 </div>
            </div>   
        </div>
</div>
@endsection
