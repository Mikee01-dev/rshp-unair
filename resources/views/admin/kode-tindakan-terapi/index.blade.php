@extends('layouts.lte.main')

@section('content')

{{-- HEADER INDEX STANDAR --}}
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row align-items-center">

            <div class="col-sm-6">
                <h3 class="fw-bold mb-0">
                    <i class="bi bi-clipboard2-pulse-fill me-2 text-primary"></i>
                    Kode Tindakan Terapi
                </h3>
            </div>

            <div class="col-sm-6 text-end">
                <a href="{{ route('kode-tindakan-terapi.create') }}" class="btn btn-primary shadow-sm">
                    <i class="bi bi-plus-lg"></i> Tambah Kode Tindakan Terapi
                </a>
            </div>

        </div>
    </div>
</div>


<div class="app-content">
    <div class="container-fluid">

        {{-- ALERT --}}
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show mt-2 shadow-sm">
                <i class="bi bi-check-circle-fill me-1"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        {{-- CARD LIST --}}
        <div class="card shadow-sm border-0 mt-3">

            <div class="card-header bg-primary text-white fw-bold">
                <i class="bi bi-list-ul me-2"></i> Daftar Kode Tindakan Terapi
            </div>

            <div class="card-body p-0">

                <table class="table table-striped table-hover align-middle mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th style="width: 60px">No</th>
                            <th>Kode</th>
                            <th>Deskripsi</th>
                            <th class="text-center" style="width: 150px">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($kodeTindakanTerapi as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td class="fw-semibold">{{ $item->kode }}</td>
                            <td>{{ $item->deskripsi_tindakan_terapi }}</td>

                            <td class="text-center">
                                <div class="btn-group">

                                    {{-- EDIT --}}
                                    <a href="{{ route('kode-tindakan-terapi.edit', $item->idkode_tindakan_terapi) }}"
                                       class="btn btn-sm btn-outline-warning">
                                        <i class="bi bi-pencil"></i>
                                    </a>

                                    {{-- DELETE --}}
                                    <form action="{{ route('kode-tindakan-terapi.destroy', $item->idkode_tindakan_terapi) }}"
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
