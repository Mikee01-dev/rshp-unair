@extends('layouts.admin')

@section('content')

<div class="container">
    <link rel="stylesheet" href="{{ asset('css/page.css') }}">
    <h2 class="judul-halaman">Daftar Pemilik</h2>
    <table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Pemilik</th>
            <th>Email</th>
            <th>No WA</th>
            <th>Alamat</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pemilik as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $item->user->nama }}</td>
                <td>{{ $item->user->email }}</td>
                <td>{{ $item->no_wa }}</td>
                <td>{{ $item->alamat }}</td>
            </tr>
        @endforeach
    </tbody>
</div>

@endsection