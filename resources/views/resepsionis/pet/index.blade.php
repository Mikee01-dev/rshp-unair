@extends('layouts.lte.main')

@section('content')

<div class="app-content-header">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <h3 class="fw-bold mb-0">
                    <i class="bi bi-clipboard-heart text-primary me-2"></i>
                    Data Pasien (Hewan)
                </h3>
            </div>
            <div class="col-sm-6 text-end">
                <a href="{{ route('resepsionis.pet.create') }}" class="btn btn-primary shadow-sm">
                    <i class="bi bi-plus-lg"></i> Pasien Baru
                </a>
            </div>
        </div>
    </div>
</div>


<div class="app-content">
    <div class="container-fluid">

        @if(session('success'))
            <div class="alert alert-success shadow-sm alert-dismissible fade show mt-2">
                <i class="bi bi-check-circle-fill me-1"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="card shadow-sm border-0 mt-3">

            <div class="card-header bg-primary text-white fw-bold">
                <i class="bi bi-list-ul me-2"></i> Daftar Pasien Hewan
            </div>

            <div class="card-body p-0">
                <table class="table table-striped table-hover align-middle mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>Nama Hewan</th>
                            <th>Jenis & Ras</th>
                            <th>Pemilik</th>
                            <th>Gender / Warna</th>
                            <th class="text-center" style="width: 120px;">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($pets as $pet)
                        <tr>
                            <td class="fw-semibold text-primary">{{ $pet->nama }}</td>

                            <td>
                                {{ $pet->ras->nama_ras ?? '-' }} <br>
                                <small class="text-muted">
                                    <i class="bi bi-tags-fill me-1"></i>
                                    {{ $pet->ras->jenisHewan->nama_jenis_hewan ?? '-' }}
                                </small>
                            </td>

                            <td>
                                <i class="bi bi-person-circle text-info me-1"></i>
                                {{ $pet->pemilik->user->nama ?? '-' }}
                            </td>

                            <td>
                                {{ $pet->jenis_kelamin == 'J' ? 'Jantan' : 'Betina' }}
                                /
                                {{ $pet->warna_tanda }}
                            </td>

                            <td class="text-center">
                                <div class="btn-group">

                                    <a href="{{ route('resepsionis.pet.edit', $pet->idpet) }}"
                                       class="btn btn-sm btn-outline-warning">
                                        <i class="bi bi-pencil"></i>
                                    </a>

                                    <form action="{{ route('resepsionis.pet.destroy', $pet->idpet) }}"
                                          method="POST"
                                          onsubmit="return confirm('Yakin ingin menghapus data pasien ini?')">
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
                            <td colspan="5" class="text-center text-muted py-4">
                                <i class="bi bi-clipboard-x fs-4 d-block mb-2"></i>
                                Tidak ada data pasien.
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
