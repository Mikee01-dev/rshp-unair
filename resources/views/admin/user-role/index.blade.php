@extends('layouts.lte.main')

@section('content')
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <h3 class="fw-bold mb-0">
                    <i class="bi bi-people-fill me-2 text-primary"></i>
                    Manajemen User & Role
                </h3>
            </div>
            <div class="col-sm-6 text-end">
                <a href="{{ route('user-role.create') }}" class="btn btn-primary shadow-sm">
                    <i class="bi bi-plus-lg"></i> Tambah User Role
                 </a>
            </div>
        </div>
    </div>
</div>

<div class="app-content">
    <div class="container-fluid">

        {{-- ALERT --}}
        @if(session('success'))
            <div class="alert alert-success shadow-sm alert-dismissible fade show mt-2">
                <i class="bi bi-check-circle-fill me-1"></i>
                {{ session('success') }}
                <button class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger shadow-sm alert-dismissible fade show mt-2">
                <i class="bi bi-exclamation-circle-fill me-1"></i>
                {{ session('error') }}
                <button class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        {{-- CARD --}}
        <div class="card shadow-sm border-0 mt-3">

            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0">
                    <i class="bi bi-list-ul me-2"></i>
                    Daftar User & Role
                </h5>
            </div>

            <div class="card-body p-0">

                <table class="table table-hover table-striped align-middle mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th style="width: 60px">No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th class="text-center" style="width: 150px">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($roleUser as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>

                            <td>{{ $item->user->nama ?? '-' }}</td>

                            <td>
                                <i class="bi bi-envelope text-primary me-1"></i>
                                {{ $item->user->email ?? '-' }}
                            </td>

                            <td>
                                <span class="badge bg-info text-dark px-3 py-2">
                                    {{ $item->role->nama_role ?? '-' }}
                                </span>
                            </td>

                            <td class="text-center">
                                <div class="btn-group">

                                    {{-- EDIT --}}
                                    <a href="{{ route('user-role.edit', $item->iduser) }}"
                                       class="btn btn-sm btn-outline-warning">
                                        <i class="bi bi-pencil"></i>
                                    </a>

                                    {{-- DELETE --}}
                                    <form action="{{ route('user-role.destroy', $item->iduser) }}"
                                          method="POST"
                                          onsubmit="return confirm('Yakin ingin menghapus user ini?')">
                                        @csrf @method('DELETE')
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
