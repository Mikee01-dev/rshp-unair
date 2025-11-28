@extends('layouts.lte.main')
@section('content')
<div class="app-content-header"><div class="container-fluid"><h3>Hewan Peliharaan Saya</h3></div></div>
<div class="app-content">
    <div class="container-fluid">
        <div class="row">
            @foreach($pets as $pet)
            <div class="col-md-4">
                <div class="card card-widget widget-user-2 shadow-sm">
                    <div class="widget-user-header bg-warning">
                        <div class="widget-user-image"><i class="bi bi-gitlab display-6 text-white bg-secondary rounded-circle p-2"></i></div>
                        <h3 class="widget-user-username">{{ $pet->nama }}</h3>
                        <h5 class="widget-user-desc">{{ $pet->ras->jenisHewan->nama_jenis_hewan }} / {{ $pet->ras->nama_ras }}</h5>
                    </div>
                    <div class="card-footer p-0">
                        <ul class="nav flex-column">
                            <li class="nav-item p-3">Gender <span class="float-end badge bg-primary">{{ $pet->jenis_kelamin }}</span></li>
                            <li class="nav-item p-3">Warna <span class="float-end">{{ $pet->warna_tanda }}</span></li>
                            <li class="nav-item p-3">Lahir <span class="float-end">{{ $pet->tanggal_lahir }}</span></li>
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection