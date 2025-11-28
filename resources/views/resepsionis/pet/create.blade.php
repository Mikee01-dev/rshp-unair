@extends('layouts.lte.main')

@section('content')
<div class="app-content-header">
    <div class="container-fluid"><h3>Tambah Pasien Baru</h3></div>
</div>

<div class="app-content">
    <div class="container-fluid">
        <form action="{{ route('resepsionis.pet.store') }}" method="POST">
            @csrf
            <div class="card card-primary card-outline col-md-8">
                <div class="card-body">
                    
                    <div class="mb-3">
                        <label>Pemilik</label>
                        <select name="idpemilik" class="form-select" required>
                            <option value="">-- Pilih Pemilik --</option>
                            @foreach($pemiliks as $p)
                                <option value="{{ $p->idpemilik }}">{{ $p->user->nama ?? '' }} ({{ $p->alamat }})</option>
                            @endforeach
                        </select>
                        <div class="form-text">Pemilik belum ada? <a href="{{ route('resepsionis.pemilik.create') }}">Buat baru</a></div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Nama Hewan</label>
                            <input type="text" name="nama" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Tgl Lahir</label>
                            <input type="date" name="tanggal_lahir" class="form-control">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Jenis</label>
                            <select id="select-jenis" class="form-select" onchange="updateRas()" required>
                                <option value="">-- Pilih Jenis --</option>
                                @foreach($jenis_hewans as $jh)
                                    <option value="{{ $jh->idjenis_hewan }}">{{ $jh->nama_jenis_hewan }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Ras</label>
                            <select name="idras_hewan" id="select-ras" class="form-select" required>
                                <option value="">-- Pilih Jenis Dulu --</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Kelamin</label>
                            <select name="jenis_kelamin" class="form-select">
                                <option value="J">Jantan</option>
                                <option value="B">Betina</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Warna</label>
                            <input type="text" name="warna_tanda" class="form-control" required>
                        </div>
                    </div>

                </div>
                <div class="card-footer text-end">
                    <button class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    const allRas = @json($ras_hewans);
    function updateRas() {
        const jenisId = document.getElementById('select-jenis').value;
        const rasDropdown = document.getElementById('select-ras');
        rasDropdown.innerHTML = '<option value="">-- Pilih Ras --</option>';
        
        if (!jenisId) return;
        
        const filtered = allRas.filter(r => r.idjenis_hewan == jenisId);
        filtered.forEach(r => {
            let opt = document.createElement('option');
            opt.value = r.idras_hewan;
            opt.text = r.nama_ras;
            rasDropdown.add(opt);
        });
    }
</script>
@endsection