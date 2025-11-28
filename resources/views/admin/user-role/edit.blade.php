@extends('layouts.lte.main')

@section('content')

<div class="app-content-header">
    <div class="container-fluid">
        <h3 class="fw-bold mb-0">
            <i class="bi bi-person-gear text-primary me-2"></i>
            Edit User & Role
        </h3>
    </div>
</div>

<div class="app-content">
    <div class="container-fluid">

        <div class="row justify-content-center mt-3">
            <div class="col-md-8">

                <div class="card shadow-sm border-0">

                    <div class="card-header bg-primary text-white fw-bold py-3">
                        <i class="bi bi-pencil-square me-2"></i>
                        Form Edit User
                    </div>

                    <div class="card-body">

                        <form action="{{ route('user-role.update', $user->iduser) }}" method="POST">
                            @csrf
                            @method('PUT')

                            {{-- NAMA --}}
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Nama Lengkap</label>
                                <input type="text"
                                       name="nama"
                                       class="form-control shadow-sm"
                                       value="{{ old('nama', $user->nama) }}"
                                       required>
                            </div>

                            {{-- EMAIL --}}
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Alamat Email</label>
                                <input type="email"
                                       name="email"
                                       class="form-control shadow-sm"
                                       value="{{ old('email', $user->email) }}"
                                       required>
                            </div>

                            {{-- PASSWORD --}}
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Kata Sandi (Opsional)</label>
                                <input type="password"
                                       name="password"
                                       class="form-control shadow-sm"
                                       placeholder="Kosongkan jika tidak ingin mengganti">
                            </div>

                            {{-- ROLE --}}
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Role Pengguna</label>
                                <select name="idrole" class="form-select shadow-sm" required>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->idrole }}"
                                                {{ $roleUser && $roleUser->idrole == $role->idrole ? 'selected' : '' }}>
                                            {{ $role->nama_role }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- BUTTON --}}
                            <div class="text-end mt-4">
                                <a href="{{ route('user-role.index') }}" class="btn btn-secondary px-4">
                                    <i class="bi bi-x-circle me-1"></i> Batal
                                </a>

                                <button type="submit" class="btn btn-primary px-4 shadow-sm">
                                    <i class="bi bi-save me-1"></i> Simpan Perubahan
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
