<div class="row" id="divDataMentor">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Setup Range Waktu</div>
            <div class="card-body row" id="divFormSupp">
                <div class="form-group col-sm-6">
                    <label for="company">Waktu Mulai</label>
                    <input class="form-control" type="date" name="timestart" id="timestart">
                </div>
                <div class="form-group col-sm-6">
                    <label for="company">Waktu Selesai</label>
                    <input class="form-control" type="date" name="timeend" id="timeend">
                </div>
                <div class="form-group" style="padding:13px;">
                    <a class="btn btn-primary" href="javascript:void(0)" onclick="prosesApriori()">Mulai Analisa Penjualan</a>
                </div>
            </div>

            <div id="divLoadingPengujian" style="text-align: center;margin-bottom:30px;display:none;">
                <img src="{{ asset('ladun/base/loading.svg') }}"><br/>
                Memproses apriori, akan memakan waktu sesuai dengan banyaknya data yang diproses
            </div>
        </div>

        <div class="card">
            <div class="card-header">List Data Penjualan</div>
            <div class="card-body">
            <div class="table-responsive">
                <table class="table mb-0 table-hover" id="tblDataPenjualan">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>No Faktur</th>
                            <th>Total Produk</th>
                            <th>Total Qt</th>
                            <th>Total Harga</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dataPenjualan as $penjualan)
                        <tr>
                            <th scope="row">{{ $loop -> iteration }}</th>
                            <td>F-{{ $penjualan -> no_faktur }}</td>
                            <td>{{ $penjualan -> hitungTransaksi($penjualan -> no_faktur) }}</td>
                            <td>{{ $penjualan -> hitungTotalQt($penjualan -> no_faktur) }}</td>
                            <td>Rp. {{ number_format($penjualan -> getTotalHarga($penjualan -> no_faktur)) }}</td>
                            <td>{{ $penjualan -> getCreatedAt($penjualan -> no_faktur) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            </div>
        </div>

    </div>
</div>

<script>
    var rProsesApriori = server + "app/apriori/analisa/proses";

    // document.querySelector("#txtNama").focus();
    $("#tblDataPenjualan").dataTable();
    function prosesApriori() {
        // let nama = document.querySelector("#txtNama").value;
        // let support = document.querySelector("#txtSupport").value;
        // let confidence = document.querySelector("#txtConfidence").value;
        let timestart = document.querySelector("#timestart").value;
        let timeend = document.querySelector("#timeend").value;

        if (timestart == '' || timeend == '') {
            setTimeout(function(){
            pesanUmumApp('error', 'Error', 'Mohon isi semua form atau data kosong...!');
            renderPage('app/apriori/setup', 'Pengujian');
            }, 300);
            return false;
        }
        let ds = {
            // 'support': support,
            // 'confidence': confidence,
            // 'nama' : nama,
            'timestart' : timestart,
            'timeend' : timeend
        }
        console.log(ds);
        confirmQuest('info', 'Konfirmasi', 'Mulai analisa penjualan ... ?', function (x) {konfirmasiApriori(ds)});
    }


    function konfirmasiApriori(ds)
    {
        $("#divFormSupp").hide();
        $("#divLoadingPengujian").show();
        axios.post(rProsesApriori, ds).then(function(res){
            console.log(res.data);
            let kdPengujian = res.data.kdPengujian;
            let totalProduk = res.data.totalProduk;
            pesanUmumApp('success', 'Sukses', 'Proses analisa apriori selesai ..');
            renderPage('app/apriori/analisa/hasil/'+ kdPengujian);
        });
    }

</script>