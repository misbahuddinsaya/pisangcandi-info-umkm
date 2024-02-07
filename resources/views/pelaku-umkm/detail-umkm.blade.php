@extends('layouts.master')
@section('title', 'Produk UMKM')
@section('content')
@include('sweetalert::alert')
<section class="breadcrumb-section set-bg" data-setbg="/img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center profile-section">
                <div class="profile-picture">
                    <img src="/Produk/<?= $umkmData['profile_umkm']; ?>" alt="UMKM Image">
                </div>

            </div>
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>{{ $detailUmkm['nama_umkm'] }}</h2>
                    <div class="breadcrumb__option">
                        <a href="/">Home</a>
                        <span>Profile UMKM</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="product spad">
    <div class="container">
        <div class="section-title product__discount__title">
            <h2>Produk UMKM</h2>
        </div>
        <div class="filter__item">
            <div class="row">
                <div class="col-lg-4 col-md-5">
                    <div class="filter__sort">
                        <span>Filter :</span>
                        <form action="" method="GET" id="filterForm">
                            <select name="kategori" onchange="submitForm()">
                                <option value="0" selected>Semua</option>
                                <option value="">
                                </option>
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
            @include('partials.produk-umkm')
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