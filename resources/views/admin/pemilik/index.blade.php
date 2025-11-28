@extends('layouts.lte.main')

@section('content')

{{-- HEADER INDEX --}}
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row align-items-center">

            <div class="col-sm-6">
                <h3 class="fw-bold mb-0">
                    <i class="bi bi-people-fill me-2 text-primary"></i>
                    Daftar Pemilik Hewan
                </h3>
            </div>

            <div class="col-sm-6 text-end">
                <a href="{{ route('pemilik.create') }}" class="btn btn-primary shadow-sm">
                    <i class="bi bi-plus-lg"></i> Tambah Pemilik
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
                List Pemilik Hewan
            </div>

            <div class="card-body p-0">
                <table class="table table-hover table-striped align-middle mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th style="width: 60px;">No</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>No. WhatsApp</th>
                            <th class="text-center" style="width: 150px;">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($pemilik as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->user->nama ?? '-' }}</td>
                                <td>{{ $item->alamat }}</td>
                                <td>{{ $item->no_wa }}</td>

                                <td class="text-center">
                                    <div class="btn-group">

                                        {{-- Edit --}}
                                        <a href="{{ route('pemilik.edit', $item->idpemilik) }}"
                                           class="btn btn-sm btn-outline-warning">
                                            <i class="bi bi-pencil"></i>
                                        </a>

                                        {{-- Delete --}}
                                        <form action="{{ route('pemilik.destroy', $item->idpemilik) }}"
                                              method="POST"
                                              onsubmit="return confirm('Yakin ingin menghapus data ini?');">
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
