@extends('admin.layout.main')

@section('content')
<div class="card shadow rounded-lg border-0">
    <div class="card-header bg-white border-bottom py-3 px-4 d-flex align-items-center">
        <i class="fas fa-hospital-alt text-primary fa-lg me-2" style="margin-right: 0.5rem;"></i>
        <h5 class="mb-0 text-primary fw-bold">Edit Data Poli</h5>
    </div>

    <div class="card-body bg-light px-4 py-4 rounded-bottom">
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
            </div>
        @endif

        <form action="{{ route('admin.poli.update', $poli->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label for="nama_poli" class="fw-semibold">
                    <i class="fas fa-hospital me-1"></i>Nama Poli
                </label>
                <input type="text" id="nama_poli" name="nama_poli"
                    class="form-control @error('nama_poli') is-invalid @enderror"
                    value="{{ old('nama_poli', $poli->nama_poli) }}" required>
                @error('nama_poli')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="keterangan" class="fw-semibold">
                    <i class="fas fa-info-circle me-1"></i>Keterangan
                </label>
                <textarea id="keterangan" name="keterangan" rows="3"
                    class="form-control @error('keterangan') is-invalid @enderror"
                    required>{{ old('keterangan', $poli->keterangan) }}</textarea>
                @error('keterangan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mt-4 d-flex">
                <button type="submit" class="btn btn-primary me-2" style="margin-right: 10px;">
                    <i class="fas fa-save me-1" style="margin-right: 10px;"></i>Update
                </button>
                <a href="{{ route('admin.poli.index') }}" class="btn btn-secondary">
                    <i class="fas fa-times me-1" style="margin-right: 10px;"></i>Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection