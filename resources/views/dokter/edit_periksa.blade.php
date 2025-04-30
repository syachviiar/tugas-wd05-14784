@extends('layout.main')

@section('title', 'Edit Pemeriksaan')

@section('style')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>

    h1 {
        font-size: 2rem;
        font-weight: 700;
        color: #003049;
        margin-bottom: 1rem;
        text-align: center;
    }

    .content-wrapper {
        background: #f0f2f5;
        padding: 1.5rem 2rem;
    }

    .card {
        background-color: white;
        border-radius: 0.75rem;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
        padding: 2rem;
        margin: 0 auto;
        max-width: 100%;
    }

    label {
        font-weight: 600;
        color: #003049;
        margin-bottom: 0.25rem;
        font-size: 1rem;
    }

    .form-control {
        border-radius: 0.5rem;
        font-size: 0.95rem;
        padding: 0.5rem 0.75rem;
        border: 1px solid #ced4da;
        background-color: #f8f9fa;
        transition: border-color 0.2s ease-in-out, box-shadow 0.2s;
        min-height: 30px; /* Slightly shorter height */
    }

    textarea.form-control {
        height: auto;
        overflow: hidden;
    }

    .form-control:focus {
        border-color: #003049;
        box-shadow: 0 0 0 0.15rem rgba(0, 48, 73, 0.25);
        background-color: #fff;
    }

    .grid-container {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1rem;
        margin-bottom: 1rem;
    }

    .grid-item .mb-3 {
        margin-bottom: 0.5rem;
    }

    textarea.catatan {
        max-height: 75px;
        resize: none;
    }

    textarea.diagnosa-rekomendasi {
        min-height: 85px;
        resize: vertical;
    }

    /* Style for Select2 dropdown items */
    .select2-container--default .select2-results__option {
        color: #333 !important; /* Text color for options in the dropdown */
    }

    /* Style for highlighted options */
    .select2-container--default .select2-results__option--highlighted {
        background-color: #005b8b !important; /* Background color for highlighted options */
        color: white !important; /* Text color for highlighted options */
    }

    /* Style for selected options inside the input box */
    .select2-container .select2-selection--multiple .select2-selection__rendered {
        color: #333 !important; /* Text color for selected items in the input box */
        font-size: 1.2rem;
    }

    /* Selected items in the input box */
    .select2-selection__choice {
        background-color: #005b8b !important; /* Background color for selected items in input box */
        color: white !important; /* Text color for selected items in input box */
    }

    .btn-submit {
        background-color: #005b8b;
        color: #fff;
        padding: 0.5rem 1.25rem;
        font-size: 1rem;
        font-weight: 500;
        border-radius: 0.5rem;
        border: none;
    }

    .btn-submit:hover {
        background-color: #003049;
    }
</style>
@endsection

@section('content')
<div class="content-wrapper">
    <div class="card">
        <h1>Formulir Pemeriksaan Pasien</h1>

        <form action="{{ route('dokter.update_periksa', $periksa->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="grid-container">
                {{-- Kiri (Read Only) --}}
                <div class="grid-item">
                    <div class="mb-3">
                        <label for="pasien">Pasien</label>
                        <input type="text" id="pasien" class="form-control" value="{{ $periksa->pasien->nama ?? 'Pasien Tidak Ditemukan' }}" disabled>
                    </div>

                    <div class="mb-3">
                        <label for="dokter">Dokter</label>
                        <input type="text" id="dokter" class="form-control" value="{{ $periksa->dokter->nama ?? 'Dokter Tidak Ditemukan' }}" disabled>
                    </div>

                    <div class="mb-3">
                        <label for="tgl_periksa">Tanggal Periksa</label>
                        <input type="datetime-local" id="tgl_periksa" name="tgl_periksa" class="form-control" 
                            value="{{ old('tgl_periksa', \Carbon\Carbon::parse($periksa->tgl_periksa)->format('Y-m-d\TH:i')) }}" disabled>
                    </div>

                    <div class="mb-3">
                        <label for="catatan">Catatan</label>
                        <textarea id="catatan" name="catatan" class="form-control catatan" rows="4" disabled>{{ old('catatan', $periksa->catatan) }}</textarea>
                    </div>
                </div>

                {{-- Kanan (Editable) --}}
                <div class="grid-item">
                    <div class="mb-3">
                        <label for="diagnosa">Diagnosa</label>
                        <textarea id="diagnosa" name="diagnosa" class="form-control diagnosa-rekomendasi" rows="3" required>{{ old('diagnosa', $periksa->diagnosa) }}</textarea>
                    </div>
                
                    <div class="mb-3">
                        <label for="rekomendasi">Rekomendasi</label>
                        <textarea id="rekomendasi" name="rekomendasi" class="form-control diagnosa-rekomendasi" rows="3" required>{{ old('rekomendasi', $periksa->rekomendasi) }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="obat">Pilih Obat</label>
                        <select name="obat[]" id="obat" class="form-control select2" multiple required>
                            @foreach(App\Models\Obat::all() as $obat)
                                <option value="{{ $obat->id }}"
                                    {{ in_array($obat->id, old('obat', $periksa->detailPeriksa->pluck('id_obat')->toArray())) ? 'selected' : '' }}>
                                    {{ $obat->nama_obat }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div style="text-align:center;">
                <button type="submit" class="btn-submit">Pemeriksaan Selesai</button>
            </div>
        </form>
    </div>
</div>
@endsection


{{-- Khusus untuk script tambahan --}}
@section('script')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function () {
        $('#obat').select2({
            placeholder: "Pilih Obat",
            allowClear: true,
            width: '100%'
        });
    });
</script>
@endsection
