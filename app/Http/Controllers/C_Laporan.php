<?php

namespace App\Http\Controllers;

use App\Models\M_Nilai_Kombinasi;
use Illuminate\Http\Request;

use App\Models\M_Pengujian;
use App\Models\M_Support;

class C_Laporan extends Controller
{
    public function dataLaporan()
    {
        $dataPengujian = M_Pengujian::all();
        $dr = ['dataPengujian' => $dataPengujian];
       return view('main.laporan.laporanData', $dr); 
    }
    public function hapusLaporan(Request $request)
    {
        M_Pengujian::where('kd_pengujian', $request -> kdPengujian) -> delete();
        M_Support::where('kd_pengujian', $request -> kdPengujian) -> delete();
        M_Nilai_Kombinasi::where('kd_pengujian', $request -> kdPengujian) -> delete();
        $dr = ['status' => 'sukses'];
        return \Response::json($dr);
    }
}
