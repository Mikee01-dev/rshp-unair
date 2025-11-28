@extends('layouts.lte.main')

@section('content')
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6"><h3>Tambah Pasien Baru</h3></div>
            <div class="col-sm-6 text-end">
                <a href="{{ route('pet.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>
</div>

<div class="app-content">
    <div class="container-fluid">
        <form action="{{ route('pet.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-8">
                    <div class="card card-primary card-outline">
                        <div class="card-body">
                            
                            <div class="mb-3">
                                <label class="fw-bold">Pemilik Hewan</label>
                                <select name="idpemilik" class="form-select select2" required>
                                    <option value="">-- Pilih Pemilik --</option>
                                    @foreach($pemiliks as $p)
                                        <option value="{{ $p->idpemilik }}">
                                            {{ $p->user->nama ?? 'User Tidak Ditemukan' }} - ({{ $p->alamat }})
                                        </option>
                                    @endforeach
                                </select>
                                <div class="form-text">
                                    Pemilik belum terdaftar? <a href="{{ route('pemilik.create') }}">Tambah Pemilik Baru</a>
                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label>Nama Hewan</label>
                                    <input type="text" name="nama" class="form-control" placeholder="Contoh: Mochi" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Tanggal Lahir (Estimasi)</label>
                                    <input type="date" name="tanggal_lahir" class="form-control">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label>Jenis Hewan</label>
                                    <select name="dummy_jenis" id="select-jenis" class="form-select" onchange="updateRas()" required>
                                        <option value="">-- Pilih Jenis --</option>
                                        @foreach($jenis_hewans as $jh)
                                            <option value="{{ $jh->idjenis_hewan }}">{{ $jh->nama_jenis_hewan }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>Ras Hewan</label>
                                    <select name="idras_hewan" id="select-ras" class="form-select" required>
                                        <option value="">-- Pilih Jenis Dulu --</option>
                                        </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label>Jenis Kelamin</label>
                                    <select name="jenis_kelamin" class="form-select" required>
                                        <option value="J">Jantan</option>
                                        <option value="B">Betina</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Warna / Tanda Fisik</label>
                                    <input type="text" name="warna_tanda" class="form-control" placeholder="Contoh: Belang Tiga, Ekor Pendek" required>
                                </div>
                            </div>

                        </div>
                        <div class="card-footer text-end">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save"></i> Simpan Data Pasien
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    // 1. Ambil data Ras lengkap dari Controller dan ubah jadi JSON Object
    const allRas = @json($ras_hewans);

    function updateRas() {
        // Ambil ID Jenis yang dipilih user
        const jenisId = document.getElementById('select-jenis').value;
        const rasDropdown = document.getElementById('select-ras');

        // Kosongkan Dropdown Ras
        rasDropdown.innerHTML = '<option value="">-- Pilih Ras --</option>';

        // Jika user belum pilih jenis, stop disini
        if (!jenisId) return;

        // Filter data ras yang punya idjenis_hewan sama dengan yang dipilih
        const filteredRas = allRas.filter(item => item.idjenis_hewan == jenisId);

        // Jika tidak ada ras yang cocok (misal data kosong)
        if (filteredRas.length === 0) {
            rasDropdown.innerHTML += '<option value="" disabled>Data Ras Kosong</option>';
        }

        // Loop hasil filter dan masukkan ke dropdown Ras
        filteredRas.forEach(ras => {
            const option = document.createElement('option');
            option.value = ras.idras_hewan;
            option.text = ras.nama_ras;
            rasDropdown.add(option);
        });
    }
</script>
@endsection