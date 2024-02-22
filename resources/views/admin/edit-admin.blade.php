@extends('layouts.master')
@section('title', 'Daftar UMKM')
@section('content')
@include('sweetalert::alert')
<section class="breadcrumb-section set-bg" data-setbg="/img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>UPDATE {{$productData['nama_produk']}}</h2>
                    <div class="breadcrumb__option">
                        <a href="/">Home</a>
                        <span>Profile Admin</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>