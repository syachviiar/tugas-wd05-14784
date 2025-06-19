@extends('layout.main')
@section('title', 'Daftar Riwayat Pasien')

@section('isi')
<div class="content-wrapper">
    <!-- Main Content -->
    <section class="content">
        <div class="container-fluid">
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fas fa-exclamation-circle me-2"></i>
                    {{ session('error') }}
                    
                </div>
            @endif

            <div class="card border-0 shadow rounded-lg">
                <div class="card-header bg-white py-3 px-4 border-bottom shadow-sm">
                    <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-history text-primary fa-lg" style="margin-right: 0.5rem;"></i>
                            <h5 class="mb-0 text-primary fw-bold">Daftar Riwayat Pasien</h5>
                        </div>
                    </div>
                </div>

                <div class="card-body bg-light px-4 py-3 rounded-bottom">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover align-middle shadow-sm bg-white" id="tabelRiwayat">
                            <thead class="table-primary text-center">
                                <tr>
                                    <th width="50">No</th>
                                    <th>Nama Pasien</th>
                                    <th>Alamat</th>
                                    <th>No. KTP</th>
                                    <th>No. Telepon</th>
                                    <th>No. RM</th>
                                    <th width="150">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($pasiens as $index => $pasien)
                                    <tr>
                                        <td class="text-center">{{ $index + 1 }}</td>
                                        <td>{{ $pasien->nama }}</td>
                                        <td>{{ $pasien->alamat }}</td>
                                        <td>{{ $pasien->no_ktp }}</td>
                                        <td>{{ $pasien->no_hp }}</td>
                                        <td>{{ $pasien->no_rm }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('dokter.riwayat-pasien.detail', $pasien->id) }}"
                                               class="btn btn-sm btn-outline-info shadow-sm">
                                                <i class="fas fa-eye"></i> Detail
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center text-muted py-4">
                                            Tidak ada data pasien
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

@push('scripts')
<script>
    $(document).ready(function() {
        $('#tabelRiwayat').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            "language": {
                "lengthMenu": "Tampilkan _MENU_ data per halaman",
                "zeroRecords": "Data tidak ditemukan",
                "info": "Menampilkan halaman _PAGE_ dari _PAGES_",
                "infoEmpty": "Tidak ada data yang tersedia",
                "infoFiltered": "(difilter dari _MAX_ total data)",
                "search": "Cari:",
                "paginate": {
                    "first": "Pertama",
                    "last": "Terakhir",
                    "next": "Selanjutnya",
                    "previous": "Sebelumnya"
                }
            }
        });
    });
</script>
@endpush
@endsection
