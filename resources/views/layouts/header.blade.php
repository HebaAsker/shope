<!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.ico">
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400italic,700,700italic,900,900italic&amp;subset=latin,latin-ext" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open%20Sans:300,400,400italic,600,600italic,700,700italic&amp;subset=latin,latin-ext" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/animate.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/owl.carousel.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/flexslider.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/chosen.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/color-01.css')}}">

    </head>
    <body class="font-sans antialiased">

        <!-- haeder -->
        <header id="header" class="header header-style-1">
            <div class="container-fluid">
                <div class="row">
                    <div class="topbar-menu-area">
                        <div class="container">
                            <div class="topbar-menu left-menu">
                                <ul>
                                    <li class="menu-item" >
                                        <a title="Hotline: (+20) 102 093 790 1" href="#" ><span class="icon label-before fa fa-mobile"></span>Hotline: (+20) 102 093 790 1</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="topbar-menu right-menu">
                                <ul>
                                    <li class="menu-item lang-menu menu-item-has-children parent">
                                        <a title="English" href="#"><span class="img label-before"><img src="{{ asset('assets/images/lang-en.png') }}" alt="lang-en"></span>English<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                        <ul class="submenu lang" >
                                            <li class="menu-item" ><a title="hungary" href="#"><span class="img label-before"><img src="{{ asset('assets/images/lang-hun.png') }}" alt="lang-hun"></span>Hungary</a></li>
                                            <li class="menu-item" ><a title="german" href="#"><span class="img label-before"><img src="{{ asset('assets/images/lang-ger.png') }}" alt="lang-ger" ></span>German</a></li>
                                            <li class="menu-item" ><a title="french" href="#"><span class="img label-before"><img src="{{ asset('assets/images/lang-fra.png') }}" alt="lang-fre"></span>French</a></li>
                                            <li class="menu-item" ><a title="canada" href="#"><span class="img label-before"><img src="{{ asset('assets/images/lang-can.png') }}" alt="lang-can"></span>Canada</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item menu-item-has-children parent" >
                                        <a title="Dollar (USD)" href="#">Dollar (USD)<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                        <ul class="submenu curency" >
                                            <li class="menu-item" >
                                                <a title="Pound (GBP)" href="#">Pound (GBP)</a>
                                            </li>
                                            <li class="menu-item" >
                                                <a title="Euro (EUR)" href="#">Euro (EUR)</a>
                                            </li>
                                            <li class="menu-item" >
                                                <a title="Dollar (USD)" href="#">Dollar (USD)</a>
                                            </li>
                                        </ul>

                                        @guest  <!-- Used to start a new session -->

                                        <!-- if the user clicked login check if he has an acoount then show his name in the nav bar -->
                                            @if (Route::has('login'))
                                                <li class="menu-item">
                                                    <a  href="{{ route('login') }}">{{ __('Login') }}</a>
                                                </li>
                                            @endif

                                            <!-- if the user clicked register make him an acoount then show his name in the nav bar -->
                                            @if (Route::has('register'))
                                                <li class="menu-item">
                                                    <a  href="{{ route('register') }}">{{ __('Register') }}</a>
                                                </li>
                                            @endif
                                        @else

                                        <li class="menu-item menu-item-has-children parent" >
                                            <a title="My Account" href="#">{{ Auth::user()->name }}<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                            <ul class="submenu curency" >
                                                <li class="menu-item"><a href="/profile">Account Details</a></li>
                                                @if (Auth::user()->role=='0')
                                                <li class="menu-item"><a href="/dashboard">Dashboard</a></li>
                                                @endif

                                        <li>
                                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </li>
                                        </ul>
                                    </li>
                                        @endguest
                                    </li>

                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="container">
                        <div class="mid-section main-info-area">
                            <div class="wrap-logo-top left-section">
                                <a href="/" class="link-to-home"><img src="{{ asset('assets/images/logo-top-1.png') }}" alt="mercado"></a>
                            </div>

                            <div class="wrap-search center-section">
                                <div class="wrap-search-form">
                                    <form action="/search" method="GET" id="form-search-top" name="form-search-top">
                                        <input type="text" name="search" value="" placeholder="Search here...">
                                        <button form="form-search-top" type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
                                        <div class="wrap-list-cate">
                                            <input type="hidden" name="product-cate" value="0" id="product-cate">
                                            <a href="#" class="link-control">All Category</a>
                                            <ul class="list-cate">
                                                <li class="level-0">All Category</li>
                                                @foreach ($category as $cat)
                                                    <li >{{ $cat->name }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="wrap-icon right-section">
                                <div class="wrap-icon-section wishlist">
                                    <a href="/wishlist" class="link-direction">
                                        <i class="fa fa-heart" aria-hidden="true"></i>
                                        @if(Auth::check())
                                            <div class="left-info">
                                                <span class="index wishlist-count">{{ DB::table("wishlists")->get()->sum('product_qty') }} items</span>
                                                <span class="title">Wishlist</span>
                                            </div>
                                        @else
                                            <div class="left-info">
                                                <span class="index wishlist-count">0 items</span>
                                                <span class="title">Wishlist</span>
                                            </div>
                                        @endif
                                    </a>
                                </div>
                                <div class="wrap-icon-section minicart">
                                    <a href="/cart" class="link-direction">
                                        <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                                        @if(Auth::check())
                                            <div class="left-info">
                                                <span class="index cart-count">{{ DB::table("cart_products")->get()->sum('product_qty') }} items</span>
                                                <span class="title">CART</span>
                                            </div>
                                        @else
                                            <div class="left-info">
                                                <span class="index cart-count">0 items</span>
                                                <span class="title">CART</span>
                                            </div>
                                        @endif
                                    </a>
                                </div>
                                <div class="wrap-icon-section show-up-after-1024">
                                    <a href="#" class="mobile-navigation">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="nav-section header-sticky">
                        <div class="header-nav-section">
                            <div class="container">
                                <ul class="nav menu-nav clone-main-menu" id="mercado_haead_menu" data-menuname="Sale Info" >
                                    <li class="menu-item"><a href="#" class="link-term">Weekly Featured</a><span class="nav-label hot-label">hot</span></li>
                                    <li class="menu-item"><a href="#" class="link-term">Hot Sale items</a><span class="nav-label hot-label">hot</span></li>
                                    <li class="menu-item"><a href="#" class="link-term">Top new items</a><span class="nav-label hot-label">hot</span></li>
                                    <li class="menu-item"><a href="#" class="link-term">Top Selling</a><span class="nav-label hot-label">hot</span></li>
                                    <li class="menu-item"><a href="#" class="link-term">Top rated items</a><span class="nav-label hot-label">hot</span></li>
                                </ul>
                            </div>
                        </div>

                        <div class="primary-nav-section">
                            <div class="container">
                                <ul class="nav primary clone-main-menu" id="mercado_main" data-menuname="Main menu" >
                                    <li class="menu-item home-icon">
                                        <a href="/" class="link-term mercado-item-title"><i class="fa fa-home" aria-hidden="true"></i></a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="/about-us" class="link-term mercado-item-title">About Us</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="/shop" class="link-term mercado-item-title">Shop</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="/cart" class="link-term mercado-item-title">Cart</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="/contact-us" class="link-term mercado-item-title">Contact Us</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        @include('layouts.flashMessage')
    </body>
</html>


