@extends('layouts.admin')

@section('content')

<div class="container">
    <link rel="stylesheet" href="{{ asset('css/page.css') }}">
    <h2 class="judul-halaman">Daftar Role</h2>
    <table>
    <thead>
        <tr>
            <th>Id Role</th>
            <th>Nama Role</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($role as $item)
            <tr>
                <td>{{ $item->idrole }}</td>
                <td>{{ $item->nama_role}}</td>
            </tr>
        @endforeach
    </tbody>
</div>

    
@endsection