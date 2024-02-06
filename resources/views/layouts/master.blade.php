<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="UMKM Template">
    <meta name="keywords" content="UMKM, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'UMKM-V.1')</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/jquery-ui.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" type="text/css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.4/dist/sweetalert2.all.min.js
    "></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.4/dist/sweetalert2.min.css
    " rel="stylesheet">
</head>

<body>
    <!-- Navbar Section -->
    @include('partials.header')

    <div id="preloder">
        <div class="loader"></div>
    </div>
    <!-- Content Section -->
    <div class="container">
        @yield('content')
    </div>

    @include('partials.footer')

    <!-- JavaScript Files -->
    <script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('assets/js/mixitup.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>