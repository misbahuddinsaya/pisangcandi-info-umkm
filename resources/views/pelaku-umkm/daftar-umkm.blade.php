@extends('layouts.master')
@section('title', 'Produk UMKM')
@section('content')
@include('sweetalert::alert')
<section class="breadcrumb-section set-bg" data-setbg="/img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>PROFIL UMKM</h2>
                    <div class="breadcrumb__option">
                        <a href="/">Home</a>
                        <span>Profile UMKM</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="produk-add mt-5 mb-5">
    <div class="container-produk-add">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header primary-btn">Tambah UMKM</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <form action="" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-2">
                                        <label for="namaUmkm" class="form-label">Nama UMKM</label>
                                        <input type="text" class="form-control" id="namaUmkm" placeholder="Nama UMKM" name="namaUmkm" value="">
                                    </div>
                                    <div class="mb-2">
                                        <label for="alamat" class="form-label">Alamat</label>
                                        <input type="text" class="form-control" id="alamat" placeholder="Alamat" name="alamat" value="">
                                    </div>
                                    <div class="mb-2">
                                        <label for="no_tlp" class="form-label">Nomor Telepon</label>
                                        <input type="number" class="form-control" id="nomer_tlp" placeholder="Nomer Telepon" name="no_tlp" required value="">
                                    </div>
                                    <div class="mb-2">
                                        <label for="jumlah_produk" class="form-label">Jumlah Produk</label>
                                        <input type="number" class="form-control" id="jumlah_produk" placeholder="Jumlah Produk" name="jumlah_produk" value="">
                                    </div>
                                    <div class="mb-2">
                                        <label for="formFile" class="form-label">Profile UMKM</label>
                                        <input type="file" class="form-control" id="formFile" name="file" placeholder="Nama Produk" required value="">
                                    </div>
                                    <button type="submit" class="btn primary-btn">Tambah UMKM</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';

        var forms = document.querySelectorAll('.needs-validation');

        Array.prototype.slice.call(forms).forEach(function(form) {
            form.addEventListener('submit', function(event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();

                    Array.from(form.querySelectorAll('.form-control')).forEach(function(field) {
                        if (!field.validity.valid) {
                            field.classList.add('is-invalid');
                        }
                    });
                } else {
                    form.classList.add('was-validated');
                    // Lakukan submit form secara manual
                    form.submit();
                }
            }, false);
        });
    })();
</script>
@endsection