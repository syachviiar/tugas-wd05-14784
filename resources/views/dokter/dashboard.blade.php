@extends('layout.main')

@section('title', 'Dashboard Dokter')

@section('isi')
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
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }

    .dashboard-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 8px 18px rgba(0, 0, 0, 0.3);
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

    .dashboard-icon-jadwal {
        background: linear-gradient(135deg, #007bff, #00c6ff);
    }

    .dashboard-icon-periksa {
        background: linear-gradient(135deg, #28a745, #5efc82);
    }

    .dashboard-icon-riwayat {
        background: linear-gradient(135deg, #ffc107, #ffdd57);
    }

    .card-welcome {
        background: linear-gradient(135deg, #343a40, #6c757d);
        border-radius: 1rem;
        padding: 1.5rem;
        color: white;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
    }

    .card-welcome h4 {
        font-size: 1.5rem;
        font-weight: bold;
        margin-bottom: 0.5rem;
    }

    .card-welcome p {
        margin: 0;
        font-size: 1rem;
        color: #e2e6ea;
    }
</style>

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">

            {{-- Welcome --}}
            <div class="row mb-4">
                <div class="col-12">
                    <div class="card-welcome d-flex align-items-center">
                        <div class="me-4 flex-shrink-0" style="margin-right: 1.5rem;">
                            <div style="width: 70px; height: 70px; background: white; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-user-md fa-2x text-secondary"></i>
                            </div>
                        </div>
                        <div>
                            <h4 class="mb-1">Selamat Datang, {{ Auth::user()->name }}!</h4>
                            <p>Ini adalah dashboard Anda sebagai dokter. Silakan akses menu di bawah ini.</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Menu Akses Cepat --}}
            <div class="row g-4">
                <div class="col-md-4">
                    <a href="{{ route('dokter.jadwal-periksa.index') }}" class="dashboard-link">
                        <div class="dashboard-card text-center py-3 px-3">
                            <div class="dashboard-icon-wrapper dashboard-icon-jadwal">
                                <i class="fas fa-calendar-alt"></i>
                            </div>
                            <h5 class="mb-1" style="font-size: 1.1rem;">Jadwal Periksa</h5>
                            <p class="mb-0" style="font-size: 0.9rem;">Kelola jadwal praktik Anda</p>
                        </div>
                    </a>
                </div>

                <div class="col-md-4">
                    <a href="{{ route('dokter.memeriksa') }}" class="dashboard-link">
                        <div class="dashboard-card text-center py-3 px-3">
                            <div class="dashboard-icon-wrapper dashboard-icon-periksa">
                                <i class="fas fa-stethoscope"></i>
                            </div>
                            <h5 class="mb-1" style="font-size: 1.1rem;">Periksa Pasien</h5>
                            <p class="mb-0" style="font-size: 0.9rem;">Lihat dan periksa pasien hari ini</p>
                        </div>
                    </a>
                </div>

                <div class="col-md-4">
                    <a href="{{ route('dokter.riwayat-pasien') }}" class="dashboard-link">
                        <div class="dashboard-card text-center py-3 px-3">
                            <div class="dashboard-icon-wrapper dashboard-icon-riwayat">
                                <i class="fas fa-history"></i>
                            </div>
                            <h5 class="mb-1" style="font-size: 1.1rem;">Riwayat Pasien</h5>
                            <p class="mb-0" style="font-size: 0.9rem;">Lihat catatan rekam medis pasien</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
