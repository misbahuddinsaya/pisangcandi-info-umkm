@if(isset($totalProduk) && $totalProduk > 0):
@foreach ($dataProduk as $item)
<div class="col-lg-3 col-md-2 col-sm-2">
    <div class="card" style="width: 18rem;">
        <img src="<?= $item['foto_produk']; ?>" class="product__item__pic set-bg" alt="">
        <div class="card-body">
            <h5 class="card-title">{{ $item['nama_produk'] }}</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="{{ route('produk-info', ['id' => $item['kode_produk']]) }}" class="btn btn-primary">Go somewhere</a>
        </div>
    </div>
</div>

@endforeach
@else
<div class="col-12">
    <p class="text-center">Tidak Ada Produk UMKM</p>
</div>
@endif