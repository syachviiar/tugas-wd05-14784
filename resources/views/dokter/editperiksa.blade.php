@extends('layout.main')
@section('title', 'Edit Pemeriksaan')

@section('isi')
<!-- Tambahkan CSS Select2 -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
    /* Warna border dan background input select */
    .select2-container--default .select2-selection--multiple {
        background-color: #f0f8ff;
        border: 1px solid #007bff;
        border-radius: 0.375rem;
        padding: 0.4rem;
        min-height: 38px;
    }

    /* Warna text item yang dipilih */
    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        background-color: #007bff;
        border: 1px solid #0056b3;
        color: #fff;
        font-weight: 500;
    }

    /* Warna background ketika hover di list dropdown */
    .select2-container--default .select2-results__option--highlighted[aria-selected] {
        background-color: #007bff;
        color: white;
    }

    /* Warna item di dropdown */
    .select2-container--default .select2-results__option {
        padding: 6px 12px;
        font-size: 14px;
    }

    /* Placeholder style */
    .select2-container--default .select2-selection--multiple .select2-search__field {
        color: #6c757d;
    }
</style>

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary card-outline shadow-sm rounded-3">
                <div class="card-header bg-white border-bottom py-3 px-4">
                    <h5 class="mb-0 text-primary fw-bold">
                        <i class="fas fa-stethoscope me-2 text-primary" style="margin-right: 0.5rem;"></i>Data Pemeriksaan Pasien
                    </h5>
                </div>

                <form action="{{ route('dokter.memeriksa.update', $periksa->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body px-4 py-4">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="nama_pasien" class="form-label fw-semibold">Nama Pasien</label>
                                <input type="text" id="nama_pasien" class="form-control" value="{{ $periksa->pasien->nama }}" readonly>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="tgl_periksa" class="form-label fw-semibold">Tanggal Pemeriksaan</label>
                                <input type="date" id="tgl_periksa" name="tgl_periksa" class="form-control @error('tgl_periksa') is-invalid @enderror"
                                    value="{{ old('tgl_periksa', $periksa->tgl_periksa ?? date('Y-m-d')) }}" required>
                                @error('tgl_periksa')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="catatan" class="form-label fw-semibold">Catatan Pemeriksaan</label>
                            <textarea id="catatan" name="catatan" rows="4"
                                class="form-control @error('catatan') is-invalid @enderror"
                                required>{{ old('catatan', $periksa->catatan) }}</textarea>
                            @error('catatan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- select2 -->
                        <div class="form-group mb-3">
                            <label for="id_obat" class="form-label fw-semibold">Obat yang Diberikan</label>
                            <select name="obat_id[]" id="id_obat" class="form-control select2" multiple required>
                                @foreach($obats as $obat)
                                    <option value="{{ $obat->id }}"
                                        data-harga="{{ $obat->harga }}"
                                        {{ in_array($obat->id, $periksa->detailPeriksa->pluck('id_obat')->toArray()) ? 'selected' : '' }}>
                                        {{ $obat->nama_obat }} - Rp{{ number_format($obat->harga, 0, ',', '.') }}
                                    </option>
                                @endforeach
                            </select>
                            @error('id_obat')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="status" class="form-label fw-semibold">Status Pemeriksaan</label>
                            <select name="status" id="status" class="form-control @error('status') is-invalid @enderror" required>
                                <option value="Menunggu" {{ old('status', $periksa->status) == 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
                                <option value="Selesai" {{ old('status', $periksa->status) == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                                <option value="Batal" {{ old('status', $periksa->status) == 'Batal' ? 'selected' : '' }}>Batal</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-group mb-3">
                            <label class="form-label fw-semibold">Total Biaya Pemeriksaan</label>
                            <input type="text" id="total_biaya" class="form-control" 
                                value="Rp{{ number_format($periksa->biaya_periksa ?? 150000, 0, ',', '.') }}" readonly
                                data-biaya="{{ $periksa->biaya_periksa ?? 150000 }}">
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label fw-semibold">Total Harga Obat</label>
                            <input type="text" id="total_harga_obat" class="form-control" value="Rp0" readonly>
                        </div>

                        <div class="form-group mb-4">
                            <label class="form-label fw-semibold">Total Keseluruhan</label>
                            <input type="text" id="total_keseluruhan" class="form-control" value="Rp0" readonly>
                        </div>
                    </div>

                    <div class="card-footer bg-white px-4 py-3 border-top d-flex justify-content-start">
                        <button type="submit" class="btn btn-primary mr-2">
                            Simpan
                        </button>
                        <a href="{{ route('dokter.memeriksa') }}" class="btn btn-secondary" style="color: white !important;">
                            Batal
                        </a>
                    </div>                    
                </form>
            </div>
        </div>
    </section>
</div>

<!-- Tambahkan Script Select2 -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    // Inisialisasi select2
    $('#id_obat').select2({
        placeholder: 'Pilih Obat',
        width: '100%'
    });

    const selectObat = document.getElementById('id_obat');
    const totalHargaObatInput = document.getElementById('total_harga_obat');
    const totalBiayaInput = document.getElementById('total_biaya');
    const totalKeseluruhanInput = document.getElementById('total_keseluruhan');

    function calculateTotalHargaObat() {
        let totalHargaObat = 0;

        [...selectObat.selectedOptions].forEach(option => {
            const harga = parseInt(option.getAttribute('data-harga')) || 0;
            totalHargaObat += harga;
        });

        totalHargaObatInput.value = 'Rp' + totalHargaObat.toLocaleString('id-ID');
        totalHargaObatInput.setAttribute('data-total-obat', totalHargaObat);

        const totalBiaya = parseInt(totalBiayaInput.getAttribute('data-biaya')) || 0;
        const totalKeseluruhan = totalBiaya + totalHargaObat;

        totalKeseluruhanInput.value = 'Rp' + totalKeseluruhan.toLocaleString('id-ID');
    }


    calculateTotalHargaObat();

    $('#id_obat').on('change', calculateTotalHargaObat);
});
</script>
@endsection
