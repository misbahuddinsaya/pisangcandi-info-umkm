@if(isset($totalProduk) && $totalProduk > 0):
@foreach ($dataUmkmProduk as $dataUmkmProduk)
<div class="col-lg-3 mb-5">
    <div class="categories__item set-bg" data-setbg="<?= $data['foto_produk2']; ?>">
        <h5><a href="{{ route('produk-info', ['id' => $data['kode_produk']]) }}">{{ $data['nama_produk'] }}</a></h5>
    </div>
</div>
@endforeach
@else
<div class="col-12">
    <p class="text-center">Tidak Ada Produk UMKM</p>
</div>
@endif