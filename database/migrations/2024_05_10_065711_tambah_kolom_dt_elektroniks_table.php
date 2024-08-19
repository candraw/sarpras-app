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
        Schema::table('dt_elektroniks', function (Blueprint $table) {
            $table->string('toko_b')->after('tahun_b')->nullable();
            $table->string('sumberdana_b')->after('ruangan_b')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('dt_elektroniks', function (Blueprint $table) {
            //
        });
    }
};
