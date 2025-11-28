@extends('layouts.lte.main')

@section('title', 'Edit Pemilik')

@section('content')

{{-- HEADER --}}
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row align-items-center">

            <div class="col-sm-6">
                <h3 class="fw-bold mb-0">
                    <i class="bi bi-person-fill-gear me-2 text-warning"></i>
                    Edit Data Pemilik
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
                    <div class="card-header bg-warning text-dark fw-bold py-3">
                        <i class="bi bi-pencil-square me-2"></i>
                        Form Edit Pemilik
                    </div>

                    <div class="card-body">

                        {{-- ERROR ALERT --}}
                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show shadow-sm">
                                <strong>Terjadi kesalahan:</strong>
                                <ul class="mt-2 mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        <form action="{{ route('pemilik.update', $pemilik->idpemilik) }}" method="POST">
                            @csrf
                            @method('PUT')

                            {{-- NAMA --}}
                            <div class="mb-3">
                                <label for="nama" class="fw-semibold">Nama Lengkap</label>
                                <input type="text"
                                       name="nama"
                                       id="nama"
                                       class="form-control shadow-sm @error('nama') is-invalid @enderror"
                                       value="{{ old('nama', $pemilik->nama) }}"
                                       required>
                                @error('nama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- EMAIL --}}
                            <div class="mb-3">
                                <label for="email" class="fw-semibold">Email</label>
                                <input type="email"
                                       name="email"
                                       id="email"
                                       class="form-control shadow-sm @error('email') is-invalid @enderror"
                                       value="{{ old('email', $pemilik->user->email ?? '') }}"
                                       required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- PASSWORD --}}
                            <div class="mb-3">
                                <label for="password" class="fw-semibold">Password Baru (opsional)</label>
                                <input type="password"
                                       name="password"
                                       id="password"
                                       class="form-control shadow-sm @error('password') is-invalid @enderror"
                                       placeholder="Kosongkan jika tidak mengganti password">
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- ALAMAT --}}
                            <div class="mb-3">
                                <label for="alamat" class="fw-semibold">Alamat</label>
                                <textarea name="alamat"
                                          id="alamat"
                                          rows="3"
                                          class="form-control shadow-sm @error('alamat') is-invalid @enderror"
                                          required>{{ old('alamat', $pemilik->alamat) }}</textarea>
                                @error('alamat')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- NOMOR WHATSAPP --}}
                            <div class="mb-4">
                                <label for="no_wa" class="fw-semibold">Nomor WhatsApp</label>
                                <input type="text"
                                       name="no_wa"
                                       id="no_wa"
                                       class="form-control shadow-sm @error('no_wa') is-invalid @enderror"
                                       value="{{ old('no_wa', $pemilik->no_wa) }}"
                                       required>
                                @error('no_wa')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- BUTTON --}}
                            <div class="text-end mt-4">
                                <a href="{{ route('pemilik.index') }}" class="btn btn-secondary shadow-sm px-4 me-2">
                                    <i class="bi bi-x-circle me-1"></i>
                                    Batal
                                </a>

                                <button type="submit" class="btn btn-warning shadow-sm px-4">
                                    <i class="bi bi-save me-1"></i>
                                    Simpan Perubahan
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
