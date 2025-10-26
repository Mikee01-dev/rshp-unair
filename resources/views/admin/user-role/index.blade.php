@extends('layouts.admin')

@section('content')

<div class="container">
    <link rel="stylesheet" href="{{ asset('css/page.css') }}">
    <h2 class="judul-halaman">Daftar User Role</h2>
    <table>
    <thead>
        <tr>
            <th>Id User</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Nama Role</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($roleUser as $item)
            <tr>
                <td>{{ $item->idrole_user }}</td>
                <td>{{ $item->user->nama }}</td>
                <td>{{ $item->user->email }}</td>
                <td>{{ $item->role->nama_role }}</td>
            </tr>
        @endforeach
    </tbody>
</div>
    
@endsection