@extends('layouts.lte.main')

@section('content')
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6"><h3>Edit Data Pasien</h3></div>
            <div class="col-sm-6 text-end">
                <a href="{{ route('pet.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>
</div>

<div class="app-content">
    <div class="container-fluid">
        <form action="{{ route('pet.update', $pet->idpet) }}" method="POST">
            @csrf
            @method('PUT') <div class="row">
                <div class="col-md-8">
                    <div class="card card-warning card-outline">
                        <div class="card-body">
                            
                            <div class="mb-3">
                                <label class="fw-bold">Pemilik Hewan</label>
                                <select name="idpemilik" class="form-select select2" required>
                                    <option value="">-- Pilih Pemilik --</option>
                                    @foreach($pemiliks as $p)
                                        <option value="{{ $p->idpemilik }}" {{ $pet->idpemilik == $p->idpemilik ? 'selected' : '' }}>
                                            {{ $p->user->nama ?? '-' }} - ({{ $p->alamat }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <hr>

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
                                    
                                    <select name="dummy_jenis" id="select-jenis" class="form-select" onchange="updateRas()" required>
                                        <option value="">-- Pilih Jenis --</option>
                                        @foreach($jenis_hewans as $jh)
                                            <option value="{{ $jh->idjenis_hewan }}" {{ $currentJenisId == $jh->idjenis_hewan ? 'selected' : '' }}>
                                                {{ $jh->nama_jenis_hewan }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>Ras Hewan</label>
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
                                    <label>Warna / Tanda Fisik</label>
                                    <input type="text" name="warna_tanda" class="form-control" value="{{ $pet->warna_tanda }}" required>
                                </div>
                            </div>

                        </div>
                        <div class="card-footer text-end">
                            <button type="submit" class="btn btn-warning">
                                <i class="bi bi-save"></i> Update Perubahan
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    // 1. Data JSON
    const allRas = @json($ras_hewans);
    // 2. Data Lama (ID Ras yang tersimpan di DB)
    const savedRasId = "{{ $pet->idras_hewan }}";

    function updateRas() {
        const jenisId = document.getElementById('select-jenis').value;
        const rasDropdown = document.getElementById('select-ras');

        rasDropdown.innerHTML = '<option value="">-- Pilih Ras --</option>';

        if (!jenisId) return;

        const filteredRas = allRas.filter(item => item.idjenis_hewan == jenisId);

        filteredRas.forEach(ras => {
            const option = document.createElement('option');
            option.value = ras.idras_hewan;
            option.text = ras.nama_ras;
            
            // LOGIKA PENTING: Jika ID ras ini sama dengan yang di database, pilih dia!
            if (ras.idras_hewan == savedRasId) {
                option.selected = true;
            }
            
            rasDropdown.add(option);
        });
    }

    // Jalankan fungsi saat halaman pertama kali dimuat
    document.addEventListener('DOMContentLoaded', function() {
        updateRas();
    });
</script>
@endsection