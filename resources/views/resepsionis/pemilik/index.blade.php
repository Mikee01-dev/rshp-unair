@extends('layouts.lte.main')

@section('content')

{{-- HEADER INDEX STANDAR --}}
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row align-items-center">

            <div class="col-sm-6">
                <h3 class="fw-bold mb-0">
                    <i class="bi bi-people-fill me-2 text-primary"></i>
                    Data Pemilik (Owner)
                </h3>
            </div>

            <div class="col-sm-6 text-end">
                <a href="{{ route('resepsionis.pemilik.create') }}" class="btn btn-primary shadow-sm">
                    <i class="bi bi-person-plus"></i> Tambah Pemilik
                </a>
            </div>

        </div>
    </div>
</div>

{{-- CONTENT --}}
<div class="app-content">
    <div class="container-fluid">

        @if(session('success'))
            <div class="alert alert-success shadow-sm mt-2">
                <i class="bi bi-check-circle-fill me-1"></i> {{ session('success') }}
            </div>
        @endif

        <div class="card shadow-sm border-0 mt-3">
            <div class="card-header bg-primary text-white fw-bold">
                <i class="bi bi-list-task me-2"></i> Daftar Pemilik Terdaftar
            </div>

            <div class="card-body p-0">
                <table class="table table-striped table-hover align-middle mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Nama Lengkap</th>
                            <th>Kontak (WA)</th>
                            <th>Alamat</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($pemiliks as $p)
                        <tr>
                            <td>{{ $loop->iteration }}</td>

                            <td>
                                <strong>{{ $p->user->nama ?? '-' }}</strong><br>
                                <small class="text-muted">{{ $p->user->email ?? '-' }}</small>
                            </td>

                            <td>{{ $p->no_wa }}</td>
                            <td>{{ $p->alamat }}</td>

                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="{{ route('resepsionis.pemilik.edit', $p->idpemilik) }}"
                                       class="btn btn-sm btn-outline-warning">
                                        <i class="bi bi-pencil"></i>
                                    </a>

                                    <form action="{{ route('resepsionis.pemilik.destroy', $p->idpemilik) }}"
                                          method="POST" class="d-inline"
                                          onsubmit="return confirm('Hapus pemilik ini?')">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>

                        @empty
                        <tr>
                            <td colspan="5" class="text-center py-3 text-muted">
                                <i class="bi bi-clipboard-x fs-4"></i><br>
                                Belum ada data pemilik.
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
