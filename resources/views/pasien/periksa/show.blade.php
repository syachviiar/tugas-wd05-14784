@extends('layout.main')

@section('title', 'Detail Pemeriksaan')

@section('isi')
<div class="content-wrapper">
    <section class="content py-4">
        <div class="container-fluid">

            <div class="card shadow-sm rounded-3 border-0">
                <div class="card-header bg-white border-bottom py-3 px-4">
                    <h4 class="mb-0 text-primary fw-bold">
                        <i class="fas fa-notes-medical me-2"></i> Detail Pemeriksaan
                    </h4>
                </div>

                @php
                    $status = strtolower($periksa->status);
                    $badgeColor = match($status) {
                        'selesai' => 'success',
                        'menunggu' => 'info',
                        'batal' => 'danger',
                        default => 'secondary',
                    };
                    $statusIcon = match($status) {
                        'selesai' => 'fas fa-check-circle',
                        'menunggu' => 'fas fa-hourglass-half',
                        'batal' => 'fas fa-times-circle',
                        default => 'fas fa-info-circle',
                    };
                    $totalObat = $periksa->detailPeriksa->sum(fn($d) => $d->obat->harga);
                    $total = ($periksa->biaya_periksa ?? 0) + $totalObat;
                @endphp

                <div class="card-body bg-light-subtle px-4 py-4 fs-6">
                    <div class="row g-4">
                        {{-- KIRI --}}
                        <div class="col-md-6">
                            <div class="card shadow-sm border-0 h-100">
                                <div class="card-header bg-primary text-white fw-semibold">
                                    <i class="fas fa-user me-2"></i> Informasi Pasien
                                </div>
                                <div class="card-body">
                                    <dl class="row mb-0">
                                        <dt class="col-5 fw-semibold">Nama Pasien</dt>
                                        <dd class="col-7">{{ $periksa->pasien->nama }}</dd>

                                        <dt class="col-5 fw-semibold">Nomor Rekam Medis</dt>
                                        <dd class="col-7">{{ $periksa->pasien->no_rm }}</dd>

                                        <dt class="col-5 fw-semibold">Poli</dt>
                                        <dd class="col-7">{{ $periksa->daftarPoli->poli->nama_poli ?? '-' }}</dd>

                                        <dt class="col-5 fw-semibold">Dokter</dt>
                                        <dd class="col-7">{{ $periksa->jadwal->dokter->user->name ?? '-' }}</dd>

                                        <dt class="col-5 fw-semibold">Hari & Jadwal</dt>
                                        <dd class="col-7">
                                            {{ $periksa->jadwal->hari ?? '-' }} 
                                            ({{ $periksa->jadwal->jam_mulai ?? '' }} - {{ $periksa->jadwal->jam_selesai ?? '' }})
                                        </dd>

                                        <dt class="col-5 fw-semibold">Keluhan</dt>
                                        <dd class="col-7">{{ $periksa->daftarPoli->keluhan ?? '-' }}</dd>
                                    </dl>
                                </div>
                            </div>
                        </div>

                        {{-- KANAN --}}
                        <div class="col-md-6">
                            <div class="card shadow-sm border-0 h-100">
                                <div class="card-header bg-primary text-white fw-semibold">
                                    <i class="fas fa-stethoscope me-2"></i> Informasi Pemeriksaan
                                </div>
                                <div class="card-body">
                                    <dl class="row mb-0">
                                        <dt class="col-5 fw-semibold">Status</dt>
                                        <dd class="col-7">
                                            <span class="badge bg-{{ $badgeColor }} text-white py-1 px-3">
                                                <i class="{{ $statusIcon }} me-1"></i> {{ ucfirst($periksa->status) }}
                                            </span>
                                        </dd>

                                        <dt class="col-5 fw-semibold">Tanggal Periksa</dt>
                                        <dd class="col-7">
                                            @if($status === 'selesai')
                                                {{ \Carbon\Carbon::parse($periksa->tgl_periksa)->format('d/m/Y') }}
                                            @else
                                                <span class="badge bg-{{ $badgeColor }} text-white py-1 px-3">
                                                    <i class="{{ $statusIcon }} me-1"></i> {{ ucfirst($periksa->status) }}
                                                </span>
                                            @endif
                                        </dd>

                                        <dt class="col-5 fw-semibold">Catatan Pemeriksaan</dt>
                                        <dd class="col-7">
                                            @if($status === 'selesai')
                                                {{ $periksa->catatan ?? '-' }}
                                            @else
                                                <span class="badge bg-{{ $badgeColor }} text-white py-1 px-3">
                                                    <i class="{{ $statusIcon }} me-1"></i> {{ ucfirst($periksa->status) }}
                                                </span>
                                            @endif
                                        </dd>

                                        <dt class="col-5 fw-semibold">Biaya Pemeriksaan</dt>
                                        <dd class="col-7">
                                            @if($status === 'selesai')
                                                Rp{{ number_format($periksa->biaya_periksa ?? 0, 0, ',', '.') }}
                                            @else
                                                <span class="badge bg-{{ $badgeColor }} text-white py-1 px-3">
                                                    <i class="{{ $statusIcon }} me-1"></i> {{ ucfirst($periksa->status) }}
                                                </span>
                                            @endif
                                        </dd>

                                        <dt class="col-5 fw-semibold">Obat yang Diberikan</dt>
                                        <dd class="col-7">
                                            @if($status === 'selesai' && $periksa->detailPeriksa->count())
                                                <ul class="mb-0 ps-3">
                                                    @foreach ($periksa->detailPeriksa as $detail)
                                                        <li>
                                                            <i class="fas fa-capsules text-success me-1"></i>
                                                            {{ $detail->obat->nama_obat }} 
                                                            <span class="badge bg-light text-dark border ms-2">
                                                                Rp{{ number_format($detail->obat->harga, 0, ',', '.') }}
                                                            </span>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @elseif($status !== 'selesai')
                                                <span class="badge bg-{{ $badgeColor }} text-white py-1 px-3">
                                                    <i class="{{ $statusIcon }} me-1"></i> {{ ucfirst($periksa->status) }}
                                                </span>
                                            @else
                                                <span class="text-muted">Tidak ada</span>
                                            @endif
                                        </dd>

                                        <dt class="col-5 fw-semibold">Total Biaya Obat</dt>
                                        <dd class="col-7">
                                            @if($status === 'selesai')
                                                Rp{{ number_format($totalObat, 0, ',', '.') }}
                                            @else
                                                <span class="badge bg-{{ $badgeColor }} text-white py-1 px-3">
                                                    <i class="{{ $statusIcon }} me-1"></i> {{ ucfirst($periksa->status) }}
                                                </span>
                                            @endif
                                        </dd>
                                    </dl>
                                </div>
                            </div>
                        </div>

                        {{-- TOTAL KESELURUHAN --}}
                        <div class="col-12 mt-2">
                            <div class="alert alert-{{ $status === 'selesai' ? 'success' : $badgeColor }} shadow-sm rounded-3 py-3 px-4 d-flex justify-content-between align-items-center">
                                <h5 class="mb-0 fw-bold">
                                    <i class="fas fa-wallet me-2"></i> Total Keseluruhan
                                </h5>
                                <h5 class="mb-0 fw-bold">
                                    @if($status === 'selesai')
                                        Rp{{ number_format($total, 0, ',', '.') }}
                                    @else
                                        <span class="badge bg-{{ $badgeColor }} fs-6 px-3 py-2">
                                            <i class="{{ $statusIcon }} me-1"></i> {{ ucfirst($periksa->status) }}
                                        </span>
                                    @endif
                                </h5>
                            </div>

                            {{-- Pindahkan tombol ke sini --}}
                            <div class="text-end mt-3">
                                <a href="{{ route('pasien.periksa') }}" class="btn btn-outline-secondary fs-6">
                                    <i class="fas fa-arrow-left me-1"></i> Kembali ke Riwayat
                                </a>
                            </div>
                        </div>
                    </div> {{-- end row --}}
                </div> {{-- end card-body --}}
            </div> {{-- end main card --}}
        </div>
    </section>
</div>
@endsection
