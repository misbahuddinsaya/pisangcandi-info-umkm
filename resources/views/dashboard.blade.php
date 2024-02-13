@extends('layouts.master')
@section('title', 'Home')
@section('content')
<section class="hero">
    <div class="section-title">
        <span>SELAMAT DATANG</span>
        <h2>UMKM RW.04 PISANG CANDI</h2>
    </div>
    <div class="container">
        <div id="carouselExample" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="hero__item set-bg" data-setbg="/img/hero/banner.jpg">
                        <div class="hero__text">
                            <span></span>
                            <h2> <br /></h2>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="hero__item set-bg" data-setbg="/img/hero/banner.jpg">
                        <div class="hero__text">
                            <span></span>
                            <h2><br /></h2>
                        </div>
                    </div>
                </div>
                <!-- Tambahkan item carousel sesuai kebutuhan -->
            </div>
        </div>
    </div>
</section>
<section class="categories mt-3">
    @include('partials.daftar-umkm')
</section>
<section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Produk Terbaru</h2>
                </div>
            </div>
        </div>
        <div class="row featured__filter">
            @include('partials.produk')
        </div>
    </div>
</section>
<script>
    $(document).ready(function() {
        // Menginisialisasi carousel
        $('#carouselExample').carousel({
            interval: 3000 // Waktu interval antara slide dalam milidetik
        });
    });
</script>
@endsection