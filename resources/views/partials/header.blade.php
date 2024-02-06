<div class="humberger__menu__overlay"></div>
<div class="humberger__menu__wrapper">
    <div class="humberger__menu__logo">
        <a href="#"><img src="img/logo.png" alt=""></a>
    </div>
    <div class="humberger__menu__cart">

    </div>
    <div class="humberger__menu__widget">
    </div>
    <nav class="humberger__menu__nav mobile-menu">
        <ul>
            <li class="active"><a href="/">Home</a></li>
            <li><a href="{{ route('produk') }}">Produk UMKM</a></li>
            <li>
                @if(session('user_level') == null)
                <a href="{{ route('login') }}">Login</a>
                @else
                <a href="#">Profile</a>
                <ul class="header__menu__dropdown">
                    <li><a href="#">Nama Profil: {{ session('user')['nama'] }}</a></li>

                    @if(session('user_level') == 'admin')
                    <li><a href="{{ route('admin-umkm')}}">Profil Admin</a></li>
                    @elseif(session('user_level') == 'pelaku-umkm')
                    <li><a href="{{ route('pelaku-umkm')}}">Profil UMKM</a></li>
                    @endif

                    <li><a href="{{ route('logout-user')}}">Logout</a></li>
                </ul>
                @endif
            </li>
        </ul>
    </nav>
    <div id="mobile-menu-wrap"></div>
</div>
<header class="header">
    <div class="header__top">
        <div class="container">

        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="header__logo">
                    <a href="./index.html">
                        <div class="section-title ms-3">

                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-6">
                <nav class="header__menu">
                    <div class="row">
                        <div class="col">
                            <ul>
                                <li><a href="/">Home</a></li>
                                <li><a href="{{ route('produk') }}">Produk UMKM</a></li>
                                <li>
                                    @if(session('user_level') == null)
                                    <a href="{{ route('login') }}">Login</a>
                                    @else
                                    <a href="#">Profile</a>
                                    <ul class="header__menu__dropdown">
                                        <li><a href="#">Nama Profil: {{ session('user')['nama'] }}</a></li>

                                        @if(session('user_level') == 'admin')
                                        <li><a href="{{ route('admin-umkm')}}">Profil Admin</a></li>
                                        @elseif(session('user_level') == 'pelaku-umkm')
                                        <li><a href="{{ route('pelaku-umkm')}}">Profil UMKM</a></li>
                                        @endif

                                        <li><a href="{{ route('logout-user')}}">Logout</a></li>
                                    </ul>
                                    @endif
                                </li>
                            </ul>
                        </div>
                    </div>

                </nav>
            </div>
        </div>
        <div class="humberger__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header>