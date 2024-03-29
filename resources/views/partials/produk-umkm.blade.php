@if ($produkUmkm && count($produkUmkm) > 0)
@foreach ($produkUmkm as $item)
<div class="col-lg-3 col-md-6 col-sm-6">
    <div class="product__item">
        <div class="product__item__pic set-bg" data-setbg="<?= $item['foto_produk']; ?>">
            <ul class="product__item__pic__hover">
                <li><a href=""><i class="fa fa-info"></i></a></li>
            </ul>
        </div>
        <div class="product__item__text">
            <a href="{{ route('produk-info', ['id' => $item['kode_produk']]) }}">{{ $item['nama_produk'] }} t</a>
        </div>
    </div>
</div>
@endforeach
@else
<div class="col-12">
    <p class="text-center">Tidak Ada Produk UMKM</p>
</div>
@endif