@extends('layouts.pemilik') 

@section('content')
<div class="container">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">Data Pet Saya</h3>
        </div>
        
        <div class="card-body">
            @if ($pets->isEmpty())
                <div class="alert alert-warning text-center" role="alert">
                    Anda belum memiliki data Pet yang terdaftar.
                </div>
            @else
                <table class="table table-bordered table-striped mt-3">
                    <thead>
                        <tr>
                            <th style="width: 20%;">Nama</th>
                            <th style="width: 20%;">Jenis</th>
                            <th style="width: 20%;">Ras</th>
                            <th style="width: 20%;">Jenis Kelamin</th>
                            <th style="width: 20%;">Tanggal Lahir</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pets as $pet)
                        <tr>
                            <td>{{ $pet->nama }}</td>
                            <td>{{ $pet->ras->jenis->nama_jenis_hewan ?? 'N/A' }}</td>
                            <td>{{ $pet->ras->nama_ras ?? 'N/A' }}</td>
                            <td>
                                @if($pet->jenis_kelamin === 'J')
                                    Jantan
                                @elseif($pet->jenis_kelamin === 'B')
                                    Betina
                                @else
                                    N/A
                                @endif
                            </td>
                            <td>
                                {{ $pet->tanggal_lahir ? \Carbon\Carbon::parse($pet->tanggal_lahir)->format('d M Y') : 'N/A' }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
@endsection
