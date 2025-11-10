@extends('layouts.lte.main')

@section('content')
<div class="container">
    <link rel="stylesheet" href="{{ asset('css/page.css') }}">
    <h2 class="judul-halaman">Daftar Jenis Hewan</h2>

    <table>
        <thead>
            <div style="margin-bottom: 15px;">
                <a href="{{ route('jenis-hewan.create') }}" class="btn btn-success">+ Tambah Jenis Hewan</a>
            </div>
            <tr>
                <th>No</th>
                <th>Nama Jenis Hewan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jenisHewan as $index => $hewan)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $hewan->nama_jenis_hewan }}</td>
                    <td style="display: flex; gap: 5px;">
                        <a href="{{ route('jenis-hewan.edit', $hewan->idjenis_hewan) }}" class="btn btn-primary btn-sm">Edit</a>

                        <form action="{{ route('jenis-hewan.destroy', $hewan->idjenis_hewan) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus jenis hewan ini?');">
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
