@extends('layouts.lte.main')

@section('content')

{{-- HEADER INDEX --}}
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row align-items-center">

            <div class="col-sm-6">
                <h3 class="fw-bold mb-0">
                    <i class="bi bi-collection text-info me-2"></i>
                    Database Pasien
                </h3>
            </div>

            <div class="col-sm-6 text-end">
                {{-- Tidak ada tombol pada page ini --}}
            </div>

        </div>
    </div>
</div>


{{-- CONTENT --}}
<div class="app-content">
    <div class="container-fluid">

        <div class="card shadow-sm border-0">

            {{-- FILTER --}}
            <div class="card-header bg-light">
                <form action="{{ route('dokter.pasien.index') }}" method="GET" class="mb-0">
                    <div class="input-group" style="max-width: 260px;">
                        <input type="text" name="search" class="form-control"
                               placeholder="Cari Hewan..."
                               value="{{ request('search') }}">
                        <button class="btn btn-outline-secondary">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </form>
            </div>

            {{-- TABLE --}}
            <div class="card-body p-0">
                <table class="table table-hover table-striped align-middle mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>Nama Hewan</th>
                            <th>Jenis / Ras</th>
                            <th>Pemilik</th>
                            <th>Gender</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($pets as $pet)
                        <tr>
                            <td class="fw-bold text-primary">{{ $pet->nama }}</td>
                            <td>
                                {{ $pet->ras->jenisHewan->nama_jenis_hewan }}
                                -
                                {{ $pet->ras->nama_ras }}
                            </td>
                            <td>{{ $pet->pemilik->user->nama ?? '-' }}</td>
                            <td>{{ $pet->jenis_kelamin == 'J' ? 'Jantan' : 'Betina' }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center py-4 text-muted">
                                <i class="bi bi-database-x fs-4 d-block mb-2"></i>
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
