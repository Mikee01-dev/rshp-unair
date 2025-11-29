@extends('layouts.app')

@section('content')
<style>
    .login-bg {
        background: linear-gradient(135deg, #0058b6 0%, #007bff 50%, #0058b6 100%);
        border-radius: 1rem 0 0 1rem;
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 2rem;
    }

    .login-bg h2 {
        font-weight: 800;
        font-size: 2rem;
    }

    .highlight {
        color: #ffc107;
        font-weight: 900;
    }

    .login-card {
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
        .login-bg { display: none; }
    }
</style>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card login-card shadow-lg">
                <div class="row g-0">

                    <!-- SISI KIRI (Background Biru Kuning) -->
                    <div class="col-md-5 login-bg">
                        <div class="text-center">
                            <h2>RSHP <span class="highlight">UNAIR</span></h2>
                            <p class="mt-3">Selamat datang di Sistem Informasi RSHP</p>
                        </div>
                    </div>

                    <!-- FORM LOGIN -->
                    <div class="col-md-7 p-4">

                        <h4 class="mb-4 fw-bold text-primary">
                            <i class="bi bi-person-circle me-1"></i> Login
                        </h4>

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <!-- Email -->
                            <div class="mb-3">
                                <label for="email" class="form-label fw-semibold">Email</label>
                                <input id="email" type="email"
                                       class="form-control @error('email') is-invalid @enderror"
                                       name="email" value="{{ old('email') }}" required autofocus>

                                @error('email')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Password -->
                            <div class="mb-3">
                                <label for="password" class="form-label fw-semibold">Password</label>
                                <input id="password" type="password"
                                       class="form-control @error('password') is-invalid @enderror"
                                       name="password" required>

                                @error('password')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Remember -->
                            <div class="mb-3 form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                <label class="form-check-label" for="remember">
                                    Remember Me
                                </label>
                            </div>

                            <button type="submit" class="btn btn-primary w-100 py-2 fw-bold">
                                Masuk
                            </button>

                            <div class="mt-3 text-center">
                                @if (Route::has('password.request'))
                                    <a class="text-decoration-none" href="{{ route('password.request') }}">
                                        Lupa password?
                                    </a>
                                @endif
                            </div>

                        </form>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

@endsection
