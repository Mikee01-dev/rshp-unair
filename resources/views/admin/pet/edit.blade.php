@extends('layouts.lte.main')
@section('content')
<div class="container">
    <link rel="stylesheet" href="{{ asset('css/page.css') }}">

    <h2 class="judul-halaman">Edit Pet</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Terjadi kesalahan!</strong>
            <ul class="mb-0 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.pet.update', $pet->idpet) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama', $pet->nama) }}" required>
            @error('nama') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label for="jenis">Jenis</label>
            <select name="idjenis_hewan" id="jenis" class="form-control">
                <option value="">-- Pilih Jenis --</option>
                @if(!empty($jenis))
                    @foreach($jenis as $j)
                        <option value="{{ $j->idjenis_hewan }}" {{ old('idjenis_hewan', $pet->idjenis_hewan) == $j->idjenis_hewan ? 'selected' : '' }}>
                            {{ $j->nama ?? $j->label ?? $j->jenis ?? $j }}
                        </option>
                    @endforeach
                @endif
            </select>
            @error('idjenis_hewan') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label for="ras">Ras</label>
            <select name="idras_hewan" id="ras" class="form-control">
                <option value="">-- Pilih Ras --</option>
                @if(!empty($ras))
                    @foreach($ras as $r)
                        <option value="{{ $r->idras_hewan }}" {{ old('idras_hewan', $pet->idras_hewan) == $r->idras_hewan ? 'selected' : '' }}>
                            {{ $r->nama ?? $r->label ?? $r->ras ?? $r }}
                        </option>
                    @endforeach
                @endif
            </select>
            @error('idras_hewan') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label for="pemilik">Pemilik</label>
            <select name="idpemilik" id="pemilik" class="form-control">
                <option value="">-- Pilih Pemilik --</option>
                @if(!empty($pemilik))
                    @foreach($pemilik as $p)
                        <option value="{{ $p->idpemilik }}" {{ old('idpemilik', $pet->idpemilik) == $p->idpemilik ? 'selected' : '' }}>
                            {{ $p->nama }} ({{ $p->user->email ?? '' }})
                        </option>
                    @endforeach
                @endif
            </select>
            @error('idpemilik') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label for="tanggal_lahir">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" value="{{ old('tanggal_lahir', $pet->tanggal_lahir ? \Carbon\Carbon::parse($pet->tanggal_lahir)->format('Y-m-d') : '') }}">
            @error('tanggal_lahir') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label for="jenis_kelamin">Jenis Kelamin</label>
            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                <option value="">-- Pilih --</option>
                <option value="jantan" {{ old('jenis_kelamin', $pet->jenis_kelamin) == 'jantan' ? 'selected' : '' }}>Jantan</option>
                <option value="betina" {{ old('jenis_kelamin', $pet->jenis_kelamin) == 'betina' ? 'selected' : '' }}>Betina</option>
            </select>
            @error('jenis_kelamin') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label for="warna_tanda">Warna/Tanda</label>
            <textarea name="warna_tanda" id="warna_tanda" class="form-control" rows="4">{{ old('warna_tanda', $pet->warna_tanda) }}</textarea>
            @error('warna_tanda') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="form-group mt-3">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('admin.pet.index') }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>
@endsection
