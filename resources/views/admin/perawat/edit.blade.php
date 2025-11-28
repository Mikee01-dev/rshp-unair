@extends('layouts.lte.main')

@section('content')

{{-- HEADER --}}
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row align-items-center">

            <div class="col-sm-6">
                <h3 class="fw-bold mb-0">
                    <i class="bi bi-person-lines-fill me-2 text-warning"></i>
                    Edit Data Perawat
                </h3>
            </div>

        </div>
    </div>
</div>


<div class="app-content">
    <div class="container-fluid">

        <div class="row justify-content-center mt-3">
            <div class="col-md-8">

                {{-- CARD --}}
                <div class="card shadow-sm border-0">

                    <div class="card-header bg-warning text-dark fw-bold py-3">
                        <i class="bi bi-pencil-square me-2"></i>
                        Form Edit Perawat
                    </div>

                    <div class="card-body">

                        {{-- ERROR ALERT --}}
                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show shadow-sm">
                                <strong>Terjadi kesalahan:</strong>
                                <ul class="mb-0 mt-2">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif


                        <form action="{{ route('perawat.update', $perawat->id_perawat) }}" method="POST">
                            @csrf
                            @method('PUT')

                            {{-- ALAMAT --}}
                            <div class="mb-3">
                                <label class="fw-semibold">Alamat</label>
                                <input type="text"
                                       name="alamat"
                                       class="form-control shadow-sm"
                                       value="{{ old('alamat', $perawat->alamat) }}"
                                       required>
                            </div>

                            {{-- NO HP --}}
                            <div class="mb-3">
                                <label class="fw-semibold">No HP</label>
                                <input type="text"
                                       name="no_hp"
                                       class="form-control shadow-sm"
                                       value="{{ old('no_hp', $perawat->no_hp) }}"
                                       required>
                            </div>

                            {{-- JENIS KELAMIN --}}
                            <div class="mb-3">
                                <label class="fw-semibold">Jenis Kelamin</label>
                                <select name="jenis_kelamin"
                                        class="form-select shadow-sm"
                                        required>
                                    <option value="">-- Pilih --</option>
                                    <option value="L" {{ old('jenis_kelamin', $perawat->jenis_kelamin) == 'L' ? 'selected' : '' }}>
                                        Laki-laki
                                    </option>
                                    <option value="P" {{ old('jenis_kelamin', $perawat->jenis_kelamin) == 'P' ? 'selected' : '' }}>
                                        Perempuan
                                    </option>
                                </select>
                            </div>

                            {{-- PENDIDIKAN --}}
                            <div class="mb-3">
                                <label class="fw-semibold">Pendidikan</label>
                                <input type="text"
                                       name="pendidikan"
                                       class="form-control shadow-sm"
                                       value="{{ old('pendidikan', $perawat->pendidikan) }}"
                                       required>
                            </div>

                            {{-- USER --}}
                            <div class="mb-3">
                                <label class="fw-semibold">ID User</label>
                                <input type="number"
                                       name="id_user"
                                       class="form-control shadow-sm"
                                       value="{{ old('id_user', $perawat->id_user) }}"
                                       required>
                            </div>

                            {{-- BUTTON --}}
                            <div class="text-end mt-4">

                                <a href="{{ route('perawat.index') }}" class="btn btn-secondary shadow-sm px-4 me-2">
                                    <i class="bi bi-x-circle me-1"></i>
                                    Batal
                                </a>

                                <button type="submit" class="btn btn-warning shadow-sm px-4">
                                    <i class="bi bi-save me-1"></i>
                                    Update
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
