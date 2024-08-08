<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dtPerbaikan extends Model
{
    use HasFactory;
    protected $fillable = [
        'pekerjaan', 
        'ruangan_e', 
        'petugas', 
        'proses',
        'tglselesai',
        'ket_e',
    ];

    // Kolom kode_barang dan serial_number di-set sebagai nullable
    protected $nullable = [
        'ruangan_e', 'ket_e',
    ];

    public function ruangan()
    {
        return $this->belongsTo(dtRuangan::class, 'ruangan_e');
    }
}
