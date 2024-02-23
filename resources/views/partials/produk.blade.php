@if(isset($totalProduk) && $totalProduk > 0)
    @foreach ($dataUmkmProduk as $produk)
        <div class="col-lg-3 mb-5">
                <h5><a href="{{ route('produk-info', ['id' => $produk['kode_produk']]) }}">{{ $produk['nama_produk'] }}</a></h5>
            </div>
        </div>
    @endforeach
@else
    <div class="col-12">
        <p class="text-center">Tidak Ada Produk UMKM</p>
    </div>
@endif