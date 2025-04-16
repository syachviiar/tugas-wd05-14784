@extends('layout')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Obat</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Obat</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- Form tambah/edit obat -->
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">{{ isset($obat) ? 'Edit Obat' : 'Tambah Obat' }}</h3>
                        </div>
                        <!-- /.card-header -->
                        <form action="{{ isset($obat) ? route('obat.update', $obat->id) : route('obat.store') }}" method="POST">
                            @csrf
                            @isset($obat)
                                @method('PUT')
                            @endisset
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama_obat">Nama Obat</label>
                                    <input type="text" class="form-control" id="nama_obat" name="nama_obat" value="{{ old('nama_obat', $obat->nama_obat ?? '') }}" placeholder="Masukkan Nama Obat" required>
                                </div>
                                <div class="form-group">
                                    <label for="harga">Harga</label>
                                    <input type="number" class="form-control" id="harga" name="harga" value="{{ old('harga', $obat->harga ?? '') }}" placeholder="Masukkan Harga" required>
                                </div>
                                <div class="form-group">
                                    <label for="kemasan">Kemasan</label>
                                    <input type="text" class="form-control" id="kemasan" name="kemasan" value="{{ old('kemasan', $obat->kemasan ?? '') }}" placeholder="Masukkan Kemasan" required>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">{{ isset($obat) ? 'Update' : 'Simpan' }}</button>
                                <a href="{{ route('obat.index') }}" class="btn btn-secondary">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Tabel Obat -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">List Obat</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID Obat</th>
                                        <th>Nama Obat</th>
                                        <th>Harga</th>
                                        <th>Kemasan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($obats as $obat)
                                    <tr>
                                        <td>{{ $obat->id }}</td>
                                        <td>{{ $obat->nama_obat }}</td>
                                        <td>{{ number_format($obat->harga, 0, ',', '.') }}</td>
                                        <td>{{ $obat->kemasan }}</td>
                                        <td>
                                            <a href="{{ route('obat.edit', $obat->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('obat.destroy', $obat->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
</div>
@endsection