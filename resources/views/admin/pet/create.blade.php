@extends('layouts.admin')
@section('content')
<div class="container">
    <link rel="stylesheet" href="{{ asset('css/page.css') }}">

    <h2 class="judul-halaman">Tambah Pet Baru</h2>

    <form method="POST" action="{{ action([App\Http\Controllers\Admin\PetController::class, 'store']) }}" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama') }}" required>
            @error('nama') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label for="jenis">Jenis</label>
            <select name="jenis" id="jenis" class="form-control">
                <option value="">-- Pilih Jenis --</option>
                @if(!empty($jenis))
                    @foreach($jenis as $j)
                        <option value="{{ $j->id }}" {{ old('jenis') == $j->id ? 'selected' : '' }}>
                            {{ $j->nama ?? $j->label ?? $j->jenis ?? $j }}
                        </option>
                    @endforeach
                @endif
            </select>
            @error('jenis') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label for="ras">Ras</label>
            <select name="ras" id="ras" class="form-control">
                <option value="">-- Pilih Ras --</option>
                @if(!empty($ras))
                    @foreach($ras as $r)
                        <option value="{{ $r->id }}" {{ old('ras') == $r->id ? 'selected' : '' }}>
                            {{ $r->nama ?? $r->label ?? $r->ras ?? $r }}
                        </option>
                    @endforeach
                @endif
            </select>
            @error('ras') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label for="tanggal_lahir">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" value="{{ old('tanggal_lahir') }}">
            @error('tanggal_lahir') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label for="jenis_kelamin">Jenis Kelamin</label>
            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                <option value="">-- Pilih --</option>
                <option value="jantan" {{ old('jenis_kelamin') == 'jantan' ? 'selected' : '' }}>Jantan</option>
                <option value="betina" {{ old('jenis_kelamin') == 'betina' ? 'selected' : '' }}>Betina</option>
            </select>
            @error('jenis_kelamin') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label for="deskripsi">Warna/Tanda</label>
            <textarea name="warna_tanda" id="warna_tanda" class="form-control" rows="4">{{ old('warna_tanda') }}</textarea>
            @error('warna_tanda') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="form-group mt-3">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ url()->previous() }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>
@endsection