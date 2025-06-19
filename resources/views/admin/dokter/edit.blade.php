@extends('admin.layout.main')

@section('content')
<div class="card shadow rounded-lg border-0">
    <div class="card-header bg-white border-bottom py-3 px-4 d-flex align-items-center">
        <i class="fas fa-user-edit text-primary fa-lg me-2" style="margin-right: 0.5rem;"></i>
        <h5 class="mb-0 text-primary fw-bold">Edit Data Dokter</h5>
    </div>

    <div class="card-body bg-light px-4 py-4 rounded-bottom">
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
            </div>
        @endif

        <form action="{{ route('admin.dokter.update', $dokter->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                {{-- Kolom Kiri --}}
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="nama" class="fw-semibold">
                            <i class="fas fa-user me-1"></i>Nama Dokter
                        </label>
                        <input type="text" id="nama" name="nama"
                            class="form-control @error('nama') is-invalid @enderror"
                            value="{{ old('nama', $dokter->nama) }}" required>
                        @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="fw-semibold">
                            <i class="fas fa-envelope me-1"></i>Email
                        </label>
                        <input type="email" class="form-control" value="{{ $dokter->user->email }}" disabled>
                        <small class="form-text text-muted">
                            <i class="fas fa-info-circle me-1"></i>Email tidak dapat diubah
                        </small>
                    </div>

                    <div class="mb-3">
                        <label for="alamat" class="fw-semibold">
                            <i class="fas fa-map-marker-alt me-1"></i>Alamat
                        </label>
                        <textarea id="alamat" name="alamat" rows="3"
                            class="form-control @error('alamat') is-invalid @enderror"
                            required>{{ old('alamat', $dokter->alamat) }}</textarea>
                        @error('alamat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                {{-- Kolom Kanan --}}
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="no_hp" class="fw-semibold">
                            <i class="fas fa-phone me-1"></i>Nomor HP
                        </label>
                        <input type="text" id="no_hp" name="no_hp"
                            class="form-control @error('no_hp') is-invalid @enderror"
                            value="{{ old('no_hp', $dokter->no_hp) }}" required>
                        @error('no_hp')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="poli_id" class="fw-semibold">
                            <i class="fas fa-hospital me-1"></i>Pilih Poli
                        </label>
                        <select id="poli_id" name="poli_id"
                            class="form-control @error('poli_id') is-invalid @enderror" required>
                            <option value="">-- Pilih Poli --</option>
                            @foreach($polis as $poli)
                                <option value="{{ $poli->id }}"
                                    {{ old('poli_id', $dokter->poli_id) == $poli->id ? 'selected' : '' }}>
                                    {{ $poli->nama_poli }}
                                </option>
                            @endforeach
                        </select>
                        @error('poli_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="fw-semibold">
                            <i class="fas fa-lock me-1"></i>Password Baru (Opsional)
                        </label>
                        <input type="password" id="password" name="password" autocomplete="off"
                            class="form-control @error('password') is-invalid @enderror">
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="form-text text-muted">
                            Kosongkan jika tidak ingin mengubah password.
                        </small>
                    </div>
                </div>
            </div>

            {{-- Tombol Aksi --}}
            <div class="mt-4 d-flex">
                <button type="submit" class="btn btn-primary me-2" style="margin-right: 10px;">
                    <i class="fas fa-save me-1" style="margin-right: 10px;"></i>Update
                </button>
                <a href="{{ route('admin.dokter.index') }}" class="btn btn-secondary">
                    <i class="fas fa-times me-1" style="margin-right: 10px;"></i>Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection