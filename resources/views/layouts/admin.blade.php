<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel')</title>
    <link rel="stylesheet" href="{{ asset('css/menu.css') }}">
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
            <li><a href="{{ route('admin.dashboard.index') }}" class="{{ request()->routeIs('admin.dashboard.index') ? 'active' : '' }}">Dashboard</a></li>
            <li><a href="{{ route('admin.jenis-hewan.index') }}" class="{{ request()->routeIs('admin.jenis-hewan.index') ? 'active' : '' }}">Jenis Hewan</a></li>
            <li><a href="{{ route('admin.ras-hewan.index') }}"class="{{ request()->routeIs('admin.ras-hewan.index') ? 'active' : '' }}">Ras Hewan</a></li>
            <li><a href="{{ route('admin.kategori.index') }}"class="{{ request()->routeIs('admin.kategori.index') ? 'active' : '' }}">Kategori</a></li>
            <li><a href="{{ route('admin.kategori-klinis.index') }}"class="{{ request()->routeIs('admin.kategori-klinis.index') ? 'active' : '' }}">Kategori Klinis</a></li>
            <li><a href="{{ route('admin.kode-tindakan-terapi.index') }}"class="{{ request()->routeIs('admin.kode-tindakan-terapi.index') ? 'active' : '' }}">Kode Tindakan Terapi</a></li>
            <li><a href="{{ route('admin.pet.index') }}"class="{{ request()->routeIs('admin.pet.index') ? 'active' : '' }}">Pet</a></li>
            <li><a href="{{ route('admin.pemilik.index') }}"class="{{ request()->routeIs('admin.pemilik.index') ? 'active' : '' }}">Pemilik</a></li>
            <li><a href="{{ route('admin.role.index') }}"class="{{ request()->routeIs('admin.role.index') ? 'active' : '' }}">Role</a></li>
            <li><a href="{{ route('admin.user-role.index') }}"class="{{ request()->routeIs('admin.user-role.index') ? 'active' : '' }}">User Role</a></li>
        </ul>
    </aside>

    <main class="main-content">
        @yield('content')
    </main>
</body>
</html>
