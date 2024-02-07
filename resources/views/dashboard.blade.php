@extends('layouts.master')
@section('title', 'Home')
@section('content')
<section class="breadcrumb-section-dash set-bg" data-setbg=" {{ asset('assets/img/breadcrumb-dashboard.jpg') }} ">
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
        <div class="hero__item set-bg" data-setbg=" {{ asset('assets/img/hero/banner.jpg') }} ">
            <div class="hero__text">
                <span>UMKM SAYA</span>
                <h2>UMKM RW. 04 <br />PISANG COKLAT</h2>
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
<div class="banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="banner__pic">
                    <img src="img/banner/banner-1.jpg" alt="">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="banner__pic">
                    <img src="img/banner/banner-2.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection