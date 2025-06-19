@extends('admin.layout.main')

@section('content')
<div class="card border-0 shadow rounded-lg">
    <div class="card-header bg-white border-bottom py-3 px-4 d-flex align-items-center">
        <i class="fas fa-user-plus text-primary fa-lg" style="margin-right: 0.5rem;"></i>
        <h5 class="mb-0 text-primary fw-bold">Tambah Pasien Baru</h5>
    </div>

    <div class="card-body px-4 py-4 bg-light rounded-bottom">
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show">
                <i class="fas fa-exclamation-circle me-2"></i>
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('admin.pasien.store') }}" method="POST">
            @csrf
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nama" class="fw-semibold">
                            <i class="fas fa-user me-1"></i> Nama Lengkap
                        </label>
                        <input type="text" id="nama" name="nama" value="{{ old('nama') }}"
                               class="form-control @error('nama') is-invalid @enderror" required>
                        @error('nama')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="form-group">
                        <label for="email" class="fw-semibold">
                            <i class="fas fa-envelope me-1"></i> Email
                        </label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}"
                               class="form-control @error('email') is-invalid @enderror" required>
                        @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="form-group">
                        <label for="password" class="fw-semibold">
                            <i class="fas fa-lock me-1"></i> Password
                        </label>
                        <input type="password" id="password" name="password"
                               class="form-control @error('password') is-invalid @enderror" required>
                        @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="form-group">
                        <label for="no_ktp" class="fw-semibold">
                            <i class="fas fa-id-card me-1"></i> Nomor KTP
                        </label>
                        <input type="text" id="no_ktp" name="no_ktp" value="{{ old('no_ktp') }}"
                               class="form-control @error('no_ktp') is-invalid @enderror" required>
                        @error('no_ktp')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>

                <div class="col-md-6 d-flex flex-column justify-content-between">
                    {{-- Alamat --}}
                    <div class="form-group">
                        <label for="alamat" class="fw-semibold">
                            <i class="fas fa-map-marker-alt me-1"></i> Alamat
                        </label>
                        <textarea id="alamat" name="alamat" rows="7"
                            class="form-control @error('alamat') is-invalid @enderror" required>{{ old('alamat') }}</textarea>
                        @error('alamat')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                
                    {{-- Nomor HP --}}
                    <div class="form-group">
                        <label for="no_hp" class="fw-semibold mt-2">
                            <i class="fas fa-phone me-1"></i> Nomor HP
                        </label>
                        <input type="text" id="no_hp" name="no_hp" value="{{ old('no_hp') }}"
                            class="form-control @error('no_hp') is-invalid @enderror" required>
                        @error('no_hp')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>                
            </div>

            <div class="d-flex justify-content-start mt-4">
                <button type="submit" class="btn btn-primary shadow-sm" style="margin-right: 10px;">
                    <i class="fas fa-save me-1"></i> Simpan
                </button>
                <a href="{{ route('admin.pasien.index') }}" class="btn btn-secondary">
                    <i class="fas fa-times me-1"></i> Batal
                </a>
            </div>
                       
        </form>
    </div>
</div>
@endsection