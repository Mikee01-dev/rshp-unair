@extends('layouts.lte.main')

@section('content')
<div class="app-content-header">
    <div class="container-fluid"><h3>Registrasi Pemilik Baru</h3></div>
</div>

<div class="app-content">
    <div class="container-fluid">
        <form action="{{ route('resepsionis.pemilik.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-primary card-outline">
                        <div class="card-header"><h5 class="card-title">Akun Login</h5></div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label>Nama Lengkap</label>
                                <input type="text" name="nama" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" required>
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
                                <input type="text" name="no_wa" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>Alamat</label>
                                <textarea name="alamat" class="form-control" rows="4" required></textarea>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <button class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection