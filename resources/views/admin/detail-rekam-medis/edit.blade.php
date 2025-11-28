@extends('layouts.lte.main')

@section('content')
<div class="app-content-header">
    <div class="container-fluid">
        <h3>Edit Item Obat / Tindakan</h3>
    </div>
</div>

<div class="app-content">
    <div class="container-fluid">
        <div class="card card-warning card-outline col-md-6 mx-auto">
            <form action="{{ route('detail-rekam-medis.update', $detail->iddetail_rekam_medis) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="card-body">
                    <div class="mb-3">
                        <label>Nama Tindakan / Obat</label>
                        <select name="idkode_tindakan_terapi" class="form-select" required>
                            @foreach($tindakan as $t)
                                <option value="{{ $t->idkode_tindakan_terapi }}" 
                                    {{ $detail->idkode_tindakan_terapi == $t->idkode_tindakan_terapi ? 'selected' : '' }}>
                                    {{ $t->kode }} - {{ $t->deskripsi_tindakan_terapi }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>Keterangan / Dosis</label>
                        <input type="text" name="detail" class="form-control" value="{{ $detail->detail }}">
                    </div>
                </div>

                <div class="card-footer text-end">
                    <a href="{{ route('rekam-medis.show', $detail->idrekam_medis) }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-warning">Update Item</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection