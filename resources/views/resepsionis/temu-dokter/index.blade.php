@extends('layouts.resepsionis')

@section('content')
<div class="container">
    <link rel="stylesheet" href="{{ asset('css/page.css') }}">
    <h3 class="judul-halaman">Daftar Temu Dokter</h3>
    
    <table class="table">
        <thead>
            <tr>
                <th>Waktu Daftar</th>
                <th>Nama Pet</th>
                <th>Pemilik</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($temu_dokter as $t)
                <tr>
                    <td>{{ $t->waktu_daftar }}</td>
                    <td>{{ $t->pet->nama ?? '-' }}</td>
                    <td>{{ $t->pet->pemilik->user->nama ?? '-' }}</td>
                    <td>{{ $t->status?? '-' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection