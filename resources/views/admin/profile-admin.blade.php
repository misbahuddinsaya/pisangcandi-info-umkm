@extends('layouts.master')
@section('title', 'Daftar UMKM')
@section('content')
@include('sweetalert::alert')
<section class="breadcrumb-section set-bg" data-setbg="/img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>PROFIL ADMIN</h2>
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
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header primary-btn">Tambah UMKM</div>
                    <div class="card-body">
                        <form class="row g-3 needs-validation" novalidate action="https://pisangcandi-umkminfo.vercel.app/simpan-daftar-umkm" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-2">
                                        <label for="nama_produk">Nama UMKM</label>
                                        <input type="text" class="form-control" id="nama_produk" name="namaProduk" required value="">
                                        <div class="invalid-feedback">
                                            Please choose a username.
                                        </div>
                                    </div>
                                    <div class="mb-2">
                                        <label for="nama_pemilik">Pemilik UMKM</label>
                                        <input type="text" class="form-control" id="nama_pemilik" name="nama_pemilik" required>
                                        <div class="invalid-feedback">
                                            Please choose a username.
                                        </div>
                                    </div>
                                    <div class="mb-2">
                                        <label for="alamat">Alamat UMKM</label>
                                        <input type="text" class="form-control" id="alamat" name="alamat" required>
                                        <div class="invalid-feedback">
                                            Please choose a username.
                                        </div>
                                    </div>
                                    <div class="mb-2">
                                        <label for="keterangan_produk">Keterangan Produk</label>
                                        <input type="text" class="form-control" id="keterangan_produk" name="keterangan_produk" required>
                                        <div class="invalid-feedback">
                                            Please choose a username.
                                        </div>
                                    </div>
                                    <div class="mb-2">
                                        <label for="kategori_produk" class="form-label">Kategori Produk</label>
                                    </div>
                                    <div class="mb-2">
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
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-2">
                                        <label for="deskripsi">Deskripsi</label>
                                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
                                        <div class="invalid-feedback">
                                            Please choose a username.
                                        </div>
                                    </div>
                                    <div class="mb-2">
                                        <label for="instagram">Instagram</label>
                                        <input type="text" class="form-control" id="instagram" name="instagram" required>
                                        <div class="invalid-feedback">
                                            Please choose a username.
                                        </div>
                                    </div>
                                    <div class="mb-2">
                                        <label for="no_whatsapp">Nomer Whatsapp</label>
                                        <input type="number" class="form-control" id="no_whatsapp" name="no_whatsapp" required>
                                        <div class="invalid-feedback">
                                            Please choose a username.
                                        </div>
                                    </div>
                                    <div class="mb-2">
                                        <label for="formFile1" class="form-label">Gambar Produk 1</label>
                                        <input class="form-control" type="file" id="formFile1" name="fileproduk1" required>
                                        <div class="invalid-feedback">
                                            Please choose a username.
                                        </div>
                                    </div>
                                    <div class="mb-2">
                                        <label for="formFile2" class="form-label">Gambar Produk 2</label>
                                        <input class="form-control" type="file" id="formFile2" name="fileproduk2" required>
                                        <div class="invalid-feedback">
                                            Please choose a username.
                                        </div>
                                    </div>
                                </div>
                                <div class="col ">
                                    <button type="submit" class="btn primary-btn ms-3 submit-tambah">Tambah Produk</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<section class="produk-add mt-5 mb-5">
    <div class="container-produk-add">
        <div class="row">
            <!-- Right Column - Product Table -->
            <div class="col-lg-12">
                <div class="card">
                    <h5 class="card-header primary-btn">Daftar UMKM</h5>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center">No</th>
                                        <th scope="col" class="text-center">Nama Umkm</th>
                                        <th scope="col" class="text-center">Nama Pemilik</th>
                                        <th scope="col" class="text-center">Alamat</th>
                                        <th scope="col" class="text-center">Nomer Telepon</th>
                                        <th scope="col" class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $count = 1;
                                    @endphp
                                    @if ($dataUmkm)
                                    @foreach ($dataUmkm as $item)
                                    <tr>
                                        <th class="text-center">{{ $count++ }}</th>
                                        <td class="text-center">{{ $item['nama_produk'] }}</td>
                                        <td class="text-center">{{ $item['nama_pemilik'] }}</td>
                                        <td class="text-center">{{ $item['alamat'] }}</td>
                                        <td class="text-center">{{ $item['no_whatsapp'] }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('umkm-hapus', ['id' => $item['kode_produk']]) }}" class="delete-icon"><i class="fa fa-trash text-danger"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        <td colspan="6" class="text-center">Tidak ada UMKM</td>
                                    </tr>
                                    @endif
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