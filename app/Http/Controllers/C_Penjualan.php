<?php

namespace App\Http\Controllers;

use App\Imports\PenjualanImport;
use Illuminate\Http\Request;

use App\Models\M_Penjualan;
use App\Models\M_Produk;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class C_Penjualan extends Controller
{
    public function dataPenjualanPage()
    {
        $dataPenjualan = M_Penjualan::distinct() -> get(['no_faktur']);
        $dataProduk = M_Produk::all(); 
        $dr = ['dataPenjualan' => $dataPenjualan, 'dataProduk' => $dataProduk];
        return view('main.penjualan.penjualan', $dr);
    }
    public function detailPenjualan(Request $request, $kdFaktur)
    {
        $dataPenjualan = M_Penjualan::where('no_faktur', $kdFaktur) -> get();
        $dr = ['kdFaktur' => $kdFaktur, 'dataPenjualan' => $dataPenjualan];
        return view('main.penjualan.detail.detailPenjualan', $dr);
    }
    public function prosesHapusPenjualan(Request $request)
    {
        M_Penjualan::where('no_faktur', $request -> kdFaktur) -> delete();
        $dr = ['status' => 'sukses'];
        return \Response::json($dr);
    }
    public function prosesTambahPenjualan(Request $request)
    {
        $listProduk = $request->produk;
        $dataProduk = M_Produk::where('kd_produk', '=', $listProduk)->get();
        $dr = ['dataListProduk' => $dataProduk];
        return view('main.penjualan.cart', $dr);
    }
    public function dataTambahPenjualan(Request $request)
    {
        $dataProduk = M_Produk::all();
        $dr = ['dataListProduk' => $dataProduk];
        return view('main.penjualan.tambah', $dr);
    }

    public function prosesImportPenjualan(Request $request)
    {
        # code...
        $request->validate([
            'excelPenjualan' => 'required|max:10000|mimes:xlsx,xls',
        ]);
        $path = $request->file('excelPenjualan');
        Excel::import(new PenjualanImport, $path);
    }
}
