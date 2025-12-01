@extends('layouts.app')

@section('content')
<style>
    .register-bg {
        background: linear-gradient(135deg, #0058b6 0%, #007bff 50%, #0058b6 100%);
        border-radius: 1rem 0 0 1rem;
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 2rem;
    }

    .register-bg h2 {
        font-weight: 800;
        font-size: 2rem;
    }

    .highlight {
        color: #ffc107;
        font-weight: 900;
    }

    .register-card {
        border-radius: 1rem;
        overflow: hidden;
    }

    .btn-primary {
        background: #0058b6 !important;
        border-color: #0058b6 !important;
    }

    .btn-primary:hover {
        background: #003f82 !important;
    }

    .form-control:focus {
        border-color: #0058b6;
        box-shadow: 0 0 0 0.2rem rgba(0, 88, 182, 0.25);
    }

    @media (max-width:768px) {
        .register-bg { display: none; }
    }
</style>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-9">

            <div class="card register-card shadow-lg">
                <div class="row g-0">

                    <!-- PANEL KIRI (Biru Kuning) -->
                    <div class="col-md-5 register-bg">
                        <div class="text-center">
                            <h2>RSHP <span class="highlight">UNAIR</span></h2>
                            <p class="mt-3">Buat akun baru untuk mengakses sistem RSHP</p>
                        </div>
                    </div>

                    <!-- FORM REGISTER -->
                    <div class="col-md-7 p-4">
                        
                        <h4 class="mb-4 fw-bold text-primary">
                            <i class="bi bi-person-plus-fill me-1"></i> Register
                        </h4>

                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <!-- NAMA -->
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Nama</label>
                                <input id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autofocus>

                                @error('name')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- EMAIL -->
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Email</label>
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required>

                                @error('email')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- PASSWORD -->
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Password</label>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    name="password" required>

                                @error('password')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- KONFIRM PASSWORD -->
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Konfirmasi Password</label>
                                <input id="password-confirm" type="password" class="form-control"
                                       name="password_confirmation" required>
                            </div>

                            <!-- BUTTON -->
                            <button type="submit" class="btn btn-primary w-100 py-2 fw-bold">
                                Daftar Sekarang
                            </button>

                            <div class="text-center mt-3">
                                <a href="{{ route('login') }}" class="text-decoration-none">
                                    Sudah punya akun? Login
                                </a>
                            </div>

                        </form>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

@endsection
