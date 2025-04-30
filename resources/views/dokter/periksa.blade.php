@extends('layout.main')

@section('title', 'Daftar Pemeriksaan Pasien')

@section('content')
<style>
    .content-wrapper {
        background: #f0f2f5;
        padding: 1.5rem 2rem;
    }

    .card {
        border-radius: 0.75rem;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
    }

    .card-header {
        background-color: #003049;
        color: #fff;
        border-top-left-radius: 0.75rem;
        border-top-right-radius: 0.75rem;
    }

    .card-title {
        font-size: 1.25rem;
        font-weight: 600;
        margin-bottom: 0;
    }

    .table th, .table td {
        vertical-align: middle;
        font-size: 0.95rem;
    }

    .badge-status {
        font-size: 0.9rem;
        padding: 0.4rem 0.7rem;
        border-radius: 0.5rem;
        font-weight: 600;
    }

    .badge-status.selesai {
        background-color: #38b000;
        color: #fff;
    }

    .badge-status.menunggu {
        background-color: #ffcc00;
        color: #1c1c1c;
    }

    .badge-obat {
        background-color: #cce5ff;
        color: #003049;
        font-size: 0.85rem;
        margin: 0.25rem;
        display: inline-block;
        padding: 0.3rem 0.6rem;
        border-radius: 0.5rem;
    }

    .btn-periksa {
        background-color: #005b8b;
        color: #fff;
        font-size: 0.85rem;
        padding: 0.5rem 1rem;
        border-radius: 0.5rem;
        text-decoration: none;
        transition: background-color 0.3s ease;
    }

    .btn-periksa:hover {
        background-color: #003049;
        color: white;
    }

    .text-muted {
        font-size: 0.85rem;
        color: #6c757d;
    }
</style>

<div class="content-wrapper">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Daftar Pemeriksaan Pasien</h3>
        </div>
        <div class="card-body">
            @if ($periksa->count() == 0)
                <div class="alert alert-info">
                    Tidak ada pemeriksaan yang tersedia.
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="table-primary text-center">
                            <tr>
                                <th>Pasien</th>
                                <th>Dokter</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th>Keluhan</th>
                                <th>Diagnosa</th>
                                <th>Rekomendasi</th>
                                <th>Obat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($periksa as $p)
                                <tr>
                                    <td>{{ $p->pasien->nama }}</td>
                                    <td>{{ $p->dokter->nama }}</td>
                                    <td>{{ \Carbon\Carbon::parse($p->tgl_periksa)->format('d-m-Y H:i') }}</td>
                                    <td class="text-center">
                                        <span class="badge-status {{ $p->status == 'selesai' ? 'selesai' : 'menunggu' }}">
                                            {{ ucfirst($p->status) }}
                                        </span>
                                    </td>
                                    <td>{{ $p->catatan ?? 'Tidak ada Catatan' }}</td>
                                    <td>{{ $p->diagnosa ?? 'Belum ada diagnosa' }}</td>
                                    <td>{{ $p->rekomendasi ?? 'Belum ada Rekomendasi' }}</td>
                                    <td>
                                        @if($p->detailPeriksa->isEmpty())
                                            <span class="text-muted">Tidak ada obat</span>
                                        @else
                                            @foreach($p->detailPeriksa as $detail)
                                                <span class="badge-obat">{{ $detail->obat->nama_obat }}</span>
                                            @endforeach
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('dokter.edit_periksa', $p->id) }}" class="btn-periksa">Periksa</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection