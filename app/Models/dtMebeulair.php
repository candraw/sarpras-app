<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dtMebeulair extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_c', 
        'kode_c', 
        'bahan_c', 
        'kondisi_c', 
        'tahun_c',
        'toko_c',
        'sumberdana_c',
        'ruangan_c',
        'ket_c',
    ];

    // Kolom kode_barang dan serial_number di-set sebagai nullable
    protected $nullable = [
        'ruangan_a', 'ket_c',
    ];

    protected $table = 'dt_mebeulairs';

    public function ruangan()
    {
        return $this->belongsTo(dtRuangan::class, 'ruangan_c');
    }
}
