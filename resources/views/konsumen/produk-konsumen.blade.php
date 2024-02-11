@extends('layouts.master')
@section('title', 'Produk UMKM')
@section('content')
<section class="hero hero-normal">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
            </div>
            <div class="col-lg-9">

            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="/img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>PRODUK UMKM</h2>
                    <div class="breadcrumb__option">
                        <a href="/">Home</a>
                        <span>Shop</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->
<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="section-title product__discount__title">
            <h2>Produk UMKM</h2>
        </div>
        <div class="hero__search">
            <div class="hero__search__form">
                <form action="https://pisangcandi-umkminfo.vercel.app/produk-UMKM/search">
                    <input type="text" placeholder="Cari Produk" name="search">
                    <button type="submit" class="site-btn">CARI</button>
                </form>
            </div>
        </div>
        <div class="filter__item">
            <div class="row">
                <div class="col-lg-5 col-md-5">
                    <div class="filter__sort">
                        <span>Filter :</span>
                        <form action="https://pisangcandi-umkminfo.vercel.app/produk-UMKM/filter" method="GET" id="filterForm">
                            <select name="kategori" onchange="submitForm()">
                                <option value="0" selected>Semua</option>
                                @foreach ($dataKategori as $kategori)
                                <option value="{{ $kategori['kode'] }}" {{ $kategori['kode'] == $selectedKategori ? 'selected' : '' }}>
                                    {{ $kategori['nama_kategori'] }}
                                </option>
                                @endforeach
                            </select>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                </div>
                <div class="col-lg-4 col-md-3">
                </div>
            </div>
        </div>
        <div class="row">
            @include('partials.produk')
        </div>
        <div class="product__pagination">
            <a href="#">1</a>
            <a href="#">2</a>
            <a href="#">3</a>
            <a href="#"><i class="fa fa-long-arrow-right"></i></a>
        </div>


    </div>
</section>
<script>
    function submitForm() {
        document.getElementById('filterForm').submit();
    }
</script>
@endsection