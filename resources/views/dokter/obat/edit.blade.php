@extends('layout.main')
@section('title', 'Dokter Edit Obat Page')

@section('content')
<style>
    .card {
        border-radius: 0.75rem;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        border: none;
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

    .content-wrapper {
        padding: 2rem 3rem;
        background-color: #f0f2f5;
    }

</style>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid"></div>
    </div>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-primary shadow-sm">
                    <div class="card-header">
                        <h3 class="card-title">Edit Obat</h3>
                    </div>
                    <form method="POST" action="{{ route('dokter.obat.update', $obat->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nama_obat">Nama Obat</label>
                                <input value="{{ $obat->nama_obat }}" type="text" name="nama_obat" class="form-control" id="nama_obat" placeholder="Masukkan nama obat">
                            </div>
                            <div class="form-group">
                                <label for="kemasan">Kemasan</label>
                                <input value="{{ $obat->kemasan }}" type="text" name="kemasan" class="form-control" id="kemasan" placeholder="Masukkan jenis kemasan">
                            </div>
                            <div class="form-group">
                                <label for="harga">Harga</label>
                                <input value="{{ $obat->harga }}" type="number" name="harga" class="form-control" id="harga" placeholder="Masukkan harga obat">
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary">Update Data Obat</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection