@extends('layouts.lte.main')

@section('content')
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6"><h3>Edit Data Pasien</h3></div>
            <div class="col-sm-6 text-end">
                <a href="{{ route('resepsionis.pet.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>
</div>

<div class="app-content">
    <div class="container-fluid">
        <form action="{{ route('resepsionis.pet.update', $pet->idpet) }}" method="POST">
            @csrf
            @method('PUT') <div class="card card-warning card-outline col-md-8">
                <div class="card-body">
                    
                    <div class="mb-3">
                        <label>Pemilik Hewan</label>
                        <select name="idpemilik" class="form-select select2" required>
                            <option value="">-- Pilih Pemilik --</option>
                            @foreach($pemiliks as $p)
                                <option value="{{ $p->idpemilik }}" {{ $pet->idpemilik == $p->idpemilik ? 'selected' : '' }}>
                                    {{ $p->user->nama ?? '-' }} ({{ $p->alamat }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Nama Hewan</label>
                            <input type="text" name="nama" class="form-control" value="{{ $pet->nama }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" class="form-control" value="{{ $pet->tanggal_lahir }}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Jenis Hewan</label>
                            @php $currentJenisId = $pet->ras->idjenis_hewan ?? ''; @endphp
                            
                            <select id="select-jenis" class="form-select" onchange="updateRas()" required>
                                <option value="">-- Pilih Jenis --</option>
                                @foreach($jenis_hewans as $jh)
                                    <option value="{{ $jh->idjenis_hewan }}" {{ $currentJenisId == $jh->idjenis_hewan ? 'selected' : '' }}>
                                        {{ $jh->nama_jenis_hewan }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Ras</label>
                            <select name="idras_hewan" id="select-ras" class="form-select" required>
                                </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-select" required>
                                <option value="J" {{ $pet->jenis_kelamin == 'J' ? 'selected' : '' }}>Jantan</option>
                                <option value="B" {{ $pet->jenis_kelamin == 'B' ? 'selected' : '' }}>Betina</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Warna / Tanda</label>
                            <input type="text" name="warna_tanda" class="form-control" value="{{ $pet->warna_tanda }}" required>
                        </div>
                    </div>

                </div>
                <div class="card-footer text-end">
                    <button type="submit" class="btn btn-warning">Update Perubahan</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    // Data Ras JSON
    const allRas = @json($ras_hewans);
    // ID Ras Lama
    const savedRasId = "{{ $pet->idras_hewan }}";

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
            
            // Auto Select Ras Lama
            if (r.idras_hewan == savedRasId) opt.selected = true;
            
            rasDropdown.add(opt);
        });
    }

    // Jalankan saat load halaman
    document.addEventListener('DOMContentLoaded', updateRas);
</script>
@endsection