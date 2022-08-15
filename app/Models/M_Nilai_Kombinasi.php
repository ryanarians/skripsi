<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\M_Produk;

class M_Nilai_Kombinasi extends Model
{
    protected $table = "tbl_nilai_kombinasi";

    protected $fillable = [
        'kd_pengujian',
        'kd_kombinasi',
        'kd_barang_a',
        'kd_barang_b',
        'jumlah_transaksi',
        'total_semua_transaksi',
        'support'
    ];

    public function dataProduk($kdProduk)
    {
        return M_Produk::where('kd_produk', $kdProduk) -> first();
    }
    // public function totalproduk($total_semua_transaksi)
    // {
    //     $data = M_Nilai_Kombinasi::where('total_semua_transaksi', $total_semua_transaksi) -> first();
    //     return M_Penjualan::whereDate('created_at', '>=', $data->date_start)->whereDate('created_at', '<=', $data->date_end)->distinct('no_faktur')->count('no_faktur');
    // }

}
