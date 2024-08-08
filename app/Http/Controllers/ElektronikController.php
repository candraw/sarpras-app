<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\dtElektronik;
use App\Models\dtRuangan;
use Illuminate\Support\Facades\Response;


class ElektronikController extends Controller
{
    public function index()
    {
        $ruangans = dtRuangan::pluck('nama_a', 'id');
        $elektroniks = dtElektronik::all();
        return view('pages.elektronik.index-elektronik', compact('elektroniks', 'ruangans'));
    }

    public function store(Request $request)
    {
        //@dd($request->all());
        dtElektronik::create($request->all());
        
        Session::flash('pesan', 'Data berhasil ditambahkan');
        Session::flash('alert', 'success');
        return redirect()->route('admin.elektronik.index');
    }

    public function update(Request $request, $id)
    {
        $elektronik = dtElektronik::findOrFail($id);
        $elektronik->update($request->all());

        Session::flash('pesan', 'Data berhasil di Update');
        Session::flash('alert', 'info');
        return redirect()->route('admin.elektronik.index');
    }

    public function destroy($id)
    {
        $elektronik = dtElektronik::findOrFail($id);
        $elektronik->delete();

        Session::flash('pesan', 'Data berhasil dihapus');
        Session::flash('alert', 'error');
        return redirect()->route('admin.elektronik.index');
    }

    public function showImportForm()
    {
        return view('import-form');
    }

    public function import(Request $request)
    {
        $file = $request->file('csv_file');

        if (!$file) {
            return redirect()->back()->with('error', 'No file uploaded');
        }

        $path = $file->getRealPath();

        // Buka file CSV
        $handle = fopen($path, 'r');

        // Baca header (baris pertama), namun tidak disimpan
        fgets($handle);

        // Proses data per baris
        while (($row = fgets($handle)) !== false) {
            // Pisahkan data berdasarkan delimiter (misalnya, koma)
            $data = str_getcsv($row);

            // Simpan ke database
            dtElektronik::create([
                'nama_b' => $data[0],
                'kode_b' => $data[1],
                'sn_b' => $data[2],
                'kondisi_b' => $data[3],
                'tahun_b' => $data[4],
                'merk_b' => $data[5],
                'spek_b' => $data[6],
                'toko_b' => $data[7],
                'sumberdana_b' => $data[8],
                'ruangan_b' => $data[9],
                'ket_b' => $data[10],
            ]);
        }

        // Tutup file setelah selesai
        fclose($handle);

        return redirect()->back()->with('success', 'Elektronik data imported successfully');
    }

    public function showExportForm()
    {
        return view('export-form');
    }


    public function export()
    {
        $elektroniks = dtElektronik::all();

        $fileName = 'elektronik_data_' . date('Y-m-d_H-i-s') . '.csv';
        $headers = array(
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0",
        );

        $callback = function () use ($elektroniks) {
            $file = fopen('php://output', 'w');
            fputcsv($file, ['Nama Barang', 'Kode Barang', 'Serial Number', 'Kondisi', 'Tahun', 'Merk', 'Spesifikasi', 'Toko', 'Sumber Dana', 'Ruangan', 'Keterangan']);

            foreach ($elektroniks as $elektronik) {
                fputcsv($file, [
                    $elektronik->nama_b,
                    $elektronik->kode_b,
                    $elektronik->sn_b,
                    $elektronik->kondisi_b,
                    $elektronik->tahun_b,
                    $elektronik->merk_b,
                    $elektronik->spek_b,
                    $elektronik->toko_b,
                    $elektronik->sumberdana_b,
                    $elektronik->ruangan_b,
                    $elektronik->ket_b,
                ]);
            }

            fclose($file);
        };

        return Response::stream($callback, 200, $headers);
    }

    public function print()
    {
        $elektroniks = dtElektronik::all();
        return view('pages.elektronik.print-elektronik', compact('elektroniks'));
    }

}
