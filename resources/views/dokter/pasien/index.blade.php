@extends('layouts.lte.main')

@section('content')
<div class="app-content-header">
    <div class="container-fluid">
        <h3>Database Pasien</h3>
    </div>
</div>

<div class="app-content">
    <div class="container-fluid">
        <div class="card card-outline card-info">
            <div class="card-header">
                <form action="{{ route('dokter.pasien.index') }}" method="GET">
                    <div class="input-group" style="width: 250px;">
                        <input type="text" name="search" class="form-control" placeholder="Cari Hewan..." value="{{ request('search') }}">
                        <button class="btn btn-default"><i class="bi bi-search"></i></button>
                    </div>
                </form>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>Nama</th>
                            <th>Jenis/Ras</th>
                            <th>Pemilik</th>
                            <th>Gender</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pets as $pet)
                        <tr>
                            <td class="fw-bold text-primary">{{ $pet->nama }}</td>
                            <td>{{ $pet->ras->jenisHewan->nama_jenis_hewan }} - {{ $pet->ras->nama_ras }}</td>
                            <td>{{ $pet->pemilik->user->nama ?? '-' }}</td>
                            <td>{{ $pet->jenis_kelamin }}</td>
                        </tr>
                        @empty
                        <tr><td colspan="4" class="text-center">Kosong.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection