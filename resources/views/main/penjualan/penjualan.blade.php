<div class="row" id="divDataPenjualan">
@include('main.penjualan.dataPenjualan')
@include('main.penjualan.modal')
</div>
<script type="text/javascript">
    $(document).ready(
        function() {
        $('.selectpicker').selectpicker();
        // var dt = getdata();
    });
    
    // function getdata(){
    //     var value = $('#pilihProduk').val();
    //     console.log(value);
        
    // }
</script>
<script src="{{ asset('ladun/base/') }}/js/penjualan.js"></script>
{{-- <script src="{{ asset('ladun/base/') }}/js/produk.js"></script> --}}
