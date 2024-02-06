<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="UMKM Template">
    <meta name="keywords" content="UMKM, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Login')</title>

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
</head>


<body>
    <div class="container-login" style="padding-top: 100px;">
        <div class="card">
            <div class="card-body">
                <div class="row justify-content-center align-items-center">
                    <div class="col-md-5">
                        <img src="{{ asset('assets/img/img-login.jpg') }}" alt="Your Image" style="max-width: 100%; height: auto;">
                    </div>
                    <div class="col-md-5">
                        <div class="card shadow-2-strong" style="border-radius: 1rem;">
                            <div class="card-body p-5 ">
                                <div class="section-title product__discount__title">
                                    <h2>Login <br /> UMKM Pisang Candi</h2>
                                </div>
                                <form method="POST" action="{{ route('login-user') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="text" style="font-weight: bold;">Username</label>
                                        <input id="text" class="form-control" name="username" value="" autofocus>
                                    </div>

                                    <div class="form-group">
                                        <label for="password" style="font-weight: bold;">Password</label>
                                        <input id="password" type="password" class="form-control" name="password" required autocomplete="current-password">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success">
                                            Login
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>