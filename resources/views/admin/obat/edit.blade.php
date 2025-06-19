@extends('admin.layout.main')

@section('content')
<div class="card card-primary card-outline shadow-sm rounded-3">
    <div class="card-header d-flex align-items-center bg-white border-bottom py-3 px-4">
        <i class="fas fa-pills text-primary fa-lg me-2" style="margin-right: 0.5rem;"></i>
        <h5 class="mb-0 text-primary fw-bold">Edit Data Obat</h5>
    </div>

    <div class="card-body px-4 py-4">
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
            </div>
        @endif

        <form action="{{ route('admin.obat.update', $obat->id) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- Nama Obat --}}
            <div class="form-group mb-3">
                <label for="nama_obat" class="fw-semibold">
                    <i class="fas fa-prescription-bottle me-1 text-secondary"></i>Nama Obat
                </label>
                <input type="text" id="nama_obat" name="nama_obat"
                    class="form-control @error('nama_obat') is-invalid @enderror"
                    value="{{ old('nama_obat', $obat->nama_obat) }}" required>
                @error('nama_obat')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Kemasan --}}
            <div class="form-group mb-3">
                <label for="kemasan" class="fw-semibold">
                    <i class="fas fa-box me-1 text-secondary"></i>Kemasan
                </label>
                <input type="text" id="kemasan" name="kemasan"
                    class="form-control @error('kemasan') is-invalid @enderror"
                    value="{{ old('kemasan', $obat->kemasan) }}" required>
                @error('kemasan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Harga --}}
            <div class="form-group mb-3">
                <label for="harga" class="fw-semibold">
                    <i class="fas fa-tag me-1 text-secondary"></i>Harga
                </label>
                <div class="input-group">
                    <span class="input-group-text">Rp</span>
                    <input type="number" id="harga" name="harga"
                        class="form-control @error('harga') is-invalid @enderror"
                        value="{{ old('harga', $obat->harga) }}" required>
                </div>
                @error('harga')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            {{-- Tombol --}}
            <div class="form-group mt-4 d-flex justify-content-start">
                <button type="submit" class="btn btn-primary me-2" style="margin-right: 10px;">
                    <i class="fas fa-save me-1" style="margin-right: 10px;"></i>Update
                </button>
                <a href="{{ route('admin.obat.index') }}" class="btn btn-secondary">
                    <i class="fas fa-times me-1" style="margin-right: 10px;"></i>Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection