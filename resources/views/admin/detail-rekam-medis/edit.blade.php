@extends('layouts.lte.main')

@section('content')

{{-- HEADER NON-INDEX --}}
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row align-items-center">

            <div class="col-sm-6">
                <h3 class="fw-bold mb-0">
                    <i class="bi bi-clipboard2-pulse-fill me-2 text-warning"></i>
                    Edit Item Obat / Tindakan
                </h3>
            </div>

        </div>
    </div>
</div>

<div class="app-content">
    <div class="container-fluid">

        <div class="row justify-content-center mt-3">
            <div class="col-md-6">

                <div class="card shadow-sm border-0">

                    {{-- CARD HEADER --}}
                    <div class="card-header bg-warning fw-bold text-dark py-3">
                        <i class="bi bi-pencil-square me-2"></i>
                        Form Edit Item
                    </div>

                    <div class="card-body">

                        <form action="{{ route('detail-rekam-medis.update', $detail->iddetail_rekam_medis) }}" method="POST">
                            @csrf
                            @method('PUT')

                            {{-- TINDAKAN / OBAT --}}
                            <div class="mb-3">
                                <label class="fw-semibold">Nama Tindakan / Obat</label>
                                <select name="idkode_tindakan_terapi" class="form-select shadow-sm" required>
                                    @foreach($tindakan as $t)
                                        <option value="{{ $t->idkode_tindakan_terapi }}"
                                            {{ $detail->idkode_tindakan_terapi == $t->idkode_tindakan_terapi ? 'selected' : '' }}>
                                            {{ $t->kode }} - {{ $t->deskripsi_tindakan_terapi }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- KETERANGAN / DOSIS --}}
                            <div class="mb-3">
                                <label class="fw-semibold">Keterangan / Dosis</label>
                                <input type="text" name="detail"
                                    class="form-control shadow-sm"
                                    value="{{ $detail->detail }}">
                            </div>

                            {{-- BUTTON --}}
                            <div class="text-end mt-4">
                                <a href="{{ route('rekam-medis.show', $detail->idrekam_medis) }}" class="btn btn-secondary px-4">
                                    Batal
                                </a>

                                <button type="submit" class="btn btn-warning px-4">
                                    <i class="bi bi-save me-1"></i>
                                    Update Item
                                </button>
                            </div>

                        </form>

                    </div>

                </div>

            </div>
        </div>

    </div>
</div>

@endsection
