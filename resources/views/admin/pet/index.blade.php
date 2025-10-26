@extends('layouts.admin')

@section('content')

<div class="container">
    <link rel="stylesheet" href="{{ asset('css/page.css') }}">
    <h2 class="judul-halaman">Daftar Hewan Peliharaan</h2>
    <table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Hewan</th>
            <th>Ras</th>
            <th>Jenis</th>
            <th>Pemilik</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pet as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->ras->nama_ras }}</td>
                <td>{{ $item->ras->jenis->nama_jenis_hewan }}</td>
                <td>{{ $item->pemilik->user->nama }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>

@endsection