@extends('layouts.lte.main')

@section('content')
<div class="app-content-header">
    <div class="container-fluid">
        <h3>Edit Header Rekam Medis #{{ $rm->idrekam_medis }}</h3>
    </div>
</div>

<div class="app-content">
    <div class="container-fluid">
        <form action="{{ route('rekam-medis.update', $rm->idrekam_medis) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="row">
                <div class="col-md-4">
                    <div class="card card-warning card-outline">
                        <div class="card-body">
                            <div class="mb-3">
                                <label>Pasien Hewan</label>
                                <select name="idpet" class="form-select" required>
                                    @foreach($pets as $pet)
                                        <option value="{{ $pet->idpet }}" {{ $rm->idpet == $pet->idpet ? 'selected' : '' }}>
                                            {{ $pet->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label>Dokter Pemeriksa</label>
                                <select name="dokter_pemeriksa" class="form-select" required>
                                    @foreach($dokters as $d)
                                        <option value="{{ $d->idrole_user }}" {{ $rm->dokter_pemeriksa == $d->idrole_user ? 'selected' : '' }}>
                                            drh. {{ $d->user->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="card card-warning card-outline">
                        <div class="card-body">
                            <div class="mb-3">
                                <label>Anamnesa</label>
                                <textarea name="anamnesa" class="form-control" rows="3">{{ $rm->anamnesa }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label>Temuan Klinis</label>
                                <textarea name="temuan_klinis" class="form-control" rows="3">{{ $rm->temuan_klinis }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="fw-bold">Diagnosa</label>
                                <textarea name="diagnosa" class="form-control" rows="2" required>{{ $rm->diagnosa }}</textarea>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <button type="submit" class="btn btn-warning">Update Header</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection