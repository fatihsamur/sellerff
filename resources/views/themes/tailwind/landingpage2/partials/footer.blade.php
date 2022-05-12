
    <section class="appie-footer-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="footer-about-widget">
                        <div class="logo">
                            <img src="{{ asset('themes/' . $theme->folder . '/images/landing/logo/logo.svg') }}"
                                alt="logo" class="header-logo w-full" style="width: 8rem" />
                        </div>
                        <p>
                            Sellerfulfilment Amazonda ve birçok platformda satış,dropshipping,fba gibi modelleri
                            uygulayabilmeniz için hazırlanmıştır.
                        </p>
                        <a href="#">Devamını Oku<i class="fal fa-arrow-right"></i></a>

                    </div>
                </div>
                <div class="col-lg-2 col-md-6">
                    <div class="footer-navigation">
                        <h4 class="title">Sayfalar</h4>
                        <ul>
                            <li><a href="{{ url('/') }}">Anasayfa</a></li>
                            <li><a href="{{ url('/pricing') }}">Fiyatlar</a></li>
                            {{-- <li><a href="{{url('/blog')}}">Blog</a></li> --}}
                            <li><a href="{{ url('/contact-us') }}">Bize Ulaşın</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-navigation">
                        <h4 class="title">Destek</h4>
                        <ul>
                            <li><a href="{{ url('privacy-policy') }}">Gizlilik Politikası</a></li>
                            <li><a href="{{ url('terms-and-conditions') }}">Hizmet Şartları ve Koşullar</a></li>
                            <li><a href="{{ url('faq') }}">Sıkça Sorulan Sorular</a></li>
                            @if (!Auth::user())
                                <li><a href="{{ url('/login') }}">Giriş Yap</a></li>
                                <li><a href="{{ url('/register') }}">Hemen Kaydol</a></li>
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget-info">
                        <h4 class="title">İletişimde Kalın</h4>
                        <ul>
                            <li><a href="#"><i class="fal fa-envelope"></i> support@sellerfulfilment.com</a></li>
                            <li><a href="#"><i class="fal fa-phone"></i> +(1) 7862385215</a></li>
                            <li><a href="#"><i class="fal fa-map-marker-alt"></i>
                                    5659 W Taylor St. Chicago, Illinois 60644 United States</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer-copyright d-flex align-items-center justify-content-between pt-35">
                        <div class="apps-download-btn">
                            <ul>
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
                        <div class="copyright-text">
                            <p>Copyright © 2021 Sellerfulfilment. Tüm hakları saklıdır.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
