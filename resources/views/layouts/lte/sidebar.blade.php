<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <div class="sidebar-brand">
        <a href="{{ url('/') }}" class="brand-link">
            <img src="{{ asset('assets/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image opacity-75 shadow" />
            <span class="brand-text fw-light">RSHP UNAIR</span>
        </a>
    </div>

    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="navigation" aria-label="Main navigation">

                {{-- ============================================================ --}}
                {{--                     SECTION: ADMINISTRATOR                   --}}
                {{-- ============================================================ --}}
                @if(auth()->user()->hasRole('Administrator'))

                    <li class="nav-header">UTAMA</li>
                    <li class="nav-item">
                        <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                            <i class="nav-icon bi bi-speedometer2"></i> <p>Dashboard</p>
                        </a>
                    </li>

                    <li class="nav-header">TRANSAKSI</li>
                    <li class="nav-item">
                        <a href="{{ route('temu-dokter.index') }}" class="nav-link {{ request()->routeIs('temu-dokter.*') ? 'active' : '' }}">
                            <i class="nav-icon bi bi-calendar-check-fill"></i> <p>Antrian & Jadwal</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('rekam-medis.index') }}" class="nav-link {{ request()->routeIs('rekam-medis.*') ? 'active' : '' }}">
                            <i class="nav-icon bi bi-clipboard2-pulse-fill"></i> <p>Rekam Medis</p>
                        </a>
                    </li>

                    <li class="nav-header">MASTER DATA</li>
                    
                    <li class="nav-item {{ request()->routeIs('pemilik.*') || request()->routeIs('dokter.*') || request()->routeIs('perawat.*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link">
                            <i class="nav-icon bi bi-people-fill"></i>
                            <p>Data Pengguna <i class="nav-arrow bi bi-chevron-right"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item"><a href="{{ route('pemilik.index') }}" class="nav-link {{ request()->routeIs('pemilik.*') ? 'active' : '' }}"><i class="bi bi-circle"></i> <p>Pemilik (Owner)</p></a></li>
                            <li class="nav-item"><a href="{{ route('dokter.index') }}" class="nav-link {{ request()->routeIs('dokter.*') ? 'active' : '' }}"><i class="bi bi-circle"></i> <p>Dokter</p></a></li>
                            <li class="nav-item"><a href="{{ route('perawat.index') }}" class="nav-link {{ request()->routeIs('perawat.*') ? 'active' : '' }}"><i class="bi bi-circle"></i> <p>Perawat</p></a></li>
                        </ul>
                    </li>

                    <li class="nav-item {{ request()->routeIs('pet.*') || request()->routeIs('jenis-hewan.*') || request()->routeIs('ras-hewan.*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link">
                            <i class="nav-icon bi bi-gitlab"></i>
                            <p>Data Hewan <i class="nav-arrow bi bi-chevron-right"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item"><a href="{{ route('pet.index') }}" class="nav-link {{ request()->routeIs('pet.*') ? 'active' : '' }}"><i class="bi bi-circle"></i> <p>Pasien (Pet)</p></a></li>
                            <li class="nav-item"><a href="{{ route('jenis-hewan.index') }}" class="nav-link {{ request()->routeIs('jenis-hewan.*') ? 'active' : '' }}"><i class="bi bi-circle"></i> <p>Jenis Hewan</p></a></li>
                            <li class="nav-item"><a href="{{ route('ras-hewan.index') }}" class="nav-link {{ request()->routeIs('ras-hewan.*') ? 'active' : '' }}"><i class="bi bi-circle"></i> <p>Ras Hewan</p></a></li>
                        </ul>
                    </li>

                    <li class="nav-item {{ request()->routeIs('kategori.*') || request()->routeIs('kode-tindakan-terapi.*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link">
                            <i class="nav-icon bi bi-capsule"></i>
                            <p>Referensi Medis <i class="nav-arrow bi bi-chevron-right"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item"><a href="{{ route('kategori.index') }}" class="nav-link {{ request()->routeIs('kategori.*') ? 'active' : '' }}"><i class="bi bi-circle"></i> <p>Kategori Obat</p></a></li>
                            <li class="nav-item"><a href="{{ route('kategori-klinis.index') }}" class="nav-link {{ request()->routeIs('kategori-klinis.*') ? 'active' : '' }}"><i class="bi bi-circle"></i> <p>Kategori Klinis</p></a></li>
                            <li class="nav-item"><a href="{{ route('kode-tindakan-terapi.index') }}" class="nav-link {{ request()->routeIs('kode-tindakan-terapi.*') ? 'active' : '' }}"><i class="bi bi-circle"></i> <p>Tindakan & Obat</p></a></li>
                        </ul>
                    </li>
                    
                    <li class="nav-header">SISTEM</li>
                    <li class="nav-item"><a href="{{ route('role.index') }}" class="nav-link {{ request()->routeIs('role.*') ? 'active' : '' }}"><i class="nav-icon bi bi-shield-lock"></i> <p>Role</p></a></li>
                    <li class="nav-item"><a href="{{ route('user-role.index') }}" class="nav-link {{ request()->routeIs('user-role.*') ? 'active' : '' }}"><i class="nav-icon bi bi-person-gear"></i> <p>User Role</p></a></li>

                @endif

                {{-- ============================================================ --}}
                {{--                       SECTION: RESEPSIONIS                   --}}
                {{-- ============================================================ --}}
                @if(auth()->user()->hasRole('Resepsionis'))
                    
                    <li class="nav-header">RESEPSIONIS</li>

                    <li class="nav-item">
                        <a href="{{ route('resepsionis.dashboard') }}" class="nav-link {{ request()->routeIs('resepsionis.dashboard') ? 'active' : '' }}">
                            <i class="nav-icon bi bi-speedometer"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('resepsionis.pemilik.index') }}" class="nav-link {{ request()->routeIs('resepsionis.pemilik.*') ? 'active' : '' }}">
                            <i class="nav-icon bi bi-people-fill"></i>
                            <p>Data Pemilik</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('resepsionis.pet.index') }}" class="nav-link {{ request()->routeIs('resepsionis.pet.*') ? 'active' : '' }}">
                            <i class="nav-icon bi bi-gitlab"></i>
                            <p>Data Pasien (Pet)</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('resepsionis.temu-dokter.index') }}" class="nav-link {{ request()->routeIs('resepsionis.temu-dokter.*') ? 'active' : '' }}">
                            <i class="nav-icon bi bi-calendar-week"></i>
                            <p>Jadwal Temu Dokter</p>
                        </a>
                    </li>

                @endif

                {{-- ============================================================ --}}
                {{--                    SECTION: DOKTER & PERAWAT                 --}}
                {{-- ============================================================ --}}
                @if(auth()->user()->hasRole('Perawat'))
                    <li class="nav-header">PERAWAT</li>

                    <li class="nav-item">
                        <a href="{{ route('perawat.dashboard') }}" class="nav-link {{ request()->routeIs('perawat.dashboard') ? 'active' : '' }}">
                            <i class="nav-icon bi bi-clipboard-pulse"></i>
                            <p>Dashboard Triage</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('perawat.rekam-medis.index') }}" class="nav-link {{ request()->routeIs('perawat.rekam-medis.*') ? 'active' : '' }}">
                            <i class="nav-icon bi bi-journal-medical"></i>
                            <p>Arsip Rekam Medis</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('perawat.pasien.index') }}" class="nav-link {{ request()->routeIs('perawat.pasien.*') ? 'active' : '' }}">
                            <i class="nav-icon bi bi-gitlab"></i>
                            <p>Data Pasien</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('perawat.profile') }}" class="nav-link {{ request()->routeIs('perawat.profile') ? 'active' : '' }}">
                            <i class="nav-icon bi bi-person-circle"></i>
                            <p>Profil Saya</p>
                        </a>
                    </li>
                @endif

                @if(auth()->user()->hasRole('Dokter'))
                    <li class="nav-header">DOKTER</li>
                    
                    <li class="nav-item">
                        <a href="{{ route('dokter.dashboard') }}" class="nav-link {{ request()->routeIs('dokter.dashboard') ? 'active' : '' }}">
                            <i class="nav-icon bi bi-heart-pulse"></i> <p>Dashboard Pemeriksaan</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('dokter.rekam-medis.index') }}" class="nav-link {{ request()->routeIs('dokter.rekam-medis.*') ? 'active' : '' }}">
                            <i class="nav-icon bi bi-journal-medical"></i> <p>Riwayat Medis</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('dokter.pasien.index') }}" class="nav-link {{ request()->routeIs('dokter.pasien.*') ? 'active' : '' }}">
                            <i class="nav-icon bi bi-gitlab"></i> <p>Data Pasien</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('dokter.profile') }}" class="nav-link {{ request()->routeIs('dokter.profile') ? 'active' : '' }}">
                            <i class="nav-icon bi bi-person-circle"></i> <p>Profil Saya</p>
                        </a>
                    </li>
                @endif

                {{-- ============================================================ --}}
                {{--                        SECTION: PEMILIK                      --}}
                {{-- ============================================================ --}}
                @if(auth()->user()->hasRole('Pemilik'))
                    <li class="nav-header">AREA PEMILIK</li>

                    <li class="nav-item">
                        <a href="{{ route('pemilik.dashboard') }}" class="nav-link {{ request()->routeIs('pemilik.dashboard') ? 'active' : '' }}">
                            <i class="nav-icon bi bi-speedometer"></i> <p>Dashboard</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('pemilik.pet.index') }}" class="nav-link {{ request()->routeIs('pemilik.pet.*') ? 'active' : '' }}">
                            <i class="nav-icon bi bi-gitlab"></i> <p>Hewan Saya</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('pemilik.temu-dokter.index') }}" class="nav-link {{ request()->routeIs('pemilik.temu-dokter.*') ? 'active' : '' }}">
                            <i class="nav-icon bi bi-calendar-check"></i> <p>Jadwal Kunjungan</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('pemilik.rekam-medis.index') }}" class="nav-link {{ request()->routeIs('pemilik.rekam-medis.*') ? 'active' : '' }}">
                            <i class="nav-icon bi bi-journal-medical"></i> <p>Riwayat Kesehatan</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('pemilik.profile') }}" class="nav-link {{ request()->routeIs('pemilik.profile') ? 'active' : '' }}">
                            <i class="nav-icon bi bi-person-circle"></i> <p>Profil Saya</p>
                        </a>
                    </li>
                @endif

                <li class="nav-header mt-3">AKUN</li>
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="nav-icon bi bi-box-arrow-right text-danger"></i>
                        <p>Logout</p>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>

            </ul>
        </nav>
    </div>
</aside>