@extends('layouts.lte.main')

@section('content')
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6"><h3 class="mb-0">Data Pemilik (Owner)</h3></div>
            <div class="col-sm-6 text-end">
                <a href="{{ route('resepsionis.pemilik.create') }}" class="btn btn-primary">
                    <i class="bi bi-person-plus"></i> Tambah Pemilik
                </a>
            </div>
        </div>
    </div>
</div>

<div class="app-content">
    <div class="container-fluid">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card card-outline card-primary">
            <div class="card-body p-0">
                <table class="table table-striped align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Nama Lengkap</th>
                            <th>Kontak (WA)</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pemiliks as $p)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <strong>{{ $p->user->nama ?? '-' }}</strong><br>
                                <small class="text-muted">{{ $p->user->email ?? '-' }}</small>
                            </td>
                            <td>{{ $p->no_wa }}</td>
                            <td>{{ $p->alamat }}</td>
                            <td>
                                <a href="{{ route('resepsionis.pemilik.edit', $p->idpemilik) }}" class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i></a>
                                <form action="{{ route('resepsionis.pemilik.destroy', $p->idpemilik) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus pemilik ini?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="5" class="text-center">Belum ada data pemilik.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection