@extends('layouts.lte.main')

@section('content')
<div class="container">
    <link rel="stylesheet" href="{{ asset('css/page.css') }}">
    <div class="row justify-content-center mt-3">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Role</div>
                    <div class="card-body">
                        <form action="{{ route('role.store') }}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="nama_role">Nama Role</label>
                                <input class="form-control" type="text" name="nama_role" id="nama_role" value="{{ old('nama_role') }}" required>
                            </div>

                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{ route('role.index') }}" class="btn btn-secondary">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>  
            </div>
        </div>
    </div>
</div>
@endsection
