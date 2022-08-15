// route 
var rProsesHapusPenjualan = server + "app/penjualan/hapus/proses";
var rProsesTambahPenjualan = server + "app/penjualan/tambah/data";
var rProsesImportPenjualan = server + "app/penjualan/import/proses";
// vue object 

var appPenjualan = new Vue({
    el : "#divDataPenjualan",
    data : {
        excelPenjualan: null
    },
    methods : {
        selectFile(event) {
            // `files` is always an array because the file input may be in multiple mode
            this.excelPenjualan = event.target.files[0];
            $data = this.excelPenjualan
            confirmQuest('info', 'Konfirmasi', 'Import Penjualan ...?', function (x) {konfirmasiImport($data)});
            console.log(this.excelPenjualan);
        },
        tambahPenjualanAtc : function()
        {
            $("#modalTambahPenjualan").modal("show");
            setTimeout(function(){}, 500);
        },
        detailAtc : function(kdFaktur)
        {
            renderPage('app/penjualan/detail/'+kdFaktur, 'Detail Penjualan');
        },
        deleteAtc : function(kdFaktur)
        {
            confirmQuest('info', 'Konfirmasi', 'Hapus penjualan ...?', function (x) {deleteConfirm(kdFaktur)});
        },
        prosesTambahPenjualan : function()
        {
            prosesTambahPenjualan();
        },
        importPenjualanAtc : function()
        {
            $("#modalImportPenjualan").modal("show");
        }
    }
});


// inisialisasi 
$("#tblDataPenjualan").dataTable();

function deleteConfirm(kdFaktur)
{
let ds = {'kdFaktur' : kdFaktur}
axios.post(rProsesHapusPenjualan, ds).then(function(res){
        let dr = res.data;
        if (dr.status === 'gagal') {
            setTimeout(function(){
                pesanUmumApp('error', 'Error', 'No faktur sama, silahkan ubah no faktur...');
                renderPage('app/penjualan/data', 'Penjualan');
            }, 10)
        } else {
        setTimeout(function(){
            pesanUmumApp('success', 'Sukses', 'Data penjualan berhasil dihapus');
            renderPage('app/penjualan/data', 'Penjualan');
        }, 10);}
    });
}
// function prosesTambahPenjualan()
// {
//     // let produk = document.querySelector("#pilihProduk").value;
//     var produk = $('#pilihProduk').val();
//     if (produk === '') {
//         $("#modalTambahPenjualan").modal("hide");
//         setTimeout(function(){
//             pesanUmumApp('error', 'Error', 'Mohon Isi Semua Form!');
//             renderPage('app/penjualan/data', 'Penjualan');
//             return false;
//         }, 300);
//     }
//     let ds = {'produk':produk}
//     console.log(ds);
//     axios.get(rProsesTambahPenjualan, ds).then(function(res){
//         $("#modalTambahProduk").modal("hide");
//         setTimeout(function(){
//             renderPage('app/penjualan/tambah/data', 'Penjualan');
//         }, 300);
       
//     });
// }

function konfirmasiImport($data)
{   

    const ds = new FormData();
    ds.append('excelPenjualan', $data);
    console.log($data);
    axios.post(rProsesImportPenjualan, ds, {
        headers : {
            'Content-Type' : 'multipart/form-data'
        }
    }).then(function(res){
        let pesan = "Penjualan berhasil di import...";
        $("#modalImportPenjualan").modal("hide");
        setTimeout(function(){
            pesanUmumApp('success', 'Sukses', pesan);
            renderPage('app/penjualan/data', 'Penjualan');
        }, 400);
    });
}
