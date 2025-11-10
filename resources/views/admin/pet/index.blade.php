@extends('layouts.lte.main')

@section('content')

<div class="container">
    <link rel="stylesheet" href="{{ asset('css/page.css') }}">
    <h2 class="judul-halaman">Daftar Hewan Peliharaan</h2>
    <table>
    <thead>
        <div style="margin-bottom: 15px;">
            <a href="{{ route('pet.create') }}" class="btn btn-success">+ Tambah Hewan Peliharaan</a>
        </div>
        <tr>
            <th>No</th>
            <th>Nama Hewan</th>
            <th>Ras</th>
            <th>Jenis</th>
            <th>Pemilik</th>
            <th>Aksi</th>
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
                <td>
                    <a href="{{ route('pet.edit', $item->idpet) }}" class="btn btn-primary btn-sm">Edit</a>

                    <form action="{{ route('pet.destroy', $item->idpet) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus hewan peliharaan ini?');" style="display:inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
            </tr>
        @endforeach
    </tbody>
</table>
</div>

@endsection