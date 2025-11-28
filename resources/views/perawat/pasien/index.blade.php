@extends('layouts.lte.main')

@section('content')
<div class="app-content-header">
    <div class="container-fluid">
        <h3 class="mb-0">Data Pasien Hewan</h3>
    </div>
</div>

<div class="app-content">
    <div class="container-fluid">
        <div class="card card-outline card-info">
            <div class="card-header">
                <form action="{{ route('perawat.pasien.index') }}" method="GET">
                    <div class="input-group" style="width: 250px;">
                        <input type="text" name="search" class="form-control" placeholder="Cari Nama Hewan...">
                        <button class="btn btn-default"><i class="bi bi-search"></i></button>
                    </div>
                </form>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped table-hover">
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
                            <td><span class="fw-bold text-primary">{{ $pet->nama }}</span></td>
                            <td>{{ $pet->ras->jenisHewan->nama_jenis_hewan }} - {{ $pet->ras->nama_ras }}</td>
                            <td>{{ $pet->pemilik->user->nama ?? '-' }}</td>
                            <td>{{ $pet->jenis_kelamin }} / {{ $pet->warna_tanda }}</td>
                        </tr>
                        @empty
                        <tr><td colspan="4" class="text-center">Data tidak ditemukan.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection