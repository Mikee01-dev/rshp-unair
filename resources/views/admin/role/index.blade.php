@extends('layouts.lte.main')

@section('content')
<div class="container">
    <link rel="stylesheet" href="{{ asset('css/page.css') }}">

    <h2 class="judul-halaman">Daftar Role</h2>

    <div style="margin-bottom: 15px;">
        <a href="{{ route('role.create') }}" class="btn btn-success">+ Tambah Role</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Role</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $index => $role)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $role->nama_role }}</td>
                    <td>
                        <a href="{{ route('role.edit', $role->idrole) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('role.destroy', $role->idrole) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus role ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
