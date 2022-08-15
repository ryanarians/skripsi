<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\M_Produk;
use App\Models\M_Penjualan;

class M_Support extends Model
{
    protected $table = "tbl_support";

    protected $fillable = [
        'kd_pengujian',
        'kd_produk',
        'support',
        'date_start',
        'date_end'
    ];

    public function dataProduk($kdProduk)
    {
        return M_Produk::where('kd_produk', $kdProduk) -> first();
    }

    public function totalTransaksi($kdProduk, $kdPengujian)
    {
        $data = M_Support::where('kd_produk', $kdProduk)->where('kd_pengujian', $kdPengujian) -> first();
        return M_Penjualan::whereDate('tanggal', '>=', $data->date_start)->whereDate('tanggal', '<=', $data->date_end)->where('kd_barang', $kdProduk)-> count();
    }

    public function totalproduk($kdProduk)
    {
        $data = M_Support::where('kd_produk', $kdProduk) -> first();
        return M_Penjualan::whereDate('tanggal', '>=', $data->date_start)->whereDate('tanggal', '<=', $data->date_end)->distinct(['no_faktur'])->count(['no_faktur']);
    }

}
