<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dtPraktik extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_d', 
        'kode_d', 
        'merk_d',
        'bahan_d',
        'kondisi_d',
        'tahun_d',
        'ruangan_d',
        'toko_d',
        'sumber_d', 
        'ket_d',
    ];

    // Kolom kode_barang dan serial_number di-set sebagai nullable
    protected $nullable = [
        'ruangan_d',
    ];

    public function ruangan()
    {
        return $this->belongsTo(dtRuangan::class, 'ruangan_d');
    }

}
