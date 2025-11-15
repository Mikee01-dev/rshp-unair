@extends('layouts.lte.main')
@section('content')
<div class="container">
    <link rel="stylesheet" href="{{ asset('css/page.css') }}">

    <h2 class="judul-halaman">Tambah Pet Baru</h2>

    <!-- Menampilkan error validasi -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('pet.store') }}">
        @csrf

        <div class="form-group">
            <label for="namat">Nama Pet</label>
            <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama') }}" required>
            @error('nama') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label for="idras_hewan">Ras Hewan</label>
            <select name="idras_hewan" id="idras_hewan" class="form-control" required>
                <option value="">-- Pilih Ras --</option>
                @if(!empty($ras))
                    @foreach($ras as $r)
                        <option value="{{ $r->idras_hewan }}" {{ old('idras_hewan') == $r->idras_hewan ? 'selected' : '' }}>
                            <!-- Menampilkan Nama Ras dan Jenis-nya (dari relasi 'jenis' yg di-load Controller) -->
                            {{ $r->nama_ras ?? 'Ras T/A' }} ({{ $r->jenis->nama_jenis_hewan ?? 'Jenis T/A' }})
                        </option>
                    @endforeach
                @endif
            </select>
            @error('idras_hewan') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label for="idpemilik">Pemilik</label>
            <select name="idpemilik" id="idpemilik" class="form-control" required>
                <option value="">-- Pilih Pemilik --</option>
                @if(!empty($pemilik))
                    @foreach($pemilik as $p)
                        <option value="{{ $p->idpemilik }}" {{ old('idpemilik') == $p->idpemilik ? 'selected' : '' }}>
                            <!-- Menampilkan Nama Pemilik (dari relasi 'user' yg di-load Controller) -->
                            {{ $p->user->name ?? 'Pemilik T/A' }}
                        </option>
                    @endforeach
                @endif
            </select>
            @error('idpemilik') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label for="tanggal_lahir">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" value="{{ old('tanggal_lahir') }}" required>
            @error('tanggal_lahir') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label for="jenis_kelamin">Jenis Kelamin</label>
            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                <option value="">-- Pilih --</option>
                <option value="Jantan" {{ old('jenis_kelamin') == 'Jantan' ? 'selected' : '' }}>Jantan</option>
                <option value="Betina" {{ old('jenis_kelamin') == 'Betina' ? 'selected' : '' }}>Betina</option>
            </select>
            @error('jenis_kelamin') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <!-- Field ini ada di Model Pet.php dan controller perbaikan -->
        <div class="form-group">
            <label for="warna_tanda">Warna/Tanda</label>
            <textarea name="warna_tanda" id="warna_tanda" class="form-control" rows="4">{{ old('warna_tanda') }}</textarea>
            @error('warna_tanda') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="form-group mt-3">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('pet.index') }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>
@endsection