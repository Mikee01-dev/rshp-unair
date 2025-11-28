@extends('layouts.lte.main')

@section('content')

{{-- HEADER INDEX --}}
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row align-items-center">

            <div class="col-sm-6">
                <h3 class="fw-bold mb-0">
                    <i class="bi bi-person-lines-fill me-2 text-primary"></i>
                    Daftar Perawat
                </h3>
            </div>

            <div class="col-sm-6 text-end">
                <a href="{{ route('perawat.create') }}" class="btn btn-primary shadow-sm">
                    <i class="bi bi-plus-lg"></i> Tambah Perawat
                </a>
            </div>

        </div>
    </div>
</div>


<div class="app-content">
    <div class="container-fluid">

        {{-- ALERT --}}
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow-sm mt-2">
                <i class="bi bi-check-circle-fill me-1"></i>
                {{ session('success') }}
                <button class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        {{-- CARD --}}
        <div class="card shadow-sm border-0 mt-3">

            <div class="card-header bg-primary text-white fw-bold py-3">
                <i class="bi bi-list-ul me-2"></i>
                List Perawat
            </div>

            <div class="card-body p-0">
                <table class="table table-striped table-hover align-middle mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Alamat</th>
                            <th>No HP</th>
                            <th>Jenis Kelamin</th>
                            <th>Pendidikan</th>
                            <th>User</th>
                            <th class="text-center" style="width:150px;">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($perawats as $perawat)
                            <tr>
                                <td>#{{ $perawat->id_perawat }}</td>
                                <td>{{ $perawat->alamat }}</td>
                                <td>{{ $perawat->no_hp }}</td>
                                <td>{{ $perawat->jenis_kelamin }}</td>
                                <td>{{ $perawat->pendidikan }}</td>
                                <td>{{ $perawat->user->nama ?? '-' }}</td>

                                <td class="text-center">
                                    <div class="btn-group">

                                        {{-- Edit --}}
                                        <a href="{{ route('perawat.edit', $perawat->id_perawat) }}"
                                           class="btn btn-sm btn-outline-warning">
                                            <i class="bi bi-pencil"></i>
                                        </a>

                                        {{-- Delete --}}
                                        <form action="{{ route('perawat.destroy', $perawat->id_perawat) }}"
                                              method="POST"
                                              onsubmit="return confirm('Anda yakin ingin menghapus perawat ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-outline-danger">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>

                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>

        </div>

    </div>
</div>

@endsection
