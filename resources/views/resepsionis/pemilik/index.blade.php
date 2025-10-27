@extends('layouts.resepsionis')

@section('content')
<div class="container">
    <link rel="stylesheet" href="{{ asset('css/page.css') }}">
    <h3 class="judul-halaman">Daftar Pemilik</h3>
    
    <table class="table">
        <thead>
            <tr>
                <th>Nama Pemilik</th>
                <th>Alamat</th>
                <th>No Telepon</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pemilik as $p)
                <tr>
                    <td>{{ $p->user->nama }}</td>
                    <td>{{ $p->alamat }}</td>
                    <td>{{ $p->no_wa }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection