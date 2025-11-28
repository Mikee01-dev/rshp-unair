@extends('layouts.lte.main')

@section('content')

{{-- HEADER INDEX --}}
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row align-items-center">

            <div class="col-sm-6">
                <h3 class="fw-bold mb-0">
                    <i class="bi bi-bandaid-fill text-info me-2"></i>
                    Data Pasien Hewan
                </h3>
            </div>

            <div class="col-sm-6 text-end">
                {{-- Kalau tidak ada tombol create, biarkan kosong --}}
            </div>

        </div>
    </div>
</div>

{{-- CONTENT --}}
<div class="app-content">
    <div class="container-fluid">

        {{-- SEARCH --}}
        <div class="card shadow-sm border-0">
            <div class="card-header bg-light">
                <form action="{{ route('perawat.pasien.index') }}" method="GET">
                    <div class="input-group" style="max-width: 260px;">
                        <span class="input-group-text"><i class="bi bi-search"></i></span>
                        <input type="text" name="search" class="form-control"
                               placeholder="Cari Nama Hewan..." value="{{ request('search') }}">
                    </div>
                </form>
            </div>

            <div class="card-body p-0">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>Nama Hewan</th>
                            <th>Jenis & Ras</th>
                            <th>Pemilik</th>
                            <th>Gender / Warna</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pets as $pet)
                        <tr>
                            <td class="fw-bold text-primary">{{ $pet->nama }}</td>
                            <td>
                                {{ $pet->ras->jenisHewan->nama_jenis_hewan }}
                                <br>
                                <small class="text-muted">{{ $pet->ras->nama_ras }}</small>
                            </td>
                            <td>{{ $pet->pemilik->user->nama ?? '-' }}</td>
                            <td>{{ $pet->jenis_kelamin }} / {{ $pet->warna_tanda }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center py-4 text-muted">
                                <i class="bi bi-clipboard-x fs-4 d-block"></i>
                                Data tidak ditemukan.
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
