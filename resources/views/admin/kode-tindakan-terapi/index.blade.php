@extends('layouts.admin')

@section('content')
<div class="container">
    <link rel="stylesheet" href="{{ asset('css/page.css') }}">
    <h2 class="judul-halaman">Daftar Kode Tindakan Terapi</h2>

    {{-- Tombol Tambah --}}
    <div style="margin-bottom: 15px;">
        <a href="{{ route('kode-tindakan-terapi.create') }}" class="btn btn-success">+ Tambah Kode Tindakan Terapi</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Deskripsi Tindakan Terapi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kodeTindakanTerapi as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->kode }}</td>
                    <td>{{ $item->deskripsi_tindakan_terapi }}</td>
                    <td>
                        <a href="{{ route('kode-tindakan-terapi.edit', $item->idkode_tindakan_terapi) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('kode-tindakan-terapi.destroy', $item->idkode_tindakan_terapi) }}" method="POST" style="display:inline-block" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
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
