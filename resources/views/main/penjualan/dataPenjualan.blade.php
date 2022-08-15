<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <h4 class="header-title">Data Penjualan</h4>
            <p class="card-title-desc">
                <a class="btn warna-tosca waves-effect waves-light" href="javascript:void(0)" onclick="renderPage('app/penjualan/tambah/data', 'Penjualan')">
                    <i class="mdi mdi-plus-box-multiple-outline"></i>
                    Tambah Penjualan Baru
                </a>&nbsp;
                <a class="btn warna-tosca waves-effect waves-light" href="javascript:void(0)" @click="importPenjualanAtc()">
                    <i class="mdi mdi-plus-box-multiple-outline"></i>
                    Import Penjualan
                </a>
            </p>
            
            <div class="table-responsive">
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
                        @foreach($dataPenjualan as $penjualan)
                        <tr>
                            <th scope="row">{{ $loop -> iteration }}</th>
                            <td>F-{{ $penjualan -> no_faktur }}</td>
                            <td>{{ $penjualan -> hitungTransaksi($penjualan -> no_faktur) }}</td>
                            <td>{{ $penjualan -> hitungTotalQt($penjualan -> no_faktur) }}</td>
                            <td>Rp. {{ number_format($penjualan -> getTotalHarga($penjualan -> no_faktur)) }}</td>
                            <td>
                                <a class="btn warna-tosca btn-sm waves-effect waves-light" href="javascript:void(0)" @click="detailAtc('{{ $penjualan -> no_faktur }}')">
                                    <i class="mdi mdi-folder-edit-outline"></i>
                                    Detail
                                </a>&nbsp;
                                <a class="btn btn-danger btn-sm waves-effect waves-light" href="javascript:void(0)" @click="deleteAtc('{{ $penjualan -> no_faktur }}')">
                                    <i class="mdi mdi-folder-edit-outline"></i>
                                    Hapus
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>