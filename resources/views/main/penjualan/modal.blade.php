<!-- modal tambah produk  -->
<div class="modal fade" tabindex="-1" role="dialog" id="modalTambahPenjualan">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Penjualan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{-- <div class="form-group">
                    <label for="company">Kode Penjualan</label>
                    <input type="text" class="form-control" id="txtKodePenjualan" required>
                </div> --}}
                {{-- <div class="form-group">
                    <label for="company">Harga</label>
                    <input type="text" class="form-control" id="txtHarga">
                </div> --}}
                {{-- <div class="form-group">
                    <label for="company">Kategori</label>
                    <select class="form-control" id="txtKategori">
                        <option value="none">--- Pilih Kategori ---</option>
                        @foreach($dataKategori as $kategori)
                        <option value="{{ $kategori -> nama_kategori }}">{{ $kategori -> nama_kategori }}</option>
                        @endforeach
                    </select>
                </div> --}}
                <div class="form-group">
                    <label for="select">Pilih Data Produk</label><br>
                    <select class="selectpicker form-control" id="pilihProduk" data-live-search="true" multiple="multiple" title="Pilih produk yang di inginkan...">
                        @foreach ($dataProduk as $produk)
                            <option value="{{ $produk->kd_produk }}">{{ $produk->nama_produk }}</option>
                        @endforeach
                    </select>
                    {{-- <select class="selectpicker form-control" name="pilihProduk" id="pilihProduk" multiple="multiple" data-live-search="true">
                        @foreach ($dataProduk as $produk)
                            <option value="{{ $produk->nama_produk }}">{{ $produk->nama_produk }}</option>
                        @endforeach
                    </select> --}}
                    {{-- <table class="table table-hover">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Produk</th>
                            <th scope="col">Jumlah</th>
                          </tr>
                        </thead>
                        <tbody>

                            <?php $i = 1 ?>
                            <tr>
                               <th scope="row">{{ $i++ }}</th>
                               <td><label for="listProduk" id="listProduk"></label></td>
                               <td><input type="number" name="jumlah" id="jumlah"></td>
                            </tr>
                          
                        </tbody>
                      </table> --}}
                </div>
                <br>
                <div>
                    <a href="javascript:void(0)" class="btn btn-primary" @click="prosesTambahPenjualan()">Proses Tambah Produk</a>
                </div>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<!-- modal edit produk  -->
{{-- <div class="modal fade" tabindex="-1" role="dialog" id="modalEditProduk">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="company">Nama Produk</label>
                    <input type="text" class="form-control" id="txtNamaProdukEdit">
                </div>
                <div class="form-group">
                    <label for="company">Harga</label>
                    <input type="text" class="form-control" id="txtHargaEdit">
                </div>
                <div class="form-group">
                    <label for="company">Kategori</label>
                    <select class="form-control" id="txtKategoriEdit">
                        <option value="none">--- Pilih Kategori ---</option>
                        @foreach($dataKategori as $kategori)
                        <option value="{{ $kategori -> nama_kategori }}">{{ $kategori -> nama_kategori }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <a href="javascript:void(0)" @click="prosesUpdateProdukAtc()" class="btn btn-primary">Update Data Produk</a>
                </div>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div> --}}

<!-- modal import produk  -->
<div class="modal fade" tabindex="-1" role="dialog" id="modalImportPenjualan">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Import Penjualan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div>
                    <p>
                        Penjualan dapat diimport melalui data eksternal dari file Microsoft Excel(.xlxs), perhatikan beberapa hal berikut agar proses import berjalan lancar
                    </p>
                    <ul>
                        <li>Pastikan format field/record sesuai dengan header kolom.</li>
                        <li>Silahkan lihat format file import data produk di <a href="{{ asset('file_import/DATA_PENJUALAN.xlsx') }}"><b>disini</b></a>, atau bisa edit file tersebut.</li>
                        <li>Jika dirasa point-point diatas sudah terpenuhi silahkan lakukan proses import produk</li>
                        <li>
                            <label for="">Pilih file excel</label>
                            <div class="form-group">
                                <input class="form-input" type="file" @change="selectFile($event)" name="excelPenjualan" id="excelPenjualan">
                            </div>
                        </li>
                    </ul>
                    {{-- <div style="text-align: center;">
                        <a href="javascript:void(0)" class="btn btn-info btn-lg waves-effect waves-light" @click="prosesImportProdukAtc()">Import produk</a>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>

