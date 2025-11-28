@extends('layouts.lte.main')

@section('content')

{{-- HEADER INDEX --}}
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row align-items-center">

            <div class="col-sm-6">
                <h3 class="fw-bold mb-0">
                    <i class="bi bi-collection-fill me-2 text-primary"></i>
                    Daftar Kategori Klinis
                </h3>
            </div>

            <div class="col-sm-6 text-end">
                <a href="{{ route('kategori-klinis.create') }}" class="btn btn-primary shadow-sm">
                    <i class="bi bi-plus-lg me-1"></i>
                    Tambah Kategori Klinis
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

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show shadow-sm mt-2">
                <i class="bi bi-exclamation-circle-fill me-1"></i>
                {{ session('error') }}
                <button class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif


        <div class="card shadow-sm border-0 mt-3">

            <div class="card-header bg-primary text-white fw-bold py-3">
                <i class="bi bi-list-ul me-2"></i>
                List Kategori Klinis
            </div>

            <div class="card-body p-0">

                <table class="table table-hover table-striped align-middle mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th style="width: 60px">No</th>
                            <th>Nama Kategori Klinis</th>
                            <th class="text-center" style="width: 150px">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($kategoriKlinis as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>

                                <td>{{ $item->nama_kategori_klinis }}</td>

                                <td class="text-center">
                                    <div class="btn-group">

                                        {{-- EDIT --}}
                                        <a href="{{ route('kategori-klinis.edit', $item->idkategori_klinis) }}"
                                           class="btn btn-sm btn-outline-warning" title="Edit">
                                            <i class="bi bi-pencil"></i>
                                        </a>

                                        {{-- DELETE --}}
                                        <form action="{{ route('kategori-klinis.destroy', $item->idkategori_klinis) }}"
                                              method="POST"
                                              onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">
                                            @csrf @method('DELETE')
                                            <button class="btn btn-sm btn-outline-danger" title="Hapus">
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
                                    Belum ada data kategori klinis.
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
