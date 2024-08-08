<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\dtElektronik;
use App\Models\dtMebeulair;
use App\Models\dtPraktik;

class StockController extends Controller
{
    public function groupStockElektronik()
    {
        // Mengambil data stok barang elektronik dari database
        $elektroniks = dtElektronik::all();

        // Mengelompokkan stok berdasarkan nama barang yang sama
        $groupedStockElektronik = [];
        foreach ($elektroniks as $elektronik) {
            $namaBarang = $elektronik->nama_b;
            if (!isset($groupedStockElektronik[$namaBarang])) {
                $groupedStockElektronik[$namaBarang] = [
                    'jumlah_data' => 1,
                    'stok' => $elektronik->stok,
                ];
            } else {
                $groupedStockElektronik[$namaBarang]['jumlah_data']++;
                $groupedStockElektronik[$namaBarang]['stok'] += $elektronik->stok;
            }
        }

        return view('pages.stock.index-stock_e', compact('groupedStockElektronik'));
    }

    public function groupStockMebeul()
    {
        // Mengambil data stok barang elektronik dari database
        $mebeulairs = dtMebeulair::all();

        // Mengelompokkan stok berdasarkan nama barang yang sama
        $groupedStockMebeul = [];
        foreach ($mebeulairs as $mebeulair) {
            $namaBarang = $mebeulair->nama_c;
            if (!isset($groupedStockMebeul[$namaBarang])) {
                $groupedStockMebeul[$namaBarang] = [
                    'jumlah_data' => 1,
                    'stok' => $mebeulair->stok,
                ];
            } else {
                $groupedStockMebeul[$namaBarang]['jumlah_data']++;
                $groupedStockMebeul[$namaBarang]['stok'] += $mebeulair->stok;
            }
        }

        return view('pages.stock.index-stock_m', compact('groupedStockMebeul'));
    }

    public function groupStockPraktik()
    {
        // Mengambil data stok barang elektronik dari database
        $praktiks = dtPraktik::all();

        // Mengelompokkan stok berdasarkan nama barang yang sama
        $groupedStockPraktik = [];
        foreach ($praktiks as $praktik) {
            $namaBarang = $praktik->nama_d;
            if (!isset($groupedStockPraktik[$namaBarang])) {
                $groupedStockPraktik[$namaBarang] = [
                    'jumlah_data' => 1,
                   'stok' => $praktik->stok,
            ];
            } else {
                $groupedStockPraktik[$namaBarang]['jumlah_data']++;
                $groupedStockPraktik[$namaBarang]['stok'] += $praktik->stok;
            }
        }

      return view('pages.stock.index-stock_p', compact('groupedStockPraktik'));
    }
}
