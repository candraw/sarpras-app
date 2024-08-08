<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Models\dtMebeulair;
use App\Models\dtRuangan;

class MebeulairController extends Controller
{
    public function index()
    {
        $ruangans = dtRuangan::pluck('nama_a', 'id');
        $mebeulairs = dtMebeulair::all();
        return view('pages.mebeulair.index-mebeulair', compact('mebeulairs', 'ruangans'));
    }

    public function store(Request $request)
    {
        //@dd($request->all());
        dtMebeulair::create($request->all());

        Session::flash('pesan', 'Data berhasil ditambahkan');
        Session::flash('alert', 'success');
        return redirect()->route('admin.mebeulair.index');
    }

    public function update(Request $request, $id)
    {
        $mebeulair = dtMebeulair::findOrFail($id);
        $mebeulair->update($request->all());

        Session::flash('pesan', 'Data berhasil di Update');
        Session::flash('alert', 'info');
        return redirect()->route('admin.mebeulair.index');
    }

    public function destroy($id)
    {
        $mebeulair = dtMebeulair::findOrFail($id);
        $mebeulair->delete();

        Session::flash('pesan', 'Data berhasil dihapus');
        Session::flash('alert', 'error');
        return redirect()->route('admin.mebeulair.index');
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
            dtMebeulair::create([
                'nama_c' => $data[0],
                'kode_c' => $data[1],
                'bahan_c' => $data[2],
                'kondisi_c' => $data[3],
                'tahun_c' => $data[4],
                'ruangan_c' => $data[5],
                'toko_c' => $data[6],
                'sumberdana_c' => $data[7],
                'ket_c' => $data[8],
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
        $mebeulairs = dtMebeulair::all();

        $fileName = 'mebeulair_data_' . date('Y-m-d_H-i-s') . '.csv';
        $headers = array(
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0",
        );

        $callback = function () use ($mebeulairs) {
            $file = fopen('php://output', 'w');
            fputcsv($file, ['Nama Barang', 'Kode Barang', 'Bahan', 'Kondisi', 'Tahun', 'Ruangan', 'Toko', 'Sumber Dana', 'Keterangan']);

            foreach ($mebeulairs as $mebeulair) {
                fputcsv($file, [
                    $mebeulair->nama_c,
                    $mebeulair->kode_c,
                    $mebeulair->bahan_c,
                    $mebeulair->kondisi_c,
                    $mebeulair->tahun_c,
                    $mebeulair->ruangan_c,
                    $mebeulair->toko_c,
                    $mebeulair->sumberdana_c,
                    $mebeulair->ket_c,
                ]);
            }

            fclose($file);
        };

        return Response::stream($callback, 200, $headers);
    }

    public function print()
    {
        $mebeulairs = dtMebeulair::all();
        return view('pages.mebeulair.print-mebeulair', compact('mebeulairs'));
    }

}
