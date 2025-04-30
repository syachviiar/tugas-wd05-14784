@extends('layout.main')
@section('title', 'Pasien Periksa Page')

@section('content')
<style>
    .content-wrapper {
        background: #f0f2f5;
        padding: 1.5rem 2rem;
    }

    .card {
        background-color: #fff;
        border-radius: 0.75rem;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        max-width: 700px;
        margin: 2.5rem auto 1rem;
        padding: 0;
    }

    .card-header {
        background-color: #003049;
        color: #fff;
        padding: 1rem 1.25rem;
        border-top-left-radius: 0.75rem;
        border-top-right-radius: 0.75rem;
    }

    .card-title {
        font-size: 1.5rem;
        font-weight: 600;
        margin: 0;
    }

    .card-body {
        padding: 1.25rem;
    }

    label {
        font-weight: 600;
        color: #003049;
        margin-bottom: 0.4rem;
        font-size: 1.2rem;
    }

    .form-control {
        border-radius: 1rem;
        font-size: 1rem;
        padding: 0.6rem 0.85rem;
        border: 1px solid #ced4da;
        background-color: #f8f9fa;
        transition: border-color 0.2s ease-in-out, box-shadow 0.2s;
    }

    .form-control:focus {
        border-color: #003049;
        box-shadow: 0 0 0 0.2rem rgba(0, 48, 73, 0.25);
        background-color: #fff;
    }

    .btn-submit {
        background-color: #003049;
        color: #fff;
        padding: 0.55rem 1.1rem;
        font-size: 1rem;
        font-weight: 500;
        border-radius: 0.5rem;
        border: none;
        transition: background-color 0.3s ease;
    }

    .btn-submit:hover {
        background-color: #001f2d;
    }

    .mb-3 {
        margin-bottom: 1rem !important;
    }
</style>

<div class="content-wrapper">
    <div class="card">
        <div class="card-header d-flex justify-content-center">
            <h3 class="card-title m-0">Formulir Pendaftaran Pemeriksaan</h3>
        </div>               
        <div class="card-body">
            <form action="{{ route('pasien.periksa.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="id_dokter" class="form-label">Pilih Dokter</label>
                    <select name="id_dokter" id="id_dokter" class="form-control" required>
                        <option value="" disabled selected>-- Pilih Dokter --</option>
                        @foreach(App\Models\User::where('role', 'dokter')->get() as $dokter)
                            <option value="{{ $dokter->id }}">{{ $dokter->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="tgl_periksa" class="form-label">Tanggal & Waktu Periksa</label>
                    <input type="datetime-local" name="tgl_periksa" id="tgl_periksa" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="catatan" class="form-label">Catatan Keluhan</label>
                    <textarea name="catatan" id="catatan" rows="3" class="form-control" required placeholder="Tuliskan keluhan atau gejala Anda..."></textarea>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn-submit">Daftar Periksa</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection