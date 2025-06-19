@extends('admin.layout.main')
@section('title', 'Dokter')

@section('content')
<div class="card border-0 shadow rounded-lg">
    <div class="card-header bg-white py-3 px-4 border-bottom shadow-sm">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
            <div class="d-flex align-items-center">
                <i class="nav-icon fas fa-user-md text-primary fa-lg" style="margin-right: 1rem;"></i>
                <h5 class="mb-0 text-primary fw-bold">Data Dokter</h5>
            </div>  
            <div>
                <a href="{{ route('admin.dokter.create') }}" class="btn btn-sm btn-primary shadow-sm d-flex align-items-center">
                    Tambah Dokter
                </a>
            </div>
        </div>
    </div>

    <div class="card-body bg-light px-4 py-3 rounded-bottom">
        <div class="table-responsive">
            <table id="dokter-table" class="table table-striped table-bordered table-hover align-middle shadow-sm bg-white">
                <thead class="table-primary text-center">
                    <tr>
                        <th style="width: 60px;">No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Alamat</th> {{-- Tambahan --}}
                        <th>No. HP</th> {{-- Tambahan --}}
                        <th>Nama Poli</th>
                        <th style="width: 130px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($dokters as $dokter)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $dokter->nama }}</td>
                            <td>{{ $dokter->email }}</td>
                            <td>{{ $dokter->alamat }}</td> {{-- Tambahan --}}
                            <td>{{ $dokter->no_hp }}</td> {{-- Tambahan --}}
                            <td>{{ $dokter->nama_poli }}</td>
                            <td class="text-center">
                                <a href="{{ route('admin.dokter.edit', $dokter->id) }}" class="btn btn-sm btn-outline-warning me-1 shadow-sm" title="Edit" style="margin-right: 0.5rem;">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.dokter.destroy', $dokter->id) }}" method="POST" class="d-inline">
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
                            <td colspan="7" class="text-center text-muted py-4">Tidak ada data dokter</td>
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
        $('#dokter-table').DataTable({
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