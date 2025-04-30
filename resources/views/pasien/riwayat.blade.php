@extends('layout.main')
@section('title', 'Riwayat Pemeriksaan Pasien')

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
        font-size: 1.5rem;
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

    .btn-hapus {
        font-size: 0.85rem;
        padding: 0.5rem 1rem;
        font-weight: 600;
        border-radius: 0.5rem;
        background-color: #d62828;
        color: white;
        border: none;
        transition: background-color 0.2s ease;
    }

    .btn-hapus:hover {
        background-color: #a4161a;
    }

    .alert-info {
        font-size: 1rem;
        background-color: #e3f2fd;
        border: none;
        color: #003049;
    }
</style>

<div class="content-wrapper">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Riwayat Pemeriksaan Pasien</h3>
        </div>
        <div class="card-body">
            @if($riwayat->isEmpty())
                <div class="alert alert-info">
                    Anda belum pernah melakukan pemeriksaan.
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered table-hover shadow-sm">
                        <thead class="table-primary text-center">
                            <tr>
                                <th>Tanggal</th>
                                <th>Dokter</th>
                                <th>Keluhan</th>
                                <th>Status</th>
                                <th>Diagnosa</th>
                                <th>Rekomendasi</th>
                                <th>Obat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($riwayat as $periksa)
                                <tr>
                                    <td class="text-center">{{ \Carbon\Carbon::parse($periksa->tgl_periksa)->format('d-m-Y') }}</td>
                                    <td>{{ $periksa->dokter->nama }}</td>
                                    <td>{{ $periksa->catatan }}</td>
                                    <td class="text-center">
                                        <span class="badge-status {{ $periksa->status == 'selesai' ? 'selesai' : 'menunggu' }}">
                                            {{ ucfirst($periksa->status) }}
                                        </span>
                                    </td>
                                    <td>{{ $periksa->diagnosa ?? 'Menunggu Diagnosis' }}</td>
                                    <td>{{ $periksa->rekomendasi ?? 'Menunggu Rekomendasi' }}</td>
                                    <td>
                                        @if($periksa->detailPeriksa->isEmpty())
                                            <span class="text-muted">Tidak ada obat</span>
                                        @else
                                            @foreach($periksa->detailPeriksa as $detail)
                                                <span class="badge-obat">{{ $detail->obat->nama_obat }}</span>
                                            @endforeach
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <form action="{{ route('periksa.hapus', $periksa->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus riwayat pemeriksaan ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-hapus">Hapus</button>
                                        </form>
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