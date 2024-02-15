@if(isset($totalProduk) && $totalProduk > 0):
@foreach ($dataProduk as $item)
<div class="col-lg-3 col-md-2 col-sm-2">
    <div class="product__item">
        <a href="{{ route('produk-info', ['id' => $item['kode_produk']]) }}">
            <div class="product__item__pic set-bg" data-setbg="<?= $item['foto_produk']; ?>">
                <ul class="product__item__pic__hover">
                    <li><a href="{{ route('produk-info', ['id' => $item['kode_produk']]) }}"><i class="fa fa-info"></i></a></li>
                </ul>
            </div>
        </a>
        <div class="product__item__text">
            <a href="{{ route('produk-info', ['id' => $item['kode_produk']]) }}">{{ $item['nama_produk'] }}</a>
        </div>
    </div>
</div>
@endforeach
@else
<div class="col-12">
    <p class="text-center">Tidak Ada Produk UMKM</p>
</div>
@endif