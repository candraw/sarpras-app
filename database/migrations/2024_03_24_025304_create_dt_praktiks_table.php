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
        Schema::create('dt_praktiks', function (Blueprint $table) {
            $table->id();
            $table->string('nama_d');
            $table->string('kode_d');
            $table->string('merk_d');
            $table->string('bahan_d');
            $table->string('kondisi_d');
            $table->string('tahun_d');
            $table->string('ruangan_d');
            $table->string('sumber_d');
            $table->string('ket_d');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dt_praktiks');
    }
};
