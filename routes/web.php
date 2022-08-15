<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\C_Auth;
use App\Http\Controllers\C_Dashboard;
use App\Http\Controllers\C_Produk;
use App\Http\Controllers\C_Penjualan;
use App\Http\Controllers\C_Apriori;
use App\Http\Controllers\C_Cart;
use App\Http\Controllers\C_Laporan;



// Route::get('/',[LoginController::class, 'index']);
// Route::resource('auth', 'App\Http\Controllers\LoginController');

Route::get('/login', [C_Auth::class, 'loginPage']);
Route::post('/auth/login/proses', [C_Auth::class, 'loginProses']);
Route::get('/auth/logout', [C_Auth::class, 'logout']);

Route::get('/',[C_Dashboard::class, 'dashboard']);
Route::get('/dashboard/beranda', [C_Dashboard::class, 'berandaPage']);

Route::get('/app/produk/data', [C_Produk::class, 'dataProdukPage']);
Route::post('/app/produk/tambah/proses', [C_Produk::class, 'prosesTambahProduk']);
Route::post('/app/produk/data/res', [C_Produk::class, 'getDataProdukRes']);
Route::post('/app/produk/update/proses', [C_Produk::class, 'prosesUpdateProduk']);
Route::post('/app/produk/hapus/proses', [C_Produk::class, 'prosesHapusProduk']);
Route::post('/app/produk/import/proses', [C_Produk::class, 'prosesImportProduk']);

Route::get('/app/penjualan/data', [C_Penjualan::class, 'dataPenjualanPage']);
Route::get('/app/penjualan/detail/{kdFaktur}', [C_Penjualan::class, 'detailPenjualan']);
Route::post('/app/penjualan/hapus/proses', [C_Penjualan::class, 'prosesHapusPenjualan']);
Route::get('/app/penjualan/tambah/data', [C_Penjualan::class, 'dataTambahPenjualan']);
Route::post('/app/penjualan/import/proses', [C_Penjualan::class, 'prosesImportPenjualan']);
// Route::get('/app/penjualan/tambah/proses', [C_Penjualan::class, 'prosesTambahPenjualan']);

Route::post('/app/penjualan/tambah/cart', [C_Cart::class, 'store'])->name('inputCart');
Route::get('/app/penjualan/tambah/cart/data', [C_Cart::class, 'index']);
Route::post('/app/penjualan/tambah/cart/data/hapus', [C_Cart::class, 'prosesHapusCart']);
Route::post('/app/penjualan/tambah/cart/penjualan', [C_Cart::class, 'tambahCartToPenjualan']);

Route::get('/app/apriori/setup', [C_Apriori::class, 'setupPerhitunganApriori']);
Route::post('/app/apriori/analisa/proses', [C_Apriori::class, 'prosesAnalisaApriori']);
Route::get('/app/apriori/analisa/hasil/{kdPengujian}', [C_Apriori::class, 'hasilAnalisa']);
Route::get('/apriori/analisa/cetak/{kdPengujian}', [C_Apriori::class, 'cetakAnalisa']);

Route::get('/app/laporan/data', [C_Laporan::class, 'dataLaporan']);
Route::post('/app/laporan/proses/hapus', [C_Laporan::class, 'hapusLaporan']);


Route::get('/app/info-aplikasi', [C_Dashboard::class, 'infoAplikasi']);

