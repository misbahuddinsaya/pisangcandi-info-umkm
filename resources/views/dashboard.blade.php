@extends('layouts.master')
@section('title', 'Home')
@section('content')
<section class="hero">
    <div class="section-title">
        <h3>SELAMAT DATANG</h3>
<<<<<<< HEAD
        <h2>UMKM RW.04 PISANG CANDI s</h2>
=======
        <h2>UMKM RW.04 PISANG CANDI</h2>
>>>>>>> 22858933759d380d48353ae9de21122c1229d90e
    </div>
    <div class="container">
        <div id="carouselExample" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="hero__item set-bg" data-setbg="/img/hero/banner1.png">
                        <div class="hero__text">
                            <span></span>
                            <h2> <br /></h2>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="hero__item set-bg" data-setbg="/img/hero/banner2.png">
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