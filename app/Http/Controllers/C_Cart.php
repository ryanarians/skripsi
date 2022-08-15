<?php

namespace App\Http\Controllers;

use App\Models\M_Cart;
use App\Models\M_Penjualan;
use Illuminate\Http\Request;
use App\Models\M_Produk;
use Illuminate\Support\Str;

class C_Cart extends Controller
{
    public function store(Request $request)
    {
        # code...
        $dataStoreCart = new M_Cart();
        $dataStoreCart -> kd_produk = $request -> kd_produk;
        $dataStoreCart -> qty = $request -> qty;
        $dataStoreCart -> save();
        
        $dr = ['status' => 'sukses'];
        return \Response::json($dr);
    }
    public function index(Request $request)
    {
        # code...
        $dataCart = M_Produk::join('cart', 'cart.kd_produk', '=', 'tbl_produk.kd_produk')->get(['tbl_produk.*', 'cart.qty']);
        $dr = ['dataCart' => $dataCart];
        return view('main.penjualan.cart', $dr);
    
    }
    public function tambahCartToPenjualan(Request $request)
    {
        # code...
        $kdFaktur = Str::uuid();
        $tanggal = $request -> tanggal;
        $dataProduk = M_Produk::join('cart', 'cart.kd_produk', '=', 'tbl_produk.kd_produk')->get(['tbl_produk.*', 'cart.qty']);
        foreach ($dataProduk as $dataStoreCart) {
            $kdProduk = $dataStoreCart -> kd_produk;
            $qty = $dataStoreCart -> qty;
            $kdPenjualan = Str::uuid();
            $penjualan = new M_Penjualan();
            $penjualan -> kd_penjualan = $kdPenjualan;
            $penjualan -> no_faktur = $kdFaktur;
            $penjualan -> kd_barang = $kdProduk;
            $penjualan -> qt = $qty;
            $penjualan -> tanggal = $tanggal;
            $penjualan -> save();
        }
        M_Cart::truncate();
        $dr = ['status' => 'sukses'];
        return \Response::json($dr);
    }
    public function prosesHapusCart(Request $request)
    {
        M_Cart::where('kd_produk', $request -> kd_produk) -> delete();
        $dr = ['status' => 'sukses'];
        return \Response::json($dr);
    }

}
