@extends('layout.main')
@section('title', 'Dokter Periksa Page')

@section('isi')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle me-2"></i>
                    {{ session('success') }}
                </div>
            @endif

            <div class="card border-0 shadow rounded-lg">
                <div class="card-header bg-white py-3 px-4 border-bottom shadow-sm">
                    <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-user-md text-primary fa-lg me-2" style="margin-right: 0.5rem;"></i>
                            <h5 class="mb-0 text-primary fw-bold">Daftar Periksa Pasien</h5>
                        </div>
                    </div>
                </div>

                <div class="card-body bg-light px-4 py-3 rounded-bottom">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover align-middle shadow-sm bg-white">
                            <thead class="table-primary text-center">
                                <tr>
                                    <th width="50">No</th>
                                    <th>Pasien</th>
                                    <th>Tanggal Periksa</th>
                                    <th>Status</th>
                                    <th>Catatan Pemeriksaan</th>
                                    <th>Obat yang Diberikan</th>
                                    <th>Total Harga Obat</th>
                                    <th>Total Keseluruhan</th>
                                    <th width="200">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($periksas as $periksa)
                                    @php
                                        $totalObat = $periksa->detailPeriksa->sum(fn($detail) => $detail->obat->harga);
                                        $biayaPeriksa = $periksa->biaya_periksa ?? 0;
                                        $total = $biayaPeriksa + $totalObat;
                                    @endphp
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $periksa->pasien->nama }}</td>
                                        <td>
                                            {{ $periksa->tgl_periksa 
                                                ? \Carbon\Carbon::parse($periksa->tgl_periksa)->format('d/m/Y') 
                                                : 'Belum diperiksa' }}
                                        </td>
                                        <td class="text-center">
                                            @php
                                                $badgeColor = match(strtolower($periksa->status)) {
                                                    'selesai' => 'success',
                                                    'menunggu' => 'info',
                                                    'batal' => 'danger',
                                                    default => 'secondary'
                                                };
                                            @endphp
                                            <span class="badge bg-{{ $badgeColor }}">
                                                {{ ucfirst($periksa->status ?? 'Belum diproses') }}
                                            </span>
                                        </td>
                                        <td>{{ $periksa->catatan ?? '-' }}</td>
                                        <td>
                                            @if($periksa->detailPeriksa && $periksa->detailPeriksa->count())
                                                <ul class="mb-0 ps-3">
                                                    @foreach ($periksa->detailPeriksa as $detail)
                                                        <li>{{ $detail->obat->nama_obat }} (Rp{{ number_format($detail->obat->harga, 0, ',', '.') }})</li>
                                                    @endforeach
                                                </ul>
                                            @else
                                                <span class="text-muted">-</span>
                                            @endif
                                        </td>
                                        <td>Rp{{ number_format($totalObat, 0, ',', '.') }}</td>
                                        <td>Rp{{ number_format($total, 0, ',', '.') }}</td>
                                        <td class="text-center">
                                            <div class="d-flex justify-content-center gap-2 flex-wrap">
                                                <a href="{{ route('dokter.memeriksa.edit', $periksa->id) }}"
                                                   class="btn btn-sm btn-outline-primary shadow-sm">
                                                    <i class="fas fa-stethoscope"></i> Periksa
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" class="text-center text-muted py-4">
                                            Tidak ada daftar periksa
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>                        
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
