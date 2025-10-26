@extends('layouts.admin')

@section('content')
<div class="container">
    <link rel="stylesheet" href="{{ asset('css/page.css') }}">
    <h2 class="judul-halaman">Daftar Kategori</h2>
    <table>
    <thead>
        <tr>
            <th>No</th>
            <th>Kategori</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($kategori as $index => $item )
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $item->nama_kategori }}</td>
            </tr>
        @endforeach
    </tbody>
</div>
    
@endsection