@extends('layouts.lte.main')

@section('content')

<div class="app-content-header">
    <div class="container-fluid">
        <h3 class="fw-bold mb-0">
            <i class="bi bi-person-plus text-success me-2"></i>
            Tambah User & Role
        </h3>
    </div>
</div>

<div class="app-content">
    <div class="container-fluid">

        <div class="row justify-content-center mt-3">
            <div class="col-md-8">

                <div class="card shadow-sm border-0">

                    <div class="card-header bg-success text-white fw-bold py-3">
                        <i class="bi bi-plus-circle me-2"></i>
                        Form Tambah User Baru
                    </div>

                    <div class="card-body">

                        <form action="{{ route('user-role.store') }}" method="POST">
                            @csrf

                            {{-- NAMA --}}
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Nama Lengkap</label>
                                <input type="text"
                                       name="nama"
                                       class="form-control shadow-sm"
                                       required
                                       value="{{ old('nama') }}">
                            </div>

                            {{-- EMAIL --}}
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Alamat Email</label>
                                <input type="email"
                                       name="email"
                                       class="form-control shadow-sm"
                                       required
                                       value="{{ old('email') }}">
                            </div>

                            {{-- PASSWORD --}}
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Kata Sandi</label>
                                <input type="password"
                                       name="password"
                                       class="form-control shadow-sm"
                                       required>
                            </div>

                            {{-- ROLE --}}
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Role Pengguna</label>
                                <select name="idrole" class="form-select shadow-sm" required>
                                    <option value="">-- Pilih Role --</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->idrole }}">{{ $role->nama_role }}</option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- BUTTON --}}
                            <div class="text-end mt-4">
                                <a href="{{ route('user-role.index') }}" class="btn btn-secondary px-4">
                                    <i class="bi bi-x-circle me-1"></i> Batal
                                </a>

                                <button type="submit" class="btn btn-success px-4 shadow-sm">
                                    <i class="bi bi-save me-1"></i> Simpan
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
