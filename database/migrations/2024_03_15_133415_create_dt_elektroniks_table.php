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
        Schema::create('dt_elektroniks', function (Blueprint $table) {
            $table->id();
            $table->string('nama_b');
            $table->string('kode_b');
            $table->string('sn_b');
            $table->string('merk_b');
            $table->string('spek_b');
            $table->string('kondisi_b');
            $table->string('tahun_b');
            $table->string('ruangan_b');
            $table->string('ket_b');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dt_elektroniks');
    }
};
