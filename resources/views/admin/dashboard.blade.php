@extends('admin.layout.main')

@section('title', 'Dashboard')

@section('content')
<style>
    .dashboard-link {
        text-decoration: none;
        color: inherit;
    }

    .dashboard-card {
        background: #ffffff;
        border-radius: 1rem;
        padding: 1.5rem;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
    }

    .dashboard-card:hover {
        transform: translateY(-7px);
        box-shadow: 0 8px 18px rgba(0, 0, 0, 0.4);
    }

    .dashboard-icon-wrapper {
        width: 64px;
        height: 64px;
        border-radius: 50%;
        margin: 0 auto 1rem;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.75rem;
        color: #fff;
    }

    .dashboard-icon-patient  { background: linear-gradient(135deg, #ffc107, #ffb300); }
    .dashboard-icon-doctor   { background: linear-gradient(135deg, #28a745, #81c784); }
    .dashboard-icon-hospital { background: linear-gradient(135deg, #0d6efd, #00bcd4); }
    .dashboard-icon-obat     { background: linear-gradient(135deg, #dc3545, #f06292); }

    .dashboard-card h3 {
        font-size: 2rem;
        margin: 0;
        font-weight: bold;
        color: #003049;
    }

    .dashboard-card p {
        margin: 0;
        font-size: 1rem;
        color: #6c757d;
    }

    .menu-btn {
        display: block;
        width: 100%;
        padding: 0.75rem 1rem;
        border-radius: 0.75rem;
        font-weight: 600;
        font-size: 1rem;
        background-color: #003049;
        color: #fff;
        transition: all 0.3s ease;
        text-align: center;
    }

    .menu-btn:hover {
        background-color: #005792;
        color: #fff;
    }

    .card-welcome {
        background: linear-gradient(135deg, #343a40, #6c757d) !important;
        border-radius: 1rem;
        padding: 1.5rem;
        color: white;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
    }

    .card-welcome h4 {
        font-size: 1.5rem;
        font-weight: bold;
        margin-bottom: 0.5rem;
        color: #fff;
    }

    .card-welcome p {
        margin: 0;
        font-size: 1rem;
        color: #e2e6ea;
    }
</style>

{{-- Welcome --}}
<div class="row mb-4">
    <div class="col-12">
        <div class="card-welcome d-flex align-items-center" style="gap: 1rem !important;">
            <div class="me-4 flex-shrink-0">
                <div style="width: 70px; height: 70px; background: white; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                    <i class="fas fa-user-md fa-2x text-secondary" ></i>
                </div>
            </div>
            <div>
                <h4 class="mb-1">Selamat Datang, {{ Auth::user()->name }}!</h4>
                <p>Ini adalah dashboard Anda sebagai admin. Silakan akses menu di bawah ini.</p>
            </div>
        </div>
    </div>
</div>

{{-- Panel Kontrol --}}
<div class="card mb-4 shadow-sm">
    <div class="card-header bg-white border-bottom d-flex align-items-center">
        <i class="fas fa-plus-circle text-primary me-2"></i>
        <h5 class="mb-0 text-dark">Panel Kontrol</h5>
    </div>
    <div class="card-body">
        <div class="row gy-3 text-center">
            <div class="col-md-3">
                <a href="{{ route('admin.pasien.create') }}" class="menu-btn">
                    <i class="fas fa-user-plus me-2"></i> Tambah Pasien
                </a>
            </div>
            <div class="col-md-3">
                <a href="{{ route('admin.dokter.create') }}" class="menu-btn">
                    <i class="fas fa-user-md me-2"></i> Tambah Dokter
                </a>
            </div>
            <div class="col-md-3">
                <a href="{{ route('admin.poli.create') }}" class="menu-btn">
                    <i class="fas fa-hospital me-2"></i> Tambah Poli
                </a>
            </div>
            <div class="col-md-3">
                <a href="{{ route('admin.obat.create') }}" class="menu-btn">
                    <i class="fas fa-pills me-2"></i> Tambah Obat
                </a>
            </div>
        </div>
    </div>
</div>

{{-- Statistik --}}
<div class="card shadow-sm">
    <div class="card-header bg-white border-bottom d-flex align-items-center">
        <i class="fas fa-chart-bar text-info me-2"></i>
        <h5 class="mb-0 text-dark">Statistik Data</h5>
    </div>
    <div class="card-body">
        <div class="row g-4">
            <div class="col-lg-3 col-md-6">
                <a href="{{ route('admin.pasien.index') }}" class="dashboard-link">
                    <div class="dashboard-card text-center">
                        <div class="dashboard-icon-wrapper dashboard-icon-patient">
                            <i class="fas fa-users"></i>
                        </div>
                        <h3>{{ $total_pasien }}</h3>
                        <p>Total Pasien</p>
                    </div>
                </a>
            </div>

            <div class="col-lg-3 col-md-6">
                <a href="{{ route('admin.dokter.index') }}" class="dashboard-link">
                    <div class="dashboard-card text-center">
                        <div class="dashboard-icon-wrapper dashboard-icon-doctor">
                            <i class="fas fa-user-md"></i>
                        </div>
                        <h3>{{ $total_dokter }}</h3>
                        <p>Total Dokter</p>
                    </div>
                </a>
            </div>

            <div class="col-lg-3 col-md-6">
                <a href="{{ route('admin.poli.index') }}" class="dashboard-link">
                    <div class="dashboard-card text-center">
                        <div class="dashboard-icon-wrapper dashboard-icon-hospital">
                            <i class="fas fa-hospital"></i>
                        </div>
                        <h3>{{ $total_poli }}</h3>
                        <p>Total Poli</p>
                    </div>
                </a>
            </div>

            <div class="col-lg-3 col-md-6">
                <a href="{{ route('admin.obat.index') }}" class="dashboard-link">
                    <div class="dashboard-card text-center">
                        <div class="dashboard-icon-wrapper dashboard-icon-obat">
                            <i class="fas fa-pills"></i>
                        </div>
                        <h3>{{ $total_obat }}</h3>
                        <p>Total Obat</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
