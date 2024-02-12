@extends('layouts.master')
@section('title', 'Produk UMKM')
@section('content')
@include('sweetalert::alert')
<section class="breadcrumb-section set-bg" data-setbg="/img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>DAFTAR UMKM</h2>
                    <div class="breadcrumb__option">
                        <a href="/">Home</a>
                        <span>Profile UMKM</span>
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