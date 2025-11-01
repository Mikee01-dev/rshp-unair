@extends('layouts.dokter')

@section('content')
<div class="container">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">Rekam Medis yang Saya Tangani</h3>
        </div>
        <div class="card-body">
            
            <table class="table table-bordered table-striped mt-3">
                <thead>
                    <tr>
                        <th style="width: 15%;">Tanggal & Waktu</th>
                        <th style="width: 20%;">Nama Pet</th>
                        <th style="width: 25%;">Diagnosa</th>
                        <th style="width: 25%;">Tindakan</th> 
                        <th style="width: 15%;">Keterangan Detail</th> {{-- Kolom Baru --}}
                    </tr>
                </thead>
                <tbody>
                    @forelse($rekamMedis as $rm)
                    <tr>
                        <td>{{ $rm->created_at->format('d M Y H:i') }}</td>
                        <td>{{ $rm->pet->nama ?? 'N/A' }}</td>
                        <td>{{ $rm->diagnosa }}</td>
                        
                        <td>
                            @if($rm->detailRekamMedis->isNotEmpty())
                                <ul>
                                    @foreach($rm->detailRekamMedis as $detail)
                                        <li>{{ $detail->kodeTindakanTerapi->deskripsi_tindakan_terapi ?? 'Tindakan Tidak Dikenal' }}</li>
                                    @endforeach
                                </ul>
                            @else
                                <span class="text-muted">Tidak ada tindakan.</span>
                            @endif
                        </td>
                        
                        <td>
                            @if($rm->detailRekamMedis->isNotEmpty())
                                <ul>
                                    @foreach($rm->detailRekamMedis as $detail)
                                        <li>{{ $detail->detail ?? '-' }}</li>
                                    @endforeach
                                </ul>
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                        
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center text-danger">
                            Anda belum menangani rekam medis apapun saat ini.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            
        </div>
    </div>
</div>
@endsection