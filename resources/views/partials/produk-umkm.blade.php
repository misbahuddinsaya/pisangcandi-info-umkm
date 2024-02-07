@foreach ($produkUmkm as $item)
<div class="col-lg-3 col-md-6 col-sm-6">
    <div class="product__item">
        <div class="product__item__pic set-bg" data-setbg="/Produk/' . $item['foto_produk']'">
            <ul class="product__item__pic__hover">
                <li><a href=""><i class="fa fa-info"></i></a></li>
            </ul>
        </div>
        <div class="product__item__text">
            <h5>{{ $item['nama_produk'] }}</h5>
        </div>
    </div>
</div>
@endforeach