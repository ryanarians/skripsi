<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <h4 class="header-title">Data Tambah Penjualan</h4>
                <br>
                <div class="row p-3">
                    <div class="form-group col-sm-12">
                        <label for="select">Pilih Data Produk</label>
                    </div>
                    <div class="form-group col-sm-2">
                        <input class="form-control" type="number" name="qty" id="qty" min="0" required placeholder="Kuantitas">
                    </div>
                    <div class="form-group col-sm-10">
                        <select class="form-control" name="kd_produk" id="kd_produk">
                            @foreach ($dataListProduk as $produk)
                                <option value="{{ $produk->kd_produk }}">{{ $produk->nama_produk }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                </div>
                <div class="form-group pl-3">
                    <button class="btn warna-tosca" type="submit" onclick="prosesTambahCart()">Tambah</button>
                    <button class="btn warna-tosca" type="submit" onclick="renderPage('app/penjualan/tambah/cart/data', 'Cart')">Lihat produk yang ingin ditambahkan</button>
                    <button class="btn warna-tosca" type="submit" onclick="renderPage('app/penjualan/data', 'Penjualan')">Kembali</button>
                </div>
            {{-- <div class="table-responsive">
                <table class="table mb-0 table-hover" id="tblDataPenjualan">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>No Faktur</th>
                            <th>Total Produk</th>
                            <th>Total Qt</th>
                            <th>Total Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dataListProduk as $listData)
                        <tr>
                            <td>{{ $loop -> iteration }}</td>
                            <td>{{ $listData -> nama_produk }}</td>
                            <td>{{ $listData -> harga }}</td>
                            <td>{{ $listData -> kd_kategori }}</td>
                            <td>
                                <input type="number" name="jumlah" id="jumlah">
                                &nbsp;
                                <a class="btn btn-danger btn-sm waves-effect waves-light" href="javascript:void(0)" @click="deleteAtc('{{ $penjualan -> no_faktur }}')">
                                    <i class="mdi mdi-folder-edit-outline"></i>
                                    Hapus
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div> --}}

        </div>
    </div>
</div>

<script>
    var rProsesTambah = server + "app/penjualan/tambah/cart";

    document.querySelector("#kd_produk").focus();

    function prosesTambahCart() {
        let kd_produk = document.querySelector("#kd_produk").value;
        let qty = document.querySelector("#qty").value;

        
        if (qty == '') {
            setTimeout(function(){
            pesanUmumApp('error', 'Error', 'Mohon isi semua form...!');
            renderPage('app/penjualan/tambah/data', 'Penjualan');
            }, 300);
            return false;
        }
        let ds = {
            'qty': qty,
            'kd_produk': kd_produk,
        }
        console.log(ds);
        // $("#divFormSupp").hide();
        // $("#divLoadingPengujian").show();
        axios.post(rProsesTambah, ds).then(function(res){
            console.log(res.data);
            // let kdPengujian = res.data.kdPengujian;
            // let totalProduk = res.data.totalProduk;
            setTimeout(function(){
            pesanUmumApp('success', 'Sukses', 'Berhasil...');
            renderPage('app/penjualan/tambah/data', 'Penjualan');
            }, 300);
        });
    }

</script>