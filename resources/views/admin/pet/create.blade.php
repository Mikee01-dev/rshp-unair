@extends('layouts.lte.main')

@section('content')

{{-- HEADER (Non-Index: Judul + Tombol Kembali) --}}
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row align-items-center">

            <div class="col-sm-6">
                <h3 class="fw-bold mb-0">
                    <i class="bi bi-github me-2 text-primary"></i>
                    Tambah Pasien Baru
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
                    <div class="card-header bg-primary text-white fw-bold py-3">
                        <i class="bi bi-plus-circle me-2"></i>
                        Form Tambah Pasien
                    </div>

                    <div class="card-body">

                        <form action="{{ route('pet.store') }}" method="POST">
                            @csrf

                            {{-- PEMILIK --}}
                            <div class="mb-3">
                                <label class="fw-semibold">Pemilik Hewan</label>
                                <select name="idpemilik" class="form-select select2 shadow-sm" required>
                                    <option value="">-- Pilih Pemilik --</option>
                                    @foreach($pemiliks as $p)
                                        <option value="{{ $p->idpemilik }}">
                                            {{ $p->user->nama ?? 'User Tidak Ditemukan' }} ({{ $p->alamat }})
                                        </option>
                                    @endforeach
                                </select>
                                <div class="form-text">
                                    Pemilik belum terdaftar?
                                    <a href="{{ route('pemilik.create') }}">Tambah Pemilik Baru</a>
                                </div>
                            </div>

                            <hr>

                            {{-- NAMA + TANGGAL LAHIR --}}
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="fw-semibold">Nama Hewan</label>
                                    <input type="text" name="nama"
                                           class="form-control shadow-sm"
                                           placeholder="Contoh: Mochi" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="fw-semibold">Tanggal Lahir (Estimasi)</label>
                                    <input type="date" name="tanggal_lahir"
                                           class="form-control shadow-sm">
                                </div>
                            </div>

                            {{-- JENIS + RAS --}}
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="fw-semibold">Jenis Hewan</label>
                                    <select id="select-jenis" name="dummy_jenis"
                                            class="form-select shadow-sm"
                                            onchange="updateRas()" required>
                                        <option value="">-- Pilih Jenis --</option>
                                        @foreach($jenis_hewans as $jh)
                                            <option value="{{ $jh->idjenis_hewan }}">
                                                {{ $jh->nama_jenis_hewan }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="fw-semibold">Ras Hewan</label>
                                    <select name="idras_hewan" id="select-ras"
                                            class="form-select shadow-sm" required>
                                        <option value="">-- Pilih Jenis Dulu --</option>
                                    </select>
                                </div>
                            </div>

                            {{-- KELAMIN + WARNA --}}
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="fw-semibold">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" class="form-select shadow-sm" required>
                                        <option value="J">Jantan</option>
                                        <option value="B">Betina</option>
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="fw-semibold">Warna / Tanda Fisik</label>
                                    <input type="text" name="warna_tanda"
                                           class="form-control shadow-sm"
                                           placeholder="Contoh: Belang Tiga, Ekor Pendek" required>
                                </div>
                            </div>

                            {{-- BUTTON --}}
                            <div class="text-end mt-4">

                                <a href="{{ route('pet.index') }}" class="btn btn-secondary shadow-sm px-4 me-2">
                                    <i class="bi bi-x-circle me-1"></i>
                                    Batal
                                </a>

                                <button type="submit" class="btn btn-primary shadow-sm px-4">
                                    <i class="bi bi-save me-1"></i>
                                    Simpan Data Pasien
                                </button>

                            </div>


                        </form>

                    </div>

                </div>

            </div>
        </div>

    </div>
</div>


{{-- SCRIPT: Update dropdown Ras --}}
<script>
    const allRas = @json($ras_hewans);

    function updateRas() {
        const jenisId = document.getElementById('select-jenis').value;
        const rasDropdown = document.getElementById('select-ras');

        rasDropdown.innerHTML = '<option value="">-- Pilih Ras --</option>';

        if (!jenisId) return;

        const filtered = allRas.filter(r => r.idjenis_hewan == jenisId);

        if (filtered.length === 0) {
            rasDropdown.innerHTML += '<option disabled>Data Ras Kosong</option>';
            return;
        }

        filtered.forEach(r => {
            const option = document.createElement('option');
            option.value = r.idras_hewan;
            option.text = r.nama_ras;
            rasDropdown.add(option);
        });
    }
</script>

@endsection
