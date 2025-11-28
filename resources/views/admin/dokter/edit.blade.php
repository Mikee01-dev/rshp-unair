@extends('layouts.lte.main')

@section('content')
<div class="container">
    <h1>Edit Dokter</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('dokter.update', $dokter->id_dokter) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" name="alamat" id="alamat" class="form-control" value="{{ old('alamat', $dokter->alamat) }}">
        </div>

        <div class="form-group">
            <label for="no_hp">No HP</label>
            <input type="text" name="no_hp" id="no_hp" class="form-control" value="{{ old('no_hp', $dokter->no_hp) }}">
        </div>

        <div class="form-group">
            <label for="bidang_dokter">Bidang Dokter</label>
            <input type="text" name="bidang_dokter" id="bidang_dokter" class="form-control" value="{{ old('bidang_dokter', $dokter->bidang_dokter) }}">
        </div>

        <div class="form-group">
            <label for="jenis_kelamin">Jenis Kelamin</label>
            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                <option value="">Pilih Jenis Kelamin</option>
                <option value="L" {{ (old('jenis_kelamin', $dokter->jenis_kelamin) == 'L') ? 'selected' : '' }}>Laki-laki</option>
                <option value="P" {{ (old('jenis_kelamin', $dokter->jenis_kelamin) == 'P') ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>

        <div class="form-group">
            <label for="id_user">ID User</label>
            <input type="number" name="id_user" id="id_user" class="form-control" value="{{ old('id_user', $dokter->id_user) }}">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('dokter.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
