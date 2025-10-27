@extends('layouts.resepsionis')

@section('content')
<div class="container">
    <link rel="stylesheet" href="{{ asset('css/page.css') }}">
    <h3 class="judul-halaman">Daftar Pet</h3>
    
    <table class="table">
        <thead>
            <tr>
                <th>Nama Pet</th>
                <th>Jenis Kelamin</th>
                <th>Tanggal Lahir</th>
                <th>Warna / Tanda</th>
                <th>Jenis Hewan</th>
                <th>Ras</th>
                <th>Pemilik</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pets as $pet)
                <tr>
                    <td>{{ $pet->nama }}</td>
                    <td>{{ $pet->jenis_kelamin }}</td>
                    <td>{{ $pet->tanggal_lahir }}</td>
                    <td>{{ $pet->warna_tanda }}</td>
                    <td>{{ $pet->ras->nama_ras }}</td>
                    <td>{{ $pet->ras->jenis->nama_jenis_hewan }}</td>
                    <td>{{ $pet->pemilik->user->nama ?? '-' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection