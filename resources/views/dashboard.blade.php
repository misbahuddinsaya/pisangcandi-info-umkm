@extends('layouts.master')
@section('title', 'Home')
@section('content')
<section class="breadcrumb-section-dash set-bg" data-setbg=" /img/breadcrumb-dashboard.png ">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-12 text-center">
                <div class="breadcrumb__text">

                </div>
            </div>
            <div class="col-md-6 col-sm-12 text-center">
                <div class="breadcrumb__text">
                </div>
            </div>
            <div class="col-md-3 col-sm-12 text-center">
                <div class="breadcrumb__text">
                </div>
            </div>
        </div>
    </div>
</section>
<section class="hero">
    <div class="container">
        <div class="hero__item set-bg" data-setbg=" /img/hero/banner.jpg">
            <div class="hero__text">
                <span>UMKM TES GIT</span>
                <h2>UMKM RW. 04 <br />PISANG CANDI</h2>
                <a href="#" class="primary-btn">TEMUKAN</a>
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
@endsection