@extends('layouts.lte.main')

@section('content')

<div class="app-content-header">
    <div class="container-fluid">
        <h3 class="fw-bold mb-0">
            <i class="bi bi-person-circle text-info me-2"></i>
            Profil Saya
        </h3>
    </div>
</div>

<div class="app-content">
    <div class="container-fluid">

        <div class="row justify-content-center">
            <div class="col-md-6">

                <div class="card shadow-sm border-0">

                    {{-- HEADER PROFILE --}}
                    <div class="card-body text-center bg-info text-white rounded-top">
                        <i class="bi bi-person-badge fs-1 mb-2"></i>
                        <h3 class="mb-0">{{ $user->nama }}</h3>
                        <small class="opacity-75">Dokter Hewan</small>
                    </div>

                    {{-- DETAIL --}}
                    <div class="card-body">

                        <ul class="list-group list-group-flush">

                            <li class="list-group-item d-flex justify-content-between">
                                <strong>Email Login</strong>
                                <span>{{ $user->email }}</span>
                            </li>

                            <li class="list-group-item d-flex justify-content-between">
                                <strong>Nomor HP</strong>
                                <span>{{ $dokter->no_hp ?? '-' }}</span>
                            </li>

                            <li class="list-group-item d-flex justify-content-between">
                                <strong>Jenis Kelamin</strong>
                                <span>{{ $dokter->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</span>
                            </li>

                            <li class="list-group-item d-flex justify-content-between">
                                <strong>Pendidikan Terakhir</strong>
                                <span>{{ $dokter->pendidikan ?? '-' }}</span>
                            </li>

                            <li class="list-group-item d-flex justify-content-between">
                                <strong>Alamat</strong>
                                <span class="text-end" style="max-width: 60%;">{{ $dokter->alamat ?? '-' }}</span>
                            </li>

                        </ul>

                    </div>

                </div>

            </div>
        </div>

    </div>
</div>

@endsection
