@extends('layouts.lte.main')

@section('content')

<div class="container">
    <link rel="stylesheet" href="{{ asset('css/page.css') }}">
    <h2 class="judul-halaman">Daftar Kategori</h2>

    <table>
        <thead>
            <div style="margin-bottom: 15px;">
                <a href="{{ route('kategori.create') }}" class="btn btn-success">+ Tambah Kategori</a>
            </div>
            <tr>
                <th>No</th>
                <th>Nama Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kategori as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->nama_kategori }}</td>
                    <td style="display: flex; gap: 5px;">
                        <a href="{{ route('kategori.edit', $item->idkategori) }}" class="btn btn-primary btn-sm">Edit</a>

                        <form action="{{ route('kategori.destroy', $item->idkategori) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori ini?');">
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
