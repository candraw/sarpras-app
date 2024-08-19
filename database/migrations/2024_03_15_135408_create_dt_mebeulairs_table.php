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
        Schema::create('dt_mebeulairs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_c');
            $table->string('kode_c');
            $table->string('bahan_c');
            $table->string('kondisi_c');
            $table->string('tahun_c');
            $table->string('ruangan_c');
            $table->string('ket_c');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dt_mebeulairs');
    }
};
