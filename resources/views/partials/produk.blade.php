@if(isset($totalProduk) && $totalProduk > 0):
@foreach ($dataTes as $produk)
<div class="col-lg-3 mb-5">
    <div class="categories__item set-bg" data-setbg="">
        <h5><a href="">{{ $produk['nama_produk'] }}</a></h5>
    </div>
</div>
@endforeach
@else
<div class="col-12">
    <p class="text-center">Tidak Ada Produk UMKM</p>
</div>
@endif