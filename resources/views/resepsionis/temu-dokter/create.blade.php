@extends('layouts.lte.main')

@section('content')

{{-- HEADER (CREATE = BLUE) --}}
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row align-items-center">

            <div class="col-sm-6">
                <h3 class="fw-bold mb-0">
                    <i class="bi bi-calendar-plus text-primary me-2"></i>
                    Buat Jadwal Baru
                </h3>
            </div>

            <div class="col-sm-6 text-end">
                <a href="{{ route('resepsionis.temu-dokter.index') }}" 
                   class="btn btn-secondary shadow-sm">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>

        </div>
    </div>
</div>


{{-- CONTENT --}}
<div class="app-content">
    <div class="container-fluid">

        <div class="row justify-content-center">
            <div class="col-md-6">

                <div class="card shadow-sm border-0">

                    {{-- CARD HEADER (Primary Blue) --}}
                    <div class="card-header bg-primary text-white fw-bold">
                        <i class="bi bi-clipboard2-plus me-2"></i>
                        Form Jadwal Temu Dokter
                    </div>

                    {{-- FORM --}}
                    <form action="{{ route('resepsionis.temu-dokter.store') }}" method="POST">
                        @csrf

                        <div class="card-body">

                            {{-- PASIEN --}}
                            <div class="mb-3">
                                <label class="fw-semibold">Pilih Pasien</label>
                                <select name="idpet" class="form-select select2 shadow-sm" required>
                                    <option value="">-- Cari Pasien --</option>
                                    @foreach($pets as $pet)
                                        <option value="{{ $pet->idpet }}">
                                            {{ $pet->nama }} ({{ $pet->pemilik->user->nama ?? '-' }})
                                        </option>
                                    @endforeach
                                </select>
                                <div class="form-text">
                                    Pasien belum ada? 
                                    <a href="{{ route('resepsionis.pet.create') }}">Daftar Baru</a>
                                </div>
                            </div>

                            {{-- RENCANA WAKTU --}}
                            <div class="mb-3">
                                <label class="fw-semibold">Rencana Datang</label>
                                <input type="datetime-local" 
                                       name="waktu_daftar" 
                                       class="form-control shadow-sm"
                                       value="{{ date('Y-m-d\TH:i') }}"
                                       required>
                            </div>

                        </div>

                        {{-- CARD FOOTER --}}
                        <div class="card-footer bg-light text-end">
                            <button class="btn btn-primary shadow-sm px-4">
                                <i class="bi bi-check-lg me-1"></i> Simpan Jadwal
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>

    </div>
</div>

@endsection
