@extends('layouts.admin')

@section('content')

<div class="container">
    <link rel="stylesheet" href="{{ asset('css/page.css') }}">
    <h2 class="judul-halaman">Daftar Ras Hewan</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Ras Hewan</th>
                <th>Jenis Hewan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rasHewan as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->nama_ras }}</td>
                    <td>{{ $item->jenis->nama_jenis_hewan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection