@extends('layouts.lte.main')

@section('content')
<div class="container">
    <h1>Daftar Perawat</h1>

    <a href="{{ route('perawat.create') }}" class="btn btn-primary mb-3">Tambah Perawat</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Alamat</th>
                <th>No HP</th>
                <th>Jenis Kelamin</th>
                <th>Pendidikan</th>
                <th>ID User</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($perawats as $perawat)
            <tr>
                <td>{{ $perawat->id_perawat }}</td>
                <td>{{ $perawat->alamat }}</td>
                <td>{{ $perawat->no_hp }}</td>
                <td>{{ $perawat->jenis_kelamin }}</td>
                <td>{{ $perawat->pendidikan }}</td>
                <td>{{ $perawat->id_user }}</td>
                <td>
                    <a href="{{ route('perawat.edit', $perawat->id_perawat) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('perawat.destroy', $perawat->id_perawat) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus perawat ini?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
