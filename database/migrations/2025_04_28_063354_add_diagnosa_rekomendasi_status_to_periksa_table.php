<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('periksa', function (Blueprint $table) {
            $table->text('diagnosa')->nullable()->after('catatan');
            $table->text('rekomendasi')->nullable()->after('diagnosa');
            $table->enum('status', ['menunggu', 'selesai'])->default('menunggu')->after('rekomendasi');
        });
    }

    public function down(): void
    {
        Schema::table('periksa', function (Blueprint $table) {
            $table->dropColumn(['diagnosa', 'rekomendasi', 'status']);
        });
    }
};