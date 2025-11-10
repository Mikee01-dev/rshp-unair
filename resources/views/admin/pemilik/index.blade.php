@extends('layouts.lte.main')
@section('content')
<div class="container">
    <link rel="stylesheet" href="{{ asset('css/page.css') }}">
    <h2 class="judul-halaman">Daftar Pemilik</h2>

    <div style="margin-bottom: 15px;">
        <a href="{{ route('pemilik.create') }}" class="btn btn-success">+ Tambah Pemilik</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>No. WhatsApp</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pemilik as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->user->nama ?? '-' }}</td>
                    <td>{{ $item->alamat }}</td>
                    <td>{{ $item->no_wa }}</td>
                    <td>
                        <a href="{{ route('pemilik.edit', $item->idpemilik) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('pemilik.destroy', $item->idpemilik) }}" method="POST" style="display:inline-block" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
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
