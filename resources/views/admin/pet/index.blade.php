@extends('layouts.lte.main')

@section('content')

{{-- HEADER STANDAR INDEX --}}
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row align-items-center">

            <div class="col-sm-6">
                <h3 class="fw-bold mb-0">
                    <i class="bi bi-github me-2 text-primary"></i> {{-- ikon hewan peliharaan --}}
                    Daftar Hewan Peliharaan
                </h3>
            </div>

            <div class="col-sm-6 text-end">
                <a href="{{ route('pet.create') }}" class="btn btn-primary shadow-sm">
                    <i class="bi bi-plus-lg"></i> Tambah Hewan Peliharaan
                </a>
            </div>

        </div>
    </div>
</div>


<div class="app-content">
    <div class="container-fluid">

        {{-- CARD TABLE --}}
        <div class="card shadow-sm border-0 mt-3">

            <div class="card-header bg-primary text-white py-3">
                <h5 class="mb-0">
                    <i class="bi bi-list-ul me-2"></i>
                    Data Hewan Peliharaan
                </h5>
            </div>

            <div class="card-body p-0">

                <table class="table table-hover table-striped align-middle mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th style="width: 60px">No</th>
                            <th>Nama Hewan</th>
                            <th>Ras</th>
                            <th>Jenis</th>
                            <th>Pemilik</th>
                            <th class="text-center" style="width: 150px">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($pet as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>

                            <td>
                                <i class="bi bi-github text-primary me-1"></i>
                                {{ $item->nama }}
                            </td>

                            <td>{{ $item->ras->nama_ras }}</td>
                            <td>{{ $item->ras->jenis->nama_jenis_hewan }}</td>
                            <td>
                                <i class="bi bi-person-circle me-1 text-secondary"></i>
                                {{ $item->pemilik->user->nama }}
                            </td>

                            <td class="text-center">
                                <div class="btn-group">

                                    {{-- EDIT --}}
                                    <a href="{{ route('pet.edit', $item->idpet) }}"
                                       class="btn btn-sm btn-outline-warning" title="Edit">
                                        <i class="bi bi-pencil"></i>
                                    </a>

                                    {{-- DELETE --}}
                                    <form action="{{ route('pet.destroy', $item->idpet) }}"
                                          method="POST"
                                          onsubmit="return confirm('Apakah Anda yakin ingin menghapus hewan peliharaan ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger" title="Hapus">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>

                                </div>
                            </td>
                        </tr>

                        @empty
                        <tr>
                            <td colspan="6" class="text-center py-4 text-muted">
                                <i class="bi bi-clipboard-x fs-3 d-block"></i>
                                Belum ada data hewan peliharaan.
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
