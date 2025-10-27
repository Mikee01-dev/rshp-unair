<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel')</title>
    <link rel="stylesheet" href="{{ asset('css/menu.css') }}">
    <link rel="stylesheet" href="{{ asset('css/page.css') }}">
</head>
<body>

    <header class="topbar">
        <div class="topbar-left">
            <img src="{{ asset('img/unair-logo.png') }}" alt="Logo UNAIR" class="topbar-logo">
            <h5 class="mb-0">RUMAH SAKIT HEWAN PENDIDIKAN</h5>
        </div>
        <div class="topbar-right">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn-logout">Logout</button>
            </form>
        </div>
    </header>

    <aside class="sidebar">
        <ul>
            <li><a href="{{ route('resepsionis.dashboard') }}" class="{{ request()->routeIs('resepsionis.dashboard') ? 'active' : '' }}">Dashboard</a></li>
            <li><a href="{{ route('resepsionis.pemilik.index') }}" class="{{ request()->routeIs('resepsionis.pemilik.index') ? 'active' : '' }}">Daftar Pemilik</a></li>
            <li><a href="{{ route('resepsionis.pet.index') }}"class="{{ request()->routeIs('resepsionis.pet.index') ? 'active' : '' }}">Daftar Pet</a></li>
            <li><a href="{{ route('resepsionis.temu-dokter.index') }}"class="{{ request()->routeIs('resepsionis.temu-dokter.index') ? 'active' : '' }}">Temu Dokter</a></li>
    </aside>

    <main class="main-content">
        @yield('content')
    </main>
</body>
</html>
