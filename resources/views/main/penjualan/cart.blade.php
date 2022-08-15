<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <h4 class="header-title">Data Tambah Penjualan</h4>
            <div class="form-group col-md-6 p-3">
                <label for="tanggal">Tanggal Transaksi</label>
                <input type="date" name="tanggal" id="tanggal" class="form-control">
            </div>
            <div class="table-responsive">
                <table class="table mb-0 table-hover" id="tblDataCart">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Kategori</th>
                            <th>Qty</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dataCart as $listData)
                        <tr>
                            <td>{{ $loop -> iteration }}</td>
                            <td width="280px">{{ $listData -> nama_produk }}</td>
                            <td>{{ $listData -> harga }}</td>
                            <td>{{ $listData -> kd_kategori }}</td>
                            <td>{{ $listData -> qty }}</td>
                            <td>
                                {{-- <input type="number" name="jumlah" id="jumlah" min="0" class="col-sm-4"> --}}
                                <a class="btn btn-danger btn-sm waves-effect waves-light" href="javascript:void(0)" onclick="deleteAtc('{{ $listData -> kd_produk }}')">
                                    <i class="mdi mdi-folder-edit-outline"></i>
                                    Hapus
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="form-group pt-3">
                    <button class="btn warna-tosca waves-effect waves-light col-sm-1" type="submit" onclick="GetCellValues()">Tambah</button>
                    <button class="btn btn-primary waves-effect waves-light col-sm-1" type="submit" onclick="renderPage('app/penjualan/tambah/data')">Kembali</button>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    var rProsesTambah = server + "app/penjualan/tambah/cart/penjualan";
    var rProsesHapusDataCart = server + "app/penjualan/tambah/cart/data/hapus";

    function GetCellValues() {
        let tanggal = document.querySelector("#tanggal").value;
        if (tanggal == '') {
            pesanUmumApp('error', 'Error', 'Silahkan isi semua form!');
            return false;
        }
        confirmQuest('info', 'Konfirmasi', 'Tambah data penjualan ...?', function (x) {prosesTambahPenjualan(tanggal)});
    }

    function prosesTambahPenjualan(tanggal) {

        let ds = {'tanggal' : tanggal}
        console.log(ds);
        // if (data == '') {
        //     setTimeout(function(){
        //     pesanUmumApp('error', 'Error', 'Mohon isi data...!');
        //     renderPage('app/penjualan/tambah/data', 'Cart');
        //     }, 300);
        //     return false;
        // }
        // let ds = {
        //     'qty': qty,
        //     'kd_produk': kd_produk,
        // }
        // console.log(ds);
        // $("#divFormSupp").hide();
        // $("#divLoadingPengujian").show();
        axios.post(rProsesTambah, ds).then(function(res){
            console.log(res.data);
            // let kdPengujian = res.data.kdPengujian;
            // let totalProduk = res.data.totalProduk;
            setTimeout(function(){
            pesanUmumApp('success', 'Sukses', 'Data penjualan berhasil ditambahkan...');
            renderPage('app/penjualan/data', 'Penjualan');
            }, 300);
        });
    }
    
    
    $("#tblDataCart").dataTable();

    function deleteAtc(kdProduk)
    {
    let ds = {'kd_produk' : kdProduk}
    console.log(ds);
    axios.post(rProsesHapusDataCart, ds).then(function(res){
        setTimeout(function(){
            console.log(res.data);
            pesanUmumApp('success', 'Sukses', 'Data cart berhasil dihapus');
            renderPage('app/penjualan/tambah/cart/data', 'Cart');
        }, 10);
    });
    }

</script>