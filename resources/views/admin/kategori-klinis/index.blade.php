@extends('layouts.admin')

@section('content')
<div class="container">
    <link rel="stylesheet" href="{{ asset('css/page.css') }}">
    <h2 class="judul-halaman">Daftar Kategori Klinis</h2>

    <div style="margin-bottom: 15px;">
        <a href="{{ route('kategori-klinis.create') }}" class="btn btn-success">+ Tambah Kategori Klinis</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kategori Klinis</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kategoriKlinis as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->nama_kategori_klinis }}</td>
                    <td>
                        <a href="{{ route('kategori-klinis.edit', $item->idkategori_klinis) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('kategori-klinis.destroy', $item->idkategori_klinis) }}" method="POST" style="display:inline-block" onsubmit="return confirm('Yakin ingin menghapus kategori ini?');">
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
