<!-- modal tambah produk  -->
<div class="modal fade" tabindex="-1" role="dialog" id="modalTambahProduk">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="company">Nama Produk</label>
                    <input type="text" class="form-control" id="txtNamaProduk">
                </div>
                <div class="form-group">
                    <label for="company">Harga</label>
                    <input type="text" class="form-control" id="txtHarga">
                </div>
                <div class="form-group">
                    <label for="company">Kategori</label>
                    <select class="form-control" id="txtKategori">
                        <option value="none">--- Pilih Kategori ---</option>
                        @foreach($dataKategori as $kategori)
                        <option value="{{ $kategori -> nama_kategori }}">{{ $kategori -> nama_kategori }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <a href="javascript:void(0)" class="btn btn-primary" @click="prosesTambahProduk()">Proses Tambah Produk</a>
                </div>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<!-- modal edit produk  -->
<div class="modal fade" tabindex="-1" role="dialog" id="modalEditProduk">
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
</div>

<!-- modal import produk  -->
<div class="modal fade" tabindex="-1" role="dialog" id="modalImportProduk">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Import Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-5">
                <div>
                    <p>
                        Produk dapat diimport melalui data eksternal dari file Microsoft Excel(.xlxs), perhatikan beberapa hal berikut agar proses import berjalan lancar
                    </p>
                    <ul>
                        <li>Pastikan format field/record sesuai dengan header kolom.</li>
                        <li>Silahkan lihat format file import data produk di <a href="{{ asset('file_import/DATA_PRODUK.xlsx') }}"><b>disini</b></a>, atau bisa edit file tersebut.</li>
                        <li>Jika dirasa point-point diatas sudah terpenuhi silahkan lakukan proses import produk</li>
                        <li>
                            <label for="">Pilih file excel</label>
                            <div class="form-group">
                                <input class="form-input" type="file" @change="selectFile($event)" name="excelProduk" id="excelProduk">
                            </div>
                        </li>
                    </ul>
                    {{-- <div class="form-group" style="text-align: center;">
                        <button type="submit" onclick="konfirmasiImport()" class="btn warna-tosca btn-lg waves-effect waves-light">Import</button>
                    </div> --}}
                    {{-- <div style="text-align: center;">
                        <a href="javascript:void(0)" class="btn btn-info btn-lg waves-effect waves-light" @click="prosesImportProdukAtc()">Import produk</a>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>