@extends('layouts.lte.main')

@section('content')
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6"><h3>Edit Data Pemilik</h3></div>
            <div class="col-sm-6 text-end">
                <a href="{{ route('resepsionis.pemilik.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>
</div>

<div class="app-content">
    <div class="container-fluid">
        <form action="{{ route('resepsionis.pemilik.update', $pemilik->idpemilik) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6">
                    <div class="card card-warning card-outline">
                        <div class="card-header"><h5 class="card-title">Info Akun Login</h5></div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label>Nama Lengkap</label>
                                <input type="text" name="nama" class="form-control" value="{{ $pemilik->user->nama }}" required>
                            </div>
                            <div class="mb-3">
                                <label>Email (Username)</label>
                                <input type="email" name="email" class="form-control" value="{{ $pemilik->user->email }}" required>
                            </div>
                            <div class="mb-3">
                                <label>Password Baru</label>
                                <input type="password" name="password" class="form-control" placeholder="Biarkan kosong jika tidak ganti password">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card card-info card-outline">
                        <div class="card-header"><h5 class="card-title">Data Kontak</h5></div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label>No. WhatsApp</label>
                                <input type="text" name="no_wa" class="form-control" value="{{ $pemilik->no_wa }}" required>
                            </div>
                            <div class="mb-3">
                                <label>Alamat Domisili</label>
                                <textarea name="alamat" class="form-control" rows="4" required>{{ $pemilik->alamat }}</textarea>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <button type="submit" class="btn btn-warning">Simpan Perubahan</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection