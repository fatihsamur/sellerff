
    <div class="off_canvars_overlay">

    </div>
    <div class="offcanvas_menu">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="offcanvas_menu_wrapper">
                        <div class="canvas_close">
                            <a href="javascript:void(0)"><i class="fa fa-times"></i></a>
                        </div>

                        <div id="menu" class="text-left ">
                            <ul class="offcanvas_main_menu">
                                <li class="menu-item-has-children active">
                                    <a href="{{ url('/') }}">Anasayfa</a>
                                </li>
                                <li class="menu-item-has-children active">
                                    <a href="{{ url('/pricing') }}">Fiyatlandırma</a>
                                </li>
                                <li class="menu-item-has-children active">
                                    <a href="{{ url('/about') }}">Hakkımızda</a>
                                </li>
                                <li class="menu-item-has-children active">
                                    <a href="{{ url('/contact-us') }}">Bize Ulaşın</a>
                                </li>
                                @if (!Auth::user())
                                    <li class="menu-item-has-children active">
                                        <a href="{{ url('/login') }}">
                                            Giriş Yap
                                        </a>
                                    </li>
                                @endif
                                @if (!Auth::user())
                                    <li class="menu-item-has-children active">
                                        <a href="{{ url('/') }}">Hemen Kaydol</a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                        <div class="offcanvas-social">
                            <ul class="text-center">
                                <li><a href="https://facebook.com/pages/sellerfulfilment"><i
                                            class="fab fa-facebook-f"></i></a></li>
                                <li><a href="https://twitter.com/sellerfulfilment"><i class="fab fa-twitter"></i></a>
                                </li>
                                <li><a href="https://instagram.com/sellerfulfilment"><i
                                            class="fab fa-instagram"></i></a></li>
                                <li><a href="https://www.youtube.com/channel/UCQHDNwIxXqZCbmRnAD02ZdA"><i
                                            class="fab fa-youtube"></i></a></li>
                            </ul>
                        </div>
                        <div class="footer-widget-info">
                            <ul>
                                <li><a href="#"><i class="fal fa-envelope"></i> support@sellerfulfilment.com</a></li>
                                <li><a href="#"><i class="fal fa-phone"></i> +1 7862385215</a></li>
                                <li><a href="#"><i class="fal fa-map-marker-alt"></i>5659 W Taylor St. Chicago, Illinois
                                        60644 United States</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <header class="appie-header-area ">
        <div class="container">
            <div class="header-nav-box">
                <div class="row align-items-center">
                    <div class="col-lg-2 col-md-4 col-sm-5 col-6 order-1 order-sm-1">
                        <div class="appie-logo-box">
                            <a href="{{ url('/') }}">
                                @if (Route::is('wave.home') || Route::is('wave.pricing'))
                                    <img src="{{ asset('themes/' . $theme->folder . '/images/landing/logo/logo.svg') }}"
                                        alt="logo" class="header-logo w-full" style="width: 8rem" />
                                @else
                                    <img src="{{ asset('themes/' . $theme->folder . '/images/landing/logo/logo-white.svg') }}"
                                        alt="logo" class="header-logo w-full" style="width: 8rem" />
                                @endif
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-1 col-sm-1 order-3 order-sm-2">
                        <div class="appie-header-main-menu">
                            <ul>
                                <li>
                                    <a href="{{ url('/') }}">Anasayfa</a>
                                </li>
                                <li>
                                    <a href="{{ url('/pricing') }}">Fiyatlandırma</a>
                                </li>
                                <li><a href="{{ url('/contact-us') }}">Bize Ulaşın</a></li>
                                <li><a href="{{ url('/about') }}">Hakkımızda</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4  col-md-7 col-sm-6 col-6 order-2 order-sm-3">
                        <div class="appie-btn-box text-right">
                            <a class="login-btn" href="{{ url('/login') }}"><i class="fal fa-user"></i>
                                @if (Auth::user())
                                    {{ Auth::user()->name }}
                                @else
                                    Giriş Yap
                                @endif
                            </a>
                            @if (!Auth::user())
                                <a class="main-btn ml-30" href="{{ url('/register') }}">✨ Hemen Kaydol</a>
                            @endif
                            @if (Auth::user())
                                <a class="main-btn ml-30" href="{{ url('/logout') }}">Çıkış Yap</a>
                            @endif
                            <div class="toggle-btn ml-30 canvas_open d-lg-none d-block">
                                <i class="fa fa-bars"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
