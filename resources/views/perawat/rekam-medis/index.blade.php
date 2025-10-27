@extends('layouts.perawat')

@section('content')

<div class="container">
    <link rel="stylesheet" href="{{ asset('css/page.css') }}">
    <div class="judul-halaman">Daftar Rekam Medis</div>
</div>
<div class="container">
    @foreach ($rekamMedis as $rm)
    
        <div class="rekam-medis-block">
            <h3>Rekam Medis #{{ $rm->idrekam_medis }} - {{ $rm->pet->nama }}</h3>
            <p><strong>Anamnesa:</strong> {{ $rm->anamnesa }}</p>
            <p><strong>Diagnosa:</strong> {{ $rm->diagnosa }}</p>
        
            <h4>Detail Tindakan:</h4>
            
            <table>
                <thead>
                    <tr>
                        <th>Tindakan/Terapi</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rm->detailRekamMedis as $detail)
                    <tr>
                        <td>{{ $detail->kodeTindakanTerapi->nama_tindakan ?? 'Tidak ada tindakan' }}</td>
                        <td>{{ $detail->detail }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
        </div>
        <hr style="border: none; border-top: 1px solid #eee; margin: 20px 0;">
    @endforeach
</div>

@endsection