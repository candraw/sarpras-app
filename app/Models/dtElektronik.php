<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dtElektronik extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_b', 
        'kode_b',
        'sn_b', 
        'merk_b',
        'spek_b', 
        'kondisi_b', 
        'tahun_b', 
        'toko_b',
        'ruangan_b',
        'sumberdana_b',
        'ket_b',
    ];

    // Kolom kode_barang dan serial_number di-set sebagai nullable
    protected $nullable = [
        'ruangan_b', 'ket_b', 'sn_b', 'merk_b', 'spek_b',
    ];

    protected $table = 'dt_elektroniks';

    public function ruangan()
    {
        return $this->belongsTo(dtRuangan::class, 'ruangan_b');
    }
}
