<?php

namespace App\Imports;
use Illuminate\Support\Str;
use App\Models\M_Produk;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProdukImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $cek = M_Produk::where('nama_produk', '=', $row['nama_produk'])->first();
            if ($cek === null) {
                M_Produk::create([
                    'kd_produk' => Str::uuid(),
                    'nama_produk' => $row['nama_produk'],
                    'harga' => $row['harga'],
                    'kd_kategori' => $row['kategori'],
                    'active' => '1'
                ]);
            }
           
        }
        $totalProduk = M_Produk::count();
        $dr = ['status' => 'sukses', 'totalProduk' => $totalProduk];
        return \Response::json($dr);
    }
}
