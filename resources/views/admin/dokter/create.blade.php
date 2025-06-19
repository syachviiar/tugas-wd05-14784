@extends('admin.layout.main')

@section('content')
<div class="card border-0 shadow rounded-lg">
    <div class="card-header bg-white border-bottom py-3 px-4 d-flex align-items-center">
        <i class="fas fa-user-md text-primary fa-lg me-2" style="margin-right: 0.5rem;"></i>
        <h5 class="mb-0 text-primary fw-bold">Tambah Dokter Baru</h5>
    </div>

    <div class="card-body px-4 py-4 bg-light rounded-bottom">
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-circle me-2"></i>
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('admin.dokter.store') }}" method="POST">
            @csrf
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="nama" class="fw-semibold">
                            <i class="fas fa-user me-1"></i> Nama Dokter
                        </label>
                        <input type="text" id="nama" name="nama" value="{{ old('nama') }}"
                            class="form-control @error('nama') is-invalid @enderror" required>
                        @error('nama')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="email" class="fw-semibold">
                            <i class="fas fa-envelope me-1"></i> Email
                        </label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}"
                            class="form-control @error('email') is-invalid @enderror" required>
                        @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="password" class="fw-semibold">
                            <i class="fas fa-lock me-1"></i> Password
                        </label>
                        <input type="password" id="password" name="password"
                            class="form-control @error('password') is-invalid @enderror" required>
                        @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="password_confirmation" class="fw-semibold">
                            <i class="fas fa-lock me-1"></i> Konfirmasi Password
                        </label>
                        <input type="password" id="password_confirmation" name="password_confirmation"
                            class="form-control" required>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="alamat" class="fw-semibold">
                            <i class="fas fa-map-marker-alt me-1"></i> Alamat
                        </label>
                        <textarea id="alamat" name="alamat" rows="4"
                            class="form-control @error('alamat') is-invalid @enderror" required>{{ old('alamat') }}</textarea>
                        @error('alamat')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="no_hp" class="fw-semibold">
                            <i class="fas fa-phone me-1"></i> Nomor HP
                        </label>
                        <input type="text" id="no_hp" name="no_hp" value="{{ old('no_hp') }}"
                            class="form-control @error('no_hp') is-invalid @enderror" required>
                        @error('no_hp')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="poli_id" class="fw-semibold">
                            <i class="fas fa-hospital me-1"></i> Poli
                        </label>
                        <select id="poli_id" name="poli_id"
                            class="form-control @error('poli_id') is-invalid @enderror" required>
                            <option value="">Pilih Poli</option>
                            @foreach($polis as $poli)
                                <option value="{{ $poli->id }}" {{ old('poli_id') == $poli->id ? 'selected' : '' }}>
                                    {{ $poli->nama_poli }}
                                </option>
                            @endforeach
                        </select>
                        @error('poli_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-start gap-2 mt-4">
                <button type="submit" class="btn btn-primary shadow-sm" style="margin-right: 10px;">
                    <i class="fas fa-save me-1"></i> Simpan
                </button>
                <a href="{{ route('admin.dokter.index') }}" class="btn btn-secondary">
                    <i class="fas fa-times me-1"></i> Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection