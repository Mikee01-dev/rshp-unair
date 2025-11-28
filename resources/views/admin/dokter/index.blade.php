@extends('layouts.lte.main')

@section('content')

{{-- HEADER INDEX --}}
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row align-items-center">

            <div class="col-sm-6">
                <h3 class="fw-bold mb-0">
                    <i class="bi bi-person-lines-fill me-2 text-primary"></i>
                    Daftar Dokter
                </h3>
            </div>

            <div class="col-sm-6 text-end">
                <a href="{{ route('dokter.create') }}" class="btn btn-primary shadow-sm">
                    <i class="bi bi-plus-lg me-1"></i> Tambah Dokter
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

        {{-- CARD --}}
        <div class="card shadow-sm border-0 mt-3">

            <div class="card-header bg-primary text-white fw-bold py-3">
                <i class="bi bi-list-ul me-2"></i>
                Daftar Dokter
            </div>

            <div class="card-body p-0">

                <table class="table table-striped table-hover align-middle mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Alamat</th>
                            <th>No HP</th>
                            <th>Bidang Dokter</th>
                            <th>Jenis Kelamin</th>
                            <th>Nama</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($dokters as $dokter)
                        <tr>
                            <td class="fw-semibold">#{{ $dokter->id_dokter }}</td>
                            <td>{{ $dokter->alamat }}</td>
                            <td>{{ $dokter->no_hp }}</td>
                            <td>{{ $dokter->bidang_dokter }}</td>
                            <td>
                                @if($dokter->jenis_kelamin == 'L')
                                    <span class="badge bg-info text-dark">Laki-laki</span>
                                @else
                                    <span class="badge bg-warning text-dark">Perempuan</span>
                                @endif
                            </td>
                            <td>{{ $dokter->user->nama ??'-' }}</td>

                            <td class="text-center">
                                <div class="btn-group">

                                    {{-- EDIT --}}
                                    <a href="{{ route('dokter.edit', $dokter->id_dokter) }}"
                                       class="btn btn-sm btn-outline-warning">
                                        <i class="bi bi-pencil"></i>
                                    </a>

                                    {{-- DELETE --}}
                                    <form action="{{ route('dokter.destroy', $dokter->id_dokter) }}"
                                          method="POST"
                                          onsubmit="return confirm('Anda yakin ingin menghapus dokter ini?')">
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
