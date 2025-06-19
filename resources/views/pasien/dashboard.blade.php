@extends('layout.main')

@section('title', 'Dashboard Pasien')

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

    .dashboard-icon-daftar {
        background: linear-gradient(135deg, #17a2b8, #00cfe8);
    }

    .card-welcome {
        background-color: #f8f9fa;
        border-radius: 1rem;
        padding: 1.5rem;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
    }

    .card-welcome h5 {
        font-weight: bold;
        color: #003049;
        margin-bottom: 0.5rem;
    }

    .card-data-diri {
        background: #ffffff;
        border-radius: 1rem;
        box-shadow: 0 3px 12px rgba(0, 0, 0, 0.1);
        padding: 1.5rem 1.75rem;
    }

    .card-data-diri h5 {
        color: #0050a5;
        font-weight: 600;
        margin-bottom: 1rem;
    }

    .data-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 1rem;
    }

    .data-item {
        background-color: #f8f9fa;
        border-radius: 0.75rem;
        padding: 1rem 1.25rem;
        box-shadow: 0 1px 4px rgba(0, 0, 0, 0.05);
        display: flex;
        align-items: flex-start;
        gap: 0.75rem;
    }

    .data-item i {
        color: #17a2b8;
        font-size: 1.25rem;
        margin-top: 0.2rem;
    }

    .data-text {
        line-height: 1.2;
    }

    .data-label {
        font-weight: 600;
        font-size: 0.95rem;
        color: #495057;
        margin-bottom: 0.25rem;
    }

    .data-value {
        font-size: 1rem;
        color: #212529;
    }
</style>

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">

            {{-- Welcome --}}
            <div class="row mb-4">
              <div class="col-12">
                  <div class="card-welcome d-flex align-items-center p-4" style="background: linear-gradient(135deg, #17a2b8, #00cfe8); color: white;">
                      <div class="me-4 flex-shrink-0" style="margin-right: 1.5rem;">
                          <div style="width: 70px; height: 70px; background: white; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                              <i class="fas fa-user-circle fa-2x text-info"></i>
                          </div>
                      </div>
                      <div>
                          <h4 class="mb-1 fw-bold" style="font-size: 1.5rem;">Selamat Datang, {{ Auth::user()->name }}!</h4>
                          <div style="font-size: 1rem;">
                              Ini adalah dashboard pasien Anda. Nomor Rekam Medis: <strong>{{ Auth::user()->pasien->no_rm }}</strong>
                          </div>
                      </div>
                  </div>
              </div>
            </div>

            {{-- Data Diri --}}
            <div class="row mb-4">
                <div class="col-lg-12">
                    <div class="card-data-diri">
                        <h5><i class="fas fa-id-card-alt me-2" style="margin-right: 10px;"></i> Data Diri Pasien</h5>
                        <div class="data-grid">
                            <div class="data-item">
                                <i class="fas fa-user"></i>
                                <div class="data-text">
                                    <div class="data-label">Nama</div>
                                    <div class="data-value">{{ Auth::user()->pasien->nama }}</div>
                                </div>
                            </div>
                            <div class="data-item">
                                <i class="fas fa-hashtag"></i>
                                <div class="data-text">
                                    <div class="data-label">No. Rekam Medis</div>
                                    <div class="data-value">{{ Auth::user()->pasien->no_rm }}</div>
                                </div>
                            </div>
                            <div class="data-item">
                                <i class="fas fa-map-marker-alt"></i>
                                <div class="data-text">
                                    <div class="data-label">Alamat</div>
                                    <div class="data-value">{{ Auth::user()->pasien->alamat }}</div>
                                </div>
                            </div>
                            <div class="data-item">
                                <i class="fas fa-phone-alt"></i>
                                <div class="data-text">
                                    <div class="data-label">No. HP</div>
                                    <div class="data-value">{{ Auth::user()->pasien->no_hp }}</div>
                                </div>
                            </div>
                            <div class="data-item">
                                <i class="fas fa-id-card"></i>
                                <div class="data-text">
                                    <div class="data-label">No. KTP</div>
                                    <div class="data-value">{{ Auth::user()->pasien->no_ktp }}</div>
                                </div>
                            </div>
                            <div class="data-item">
                                <i class="fas fa-envelope"></i>
                                <div class="data-text">
                                    <div class="data-label">Email</div>
                                    <div class="data-value">{{ Auth::user()->email }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Daftar Poli --}}
            <div class="row">
              <div class="col-lg-12">
                  <a href="{{ route('pasien.periksa') }}" class="dashboard-link d-block">
                      <div class="dashboard-card text-center py-3 px-3" style="min-height: auto;">
                          <div class="dashboard-icon-wrapper dashboard-icon-daftar mb-2" style="width: 48px; height: 48px; font-size: 1.25rem;">
                              <i class="fas fa-stethoscope"></i>
                          </div>
                          <h5 class="mb-1" style="font-size: 1.1rem;">Daftar Poli</h5>
                          <p class="mb-0" style="font-size: 0.9rem;">Klik untuk mendaftar pemeriksaan</p>
                      </div>
                  </a>
              </div>
            </div>
        </div>
    </section>
</div>
@endsection
