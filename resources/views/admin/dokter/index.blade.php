@extends('layouts.lte.main')

@section('content')
<div class="container">
    <h1>Daftar Dokter</h1>

    <a href="{{ route('dokter.create') }}" class="btn btn-primary mb-3">Tambah Dokter</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Alamat</th>
                <th>No HP</th>
                <th>Bidang Dokter</th>
                <th>Jenis Kelamin</th>
                <th>ID User</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dokters as $dokter)
            <tr>
                <td>{{ $dokter->id_dokter }}</td>
                <td>{{ $dokter->alamat }}</td>
                <td>{{ $dokter->no_hp }}</td>
                <td>{{ $dokter->bidang_dokter }}</td>
                <td>{{ $dokter->jenis_kelamin }}</td>
                <td>{{ $dokter->id_user }}</td>
                <td>
                    <a href="{{ route('dokter.edit', $dokter->id_dokter) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('dokter.destroy', $dokter->id_dokter) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus dokter ini?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
