@foreach ($produkUmkm as $item)
<div class="col-lg-3 col-md-6 col-sm-6">
    <div class="product__item">
        <div class="product__item__pic set-bg" data-setbg="/Produk/<?= $item['foto_produk']; ?>">
            <ul class="product__item__pic__hover">
                <li><a href=""><i class="fa fa-info"></i></a></li>
            </ul>
        </div>
        <div class="product__item__text">
            <a href="{{ route('produk-info', ['id' => $item['kode_produk']]) }}">{{ $item['nama_produk'] }}</a>
        </div>
    </div>
</div>
@endforeach