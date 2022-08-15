<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <h4 class="header-title">Hasil Analisa Apriori</h4>

            <p class="card-title-desc">
            <h5>Data Support Produk</h5>
            </p>

            <div class="table-responsive">
                <table class="table mb-0 table-hover" id="tblDataSupport">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Kd Produk</th>
                            <th>Nama Produk</th>
                            <th>Total Transaksi</th>
                            <th>Perhitungan Support</th>
                            <th>Support</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dataSupport as $supp)
                        <tr>
                            <td>{{ $loop -> iteration }}</td>
                            <td>{{ substr($supp -> kd_produk, 0, 5) }}</td>
                            <td>{{ $supp -> dataProduk($supp -> kd_produk) -> nama_produk }}</td>
                            <td>{{ $supp -> totalTransaksi($supp -> kd_produk, $supp -> kd_pengujian) }}</td>
                            <td>
                                ({{ $supp -> totalTransaksi($supp -> kd_produk, $supp -> kd_pengujian) }} / {{ $support }} ) * 100
                            </td>
                            <td>
                                @if ($supp -> totalTransaksi($supp -> kd_produk, $supp -> kd_pengujian) == 0)
                                0%
                                @else
                                {{ $supp -> support }}%
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <hr />
            <p class="card-title-desc">
            <h5>Item yang memenuhi syarat minimum support {{ $dataPengujian -> min_supp }} Penjualan</h5>
            </p>
            <div class="table-responsive">
                <table class="table mb-0 table-hover" id="tblDataSupportMin">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Kd Produk</th>
                            <th>Nama Produk</th>
                            <th>Support</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($dataMinSupport as $minSupp)
                    <tr>
                        <td>{{ $loop -> iteration }}</td>
                        <td>{{ substr($minSupp -> kd_produk, 0, 5) }}</td>
                        <td>{{ $minSupp -> dataProduk($minSupp -> kd_produk) -> nama_produk }}</td>
                        <td>{{ $minSupp -> support }}%</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <hr />
            <p class="card-title-desc">
            <h5>Kombinasi 2 itemset</h5>
            </p>
            <div class="table-responsive">
                <table class="table mb-0 table-hover" id="tblKombinasiItemset">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Kd Kombinasi</th>
                            <th>Produk A</th>
                            <th>Produk B</th>
                            <th>Jumlah Transaksi</th>
                            <th>Perhitungan Support</th>
                            <th>Support</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($dataKombinasiItemset as $is)
                    <tr>
                        <td>{{ $loop -> iteration }}</td>
                        <td>{{ substr($is -> kd_kombinasi, 0, 5) }}</td>
                        <td width="180px;">{{ $is -> dataProduk($is -> kd_barang_a) -> nama_produk }}</td>
                        <td>{{ $is -> dataProduk($is -> kd_barang_b) -> nama_produk }}</td>
                        <td>{{ $is -> jumlah_transaksi }}</td>
                        <td>( {{ $is -> jumlah_transaksi }} / {{ $is -> total_semua_transaksi }} ) * 100</td>
                        <td>{{ $is -> support }}%</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <hr />
            <p class="card-title-desc">
            <h5>Kombinasi yang memenuhi minimum confidence {{ $dataPengujian -> min_confidence }} Penjualan</h5>
            </p>
            <div class="table-responsive">
                <table class="table mb-0 table-hover" id="tblMinConfidence">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Kd Kombinasi</th>
                            <th>Produk A</th>
                            <th>Produk B</th>
                            <th>Jumlah Transaksi</th>
                            <th>Perhitungan Confidence</th>
                            <th>Support</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($dataMinConfidence as $is)
                    <tr>
                        <td>{{ $loop -> iteration }}</td>
                        <td>{{ substr($is -> kd_kombinasi, 0, 5) }}</td>
                        <td>{{ $is -> dataProduk($is -> kd_barang_a) -> nama_produk }}</td>
                        <td>{{ $is -> dataProduk($is -> kd_barang_b) -> nama_produk }}</td>
                        <td>{{ $is -> jumlah_transaksi }}</td>
                        <td>( {{ $is -> jumlah_transaksi }} / {{ $is -> total_semua_transaksi }} ) * 100</td>
                        <td>{{ $is -> support }}%</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <hr />
            <p class="card-title-desc">
            <h5>Pola hasil analisa</h5>
            </p>
            <div class="table-responsive">
                <table class="table mb-0 table-hover" id="tblPolaHasil">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Pola</th>
                            <th>Confidence</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($dataMinConfidence as $is)
                    <tr>
                        <td>{{ $loop -> iteration }}</td>
                        <td>
                            Apabila pelanggan membeli <b>{{ $is -> dataProduk($is -> kd_barang_a) -> nama_produk }}</b>, 
                            maka pelanggan juga akan membeli <b>{{ $is -> dataProduk($is -> kd_barang_b) -> nama_produk }}</b>
                        </td>
                        <td>{{ $is -> support }} %</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            {{-- <div>
                <a href="{{ url('/apriori/analisa/cetak/') }}/{{ $kdPengujian }}" target="new" class="btn btn-primary btn-lg">Cetak Laporan Analisa</a>
            </div> --}}


        </div>
    </div>
</div>

<script>
    $("#tblDataSupport").dataTable();
    $("#tblDataSupportMin").dataTable();
    $("#tblKombinasiItemset").dataTable();
    $("#tblMinConfidence").dataTable();
    $("#tblPolaHasil").dataTable();
</script>