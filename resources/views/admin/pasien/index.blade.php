@extends('admin.layout.main')
@section('title', 'Pasien')

@section('content')
<div class="card border-0 shadow rounded-lg">
    <div class="card-header bg-white py-3 px-4 border-bottom shadow-sm">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
            <div class="d-flex align-items-center">
                <i class="fas fa-users text-primary fa-lg" style="margin-right: 1rem;"></i>
                <h5 class="mb-0 text-primary fw-bold">Data Pasien</h5>
            </div>            
            <div class="text-end">
                <a href="{{ route('admin.pasien.create') }}" class="btn btn-primary btn-sm d-flex align-items-center gap-1">
                    Tambah Pasien
                </a>
            </div>
        </div>
    </div>

    <div class="card-body bg-light px-4 py-3 rounded-bottom">
        <div class="table-responsive">
            <table id="pasien-table" class="table table-striped table-bordered table-hover align-middle shadow-sm bg-white">
                <thead class="table-primary text-center">
                    <tr>
                        <th style="width: 60px;">No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>No. KTP</th>
                        <th>Alamat</th>
                        <th>No. HP</th>
                        <th style="width: 130px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pasiens as $pasien)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $pasien->nama }}</td>
                        <td>{{ $pasien->email }}</td>
                        <td>{{ $pasien->no_ktp }}</td>
                        <td>{{ $pasien->alamat }}</td>
                        <td>{{ $pasien->no_hp }}</td>
                        <td class="text-center">
                            <a href="{{ route('admin.pasien.edit', $pasien->id) }}" class="btn btn-outline-warning btn-sm me-1" title="Edit" style="margin-right: 0.5rem;">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.pasien.destroy', $pasien->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Yakin ingin menghapus pasien ini?')" title="Hapus">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted py-4">Belum ada data pasien.</td>
                    </tr>
                    @endforelse
                </tbody>                
            </table>
        </div>

        @if ($pasiens->hasPages())
        <div class="d-flex justify-content-center mt-4">
            {{ $pasiens->links('pagination::bootstrap-4') }}
        </div>
        @endif
    </div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
@endpush

@push('scripts')
<script>
    $(document).ready(function () {
        $('#pasien-table').DataTable({
            responsive: true,
            autoWidth: false,
            language: {
                url: "//cdn.datatables.net/plug-ins/1.10.24/i18n/Indonesian.json"
            }
        });
    });
</script>
@endpush
