<div class="section-title">
    <h2>DAFTAR UMKM</h2>
</div>
<div class="container">
    <div class="row">
        @if ($dataUmkm && count($dataUmkm) > 0)
        @foreach ($dataUmkm as $umkm)
        <div class="col-lg-3">
            <div class="categories__item set-bg" data-setbg="{{ $umkm['profile_umkm'] }}">
                <h5><a href="{{ route('umkm-detail', ['id' => $umkm['kode_umkm']]) }}">{{ $umkm['nama_umkm'] }}</a></h5>
            </div>
        </div>
        @endforeach
        @else
        <div class="col-lg-12">
            <p class="text-center">Tidak ada UMKM yang tersedia saat ini.</p>
        </div>
        @endif
    </div>
</div>