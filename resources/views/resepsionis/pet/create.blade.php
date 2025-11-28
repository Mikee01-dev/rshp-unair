@extends('layouts.lte.main')

@section('content')

{{-- HEADER NON-INDEX (STANDAR) --}}
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row align-items-center">

            <div class="col-sm-6">
                <h3 class="fw-bold mb-0">
                    <i class="bi bi-plus-circle text-primary me-2"></i>
                    Tambah Pasien Baru
                </h3>
            </div>

            <div class="col-sm-6 text-end">
                <a href="{{ route('resepsionis.pet.index') }}" class="btn btn-secondary shadow-sm">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>

        </div>
    </div>
</div>


<div class="app-content">
    <div class="container-fluid">
        <form action="{{ route('resepsionis.pet.store') }}" method="POST">
            @csrf

            <div class="row justify-content-center mt-3">
                <div class="col-md-8">

                    <div class="card shadow-sm border-0">

                        <div class="card-body">

                            <div class="mb-3">
                                <label class="fw-semibold">Pemilik</label>
                                <select name="idpemilik" class="form-select shadow-sm" required>
                                    <option value="">-- Pilih Pemilik --</option>
                                    @foreach($pemiliks as $p)
                                        <option value="{{ $p->idpemilik }}">
                                            {{ $p->user->nama ?? '' }} ({{ $p->alamat }})
                                        </option>
                                    @endforeach
                                </select>
                                <div class="form-text">
                                    Pemilik belum ada? 
                                    <a href="{{ route('resepsionis.pemilik.create') }}">Buat baru</a>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="fw-semibold">Nama Hewan</label>
                                    <input type="text" name="nama" class="form-control shadow-sm" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="fw-semibold">Tanggal Lahir</label>
                                    <input type="date" name="tanggal_lahir" class="form-control shadow-sm">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="fw-semibold">Jenis Hewan</label>
                                    <select id="select-jenis" class="form-select shadow-sm" onchange="updateRas()" required>
                                        <option value="">-- Pilih Jenis --</option>
                                        @foreach($jenis_hewans as $jh)
                                            <option value="{{ $jh->idjenis_hewan }}">{{ $jh->nama_jenis_hewan }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="fw-semibold">Ras</label>
                                    <select name="idras_hewan" id="select-ras" class="form-select shadow-sm" required>
                                        <option value="">-- Pilih Jenis Dulu --</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="fw-semibold">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" class="form-select shadow-sm">
                                        <option value="J">Jantan</option>
                                        <option value="B">Betina</option>
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="fw-semibold">Warna / Tanda Fisik</label>
                                    <input type="text" name="warna_tanda" class="form-control shadow-sm" required>
                                </div>
                            </div>

                        </div>

                        <div class="card-footer text-end bg-light">
                            <button class="btn btn-primary shadow-sm px-4">
                                <i class="bi bi-save me-1"></i> Simpan
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
            rasDropdown.add(opt);
        });
    }
</script>

@endsection
