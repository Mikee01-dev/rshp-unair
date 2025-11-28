@extends('layouts.lte.main')

@section('content')
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <h3 class="fw-bold mb-0">
                    <i class="bi bi-shield-lock-fill text-primary me-2"></i>
                    Daftar Role
                </h3>
            </div>
            <div class="col-sm-6 text-end">
                <a href="{{ route('role.create') }}" class="btn btn-primary shadow-sm">
                    <i class="bi bi-plus-lg"></i> Tambah Role
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
                <i class="bi bi-check-circle-fill me-1"></i>{{ session('success') }}
                <button class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        {{-- CARD LIST ROLE --}}
        <div class="card shadow-sm border-0 mt-3">

            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center py-3">
                <h5 class="mb-0">
                    <i class="bi bi-list-ul me-2"></i>
                    Daftar Role
                </h5>
            </div>

            <div class="card-body p-0">

                <table class="table table-hover table-striped align-middle mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th style="width: 60px">No</th>
                            <th>Nama Role</th>
                            <th class="text-center" style="width: 150px">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($roles as $index => $role)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $role->nama_role }}</td>

                            <td class="text-center">

                                <div class="btn-group">

                                    {{-- EDIT --}}
                                    <a href="{{ route('role.edit', $role->idrole) }}"
                                       class="btn btn-sm btn-outline-warning"
                                       title="Edit Role">
                                        <i class="bi bi-pencil"></i>
                                    </a>

                                    {{-- DELETE --}}
                                    <form action="{{ route('role.destroy', $role->idrole) }}"
                                          method="POST"
                                          onsubmit="return confirm('Yakin ingin menghapus role ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger" title="Hapus Role">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>

                                </div>

                            </td>
                        </tr>

                        @empty
                        <tr>
                            <td colspan="3" class="text-center py-4 text-muted">
                                <i class="bi bi-clipboard-x fs-3 d-block mb-1"></i>
                                Belum ada role terdaftar.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>

                </table>

            </div>

        </div>

    </div>
</div>

@endsection
