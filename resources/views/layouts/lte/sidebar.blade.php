<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <div class="sidebar-brand">
      <a href="{{ route('admin.dashboard') }}" class="brand-link">
        <img
          src="{{ asset('assets/img/AdminLTELogo.png') }}"
          alt="AdminLTE Logo"
          class="brand-image opacity-75 shadow"
        />
        <span class="brand-text fw-light">RSHP</span>
      </a>
      </div>
    <div class="sidebar-wrapper">
      <nav class="mt-2">
        <ul
          class="nav sidebar-menu flex-column"
          data-lte-toggle="treeview"
          role="navigation"
          aria-label="Main navigation"
          data-accordion="false"
          id="navigation"
        >

          <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard*') ? 'active' : '' }}">
              <i class="nav-icon bi bi-speedometer"></i>
              <p>Dashboard</p>
            </a>
          </li>

          <li class="nav-item {{ request()->routeIs('admin.jenis-hewan.*') || request()->routeIs('admin.ras-hewan.*') || request()->routeIs('admin.kategori.*') || request()->routeIs('admin.kategori-klinis.*') || request()->routeIs('admin.kode-tindakan-terapi.*') || request()->routeIs('admin.pet.*') || request()->routeIs('admin.pemilik.*') || request()->routeIs('admin.role.*') || request()->routeIs('admin.user-role.*') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ request()->routeIs('admin.jenis-hewan.*') || request()->routeIs('admin.ras-hewan.*') || request()->routeIs('admin.kategori.*') || request()->routeIs('admin.kategori-klinis.*') || request()->routeIs('admin.kode-tindakan-terapi.*') || request()->routeIs('admin.pet.*') || request()->routeIs('admin.pemilik.*') || request()->routeIs('admin.role.*') || request()->routeIs('admin.user-role.*') ? 'active' : '' }}">
              <i class="nav-icon bi bi-box-seam-fill"></i>
              <p>
                Master Data
                <i class="nav-arrow bi bi-chevron-right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.jenis-hewan.index') }}" class="nav-link {{ request()->routeIs('admin.jenis-hewan.*') ? 'active' : '' }}">
                  <i class="nav-icon bi bi-circle"></i>
                  <p>Jenis Hewan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.ras-hewan.index') }}" class="nav-link {{ request()->routeIs('admin.ras-hewan.*') ? 'active' : '' }}">
                  <i class="nav-icon bi bi-circle"></i>
                  <p>Ras Hewan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.kategori.index') }}" class="nav-link {{ request()->routeIs('admin.kategori.*') ? 'active' : '' }}">
                  <i class="nav-icon bi bi-circle"></i>
                  <p>Kategori</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.kategori-klinis.index') }}" class="nav-link {{ request()->routeIs('admin.kategori-klinis.*') ? 'active' : '' }}">
                  <i class="nav-icon bi bi-circle"></i>
                  <p>Kategori Klinis</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.kode-tindakan-terapi.index') }}" class="nav-link {{ request()->routeIs('admin.kode-tindakan-terapi.*') ? 'active' : '' }}">
                  <i class="nav-icon bi bi-circle"></i>
                  <p>Kode Tindakan Terapi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.pet.index') }}" class="nav-link {{ request()->routeIs('admin.pet.*') ? 'active' : '' }}">
                  <i class="nav-icon bi bi-circle"></i>
                  <p>Pet</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.pemilik.index') }}" class="nav-link {{ request()->routeIs('admin.pemilik.*') ? 'active' : '' }}">
                  <i class="nav-icon bi bi-circle"></i>
                  <p>Pemilik</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.role.index') }}" class="nav-link {{ request()->routeIs('admin.role.*') ? 'active' : '' }}">
                  <i class="nav-icon bi bi-circle"></i>
                  <p>Role</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.user-role.index') }}" class="nav-link {{ request()->routeIs('admin.user-role.*') ? 'active' : '' }}">
                  <i class="nav-icon bi bi-circle"></i>
                  <p>User Role</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon bi bi-heart-pulse-fill"></i>
              <p>Rekam Medis</p>
            </a>
          </li>

        </ul>
        </nav>
    </div>
    </aside>