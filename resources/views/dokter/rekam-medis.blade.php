@extends('layouts.dokter')

@section('content')
<div class="container">
    <h3>Rekam Medis yang Saya Tangani</h3>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Nama Pet</th>
                <th>Diagnosa</th>
                <th>Tindakan/Terapi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rekamMedis as $rm)
            <tr>
                <td>{{ $rm->created_at }}</td>
                <td>{{ $rm->pet->nama }}</td>
                <td>{{ $rm->diagnosa }}</td>
                <td>
                    <ul>
                        @foreach($rm->detailRekamMedis as $detail)
                            <li>{{ $detail->kodeTindakanTerapi->nama_tindakan ?? '-' }}</li>
                        @endforeach
                    </ul>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
