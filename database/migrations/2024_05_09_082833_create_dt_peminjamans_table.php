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
        Schema::create('dt_peminjamans', function (Blueprint $table) {
            $table->id();
            $table->string('peminjam');
            $table->string('instansi');
            $table->string('barang');
            $table->string('kontak');
            $table->string('tglkembali');
            $table->string('status');
            $table->string('ket_f');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dt_peminjamans');
    }
};
