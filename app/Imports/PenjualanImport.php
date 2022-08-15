<?php

namespace App\Imports;

use Illuminate\Support\Str;
use App\Models\M_Penjualan;
use App\Models\M_Produk;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PenjualanImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $namaProduk = $row['nama_produk'];
            $dataProduk = M_Produk::where('nama_produk', $namaProduk)->first();
            M_Penjualan::create([
                'kd_penjualan' => Str::uuid(),
                'no_faktur' => $row['no_faktur'],
                'kd_barang' => $dataProduk['kd_produk'],
                'qt' => $row['qt'],
                'tanggal' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['tanggal'])->format('Y-m-d')
            ]);
        }

        $totalProduk = M_Produk::count();
        $dr = ['status' => 'sukses', 'totalProduk' => $totalProduk];
        return \Response::json($dr);
    }
}
