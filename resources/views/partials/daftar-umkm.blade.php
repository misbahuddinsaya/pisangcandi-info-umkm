<div class="section-title">
    <h2>DAFTAR UMKM</h2>
</div>
<div class="container">
    <div class="row">
        @foreach ($dataUmkm as $item)
        <div class="col-lg-3">
            <div class="categories__item set-bg" data-setbg="<?= $item['profile_umkm']; ?>">
                <h5><a href="{{ route('umkm-detail', ['id' => $item['kode_umkm']]) }}">{{ $item['nama_umkm'] }}</a></h5>
            </div>
        </div>
        @endforeach
    </div>
</div>