@extends('admin.layout.main')

@section('content')
<div class="card border-0 shadow rounded-lg">
    <div class="card-header bg-white border-bottom py-3 px-4 d-flex align-items-center">
        <i class="nav-icon fas fa-hospital text-primary fa-lg me-2" style="margin-right: 0.5rem;"></i>
        <h5 class="mb-0 text-primary fw-bold">Tambah Poli Baru</h5>
    </div>

    <div class="card-body px-4 py-4 bg-light rounded-bottom">
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-circle me-2"></i>
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('admin.poli.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nama_poli" class="fw-semibold">
                    <i class="fas fa-hospital me-1"></i> Nama Poli
                </label>
                <input type="text" id="nama_poli" name="nama_poli" value="{{ old('nama_poli') }}"
                    class="form-control @error('nama_poli') is-invalid @enderror" required>
                @error('nama_poli')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="keterangan" class="fw-semibold">
                    <i class="fas fa-info-circle me-1"></i> Keterangan
                </label>
                <textarea id="keterangan" name="keterangan" rows="4"
                    class="form-control @error('keterangan') is-invalid @enderror">{{ old('keterangan') }}</textarea>
                @error('keterangan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex justify-content-start gap-2 mt-4">
                <button type="submit" class="btn btn-primary shadow-sm" style="margin-right: 10px;">
                    <i class="fas fa-save me-1"></i> Simpan
                </button>
                <a href="{{ route('admin.poli.index') }}" class="btn btn-secondary">
                    <i class="fas fa-times me-1"></i> Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
