@if(isset($totalProduk) && $totalProduk > 0):
@foreach ($dataProduk as $item)
<div class="col-6">
    <div class="product__item">
        <a href="{{ route('produk-info', ['id' => $item['kode_produk']]) }}">
            <div class="product__item__pic set-bg" data-setbg="">
                <ul class="product__item__pic__hover">
                    <li><a href="{{ route('produk-info', ['id' => $item['kode_produk']]) }}"><i class="fa fa-info"></i></a></li>
                </ul>
            </div>
            <div class="product__item__text">
                <a href="{{ route('produk-info', ['id' => $item['kode_produk']]) }}">{{ $item['nama_produk'] }}</a>
            </div>
        </a>
    </div>
</div>
@endforeach
@else
<div class="col-12">
    <p class="text-center">Tidak Ada Produk UMKM</p>
</div>
@endif