<?php

namespace App\Http\Controllers;

use App\Imports\ProdukImport;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Artisan;

use App\Models\M_Produk;
use App\Models\M_Kategori;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class C_Produk extends Controller
{
    public function dataProdukPage()
    {
        $dataProduk = M_Produk::all();
        $dataKategori = M_Kategori::all();
        $dr = ['dataProduk' => $dataProduk, 'dataKategori' => $dataKategori];
        return view('main.produk.produk', $dr);
    }
    public function prosesTambahProduk(Request $request)
    {
        // {'nama':nama, 'harga':harga, 'kategori':kategori}
        $produk = new M_Produk();
        $produk -> kd_produk = Str::uuid();
        $produk -> nama_produk = $request -> nama;
        $produk -> harga = $request -> harga;
        $produk -> kd_kategori = $request -> kategori;
        $produk -> active = "1";
        $produk -> save();
        $dr = ['status' => 'sukses'];
        return \Response::json($dr);
    }
    public function getDataProdukRes(Request $request)
    {
        $dataProduk = M_Produk::where('kd_produk', $request -> idProduk) -> first();
        // $dr = ['status' => 'sukses'];
        return \Response::json($dataProduk);
    }
    public function prosesUpdateProduk(Request $request)
    {
        // {'kdProduk':kdProduk, 'nama':nama, 'harga':harga, 'kategori':kategori}
        M_Produk::where('kd_produk', $request -> kdProduk) -> update([
            'nama_produk' => $request -> nama,
            'harga' => $request -> harga,
            'kd_kategori' => $request -> kategori
        ]);
        $dr = ['status' => 'sukses'];
        return \Response::json($dr);
    }
    public function prosesHapusProduk(Request $request)
    {
        M_Produk::where('kd_produk', $request -> idProduk) -> delete();
        $dr = ['status' => 'sukses'];
        return \Response::json($dr);
    }

    public function prosesImportProduk(Request $request)
    {
        // Artisan::call('importDataProduk');
        // dd($request);
        $request->validate([
            'excelProduk' => 'required|max:10000|mimes:xlsx,xls',
        ]);
        $path = $request->file('excelProduk');
        Excel::import(new ProdukImport, $path);
    }
}
