@extends('layout.main')
@section('title', 'Detail Riwayat Pasien')

@section('isi')
<div class="content-wrapper">

    <section class="content">
        <div class="container-fluid">

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fas fa-exclamation-circle mr-2"></i>
                    {{ session('error') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <!-- Data Pasien -->
            <div class="card border-0 shadow rounded-lg mb-4">
                <div class="card-header bg-white border-bottom py-3 px-4">
                    <h5 class="mb-0 text-primary fw-semibold">
                        <i class="fas fa-user-circle mr-2"></i> Data Pasien
                    </h5>
                </div>
                <div class="card-body px-4 py-3">
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table table-borderless mb-0">
                                <tr>
                                    <th width="180" class="text-muted"><i class="fas fa-user mr-2"></i>Nama Pasien</th>
                                    <td>: {{ $pasien->nama }}</td>
                                </tr>
                                <tr>
                                    <th class="text-muted"><i class="fas fa-fingerprint mr-2"></i>No. RM</th>
                                    <td>: {{ $pasien->no_rm }}</td>
                                </tr>
                                <tr>
                                    <th class="text-muted"><i class="fas fa-id-card mr-2"></i>No. KTP</th>
                                    <td>: {{ $pasien->no_ktp }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <table class="table table-borderless mb-0">
                                <tr>
                                    <th width="180" class="text-muted"><i class="fas fa-map-marker-alt mr-2"></i>Alamat</th>
                                    <td>: {{ $pasien->alamat }}</td>
                                </tr>
                                <tr>
                                    <th class="text-muted"><i class="fas fa-phone mr-2"></i>No. Telepon</th>
                                    <td>: {{ $pasien->no_hp }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Riwayat Pemeriksaan -->
            <div class="card border-0 shadow rounded-lg mb-4">
                <div class="card-header bg-white border-bottom py-3 px-4">
                    <h5 class="mb-0 text-primary fw-semibold">
                        <i class="fas fa-history mr-2"></i> Riwayat Pemeriksaan
                    </h5>
                </div>
                <div class="card-body px-4 py-3">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover" id="tabelRiwayatPeriksa">
                            <thead class="thead-light">
                                <tr>
                                    <th class="text-center" width="50">No</th>
                                    <th>Tanggal Periksa</th>
                                    <th>Keluhan</th>
                                    <th>Catatan</th>
                                    <th>Obat</th>
                                    <th class="text-right">Biaya Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($riwayatPeriksa as $index => $riwayat)
                                    <tr>
                                        <td class="text-center">{{ $index + 1 }}</td>
                                        <td>{{ \Carbon\Carbon::parse($riwayat->tgl_periksa)->format('d/m/Y') }}</td>
                                        <td>{{ $riwayat->keluhan }}</td>
                                        <td>{{ $riwayat->catatan }}</td>
                                        <td>
                                            @if($riwayat->obat_diberikan)
                                                {!! nl2br(e($riwayat->obat_diberikan)) !!}
                                            @else
                                                <span class="text-muted"><i class="fas fa-info-circle mr-1"></i>Tidak ada obat</span>
                                            @endif
                                        </td>
                                        <td class="text-right fw-bold">
                                            Rp {{ number_format($riwayat->total_biaya, 0, ',', '.') }}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center text-muted">
                                            <i class="fas fa-info-circle mr-2"></i>Tidak ada data riwayat pemeriksaan
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Tombol Kembali -->
            <div class="text-center mb-5">
                <a href="{{ route('dokter.riwayat-pasien') }}" class="btn btn-secondary px-4 py-2 shadow-sm">
                    Kembali
                </a>
            </div>
        </div>
    </section>
</div>

@push('scripts')
<script>
    $(document).ready(function() {
        $('#tabelRiwayatPeriksa').DataTable({
            paging: true,
            lengthChange: true,
            searching: true,
            ordering: true,
            info: true,
            autoWidth: false,
            responsive: true,
            language: {
                lengthMenu: "Tampilkan _MENU_ data per halaman",
                zeroRecords: "Data tidak ditemukan",
                info: "Menampilkan halaman _PAGE_ dari _PAGES_",
                infoEmpty: "Tidak ada data yang tersedia",
                infoFiltered: "(difilter dari _MAX_ total data)",
                search: "Cari:",
                paginate: {
                    first: "Pertama",
                    last: "Terakhir",
                    next: "Selanjutnya",
                    previous: "Sebelumnya"
                }
            }
        });
    });
</script>
@endpush
@endsection
