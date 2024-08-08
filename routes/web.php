<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\ElektronikController;
use App\Http\Controllers\MebeulairController;
use App\Http\Controllers\PraktikController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('auth.login');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth'], 'as' => 'admin.'], function(){

    //HOME CONTROLLER
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->middleware(['auth'])->name('dashboard');

    //COLLECT BROKEN
    Route::get('/collect-broken', [HomeController::class, 'showBroken'])->name('collect-broken');

    //PERBAIKAN
    Route::get('/perbaikan', [HomeController::class, 'index_perbaikan'])->name('perbaikan');
    Route::post('/perbaikan/store', [HomeController::class, 'store_perbaikan'])->name('perbaikan.store');
    Route::get('/print-perbaikan', [HomeController::class, 'print_perbaikan'])->name('perbaikan.print');
    Route::delete('/perbaikan/{id}', [HomeController::class, 'destroy'])->name('perbaikan.destroy');
    Route::put('/perbaikan/{id}', [HomeController::class, 'update'])->name('perbaikan.update');
    Route::post('/print-filtered-perbaikan', [HomeController::class, 'printFiltered_perbaikan'])->name('print.filtered');

    //ABOUT
    Route::get('/about', [HomeController::class, 'about'])->name('about');

    //PEMINJAMAN BARANG
    Route::get('/peminjaman', [HomeController::class, 'index_peminjaman'])->name('peminjaman');
    Route::post('/peminjaman/store', [HomeController::class, 'store_peminjaman'])->name('peminjaman.store');
    Route::get('/print-peminjaman', [HomeController::class, 'print_peminjaman'])->name('peminjaman.print');
    Route::delete('/peminjaman/{id}', [HomeController::class, 'destroy_peminjaman'])->name('peminjaman.destroy');
    Route::put('/peminjaman/{id}', [HomeController::class, 'update_peminjaman'])->name('peminjaman.update');
    Route::get('/print-peminjaman', [HomeController::class, 'print_peminjaman'])->name('peminjaman.print');
    Route::post('/print-filtered-peminjaman', [HomeController::class, 'printFiltered_peminjaman'])->name('print.filtered_peminjaman');

    //ROUTES RUANGAN
    Route::get('/ruangan', [RuanganController::class, 'index'])->name('ruangan.index');
    Route::post('/ruangan/store', [RuanganController::class, 'store'])->name('ruangan.store');
    Route::delete('/ruangan/{ruangan}', [RuanganController::class, 'destroy'])->name('ruangan.destroy');
    Route::put('/ruangan/{id}', [RuanganController::class, 'update'])->name('ruangan.update');
    Route::get('/ruangan/{id}', [RuanganController::class, 'show'])->name('ruangan.show');
    Route::get('/ruangan/{id}/edit', [RuanganController::class, 'edit'])->name('ruangan.edit');
    Route::get('/select-ruangan', [RuanganController::class, 'selectRuangan'])->name('ruangan.select');
    Route::post('/collect-barang/{ruangan_id}', [RuanganController::class, 'showCollect'])->name('ruangan.collect');
    Route::get('/print-ruangan', [RuanganController::class, 'print'])->name('ruangan.print');
    Route::get('/printCollectAll/{ruangan_id}', [RuanganController::class, 'printCollectAll'])->name('ruangan.printAll');
    Route::get('/import-form', [RuanganController::class, 'showImportForm'])->name('import.form');
    Route::post('/import-ruangan', [RuanganController::class, 'import'])->name('import.ruangan');
    Route::get('export-form', [RuanganController::class, 'showExportForm'])->name('export.form');
    Route::get('/export-ruangan', [RuanganController::class, 'export'])->name('export.ruangan');

    //ROUTES DATA ELEKTRONIK
    Route::get('/elektronik', [ElektronikController::class, 'index'])->name('elektronik.index');
    Route::post('/elektronik/store', [ElektronikController::class, 'store'])->name('elektronik.store');
    Route::put('/elektronik/{id}', [ElektronikController::class, 'update'])->name('elektronik.update');
    Route::delete('/elektronik/{id}', [ElektronikController::class, 'destroy'])->name('elektronik.destroy');
    Route::get('/import-form', [ElektronikController::class, 'showImportForm'])->name('import.form');
    Route::post('/import-elektronik', [ElektronikController::class, 'import'])->name('import.elektronik');
    Route::get('/export-form', [ElektronikController::class, 'showExportForm'])->name('export.form');
    Route::get('/export-elektronik', [ElektronikController::class, 'export'])->name('export.elektronik');
    Route::get('/print-elektronik', [ElektronikController::class, 'print'])->name('elektronik.print');

    //ROUTES DATA MEBEULAIR
    Route::get('/mebeulair', [MebeulairController::class, 'index'])->name('mebeulair.index');
    Route::post('/mebeulair/store', [MebeulairController::class, 'store'])->name('mebeulair.store');
    Route::put('/mebeulair/{id}', [MebeulairController::class, 'update'])->name('mebeulair.update');
    Route::delete('/mebeulair/{id}', [MebeulairController::class, 'destroy'])->name('mebeulair.destroy');
    Route::get('/import-form', [MebeulairController::class, 'showImportForm'])->name('import.form');
    Route::post('/import-mebeulair', [MebeulairController::class, 'import'])->name('import.mebeulair');
    Route::get('/export-form', [MebeulairController::class, 'showExportForm'])->name('export.form');
    Route::get('/export-mebeulair', [MebeulairController::class, 'export'])->name('export.mebeulair');
    Route::get('/print-mebeulair', [MebeulairController::class, 'print'])->name('mebeulair.print');

    //ROUTES DATA PRAKTIK
    Route::get('/praktik', [PraktikController::class, 'index'])->name('praktik.index');
    Route::post('/praktik/store', [PraktikController::class, 'store'])->name('praktik.store');
    Route::put('/praktik/{id}', [PraktikController::class, 'update'])->name('praktik.update');
    Route::delete('/praktik/{id}', [PraktikController::class, 'destroy'])->name('praktik.destroy');
    Route::post('/import-praktik', [PraktikController::class, 'import'])->name('import.praktik');
    Route::get('/export-form', [PraktikController::class, 'showExportForm'])->name('export.form');
    Route::get('/export-praktik', [PraktikController::class, 'export'])->name('export.praktik');
    Route::get('/print-praktik', [PraktikController::class, 'print'])->name('praktik.print');

    //ROUTES STOCK
    Route::get('/stock/elektronik', [StockController::class, 'groupStockElektronik'])->name('stock.groupE');
    Route::get('/stock/mebeulair', [StockController::class, 'groupStockMebeul'])->name('stock.groupM');
    Route::get('/stock/praktik', [StockController::class, 'groupStockPraktik'])->name('stock.groupP');

    //ROUTES USER
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');

    Route::put('/users/{id}', [UserController::class, 'update_user'])->middleware(['auth'])->name('users.update');
    Route::get('/users/{id}/edit', [UserController::class, 'edit_user'])->middleware(['auth'])->name('users.edit');
    Route::get('/users', [UserController::class, 'index'])->middleware(['auth'])->name('users.index');
});


Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login-proses', [AuthController::class, 'login_proses'])->name('login-proses');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dinosaur', [AuthController::class, 'register'])->name('register');
Route::post('/register-proses', [AuthController::class, 'register_proses'])->name('register-proses');


