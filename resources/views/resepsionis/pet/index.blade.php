@extends('layouts.lte.main')

@section('content')
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6"><h3 class="mb-0">Data Pasien (Hewan)</h3></div>
            <div class="col-sm-6 text-end">
                <a href="{{ route('resepsionis.pet.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-lg"></i> Pasien Baru
                </a>
            </div>
        </div>
    </div>
</div>

<div class="app-content">
    <div class="container-fluid">
        @if(session('success')) <div class="alert alert-success">{{ session('success') }}</div> @endif

        <div class="card card-outline card-primary">
            <div class="card-body p-0">
                <table class="table table-striped align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>Nama Hewan</th>
                            <th>Jenis & Ras</th>
                            <th>Pemilik</th>
                            <th>Gender/Warna</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pets as $pet)
                        <tr>
                            <td><span class="fw-bold text-primary">{{ $pet->nama }}</span></td>
                            <td>{{ $pet->ras->nama_ras ?? '-' }} <br> <small>{{ $pet->ras->jenisHewan->nama_jenis_hewan ?? '' }}</small></td>
                            <td>{{ $pet->pemilik->user->nama ?? '-' }}</td>
                            <td>{{ $pet->jenis_kelamin }} / {{ $pet->warna_tanda }}</td>
                            <td>
                                <a href="{{ route('resepsionis.pet.edit', $pet->idpet) }}" class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i></a>
                                <form action="{{ route('resepsionis.pet.destroy', $pet->idpet) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="5" class="text-center">Kosong.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection