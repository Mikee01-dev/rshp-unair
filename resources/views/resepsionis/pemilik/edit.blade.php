@extends('layouts.lte.main')

@section('content')

{{-- HEADER NON-INDEX --}}
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row align-items-center">

            <div class="col-sm-6">
                <h3 class="fw-bold mb-0">
                    <i class="bi bi-person-gear me-2 text-warning"></i>
                    Edit Data Pemilik
                </h3>
            </div>

            <div class="col-sm-6 text-end">
                <a href="{{ route('resepsionis.pemilik.index') }}" class="btn btn-secondary shadow-sm">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>

        </div>
    </div>
</div>

{{-- CONTENT --}}
<div class="app-content">
    <div class="container-fluid">

        <form action="{{ route('resepsionis.pemilik.update', $pemilik->idpemilik) }}" method="POST" class="mt-3">
            @csrf
            @method('PUT')

            <div class="row g-3">

                {{-- KOLOM KIRI --}}
                <div class="col-md-6">
                    <div class="card shadow-sm border-0">
                        <div class="card-header bg-primary text-white fw-bold">
                            <i class="bi bi-person-lines-fill me-2"></i> Info Akun Login
                        </div>

                        <div class="card-body">

                            <div class="mb-3">
                                <label class="fw-semibold">Nama Lengkap</label>
                                <input type="text" name="nama" class="form-control shadow-sm"
                                       value="{{ $pemilik->user->nama }}" required>
                            </div>

                            <div class="mb-3">
                                <label class="fw-semibold">Email (Username)</label>
                                <input type="email" name="email" class="form-control shadow-sm"
                                       value="{{ $pemilik->user->email }}" required>
                            </div>

                            <div class="mb-3">
                                <label class="fw-semibold">Password Baru</label>
                                <input type="password" name="password" class="form-control shadow-sm"
                                       placeholder="Biarkan kosong jika tidak ganti password">
                            </div>

                        </div>
                    </div>
                </div>

                {{-- KOLOM KANAN --}}
                <div class="col-md-6">
                    <div class="card shadow-sm border-0">
                        <div class="card-header bg-info text-white fw-bold">
                            <i class="bi bi-telephone-plus me-2"></i> Data Kontak
                        </div>

                        <div class="card-body">

                            <div class="mb-3">
                                <label class="fw-semibold">No. WhatsApp</label>
                                <input type="text" name="no_wa" class="form-control shadow-sm"
                                       value="{{ $pemilik->no_wa }}" required>
                            </div>

                            <div class="mb-3">
                                <label class="fw-semibold">Alamat Domisili</label>
                                <textarea name="alamat" class="form-control shadow-sm" rows="4" required>{{ $pemilik->alamat }}</textarea>
                            </div>

                        </div>

                        <div class="card-footer bg-light text-end">
                            <button type="submit" class="btn btn-warning shadow-sm px-4">
                                <i class="bi bi-save me-1"></i> Simpan Perubahan
                            </button>
                        </div>

                    </div>
                </div>

            </div>

        </form>

    </div>
</div>

@endsection
