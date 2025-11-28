@extends('layouts.lte.main')

@section('content')
<div class="app-content-header">
    <div class="container-fluid"><h3>Profil Saya</h3></div>
</div>

<div class="app-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card card-widget widget-user">
                    <div class="widget-user-header bg-info">
                        <h3 class="widget-user-username">{{ $user->nama }}</h3>
                        <h5 class="widget-user-desc">Perawat Hewan</h5>
                    </div>
                    
                    <div class="card-footer p-4">
                        <ul class="nav flex-column">
                            <li class="nav-item mb-3 border-bottom pb-2">
                                <strong>Email Login</strong> 
                                <span class="float-end">{{ $user->email }}</span>
                            </li>
                            <li class="nav-item mb-3 border-bottom pb-2">
                                <strong>Nomor HP</strong> 
                                <span class="float-end">{{ $perawat->no_hp ?? '-' }}</span>
                            </li>
                            <li class="nav-item mb-3 border-bottom pb-2">
                                <strong>Jenis Kelamin</strong> 
                                <span class="float-end">{{ $perawat->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</span>
                            </li>
                            <li class="nav-item mb-3 border-bottom pb-2">
                                <strong>Pendidikan Terakhir</strong> 
                                <span class="float-end">{{ $perawat->pendidikan ?? '-' }}</span>
                            </li>
                            <li class="nav-item">
                                <strong>Alamat</strong> 
                                <span class="float-end">{{ $perawat->alamat ?? '-' }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection