<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('periksa', function (Blueprint $table) {
            $table->id();  // Primary Key
            $table->foreignId('id_pasien')->constrained('users')->onDelete('cascade');  // Foreign Key ke users.id
            $table->foreignId('id_dokter')->constrained('users')->onDelete('cascade');  // Foreign Key ke users.id
            $table->dateTime('tgl_periksa');  // Kolom untuk tanggal pemeriksaan
            $table->text('catatan')->nullable();  // Kolom catatan, nullable karena bisa saja tidak ada
            $table->integer('biaya_periksa');  // Biaya pemeriksaan
            $table->timestamps();  // created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('periksa');
    }
};

