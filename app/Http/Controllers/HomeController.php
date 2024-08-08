<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\dtRuangan;
use App\Models\dtElektronik;
use App\Models\dtMebeulair;
use App\Models\dtPraktik;
use App\Models\dtPerbaikan;
use App\Models\dtPeminjaman;
use App\Models\User;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function dashboard()
    {
        $jumlahRuangans = dtRuangan::count();
        $jumlahElektroniks = dtElektronik::count();
        $jumlahMebeulairs = dtMebeulair::count();
        $jumlahPraktiks = dtPraktik::count();
        $jumlahAkuns = User::count();

        return view('pages.dashboard', compact('jumlahRuangans', 'jumlahElektroniks', 'jumlahMebeulairs', 'jumlahPraktiks', 'jumlahAkuns'));
    }

    //CONTROLLER PERBAIKAN
    public function index_perbaikan(){
        $ruangans = dtRuangan::pluck('nama_a', 'id');
        $perbaikans = dtPerbaikan::all();
        return view('pages.perbaikan', compact('perbaikans', 'ruangans'));
    }

    public function store_perbaikan(Request $request)
    {
        //@dd($request->all());
        dtPerbaikan::create($request->all());

        Session::flash('pesan', 'Data berhasil ditambahkan');
        Session::flash('alert', 'success');

        return redirect()->route('admin.perbaikan');
    }

    public function print_perbaikan()
    {
        $perbaikans = dtPerbaikan::all();
        return view('pages.print-perbaikan', compact('perbaikans'));
    }

    public function printFiltered_perbaikan(Request $request)
    {
        $selectedDate = $request->input('selectedDate');

        // Ubah format tanggal menjadi "YYYY-MM"
        $selectedMonth = Carbon::createFromFormat('Y-m-d', $selectedDate)->format('m');
        $selectedYear = Carbon::createFromFormat('Y-m-d', $selectedDate)->format('Y');

        // Filter data berdasarkan bulan dan tahun yang dipilih
        $perbaikans = dtPerbaikan::whereYear('tglselesai', $selectedYear)
            ->whereMonth('tglselesai', $selectedMonth)
            ->get();

        return view('pages.print-filtered-perbaikan', compact('perbaikans', 'selectedMonth', 'selectedYear'));
    }

    public function update(Request $request, $id)
    {
        $perbaikan = dtPerbaikan::findOrFail($id);
        $perbaikan->update($request->all());

        Session::flash('pesan', 'Data berhasil di Update');
        Session::flash('alert', 'info');
        return redirect()->route('admin.perbaikan');
    }

    public function destroy($id)
    {
        $perbaikan = dtPerbaikan::findOrFail($id);
        $perbaikan->delete();

        Session::flash('pesan', 'Data berhasil dihapus');
        Session::flash('alert', 'error');
        return redirect()->route('admin.perbaikan');
    }

    //CONTROLLER BROKEN STUFF
    public function showBroken()
    {
        // Query untuk mengambil data barang elektronik berdasarkan ruangan
        $brokenElektronik = dtElektronik::where('kondisi_b', 'Rusak')->get();

        // Query untuk mengambil data barang mebeulair berdasarkan ruangan
        $brokenMebeulair = dtMebeulair::where('kondisi_c', 'Rusak')->get();

        // Query untuk mengambil data barang praktik berdasarkan ruangan
        $brokenPraktik = dtPraktik::where('kondisi_d', 'Rusak')->get();

        return view('pages.collect-broken', compact('brokenElektronik', 'brokenMebeulair', 'brokenPraktik'));
    }

    //CONTROLLER PEMINJAMAN
    public function index_peminjaman(){
        $peminjamans = dtPeminjaman::all();
        return view('pages.peminjaman', compact('peminjamans'));
    }

    public function store_peminjaman(Request $request)
    {
        //@dd($request->all());
        dtPeminjaman::create($request->all());

        Session::flash('pesan', 'Data berhasil ditambahkan');
        Session::flash('alert', 'success');

        return redirect()->route('admin.peminjaman');
    }

  
    public function print_peminjaman()
    {
        $peminjamans = dtPeminjaman::all();
        return view('pages.print-peminjaman', compact('peminjamans'));
    }

    public function printFiltered_peminjaman(Request $request)
    {
        $selectedDate = $request->input('selectedDate');

        // Ubah format tanggal menjadi "YYYY-MM"
        $selectedMonth = Carbon::createFromFormat('Y-m-d', $selectedDate)->format('m');
        $selectedYear = Carbon::createFromFormat('Y-m-d', $selectedDate)->format('Y');

        // Filter data berdasarkan bulan dan tahun yang dipilih
        $peminjamans = dtPeminjaman::whereYear('tglkembali', $selectedYear)
            ->whereMonth('tglkembali', $selectedMonth)
            ->get();

        return view('pages.print-filtered-peminjaman', compact('peminjamans', 'selectedMonth', 'selectedYear'));
    }

    public function update_peminjaman(Request $request, $id)
    {
        $peminjaman = dtPeminjaman::findOrFail($id);
        $peminjaman->update($request->all());

        Session::flash('pesan', 'Data berhasil di Update');
        Session::flash('alert', 'info');
        return redirect()->route('admin.peminjaman');
    }

    public function destroy_peminjaman($id)
    {
        $peminjaman = dtPeminjaman::findOrFail($id);
        $peminjaman->delete();

        Session::flash('pesan', 'Data berhasil dihapus');
        Session::flash('alert', 'error');
        return redirect()->route('admin.peminjaman');
    }

    
    //CONTROLLER ABOUT
    public function about()
    {
        return view('pages.about');    
    }
}
