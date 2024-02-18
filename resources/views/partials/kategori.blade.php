<div class="hero__categories">
    <div class="hero__categories__all">
        <i class="fa fa-bars"></i>
        <span>Kategori Produk</span>
    </div>
    <ul>
        @foreach ($dataKategori as $kategori)
        <li value="{{ $kategori['kode'] }}" {{ $kategori['kode'] == $selectedKategori ? 'selected' : '' }}><a href="#">{{ $kategori['nama_kategori'] }}</a></li>
        @endforeach
    </ul>
</div>