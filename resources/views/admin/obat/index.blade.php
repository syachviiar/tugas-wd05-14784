@extends('admin.layout.main')
@section('title', 'Obat')

@section('content')
<div class="card border-0 shadow rounded-lg">
    <div class="card-header bg-white py-3 px-4 border-bottom shadow-sm">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
            <div class="d-flex align-items-center">
                <i class="nav-icon fas fa-pills text-primary fa-lg" style="margin-right: 1rem;"></i>
                <h5 class="mb-0 text-primary fw-bold">Data Obat</h5>
            </div>
            <div>
                <a href="{{ route('admin.obat.create') }}" class="btn btn-sm btn-primary shadow-sm d-flex align-items-center">
                    Tambah Obat
                </a>
            </div>
        </div>
    </div>

    <div class="card-body bg-light px-4 py-3 rounded-bottom">
        <div class="table-responsive">
            <table id="obat-table" class="table table-striped table-bordered table-hover align-middle shadow-sm bg-white">
                <thead class="table-primary text-center">
                    <tr>
                        <th style="width: 60px;">No</th>
                        <th>Nama Obat</th>
                        <th>Kemasan</th>
                        <th>Harga</th>
                        <th style="width: 130px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($obats as $obat)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $obat->nama_obat }}</td>
                            <td>{{ $obat->kemasan }}</td>
                            <td>Rp {{ number_format($obat->harga, 0, ',', '.') }}</td>
                            <td class="text-center">
                                <a href="{{ route('admin.obat.edit', $obat->id) }}" class="btn btn-sm btn-outline-warning me-1 shadow-sm" title="Edit" style="margin-right: 0.5rem;">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.obat.destroy', $obat->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger shadow-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" title="Hapus">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-4">Tidak ada data obat</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
@endpush

@push('scripts')
<script>
    $(document).ready(function() {
        $('#obat-table').DataTable({
            paging: true,
            lengthChange: true,
            searching: true,
            ordering: true,
            info: true,
            autoWidth: false,
            responsive: true,
            language: {
                url: "//cdn.datatables.net/plug-ins/1.10.24/i18n/Indonesian.json"
            }
        });
    });
</script>
@endpush