@extends('layouts.lte.main')
@section('content')
<div class="app-content-header">
    <div class="container-fluid"><h3 class="mb-0">Selamat Datang, {{ Auth::user()->nama }}</h3></div>
</div>
<div class="app-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-12">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $total_hewan }}</h3>
                        <p>Hewan Peliharaan Saya</p>
                    </div>
                    <div class="icon"><i class="bi bi-gitlab"></i></div>
                    <a href="{{ route('pemilik.pet.index') }}" class="small-box-footer">Lihat Detail <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>
            <div class="col-lg-6 col-12">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $next_visit ? \Carbon\Carbon::parse($next_visit->waktu_daftar)->format('d M') : '-' }}</h3>
                        <p>Jadwal Dokter Berikutnya</p>
                    </div>
                    <div class="icon"><i class="bi bi-calendar-check"></i></div>
                    <a href="{{ route('pemilik.temu-dokter.index') }}" class="small-box-footer">Cek Jadwal <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection