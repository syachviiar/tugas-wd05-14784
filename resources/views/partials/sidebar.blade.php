<aside class="hold-transition main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard') }}" class="brand-link">
        <img src={{ asset("dist/img/AdminLTELogo.png") }} alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
          style="opacity: .8">
        <span class="brand-text font-weight-light">HealthLink</span>
      </a>
            <!-- Sidebar -->
            <div class="sidebar">
              <!-- Sidebar user panel (optional) -->
              <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                  <img src={{ asset("dist/img/user2-160x160.jpg") }} class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">{{ Auth::user()->name }}</a>
                </div>
              </div>
      
              <!-- SidebarSearch Form -->
              <div class="form-inline">
                <div class="input-group" data-widget="sidebar-search">
                  <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                  <div class="input-group-append">
                    <button class="btn btn-sidebar">
                      <i class="fas fa-search fa-fw"></i>
                    </button>
                  </div>
                </div>
              </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @if(auth()->user()->role === 'dokter')
                <li class="nav-item">
                    <a href="{{ route('dokter.dashboard') }}" class="nav-link {{ request()->routeIs('dokter.dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt text-info"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('dokter.jadwal-periksa.index') }}" class="nav-link {{ request()->routeIs('dokter.jadwal-periksa.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-calendar-alt text-primary"></i>
                        <p>Jadwal Periksa</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('dokter.memeriksa') }}" class="nav-link {{ request()->routeIs('dokter.memeriksa') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-stethoscope text-success"></i>
                        <p>Periksa Pasien</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('dokter.riwayat-pasien') }}" class="nav-link {{ request()->routeIs('dokter.riwayat-pasien') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-history text-warning"></i>
                        <p>Riwayat Pasien</p>
                    </a>
                </li>
                @elseif (Auth::user()->role == 'pasien')
                <li class="nav-item">
                    <a href="{{ route('pasien.dashboard') }}" class="nav-link {{ request()->routeIs('pasien.dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt text-info"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('pasien.periksa') }}" class="nav-link {{ request()->routeIs('pasien.periksa') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-calendar-plus text-primary"></i>
                        <p>Pendaftaran Periksa</p>
                    </a>
                </li>
                @else
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.dokter.index') }}" class="nav-link {{ request()->routeIs('admin.dokter.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user-md"></i>
                        <p>Kelola Dokter</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.pasien.index') }}" class="nav-link {{ request()->routeIs('admin.pasien.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Kelola Pasien</p>
                    </a>
                </li>
                @endif
            </ul>
        </nav>
    </div>
</aside> 