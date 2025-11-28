@extends('layouts.lte.main')
@section('content')
<div class="app-content-header"><div class="container-fluid"><h3>Profil Pemilik</h3></div></div>
<div class="app-content">
    <div class="container-fluid">
        <div class="card card-primary card-outline col-md-6 mx-auto">
            <div class="card-body box-profile">
                <h3 class="profile-username text-center">{{ $user->nama }}</h3>
                <p class="text-muted text-center">{{ $user->email }}</p>
                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item"><b>No WA</b> <a class="float-end">{{ $pemilik->no_wa }}</a></li>
                    <li class="list-group-item"><b>Alamat</b> <a class="float-end">{{ $pemilik->alamat }}</a></li>
                </ul>
                <div class="alert alert-info text-center">
                    Hubungi Resepsionis jika ingin mengubah data profil.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection