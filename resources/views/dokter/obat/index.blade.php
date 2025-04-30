@extends('layout.main')
@section('title', 'Dokter Obat Page')

@section('content')
<style>
    .card {
        border-radius: 0.75rem;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        border: none;
    }

    .card-header {
        background-color: #005b8b;
        color: white;
        border-top-left-radius: 0.75rem;
        border-top-right-radius: 0.75rem;
    }

    .card-title {
        font-size: 1.25rem;
        font-weight: 600;
        margin: 0;
    }

    .btn-primary {
        background-color: #005b8b;
        border-color: #005b8b;
    }

    .btn-primary:hover {
        background-color: #003049;
        border-color: #003049;
    }

    .btn-warning, .btn-danger {
        font-size: 0.85rem;
        padding: 0.4rem 0.8rem;
    }

    .table th, .table td {
        vertical-align: middle;
        font-size: 0.95rem;
    }

    .content-wrapper {
        padding: 2rem 3rem;
        background-color: #fcfcfc;
    }

</style>

<div class="content-wrapper">
    {{-- Form Tambah Obat --}}
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tambah Obat Baru</h3>
            </div>
            <form method="POST" action="{{ route('dokter.obat.store') }}">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="namaObat">Nama Obat</label>
                        <input type="text" name="nama_obat" class="form-control" id="namaObat" placeholder="Masukkan nama obat">
                    </div>
                    <div class="form-group">
                        <label for="kemasan">Kemasan</label>
                        <input type="text" name="kemasan" class="form-control" id="kemasan" placeholder="Masukkan kemasan obat">
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="number" name="harga" class="form-control" id="harga" placeholder="Masukkan harga">
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">Tambah Obat</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


    {{-- Tabel List Obat --}}
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">List Obat</h3>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-bordered table-hover mb-0">
                        <thead class="table-light text-center">
                            <tr>
                                <th>No</th>
                                <th>ID Obat</th>
                                <th>Nama Obat</th>
                                <th>Kemasan</th>
                                <th>Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($obats as $obat)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $obat->id }}</td>
                                    <td>{{ $obat->nama_obat }}</td>
                                    <td>{{ $obat->kemasan }}</td>
                                    <td>Rp {{ number_format($obat->harga, 0, ',', '.') }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('dokter.obat.edit', $obat->id) }}" class="btn btn-warning mr-2">Edit</a>
                                        <form action="{{ route('dokter.obat.delete', $obat->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            @if($obats->isEmpty())
                                <tr>
                                    <td colspan="6" class="text-center text-muted">Belum ada data obat.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection