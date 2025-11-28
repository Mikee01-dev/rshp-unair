@extends('layouts.lte.main')

@section('content')

{{-- HEADER --}}
<div class="app-content-header py-3">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <h3 class="fw-bold mb-0 text-dark">
                    <i class="bi bi-house-heart-fill text-info me-2"></i>
                    Selamat Datang, {{ Auth::user()->nama }}
                </h3>
                <p class="text-muted mb-0 ms-1 mt-1">Dashboard Pemilik Hewan</p>
            </div>
        </div>
    </div>
</div>

{{-- CONTENT --}}
<div class="app-content">
    <div class="container-fluid">

        <!-- ROW BOXES -->
        <div class="row g-3"> <!-- Ganti g-4 jadi g-3 biar jarak antar box lebih rapat -->

            {{-- BOX 1: HEWAN --}}
            <div class="col-lg-6 col-12">
                <div class="small-box bg-info text-white shadow h-100">
                    <div class="inner p-3"> <!-- Ganti p-4 jadi p-3 -->
                        <!-- Ganti display-4 jadi h2 fw-bold biar tidak raksasa -->
                        <h2 class="fw-bold mb-0">{{ $total_hewan }}</h2>
                        <p class="mb-0">Hewan Peliharaan Saya</p> <!-- Hapus fs-5 -->
                    </div>
                    <div class="icon">
                        <!-- Ganti display-1 jadi display-4 -->
                        <i class="bi bi-gitlab display-4 opacity-25"></i>
                    </div>
                    <a href="{{ route('pemilik.pet.index') }}" class="small-box-footer text-white fw-bold py-2">
                        Lihat Detail <i class="bi bi-arrow-right-circle ms-1"></i>
                    </a>
                </div>
            </div>

            {{-- BOX 2: JADWAL --}}
            <div class="col-lg-6 col-12">
                <div class="small-box bg-success text-white shadow h-100">
                    <div class="inner p-3"> <!-- Ganti p-4 jadi p-3 -->
                        <h2 class="fw-bold mb-0">
                            <!-- Logika Tampilan Tanggal -->
                            @if($next_visit)
                                {{ \Carbon\Carbon::parse($next_visit->waktu_daftar)->format('d M') }}
                                <small class="fs-6 fw-normal ms-1">{{ \Carbon\Carbon::parse($next_visit->waktu_daftar)->format('H:i') }}</small>
                            @else
                                -
                            @endif
                        </h2>
                        <p class="mb-0">Jadwal Dokter Berikutnya</p>
                    </div>
                    <div class="icon">
                        <!-- Ganti display-1 jadi display-4 -->
                        <i class="bi bi-calendar-check display-4 opacity-25"></i>
                    </div>
                    <a href="{{ route('pemilik.temu-dokter.index') }}" class="small-box-footer text-white fw-bold py-2">
                        Cek Jadwal <i class="bi bi-arrow-right-circle ms-1"></i>
                    </a>
                </div>
            </div>

        </div> <!-- /.row -->

    </div>
</div>

@endsection