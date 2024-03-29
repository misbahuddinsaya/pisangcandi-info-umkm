@extends('layouts.master')
@section('title', 'Daftar UMKM')
@section('content')
@include('sweetalert::alert')
<section class="breadcrumb-section set-bg" data-setbg="/img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>UPDATE {{ $productData['nama_produk'] }}</h2>
                    <div class="breadcrumb__option">
                        <a href="/">Home</a>
                        <span>Profile Admin</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="produk-add mt-5 mb-5">
    <div class="container-produk-add">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header primary-btn">Update UMKM</div>
                    <div class="card-body">
                        <form class="row g-3 needs-validation" novalidate action="https://pisangcandi-umkminfo.vercel.app/simpan-edit-umkm/{{ $productData['kode_produk'] }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-2">
                                        <label for="nama_produk">Nama UMKM</label>
                                        <input type="text" class="form-control" id="nama_produk" name="namaProduk" required value="{{ $productData['nama_produk'] }}">
                                        <div class="invalid-feedback">
                                            Masukan Nama UMKM.
                                        </div>
                                    </div>
                                    <div class="mb-2">
                                        <label for="nama_pemilik">Pemilik UMKM</label>
                                        <input type="text" class="form-control" id="nama_pemilik" name="nama_pemilik" required value="{{ $productData['nama_pemilik'] }}">
                                        <div class="invalid-feedback">
                                            Masukan Nama Pemilik.
                                        </div>
                                    </div>
                                    <div class="mb-2">
                                        <label for="alamat">Alamat UMKM</label>
                                        <input type="text" class="form-control" id="alamat" name="alamat" required value="{{ $productData['alamat'] }}">
                                        <div class="invalid-feedback">
                                            Masukan Alamat.
                                        </div>
                                    </div>
                                    <div class="mb-2">
                                        <label for="keterangan_produk">Keterangan Produk</label>
                                        <input type="text" class="form-control" id="keterangan_produk" name="keterangan_produk" required value="{{ $productData['nama_produk'] }}">
                                        <div class="invalid-feedback">
                                            Masukan Keterangan Produk UMKM.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-2">
                                        <label for="deskripsi">Deskripsi</label>
                                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required>{{ $productData['deskripsi'] }}</textarea>
                                        <div class="invalid-feedback">
                                            Masukan Deskripsi Produk.
                                        </div>
                                    </div>
                                    <div class="mb-2">
                                        <label for="instagram">Instagram</label>
                                        <input type="text" class="form-control" id="instagram" name="instagram" required value="{{ $productData['instagram'] }}">
                                        <div class="invalid-feedback">
                                            Masukan User Instagram.
                                        </div>
                                    </div>
                                    <div class="mb-2">
                                        <label for="no_whatsapp">Nomer Whatsapp</label>
                                        <input type="number" class="form-control" id="no_whatsapp" name="no_whatsapp" required value="{{ $productData['no_whatsapp'] }}">
                                        <div class="invalid-feedback">
                                            Masukan Nomer Whatsapp.
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <button type="submit" class="btn primary-btn ms-3 submit-tambah">Update Produk</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection