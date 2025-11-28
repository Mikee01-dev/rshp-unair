@extends('layouts.lte.main')

@section('content')

{{-- HEADER --}}
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <h3 class="fw-bold mb-0">
                    <i class="bi bi-github text-warning me-2"></i>
                    Edit Data Pasien
                </h3>
            </div>
            <div class="col-sm-6 text-end">
                <a href="{{ route('resepsionis.pet.index') }}" class="btn btn-secondary shadow-sm">
                    Kembali
                </a>
            </div>
        </div>
    </div>
</div>


<div class="app-content">
    <div class="container-fluid">

        <form action="{{ route('resepsionis.pet.update', $pet->idpet) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row justify-content-center mt-3">
                <div class="col-md-8">

                    <div class="card shadow-sm border-0">

                        <div class="card-body">

                            {{-- PEMILIK --}}
                            <div class="mb-3">
                                <label class="fw-semibold">Pemilik Hewan</label>
                                <select name="idpemilik" class="form-select shadow-sm select2" required>
                                    <option value="">-- Pilih Pemilik --</option>
                                    @foreach($pemiliks as $p)
                                        <option value="{{ $p->idpemilik }}" {{ $pet->idpemilik == $p->idpemilik ? 'selected' : '' }}>
                                            {{ $p->user->nama ?? '-' }} ({{ $p->alamat }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="row">
                                {{-- NAMA --}}
                                <div class="col-md-6 mb-3">
                                    <label class="fw-semibold">Nama Hewan</label>
                                    <input type="text" name="nama" class="form-control shadow-sm"
                                           value="{{ $pet->nama }}" required>
                                </div>

                                {{-- TANGGAL LAHIR --}}
                                <div class="col-md-6 mb-3">
                                    <label class="fw-semibold">Tanggal Lahir</label>
                                    <input type="date" name="tanggal_lahir" class="form-control shadow-sm"
                                           value="{{ $pet->tanggal_lahir }}">
                                </div>
                            </div>

                            <div class="row">
                                {{-- JENIS --}}
                                <div class="col-md-6 mb-3">
                                    <label class="fw-semibold">Jenis Hewan</label>

                                    @php $currentJenisId = $pet->ras->idjenis_hewan ?? ''; @endphp

                                    <select id="select-jenis" class="form-select shadow-sm"
                                            onchange="updateRas()" required>
                                        <option value="">-- Pilih Jenis --</option>
                                        @foreach($jenis_hewans as $jh)
                                            <option value="{{ $jh->idjenis_hewan }}"
                                                    {{ $currentJenisId == $jh->idjenis_hewan ? 'selected' : '' }}>
                                                {{ $jh->nama_jenis_hewan }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                {{-- RAS --}}
                                <div class="col-md-6 mb-3">
                                    <label class="fw-semibold">Ras</label>
                                    <select name="idras_hewan" id="select-ras"
                                            class="form-select shadow-sm" required>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                {{-- KELAMIN --}}
                                <div class="col-md-6 mb-3">
                                    <label class="fw-semibold">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" class="form-select shadow-sm" required>
                                        <option value="J" {{ $pet->jenis_kelamin == 'J' ? 'selected' : '' }}>Jantan</option>
                                        <option value="B" {{ $pet->jenis_kelamin == 'B' ? 'selected' : '' }}>Betina</option>
                                    </select>
                                </div>

                                {{-- WARNA --}}
                                <div class="col-md-6 mb-3">
                                    <label class="fw-semibold">Warna / Tanda Fisik</label>
                                    <input type="text" name="warna_tanda" class="form-control shadow-sm"
                                           value="{{ $pet->warna_tanda }}" required>
                                </div>
                            </div>

                        </div>

                        <div class="card-footer text-end bg-light">
                            <button type="submit" class="btn btn-warning shadow-sm px-4">
                                <i class="bi bi-save me-1"></i> Update Perubahan
                            </button>
                        </div>

                    </div>

                </div>
            </div>

        </form>

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

        if (!jenisId) return;

        const filtered = allRas.filter(r => r.idjenis_hewan == jenisId);

        filtered.forEach(r => {
            const opt = document.createElement('option');
            opt.value = r.idras_hewan;
            opt.text = r.nama_ras;

            if (r.idras_hewan == savedRasId) opt.selected = true;

            rasDropdown.add(opt);
        });
    }

    document.addEventListener('DOMContentLoaded', updateRas);
</script>

@endsection
