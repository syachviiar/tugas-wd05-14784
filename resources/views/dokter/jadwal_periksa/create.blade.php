@extends('layout.main')

@section('title', 'Tambah Jadwal Periksa')

@section('isi')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="card border-0 shadow rounded-lg">
                <div class="card-header bg-white py-3 px-4 border-bottom shadow-sm">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-calendar-plus text-primary fa-lg me-2" style="margin-right: 0.5rem;"></i>
                        <h5 class="mb-0 text-primary fw-bold">Form Tambah Jadwal Periksa</h5>
                    </div>
                </div>

                <div class="card-body bg-light px-4 py-4 rounded-bottom">
                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fas fa-exclamation-triangle me-2"></i>
                            {{ session('error') }}
                            
                        </div>
                    @endif

                    <form action="{{ route('dokter.jadwal-periksa.store') }}" method="POST">
                        @csrf
                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="hari" class="fw-semibold">
                                        <i class="fas fa-calendar-day me-1"></i> Hari
                                    </label>
                                    <select class="form-control @error('hari') is-invalid @enderror" id="hari" name="hari" required>
                                        <option value="">Pilih Hari</option>
                                        @foreach(['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'] as $hari)
                                            <option value="{{ $hari }}" {{ old('hari') == $hari ? 'selected' : '' }}>{{ $hari }}</option>
                                        @endforeach
                                    </select>
                                    @error('hari')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="status" class="fw-semibold">
                                        <i class="fas fa-toggle-on me-1"></i> Status
                                    </label>
                                    <select class="form-control @error('status') is-invalid @enderror" id="status" name="status" required>
                                        <option value="">Pilih Status</option>
                                        <option value="Aktif" {{ old('status') == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                                        <option value="Tidak Aktif" {{ old('status') == 'Tidak Aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                                    </select>
                                    @error('status')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group mb-3">
                                    <label for="jam_mulai" class="fw-semibold">
                                        <i class="fas fa-clock me-1"></i> Jam Mulai
                                    </label>
                                    <input type="time" class="form-control @error('jam_mulai') is-invalid @enderror" 
                                        id="jam_mulai" name="jam_mulai" value="{{ old('jam_mulai') }}" required>
                                    @error('jam_mulai')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group mb-3">
                                    <label for="jam_selesai" class="fw-semibold">
                                        <i class="fas fa-clock me-1"></i> Jam Selesai
                                    </label>
                                    <input type="time" class="form-control @error('jam_selesai') is-invalid @enderror" 
                                        id="jam_selesai" name="jam_selesai" value="{{ old('jam_selesai') }}" required>
                                    @error('jam_selesai')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-start gap-2 mt-4">
                            <button type="submit" class="btn btn-primary shadow-sm" style="margin-right: 10px;">
                                <i class="fas fa-save me-1"></i> Simpan
                            </button>
                            <a href="{{ route('dokter.jadwal-periksa.index') }}" class="btn btn-secondary shadow-sm">
                                <i class="fas fa-times me-1"></i> Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
