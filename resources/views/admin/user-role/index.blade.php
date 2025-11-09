@extends('layouts.admin')

@section('content')
<div class="container">
    <h2 class="judul-halaman">Manajemen User & Role</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div style="margin-bottom: 15px;">
        <a href="{{ route('user-role.create') }}" class="btn btn-success">+ Tambah User Role</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roleUser as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->user->nama ?? '-' }}</td>
                    <td>{{ $item->user->email ?? '-' }}</td>
                    <td>{{ $item->role->nama_role ?? '-' }}</td>
                    <td>
                        <a href="{{ route('user-role.edit', $item->iduser) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('user-role.destroy', $item->iduser) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus user ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
