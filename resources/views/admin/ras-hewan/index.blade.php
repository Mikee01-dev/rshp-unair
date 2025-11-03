@extends('layouts.admin')

@section('content')

<div class="container">
    <link rel="stylesheet" href="{{ asset('css/page.css') }}">
    <h2 class="judul-halaman">Daftar Ras Hewan</h2>

    <table>
        <thead>
            <tr>
                <th colspan="4" style="text-align: left;">
                    <a href="{{ route('ras-hewan.create') }}" class="btn btn-success">+ Tambah Ras Hewan</a>
                </th>
            </tr>
            <tr>
                <th>No</th>
                <th>Nama Ras Hewan</th>
                <th>Jenis Hewan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rasHewan as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->nama_ras }}</td>
                    <td>{{ $item->jenis->nama_jenis_hewan }}</td>
                    <td style="display: flex; gap: 5px;">
                        <a href="{{ route('ras-hewan.edit', $item->idras_hewan) }}" class="btn btn-primary btn-sm">Edit</a>

                        <form action="{{ route('ras-hewan.destroy', $item->idras_hewan) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus ras hewan ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
