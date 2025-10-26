@extends('layouts.admin')

@section('content')

<div class="container">
    <link rel="stylesheet" href="{{ asset('css/page.css') }}">
    <h2 class="judul-halaman">Daftar Kode Tindakan Terapi</h2>
    <table>
    <thead>
        <tr>
            <th>No</th>
            <th>Kode</th>
            <th>Deskripsi Tindakan Terapi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($kodeTindakanTerapi as $index => $item )
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $item->kode }}</td>
                <td>{{ $item->deskripsi_tindakan_terapi }}</td>
            </tr>
        @endforeach
    </tbody>
</div>

@endsection