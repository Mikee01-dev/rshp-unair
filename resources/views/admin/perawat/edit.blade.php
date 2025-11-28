@extends('layouts.lte.main')

@section('content')
<div class="container">
    <h1>Edit Perawat</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('perawat.update', $perawat->id_perawat) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" name="alamat" id="alamat" class="form-control" value="{{ old('alamat', $perawat->alamat) }}">
        </div>

        <div class="form-group">
            <label for="no_hp">No HP</label>
            <input type="text" name="no_hp" id="no_hp" class="form-control" value="{{ old('no_hp', $perawat->no_hp) }}">
        </div>

        <div class="form-group">
            <label for="jenis_kelamin">Jenis Kelamin</label>
            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                <option value="">Pilih Jenis Kelamin</option>
                <option value="L" {{ (old('jenis_kelamin', $perawat->jenis_kelamin) == 'L') ? 'selected' : '' }}>Laki-laki</option>
                <option value="P" {{ (old('jenis_kelamin', $perawat->jenis_kelamin) == 'P') ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>

        <div class="form-group">
            <label for="pendidikan">Pendidikan</label>
            <input type="text" name="pendidikan" id="pendidikan" class="form-control" value="{{ old('pendidikan', $perawat->pendidikan) }}">
        </div>

        <div class="form-group">
            <label for="id_user">ID User</label>
            <input type="number" name="id_user" id="id_user" class="form-control" value="{{ old('id_user', $perawat->id_user) }}">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('perawat.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
