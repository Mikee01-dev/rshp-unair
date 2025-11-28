@extends('layouts.lte.main')

@section('content')

{{-- HEADER (Non-Index: Judul + Tombol Kembali) --}}
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row align-items-center">

            <div class="col-sm-6">
                <h3 class="fw-bold mb-0">
                    <i class="bi bi-github me-2 text-warning"></i>
                    Edit Data Pasien
                </h3>
            </div>

        </div>
    </div>
</div>


<div class="app-content">
    <div class="container-fluid">

        <div class="row justify-content-center mt-3">
            <div class="col-md-8">

                <div class="card shadow-sm border-0">

                    {{-- CARD HEADER --}}
                    <div class="card-header bg-warning text-dark fw-bold py-3">
                        <i class="bi bi-pencil-square me-2"></i>
                        Form Edit Data Pasien
                    </div>

                    <div class="card-body">

                        <form action="{{ route('pet.update', $pet->idpet) }}" method="POST">
                            @csrf
                            @method('PUT')

                            {{-- PEMILIK --}}
                            <div class="mb-3">
                                <label class="fw-semibold">Pemilik Hewan</label>
                                <select name="idpemilik" class="form-select shadow-sm select2" required>
                                    <option value="">-- Pilih Pemilik --</option>
                                    @foreach($pemiliks as $p)
                                        <option value="{{ $p->idpemilik }}" {{ $pet->idpemilik == $p->idpemilik ? 'selected' : '' }}>
                                            {{ $p->user->nama }} ({{ $p->alamat }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <hr>

                            {{-- NAMA + TGL LAHIR --}}
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="fw-semibold">Nama Hewan</label>
                                    <input type="text" name="nama" class="form-control shadow-sm"
                                           value="{{ $pet->nama }}" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="fw-semibold">Tanggal Lahir</label>
                                    <input type="date" name="tanggal_lahir"
                                           class="form-control shadow-sm"
                                           value="{{ $pet->tanggal_lahir }}">
                                </div>
                            </div>

                            {{-- JENIS + RAS --}}
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="fw-semibold">Jenis Hewan</label>
                                    <select id="select-jenis" class="form-select shadow-sm" onchange="updateRas()" required>
                                        <option value="">-- Pilih Jenis --</option>
                                        @foreach($jenis_hewans as $jh)
                                            <option value="{{ $jh->idjenis_hewan }}" 
                                                {{ $pet->ras->idjenis_hewan == $jh->idjenis_hewan ? 'selected' : '' }}>
                                                {{ $jh->nama_jenis_hewan }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="fw-semibold">Ras Hewan</label>
                                    <select name="idras_hewan" id="select-ras"
                                            class="form-select shadow-sm" required></select>
                                </div>
                            </div>

                            {{-- KELAMIN + WARNA --}}
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="fw-semibold">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" class="form-select shadow-sm" required>
                                        <option value="J" {{ $pet->jenis_kelamin == 'J' ? 'selected' : '' }}>Jantan</option>
                                        <option value="B" {{ $pet->jenis_kelamin == 'B' ? 'selected' : '' }}>Betina</option>
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="fw-semibold">Warna / Tanda Fisik</label>
                                    <input type="text" name="warna_tanda"
                                           class="form-control shadow-sm"
                                           value="{{ $pet->warna_tanda }}" required>
                                </div>
                            </div>

                            {{-- BUTTON --}}
                            <div class="text-end mt-4">

                                <a href="{{ route('pet.index') }}" class="btn btn-secondary shadow-sm px-4 me-2">
                                    <i class="bi bi-x-circle me-1"></i>
                                    Batal
                                </a>

                                <button type="submit" class="btn btn-warning shadow-sm px-4">
                                    <i class="bi bi-save me-1"></i>
                                    Simpan Perubahan
                                </button>

                            </div>


                        </form>

                    </div>

                </div>

            </div>
        </div>

    </div>
</div>


{{-- SCRIPT --}}
<script>
    const allRas = @json($ras_hewans);
    const savedRasId = "{{ $pet->idras_hewan }}";

    function updateRas() {
        const jenisId = document.getElementById('select-jenis').value;
        const rasDropdown = document.getElementById('select-ras');

        rasDropdown.innerHTML = '<option value="">-- Pilih Ras --</option>';

        const filtered = allRas.filter(r => r.idjenis_hewan == jenisId);

        filtered.forEach(r => {
            const option = document.createElement('option');
            option.value = r.idras_hewan;
            option.text = r.nama_ras;

            if (r.idras_hewan == savedRasId) option.selected = true;

            rasDropdown.add(option);
        });
    }

    document.addEventListener('DOMContentLoaded', updateRas);
</script>

@endsection
