<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use App\Models\dtRuangan;
use App\Models\dtElektronik;
use App\Models\dtMebeulair;
use App\Models\dtPraktik;


class RuanganController extends Controller
{
    public function index(){
        $ruangans = dtRuangan::all();
        return view('pages.ruangan.index-ruangan', compact('ruangans'));
    }

    public function store(Request $request)
    {
        //@dd($request->all());
        dtRuangan::create($request->all());

        Session::flash('pesan', 'Data berhasil ditambahkan');
        Session::flash('alert', 'success');

        return redirect()->route('admin.ruangan.index');
    }

    public function destroy($id)
    {
        $ruangan = dtRuangan::findOrFail($id);
        $ruangan->delete();

        Session::flash('pesan', 'Data berhasil dihapus');
        Session::flash('alert', 'error');

        return redirect()->route('admin.ruangan.index');
    }

    public function show($id)
    {
        $ruangan = dtRuangan::findOrFail($id);
        return view('pages.ruangan.show-ruangan', compact('ruangan'));
    }

    public function edit($id)
    {
        $ruangan = dtRuangan::findOrFail($id);
        return view('pages.ruangan.edit-ruangan', compact('ruangan'));
    }

    public function update(Request $request, $id)
    {
        $ruangan = dtRuangan::findOrFail($id);
        $ruangan->nama_a = $request->input('nama_a');
        $ruangan->kode_a = $request->input('kode_a');
        $ruangan->luas_a = $request->input('luas_a');
        $ruangan->kondisi_a = $request->input('kondisi_a');
        $ruangan->ket_a = $request->input('ket_a');
        $ruangan->save();

        Session::flash('pesan', 'Data berhasil diubah');
        Session::flash('alert', 'warning');

        return redirect()->route('admin.ruangan.index');
    }

    public function showCollect($ruangan_id)
    {
        // Mendapatkan data ruangan berdasarkan ID
        $ruangan = dtRuangan::findOrFail($ruangan_id);

        // Query untuk mengambil data barang elektronik berdasarkan ruangan
        $barangElektronik = dtElektronik::where('ruangan_b', $ruangan_id)->get();

        // Query untuk mengambil data barang mebeulair berdasarkan ruangan
        $barangMebeulair = dtMebeulair::where('ruangan_c', $ruangan_id)->get();

        // Query untuk mengambil data barang praktik berdasarkan ruangan
        $barangPraktik = dtPraktik::where('ruangan_d', $ruangan_id)->get();

        return view('pages.ruangan.collect', compact('ruangan', 'barangElektronik', 'barangMebeulair', 'barangPraktik'));
    }

    public function print()
    {
        $ruangans = dtRuangan::all();
        return view('pages.ruangan.print-ruangan', compact('ruangans'));
    }

    public function printCollectAll($ruangan_id)
    {
        // Mendapatkan data ruangan berdasarkan ID
        $ruangan = dtRuangan::findOrFail($ruangan_id);

        // Query untuk mengambil data barang elektronik berdasarkan ruangan
        $barangElektronik = dtElektronik::where('ruangan_b', $ruangan_id)->get();

        // Query untuk mengambil data barang mebeulair berdasarkan ruangan
        $barangMebeulair = dtMebeulair::where('ruangan_c', $ruangan_id)->get();

        // Query untuk mengambil data barang praktik berdasarkan ruangan
        $barangPraktik = dtPraktik::where('ruangan_d', $ruangan_id)->get();

        return view('pages.ruangan.printCollectAll', compact('ruangan', 'barangElektronik', 'barangMebeulair', 'barangPraktik'));
    }

    public function selectRuangan()
    {
        // Mengambil daftar ruangan dari database
        $daftarRuangan = dtRuangan::all();
        return view('pages.ruangan.select', compact('daftarRuangan'));
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
            dtRuangan::create([
                'nama_a' => $data[0],
                'kode_a' => $data[1],
                'luas_a' => $data[2],
                'kondisi_a' => $data[3],
                'ket_a' => $data[4],
            ]);
        }

        // Tutup file setelah selesai
        fclose($handle);

        return redirect()->back()->with('success', 'Data Ruangan imported successfully');
    }

    public function showExportForm()
    {
        return view('export-form');
    }

    public function export()
    {
        $ruangans = dtRuangan::all();

        $fileName = 'ruangan_data_' . date('Y-m-d_H-i-s') . '.csv';
        $headers = array(
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0",
        );

        $callback = function () use ($ruangans) {
            $file = fopen('php://output', 'w');
            fputcsv($file, ['Nama Ruangan', 'Kode Ruangan', 'Luas', 'Kondisi', 'Keterangan']);

            foreach ($ruangans as $ruangan) {
                fputcsv($file, [
                    $ruangan->nama_a,
                    $ruangan->kode_a,
                    $ruangan->luas_a,
                    $ruangan->kondisi_a,
                    $ruangan->ket_a,
                ]);
            }

            fclose($file);
        };

        return Response::stream($callback, 200, $headers);
    }
}
