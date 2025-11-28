@extends('layouts.lte.main')

@section('content')

{{-- HEADER --}}
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row align-items-center">

            <div class="col-sm-6">
                <h3 class="fw-bold mb-0">
                    <i class="bi bi-person-plus-fill me-2 text-primary"></i>
                    Tambah Pemilik Baru
                </h3>
            </div>

        </div>
    </div>
</div>


<div class="app-content">
    <div class="container-fluid">

        <div class="row justify-content-center mt-3">
            <div class="col-md-8">

                <div class="card shadow-sm border-0">

                    {{-- CARD HEADER --}}
                    <div class="card-header bg-primary text-white fw-bold py-3">
                        <i class="bi bi-person-plus me-2"></i>
                        Form Tambah Pemilik
                    </div>

                    <div class="card-body">

                        <form action="{{ route('pemilik.store') }}" method="POST">
                            @csrf

                            {{-- NAMA --}}
                            <div class="mb-3">
                                <label for="nama" class="fw-semibold">Nama Lengkap</label>
                                <input type="text"
                                       class="form-control shadow-sm"
                                       id="nama"
                                       name="nama"
                                       value="{{ old('nama') }}"
                                       required>
                            </div>

                            {{-- EMAIL --}}
                            <div class="mb-3">
                                <label for="email" class="fw-semibold">Alamat Email</label>
                                <input type="email"
                                       class="form-control shadow-sm"
                                       id="email"
                                       name="email"
                                       value="{{ old('email') }}"
                                       required>
                            </div>

                            {{-- PASSWORD --}}
                            <div class="mb-3">
                                <label for="password" class="fw-semibold">Kata Sandi</label>
                                <input type="password"
                                       class="form-control shadow-sm"
                                       id="password"
                                       name="password"
                                       required>
                            </div>

                            {{-- NOMOR WA --}}
                            <div class="mb-3">
                                <label for="no_wa" class="fw-semibold">Nomor WhatsApp</label>
                                <input type="text"
                                       class="form-control shadow-sm"
                                       id="no_wa"
                                       name="no_wa"
                                       value="{{ old('no_wa') }}"
                                       required>
                            </div>

                            {{-- ALAMAT --}}
                            <div class="mb-3">
                                <label for="alamat" class="fw-semibold">Alamat Lengkap</label>
                                <textarea class="form-control shadow-sm"
                                          id="alamat"
                                          name="alamat"
                                          rows="3"
                                          required>{{ old('alamat') }}</textarea>
                            </div>

                            {{-- BUTTON --}}
                            <div class="text-end mt-4">
                                <a href="{{ route('pemilik.index') }}" class="btn btn-secondary shadow-sm px-4 me-2">
                                    <i class="bi bi-x-circle me-1"></i>
                                    Batal
                                </a>

                                <button type="submit" class="btn btn-primary shadow-sm px-4">
                                    <i class="bi bi-save me-1"></i>
                                    Simpan Data Pemilik
                                </button>
                            </div>

                        </form>

                    </div>

                </div>

            </div>
        </div>

    </div>
</div>

@endsection
