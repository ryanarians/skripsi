<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <h4 class="header-title">Laporan Analisa</h4>
            <div class="table-responsive">
                <table class="table mb-0 table-hover" id="tblLaporan">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Kd Pengujian</th>
                            <th>Waktu Pengujian</th>
                            <th>Support</th>
                            <th>Confidence</th>
                            <th>Total Pola Produk</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($dataPengujian as $pengujian)
                    <tr>
                        <td>{{ $loop -> iteration }}</td>
                        <td>{{ substr($pengujian -> kd_pengujian, 0, 5) }}</td>
                        <td>{{ $pengujian -> created_at }}</td>
                        <td>{{ $pengujian -> min_supp }}</td>
                        <td>{{ $pengujian -> min_confidence }}</td>
                        <td>{{ $pengujian -> totalPolaProduk($pengujian -> kd_pengujian, $pengujian -> min_confidence) }}</td>
                        <td width="180px">
                            <a href="javascript:void(0)" onclick="keDetail('{{ $pengujian -> kd_pengujian }}')" class="btn btn-primary btn-sm">Detail</a>&nbsp;
                            <a href="javascript:void(0)" onclick="hapusHasilPengujian('{{ $pengujian -> kd_pengujian }}')" class="btn btn-danger btn-sm">Hapus</a>&nbsp;
                            {{-- <a href="{{ url('/apriori/analisa/cetak/') }}/{{ $pengujian -> kd_pengujian }}" target="new" class="btn btn-success btn-sm">Cetak</a> --}}
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

<script>
    
var rProsesHapusPengujian = server + "app/laporan/proses/hapus";


    $("#tblLaporan").dataTable();

    function keDetail(kdPengujian)
    {
        renderPage('app/apriori/analisa/hasil/'+kdPengujian, 'Hasil Analisa');
    }

    function hapusHasilPengujian(kdPengujian)
{
    let ds = {'kdPengujian' : kdPengujian}
    axios.post(rProsesHapusPengujian, ds).then(function(res){
        setTimeout(function(){
            pesanUmumApp('success', 'Sukses', 'Data pengujian berhasil dihapus');
            renderPage('app/laporan/data', 'Pengujian');
        }, 10);
    });
}
</script>