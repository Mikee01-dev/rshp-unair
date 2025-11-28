@extends('layouts.lte.main')

@section('content')

{{-- HEADER NON-INDEX --}}
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row align-items-center">

            <div class="col-sm-6">
                <h3 class="fw-bold mb-0">
                    <i class="bi bi-person-plus-fill me-2 text-primary"></i>
                    Tambah Dokter Baru
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
                        <i class="bi bi-plus-circle me-2"></i>
                        Form Tambah Dokter
                    </div>

                    <div class="card-body">

                        {{-- ERROR ALERT --}}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('dokter.store') }}" method="POST">
                            @csrf

                            {{-- ALAMAT --}}
                            <div class="mb-3">
                                <label class="fw-semibold">Alamat</label>
                                <input type="text" name="alamat"
                                       class="form-control shadow-sm"
                                       value="{{ old('alamat') }}">
                            </div>

                            {{-- NO HP --}}
                            <div class="mb-3">
                                <label class="fw-semibold">No HP</label>
                                <input type="text" name="no_hp"
                                       class="form-control shadow-sm"
                                       value="{{ old('no_hp') }}">
                            </div>

                            {{-- BIDANG DOKTER --}}
                            <div class="mb-3">
                                <label class="fw-semibold">Bidang Dokter</label>
                                <input type="text" name="bidang_dokter"
                                       class="form-control shadow-sm"
                                       value="{{ old('bidang_dokter') }}">
                            </div>

                            {{-- JENIS KELAMIN --}}
                            <div class="mb-3">
                                <label class="fw-semibold">Jenis Kelamin</label>
                                <select name="jenis_kelamin"
                                        class="form-select shadow-sm">
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                            </div>

                            {{-- USER --}}
                            <div class="mb-3">
                                <label class="fw-semibold">User</label>
                                <select name="id_user" class="form-select shadow-sm">
                                    <option value="">Pilih User</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->iduser }}" 
                                                {{ old('id_user') == $user->iduser ? 'selected' : '' }}>
                                            {{ $user->nama }} ({{ $user->email }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- BUTTON --}}
                            <div class="text-end mt-4">
                                <a href="{{ route('dokter.index') }}" class="btn btn-secondary px-4">
                                    Batal
                                </a>
                                <button type="submit" class="btn btn-primary shadow-sm px-4">
                                    <i class="bi bi-save me-1"></i>
                                    Simpan
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
