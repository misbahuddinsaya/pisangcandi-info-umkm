@extends('layouts.master')
@section('title', 'Home')
@section('content')
<section class="hero">
    <div class="section-title">
        <h3>SELAMAT DATANG</h3>
        <h2>UMKM RW.04 PISANG CANDI</h2>
    </div>
    <div class="container">
        <div id="carouselExample" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="hero__item set-bg" data-setbg="/img/hero/bannerherro1.jpg">
                        <div class="hero__text">
                            <span></span>
                            <h2> <br /></h2>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="hero__item set-bg" data-setbg="/img/hero/bannerhero2.jpeg">
                        <div class="hero__text">
                            <span></span>
                            <h2><br /></h2>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="hero__item set-bg" data-setbg="/img/hero/bannerhero3.jpeg">
                        <div class="hero__text">
                            <span></span>
                            <h2><br /></h2>
                        </div>
                    </div>
                </div><div class="carousel-item">
                    <div class="hero__item set-bg" data-setbg="/img/hero/bannerhero4.jpeg">
                        <div class="hero__text">
                            <span></span>
                            <h2><br /></h2>
                        </div>
                    </div>
                </div><div class="carousel-item">
                    <div class="hero__item set-bg" data-setbg="/img/hero/bannerhero5.jpwg">
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
<section class="categories">
    <div class="container">
        <div class="section-title">
            <h2>Produk UMKM</h2>
        </div>
        <div class="row">
            <div class="categories__slider owl-carousel">
                @include('partials.produk')
            </div>
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