@if(isset($totalProduk) && $totalProduk > 0):
@foreach ($dataProduk as $item)
<div class="col-lg-3 mb-5">
    <div class="categories__item set-bg" data-setbg="<?= $item['foto_produk']; ?>">
        <h5><a href="{{ route('produk-info', ['id' => $item['kode_produk']]) }}">{{ $item['nama_produk'] }}</a></h5>
    </div>
</div>
@endforeach
@else
<div class="col-12">
    <p class="text-center">Tidak Ada Produk UMKM</p>
</div>
@endif