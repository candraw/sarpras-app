<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dtRuangan extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_a', 
        'kode_a', 
        'luas_a', 
        'kondisi_a', 
        'ket_a',
    ];

    // Kolom kode_barang dan serial_number di-set sebagai nullable
    protected $nullable = [
        'luas_a', 'ket_a',
    ];

    protected $table = 'dt_ruangans';

    public function barangElektronik()
    {
        return $this->hasMany(dtElektronik::class, 'ruangan_b');
    }

    public function barangMebeulair()
    {
        return $this->hasMany(dtMebeulair::class, 'ruangan_c');
    }

    public function barangPraktik()
    {
        return $this->hasMany(dtPraktik::class, 'ruangan_d');
    }

    public function dataPerbaikan()
    {
        return $this->hasMany(dataPerbaikan::class, 'ruangan_e');
    }
}
