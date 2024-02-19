@extends('layouts.master')
@section('title', 'Produk UMKM')
@section('content')
<section class="breadcrumb-section set-bg" data-setbg="/img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Detail Produk</h2>
                    <div class="breadcrumb__option">
                        <a href="/">Home</a>
                        <a href="/produk-UMKM">Produk UMKM</a>
                        <span>Produk Detail</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Product Details Section Begin -->
<section class="product-details spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="product__details__pic">
                    <div class="product__details__pic__item">
                        <img class="product__details__pic__item--large" src="<?= $produk['foto_produk1']; ?>" alt="">
                    </div>
                    <div class="product__details__pic__slider owl-carousel">
                            <img data-imgbigurl="<?= $produk['foto_produk2']; ?>"
                                src="<?= $produk['foto_produk2']; ?>" alt="">
                            <img data-imgbigurl="<?= $produk['foto_produk1']; ?>"
                                src="<?= $produk['foto_produk1']; ?>" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="product__details__text">
                    <h3>{{$produk['nama_produk']}}</h3>
                    <P>Keterangan Produk: {{$produk['keterangan']}}</P>
                    <h5>Alamat UMKM:</h5>
                    <p>{{$produk['alamat']}}</p>
                    <p>Kategori Produk : <b>{{ $nama_kategori }}</b></p>
                    <ul>
                        <li>
                            <b>Bagikan Di</b>
                            <div class="share">
                                <a href="instagram://user?username={{$produk['instagram']}}""><i class=" fa fa-instagram"></i></a>
                                <a href="https://wa.me/{{$produk['no_whatsapp']}}"><i class="fa fa-whatsapp"></i></a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="product__details__tab">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">

                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <div class="product__details__tab__desc">
                                <h6>Tentang Produk</h6>
                                <p>{{$produk['deskripsi']}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Details Section End -->
@endsection