@extends('layout.main')

@section('title', 'Jadwal Periksa')

@section('isi')
<div class="content-wrapper">
    <!-- Main Content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card border-0 shadow rounded-lg">
                <div class="card-header bg-white py-3 px-4 border-bottom shadow-sm">
                    <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
                        <div class="d-flex align-items-center">
                            <i class="nav-icon fas fa-calendar-check text-primary fa-lg" style="margin-right: 0.5rem;"></i>
                            <h5 class="mb-0 text-primary fw-bold">Jadwal Periksa</h5>
                        </div>  
                        <div>
                            <a href="{{ route('dokter.jadwal-periksa.create') }}" class="btn btn-sm btn-primary shadow-sm d-flex align-items-center">
                                Tambah Jadwal
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-body bg-light px-4 py-3 rounded-bottom">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover align-middle shadow-sm bg-white">
                            <thead class="table-primary text-center">
                                <tr>
                                    <th width="50">No</th>
                                    <th>Hari</th>
                                    <th>Jam Mulai</th>
                                    <th>Jam Selesai</th>
                                    <th>Status</th>
                                    <th width="180">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($jadwals as $jadwal)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $jadwal->hari }}</td>
                                        <td>{{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}</td>
                                        <td class="text-center">
                                            <span class="badge bg-{{ $jadwal->status == 'Aktif' ? 'success' : 'danger' }}">
                                                {{ $jadwal->status }}
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('dokter.jadwal-periksa.edit', $jadwal->id) }}" class="btn btn-sm btn-outline-warning me-1 shadow-sm" title="Edit" style="margin-right: 0.5rem;">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('dokter.jadwal-periksa.destroy', $jadwal->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger shadow-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus jadwal ini?')" title="Hapus">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center text-muted py-4">Tidak ada jadwal periksa</td>
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
