@extends('layout')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <h1>Register Pasien</h1>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">

            {{-- Flash message --}}
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            {{-- Form Tambah/Edit Pasien --}}
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">{{ isset($editPasien) ? 'Edit Pasien' : 'Tambah Pasien' }}</h3>
                </div>
                <form method="POST" action="{{ isset($editPasien) ? route('pasien.register.update', $editPasien->id) : route('pasien.register.store') }}">
                    @csrf
                    @if (isset($editPasien))
                        @method('PUT')
                    @endif
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nama Pasien</label>
                            <input type="text" name="nama" class="form-control" value="{{ old('nama', $editPasien->nama ?? '') }}" required>
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" name="alamat" class="form-control" value="{{ old('alamat', $editPasien->alamat ?? '') }}" required>
                        </div>
                        <div class="form-group">
                            <label>No Telepon</label>
                            <input type="text" name="no_hp" class="form-control" value="{{ old('no_hp', $editPasien->no_hp ?? '') }}" required>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">{{ isset($editPasien) ? 'Update' : 'Simpan' }}</button>
                        @if (isset($editPasien))
                            <a href="{{ route('pasien.register.index') }}" class="btn btn-secondary">Batal</a>
                        @endif
                    </div>
                </form>
            </div>

            {{-- Tabel List Pasien --}}
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Daftar Pasien</h3>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-bordered text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>No Telepon</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pasiens as $pasien)
                                <tr>
                                    <td>{{ $pasien->id }}</td>
                                    <td>{{ $pasien->nama }}</td>
                                    <td>{{ $pasien->alamat }}</td>
                                    <td>{{ $pasien->no_hp }}</td>
                                    <td>
                                        {{-- Edit Pasien --}}
                                        <a href="{{ route('pasien.register.index', ['edit' => $pasien->id]) }}" class="btn btn-sm btn-warning">Edit</a>
                                        
                                        {{-- Hapus Pasien --}}
                                        <form action="{{ route('pasien.register.destroy', $pasien->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus pasien ini?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            @if ($pasiens->isEmpty())
                                <tr>
                                    <td colspan="5" class="text-center">Belum ada data pasien.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </section>
</div>
@endsection