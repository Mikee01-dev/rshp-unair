@extends('layouts.lte.main')

@section('content')

{{-- HEADER INDEX (standar) --}}
<div class="app-content-header">
  <div class="container-fluid">
    <div class="row align-items-center">
      <div class="col-sm-6">
        <h3 class="fw-bold mb-0">
          <i class="bi bi-gitlab me-2 text-primary"></i>
          Hewan Peliharaan Saya
        </h3>
      </div>
    </div>
  </div>
</div>

<div class="app-content">
  <div class="container-fluid">

    {{-- ALERT --}}
    @if(session('success'))
      <div class="alert alert-success shadow-sm alert-dismissible fade show mt-2">
        <i class="bi bi-check-circle-fill me-1"></i>{{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
    @endif
    @if(session('error'))
      <div class="alert alert-danger shadow-sm alert-dismissible fade show mt-2">
        <i class="bi bi-exclamation-circle-fill me-1"></i>{{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
    @endif

    <div class="row g-4">
      @forelse($pets as $pet)
        <div class="col-md-4">
          <div class="card shadow-sm border-0 rounded-4 overflow-hidden">

            {{-- HEADER CARD --}}
            <div class="p-4 d-flex align-items-center" style="background: linear-gradient(135deg,#FFD700,#FFB100);">
              <div class="me-3">
                <div class="bg-dark bg-opacity-25 text-white rounded-circle p-3" style="font-size: 2rem;">
                  <i class="bi bi-gitlab"></i>
                </div>
              </div>
              <div>
                <h4 class="fw-bold mb-1 text-dark">{{ $pet->nama }}</h4>
                <p class="m-0 text-dark text-opacity-75 fw-semibold">
                  {{ $pet->ras->jenisHewan->nama_jenis_hewan }} • {{ $pet->ras->nama_ras }}
                </p>
              </div>
            </div>

            {{-- BODY CARD --}}
            <div class="p-3">
              <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex justify-content-between align-items-center py-3">
                  <span class="fw-semibold">Gender</span>
                  <span class="badge bg-primary rounded-pill">
                    {{ $pet->jenis_kelamin == 'J' ? 'Jantan' : 'Betina' }}
                  </span>
                </li>
                <li class="list-group-item d-flex justify-content-between py-3">
                  <span class="fw-semibold">Warna</span>
                  <span>{{ $pet->warna_tanda }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between py-3">
                  <span class="fw-semibold">Tanggal Lahir</span>
                  <span>{{ $pet->tanggal_lahir }}</span>
                </li>
              </ul>
            </div>

          </div>
        </div>
      @empty
      @endforelse
    </div>

  </div>
</div>

@endsection
