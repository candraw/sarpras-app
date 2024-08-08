<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\dtPraktik;
use App\Models\dtRuangan;
use Illuminate\Support\Facades\Response;

class PraktikController extends Controller
{
    public function index()
    {
        $ruangans = dtRuangan::pluck('nama_a', 'id');
        $praktiks = dtPraktik::all();
        return view('pages.praktik.index-praktik', compact('praktiks', 'ruangans'));
    }

    public function store(Request $request)
    {
        //@dd($request->all());
        dtPraktik::create($request->all());

        Session::flash('pesan', 'Data berhasil ditambahkan');
        Session::flash('alert', 'success');
        return redirect()->route('admin.praktik.index');
    }

    public function update(Request $request, $id)
    {
        $praktik = dtPraktik::findOrFail($id);
        $praktik->update($request->all());

        Session::flash('pesan', 'Data berhasil di Update');
        Session::flash('alert', 'info');

        return redirect()->route('admin.praktik.index');
    }

    public function destroy($id)
    {
        $praktik = dtPraktik::findOrFail($id);
        $praktik->delete();

        Session::flash('pesan', 'Data berhasil dihapus');
        Session::flash('alert', 'error');

        return redirect()->route('admin.praktik.index');
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
            dtPraktik::create([
                'nama_d' => $data[0],
                'kode_d' => $data[1],
                'merk_d' => $data[2],
                'bahan_d' => $data[3],
                'kondisi_d' => $data[4],
                'tahun_d' => $data[5],
                'ruangan_d' => $data[6],
                'toko_d' => $data[7],
                'sumber_d' => $data[8],
                'ket_d' => $data[9],
            ]);
        }

        // Tutup file setelah selesai
        fclose($handle);

        return redirect()->back()->with('success', 'Praktikum data imported successfully');
    }

    public function showExportForm()
    {
        return view('export-form');
    }


    public function export()
    {
        $praktiks = dtPraktik::all();

        $fileName = 'praktik_data_' . date('Y-m-d_H-i-s') . '.csv';
        $headers = array(
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0",
        );

        $callback = function () use ($praktiks) {
            $file = fopen('php://output', 'w');
            fputcsv($file, ['Nama Barang', 'Kode Barang', 'Merk', 'Bahan', 'Kondisi', 'Tahun', 'Ruangan', 'Toko', 'Sumber', 'Keterangan']);

            foreach ($praktiks as $praktik) {
                fputcsv($file, [
                    $praktik->nama_d,
                    $praktik->kode_d,
                    $praktik->merk_d,
                    $praktik->bahan_d,
                    $praktik->kondisi_d,
                    $praktik->tahun_d,
                    $praktik->ruangan_d,
                    $praktik->toko_d,
                    $praktik->sumber_d,
                    $praktik->ket_d,
                ]);
            }

            fclose($file);
        };

        return Response::stream($callback, 200, $headers);
    }

    public function print()
    {
        $praktiks = dtPraktik::all();
        return view('pages.praktik.print-praktik', compact('praktiks'));
    }
}
