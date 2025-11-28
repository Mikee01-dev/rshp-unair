@extends('layouts.lte.main')

@section('content')

{{-- HEADER HALAMAN (Standar) --}}
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row align-items-center">

            <div class="col-sm-6">
                <h3 class="fw-bold mb-0">
                    <i class="bi bi-ui-checks-grid me-2 text-primary"></i>
                    Daftar Ras Hewan
                </h3>
            </div>

            <div class="col-sm-6 text-end">
                <a href="{{ route('ras-hewan.create') }}" class="btn btn-primary shadow-sm">
                    <i class="bi bi-plus-lg"></i> Tambah Ras Hewan
                </a>
            </div>

        </div>
    </div>
</div>

<div class="app-content">
    <div class="container-fluid">

        {{-- CARD LIST --}}
        <div class="card shadow-sm border-0 mt-3">

            <div class="card-header bg-primary text-white py-3">
                <h5 class="mb-0">
                    <i class="bi bi-list-ul me-2"></i>
                    Daftar Ras Hewan
                </h5>
            </div>

            <div class="card-body p-0">

                <table class="table table-hover table-striped align-middle mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th style="width: 60px">No</th>
                            <th>Nama Ras Hewan</th>
                            <th>Jenis Hewan</th>
                            <th class="text-center" style="width: 160px">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse ($rasHewan as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->nama_ras }}</td>
                            <td>{{ $item->jenis->nama_jenis_hewan }}</td>

                            <td class="text-center">
                                <div class="btn-group">

                                    {{-- EDIT --}}
                                    <a href="{{ route('ras-hewan.edit', $item->idras_hewan) }}"
                                       class="btn btn-sm btn-outline-warning" title="Edit">
                                        <i class="bi bi-pencil"></i>
                                    </a>

                                    {{-- DELETE --}}
                                    <form action="{{ route('ras-hewan.destroy', $item->idras_hewan) }}"
                                          method="POST"
                                          onsubmit="return confirm('Apakah Anda yakin ingin menghapus ras hewan ini?');">
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
                            <td colspan="4" class="text-center py-4 text-muted">
                                <i class="bi bi-clipboard-x fs-3 d-block mb-1"></i>
                                Belum ada data ras hewan.
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
