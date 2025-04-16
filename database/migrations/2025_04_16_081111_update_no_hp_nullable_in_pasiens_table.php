<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('pasiens', function (Blueprint $table) {
        $table->string('no_hp')->nullable()->change(); // Membuat kolom no_hp nullable
    });
}

public function down()
{
    Schema::table('pasiens', function (Blueprint $table) {
        $table->string('no_hp')->nullable(false)->change(); // Mengembalikan menjadi tidak nullable
    });
}
};
