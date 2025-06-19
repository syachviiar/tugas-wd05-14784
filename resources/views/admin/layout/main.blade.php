<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') | Admin HealthLink</title>

      <!-- Google Font -->
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
      <!-- Font Awesome -->
      <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
      <!-- Ionicons -->
      <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
      <!-- Bootstrap & Theme Styles -->
      <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
      <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
      <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}">
      <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
      <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
      <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
      <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">

    <style>
      .nav-sidebar .nav-link.active {
        background-color: #ffffff !important;
        color: #000000 !important;
      }
      .content-wrapper {
        padding: 1rem;
        background-color: #f8f9fa;
      }
      .brand-link {
        font-size: 1.1rem;
        font-weight: 600;
      }
      .navbar .nav-link.text-danger:hover {
        color: #fff !important;
        background-color: #dc3545;
        border-radius: 5px;
        padding: 5px 10px;
        transition: all 0.3s ease;
        box-shadow: 0 2px 6px rgba(220, 53, 69, 0.5);
      }
      .logout-link {
        display: inline-block;
        background-color: #dc3545;
        color: #fff !important;
        border: 1px solid #dc3545;
        border-radius: 5px;
        padding: 5px 12px;
        text-decoration: none;
        transition: all 0.3s ease;
      }

      .logout-link:hover {
        background-color: #fff;
        color: #dc3545 !important;
        text-decoration: none;
      }
    </style>

    @yield('style')
  </head>

  <body class="hold-transition sidebar-mini">
    <div class="wrapper">

      <!-- Preloader -->
      <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTELogo" height="60" width="60">
      </div>

      <!-- Navbar -->
      <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom shadow-sm">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
        </ul>

        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
            <a href="#" class="logout-link ml-3" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              Logout
            </a>            
          </li>
        </ul>
      </nav>

      <!-- Sidebar -->
      <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="{{ route('landingpage') }}" class="brand-link">
          <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">HealthLink</span>
        </a>

        <div class="sidebar">
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
              <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
              <a href="#" class="d-block">Admin</a>
            </div>
          </div>

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

          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
              <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                  <i class="nav-icon fas fa-tachometer-alt text-info"></i>
                  <p>Dashboard</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.pasien.index') }}" class="nav-link {{ request()->routeIs('admin.pasien.*') ? 'active' : '' }}">
                  <i class="nav-icon fas fa-users text-warning"></i>
                  <p>Kelola Pasien</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.dokter.index') }}" class="nav-link {{ request()->routeIs('admin.dokter.*') ? 'active' : '' }}">
                  <i class="nav-icon fas fa-user-md text-success"></i>
                  <p>Kelola Dokter</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.poli.index') }}" class="nav-link {{ request()->routeIs('admin.poli.*') ? 'active' : '' }}">
                  <i class="nav-icon fas fa-hospital text-primary"></i>
                  <p>Kelola Poli</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.obat.index') }}" class="nav-link {{ request()->routeIs('admin.obat.*') ? 'active' : '' }}">
                  <i class="nav-icon fas fa-pills text-danger"></i>
                  <p>Kelola Obat</p>
                </a>
              </li>
            </ul>
          </nav>
        </div>
      </aside>

      <!-- Content Wrapper -->
      <div class="content-wrapper">

        <section class="content">
          <div class="container-fluid">
            

            @yield('content')
          </div>
        </section>
      </div>

      <!-- Footer -->
      <footer class="main-footer bg-light text-sm border-top pt-2">
        <div class="float-right d-none d-sm-inline text-muted">
          <b>Version</b> 1.0.0
        </div>
        <strong class="text-muted">
          &copy; {{ date('Y') }} <a href="#" class="text-primary font-weight-bold">HealthLink</a>.
        </strong>
        All rights reserved.
      </footer>
    </div>

    <!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI -->
<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button) // Resolve conflict
</script>

<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- AdminLTE -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>

<!-- Tambahan Plugin -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('plugins/sparklines/sparkline.js') }}"></script>
<script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
<script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>
    @stack('scripts')
  </body>
</html>
