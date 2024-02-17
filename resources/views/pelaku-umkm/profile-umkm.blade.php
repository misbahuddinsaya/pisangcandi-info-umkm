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
                    <h3>{{ session('umkm_data')['nama_umkm'] }}</h3>
                    <div class="breadcrumb__option">
                        <a href="/">Home</a>
                        <span>Profile UMKM </span>
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
                    <div class="card-body">
                        <form class="row g-3 needs-validation" novalidate action="https://pisangcandi-umkminfo.vercel.app/simpan-produk" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-12 mb-2">
                                <label for="nama_produk">Nama Produk</label>
                                <input type="text" class="form-control" id="nama_produk" name="namaProduk" required value="">
                                <div class="invalid-feedback">
                                    Please choose a username.
                                </div>
                            </div>
                            <div class="col-md-12 mb-2">
                                <label for="keterangan_produk">Keterangan Produk</label>
                                <input type="text" class="form-control" id="keterangan_produk" name="keterangan_produk" required>
                                <div class="invalid-feedback">
                                    Please choose a username.
                                </div>
                            </div>
                            <div class="col-md-12 mb-2">
                                <label for="kategori_produk" class="form-label">Kategori Produk</label>
                            </div>
                            <div class="col-md-12 mb-2">
                                <select class="form-select" id="kategori_produk" name="kategori_produk" aria-label="Large select example" required>
                                    <option selected disabled>-- Pilih Kategori --</option>
                                    @foreach ($dataKategori as $item)
                                    <option value="{{$item['kode']}}">{{$item['nama_kategori']}}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Please choose a username.
                                </div>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="harga_produk">Harga Produk</label>
                                <input type="number" class="form-control" id="harga_produk" name="harga_produk" required>
                                <div class="invalid-feedback">
                                    Please choose a username.
                                </div>
                            </div>
                            <div class="col-md-12 mb-2">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
                                <div class="invalid-feedback">
                                    Please choose a username.
                                </div>
                            </div>
                            <div class="col-md-12 mb-2">
                                <label for="instagram">Instagram</label>
                                <input type="text" class="form-control" id="instagram" name="instagram" required>
                                <div class="invalid-feedback">
                                    Please choose a username.
                                </div>
                            </div>
                            <div class="col-md-12 mb-2">
                                <label for="no_whatsapp">Nomer Whatsapp</label>
                                <input type="number" class="form-control" id="no_whatsapp" name="no_whatsapp" required>
                                <div class="invalid-feedback">
                                    Please choose a username.
                                </div>
                            </div>
                            <div class="col-md-12 mb-2">
                                <label for="formFile" class="form-label">Pilih File</label>
                                <input class="form-control" type="file" id="formFile" name="file" required>
                                <div class="invalid-feedback">
                                    Please choose a username.
                                </div>
                            </div>
                            <div class="col-md-12 ">
                                <button type="submit" class="btn primary-btn ms-3 submit-tambah">Tambah Produk</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Right Column - Product Table -->
            <div class="col-lg-6 mt-5">
                <div class="card">
                    <h5 class="card-header primary-btn">Produk UMKM</h5>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center">No</th>
                                        <th scope="col" class="text-center">Nama Produk</th>
                                        <th scope="col" class="text-center">Harga</th>
                                        <th scope="col" class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $count = 1;
                                    @endphp
                                    @foreach ($dataProduk as $item)
                                    <tr>
                                        <th class="text-center">{{ $count++ }}</th>
                                        <td class="text-center">{{ $item['nama_produk'] }}</td>
                                        <td class="text-center">{{ $item['harga'] }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('produk-hapus', ['id' => $item['kode_produk']]) }}" class="delete-icon"><i class="fa fa-trash text-danger"></i></a>
                                            <a href="{{ route('produk-edit', ['id' => $item['kode_produk']]) }}" class="edit-icon"><i class="fa fa-edit text-warning"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
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