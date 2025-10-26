@extends('layouts.admin')

@section('content')

<div class="container">
    <link rel="stylesheet" href="{{ asset('css/page.css') }}">
    <h2 class="judul-halaman">Daftar Jenis Hewan</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Jenis Hewan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jenisHewan as $index => $hewan)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $hewan->nama_jenis_hewan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
