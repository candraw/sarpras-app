<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dtPeminjaman extends Model
{
    use HasFactory;
    protected $fillable = [
        'peminjam', 
        'instansi',
        'barang', 
        'kontak',
        'tglkembali',
        'status', 
        'ket_f',
    ];

    protected $nullable = [
        'ket_f',
    ];

    protected $table = 'dt_peminjamans';

}
