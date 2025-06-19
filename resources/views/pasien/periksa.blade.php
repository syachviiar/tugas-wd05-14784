@extends('layout.main')

@section('title', 'Daftar Poli')

@section('isi')
<div class="content-wrapper">
    <section class="content pb-4">
        <div class="container-fluid">
            <div class="row">
                {{-- Form Daftar Poli --}}
                <div class="col-md-4">
                    <div class="card card-primary card-outline shadow">
                        <div class="card-header text-primary">
                            <h3 class="card-title"><i class="fas fa-edit me-2" style="margin-right: 10px;"></i>Formulir Pendaftaran</h3>
                        </div>
                        <form action="{{ route('pasien.periksa.store') }}" method="POST">
                            @csrf
                            <div class="card-body bg-light">

                                {{-- Notifikasi --}}
                                @if(session('error'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{ session('error') }}
                                        
                                    </div>
                                @endif
                                @if(session('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('success') }}
                                        
                                    </div>
                                @endif

                                {{-- Nomor Rekam Medis --}}
                                <div class="mb-3">
                                    <label for="no_rm" class="form-label fw-semibold">Nomor Rekam Medis</label>
                                    <input type="text" class="form-control" id="no_rm" value="{{ auth()->user()->pasien->no_rm ?? '' }}" readonly>
                                </div>

                                {{-- Pilih Poli --}}
                                <div class="mb-3">
                                    <label for="poli" class="form-label fw-semibold">Pilih Poli</label>
                                    <select class="form-control @error('poli_id') is-invalid @enderror" id="poli" name="poli_id" required>
                                        <option value="">-- Pilih Poli --</option>
                                        @foreach($polis as $poli)
                                            <option value="{{ $poli->id }}">{{ $poli->nama_poli }}</option>
                                        @endforeach
                                    </select>
                                    @error('poli_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                {{-- Pilih Dokter --}}
                                <div class="mb-3">
                                    <label for="dokter" class="form-label fw-semibold">Pilih Dokter</label>
                                    <select class="form-control @error('dokter_id') is-invalid @enderror" id="dokter" required>
                                        <option value="">-- Pilih Dokter --</option>
                                    </select>
                                    @error('dokter_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Hidden dokter_id untuk dikirim ke backend --}}
                                <input type="hidden" name="dokter_id" id="hidden_dokter_id">
                                
                                {{-- Pilih Jadwal --}}
                                <div class="mb-3">
                                    <label for="jadwal" class="form-label fw-semibold">Pilih Jadwal</label>
                                    <select class="form-control @error('jadwal_id') is-invalid @enderror" id="jadwal" name="jadwal_id" required>
                                        <option value="">-- Pilih Jadwal --</option>
                                    </select>
                                    @error('jadwal_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Keluhan --}}
                                <div class="mb-3">
                                    <label for="keluhan" class="form-label fw-semibold">Keluhan</label>
                                    <textarea class="form-control @error('keluhan') is-invalid @enderror" id="keluhan" name="keluhan" rows="3" required>{{ old('keluhan') }}</textarea>
                                    @error('keluhan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Tombol --}}
                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-check-circle me-1" style="margin-right: 10px;"></i>Daftar
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                {{-- Riwayat Daftar Poli --}}
                <div class="col-md-8">
                    <div class="card shadow">
                        <div class="card-header bg-white border-bottom">
                            <h3 class="card-title text-primary">
                                <i class="fas fa-history me-2" style="margin-right: 10px;"></i>Riwayat Daftar Poli
                            </h3>
                        </div>
                        <div class="card-body bg-white">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead class="table-light">
                                        <tr>
                                            <th>No.</th>
                                            <th>Poli</th>
                                            <th>Dokter</th>
                                            <th>Hari</th>
                                            <th>Mulai</th>
                                            <th>Selesai</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($riwayat as $index => $daftar)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $daftar->poli->nama_poli }}</td>
                                                <td>{{ $daftar->jadwal->dokter->user->name }}</td>
                                                <td>{{ $daftar->jadwal->hari }}</td>
                                                <td>{{ $daftar->jadwal->jam_mulai }}</td>
                                                <td>{{ $daftar->jadwal->jam_selesai }}</td>
                                                @php
                                                    $badgeColor = match(strtolower($daftar->status)) {
                                                        'selesai' => 'success',
                                                        'menunggu' => 'info',
                                                        'batal' => 'danger',
                                                        default => 'secondary'
                                                    };
                                                @endphp
                                                <td><span class="badge bg-{{ $badgeColor }}">{{ ucfirst($daftar->status) }}</span></td>
                                                <td>
                                                    <a href="{{ route('pasien.periksa.show', $daftar->id) }}" class="btn btn-sm btn-info">
                                                        Detail
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="8" class="text-center">Belum ada pendaftaran</td>
                                            </tr>
                                        @endforelse
                                    </tbody>                                    
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    // Saat Poli dipilih, ambil dokter
    $('#poli').on('change', function() {
        let poliId = $(this).val();

        $('#dokter').html('<option value="">Memuat dokter...</option>');
        $('#jadwal').html('<option value="">-- Pilih Jadwal --</option>');
        $('#hidden_dokter_id').val(''); // reset input hidden

        if (poliId) {
            $.ajax({
                url: `/pasien/get-dokter-by-poli/${poliId}`,
                type: 'GET',
                success: function(data) {
                    $('#dokter').empty().append('<option value="">-- Pilih Dokter --</option>');
                    if (data.length > 0) {
                        data.forEach(function(d) {
                            $('#dokter').append(`<option value="${d.id}">${d.name}</option>`);
                        });
                    } else {
                        $('#dokter').append('<option disabled>Tidak ada dokter</option>');
                    }
                },
                error: function() {
                    $('#dokter').html('<option disabled>Gagal memuat dokter</option>');
                }
            });
        } else {
            $('#dokter').html('<option value="">-- Pilih Dokter --</option>');
        }
    });

    // Saat Dokter dipilih, ambil jadwal dan simpan id ke hidden input
    $('#dokter').on('change', function() {
        let dokterId = $(this).val();
        $('#hidden_dokter_id').val(dokterId); // set ke input hidden

        $('#jadwal').html('<option value="">Memuat jadwal...</option>');

        if (dokterId) {
            $.ajax({
                url: `/pasien/get-jadwal-by-dokter/${dokterId}`,
                type: 'GET',
                success: function(data) {
                    $('#jadwal').empty().append('<option value="">-- Pilih Jadwal --</option>');
                    if (data.length > 0) {
                        data.forEach(function(j) {
                            $('#jadwal').append(
                                `<option value="${j.id}">${j.hari} (${j.jam_mulai} - ${j.jam_selesai})</option>`
                            );
                        });
                    } else {
                        $('#jadwal').append('<option disabled>Tidak ada jadwal tersedia</option>');
                    }
                },
                error: function() {
                    $('#jadwal').html('<option disabled>Gagal memuat jadwal</option>');
                }
            });
        } else {
            $('#jadwal').html('<option value="">-- Pilih Jadwal --</option>');
        }
    });
});
</script>
@endpush

