@extends('layouts.main')

@section('content')
<div class="app-content-header">
    <div class="container-fluid">
        <h3>Koreksi Resep / Tindakan</h3>
    </div>
</div>

<div class="app-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card card-warning card-outline">
                    <div class="card-header">
                        <h5 class="card-title">Edit Item</h5>
                    </div>
                    
                    <form action="{{ route('dokter.periksa.update-detail', $detail->iddetail_rekam_medis) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="card-body">
                            
                            <div class="mb-3">
                                <label class="form-label">Nama Obat / Tindakan</label>
                                <select name="idkode_tindakan_terapi" class="form-select select2" required>
                                    @foreach($tindakan as $t)
                                        <option value="{{ $t->idkode_tindakan_terapi }}" 
                                            {{ $detail->idkode_tindakan_terapi == $t->idkode_tindakan_terapi ? 'selected' : '' }}>
                                            {{ $t->kode }} - {{ $t->deskripsi_tindakan_terapi }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Dosis / Keterangan</label>
                                <input type="text" name="detail" class="form-control" value="{{ $detail->detail }}">
                            </div>

                        </div>

                        <div class="card-footer d-flex justify-content-between">
                            <a href="{{ route('dokter.periksa.edit', $detail->idrekam_medis) }}" class="btn btn-secondary">Batal</a>
                            
                            <button type="submit" class="btn btn-warning">
                                <i class="bi bi-save"></i> Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection