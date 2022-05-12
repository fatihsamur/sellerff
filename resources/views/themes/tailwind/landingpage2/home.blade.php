@extends('theme::landingpage2.layout')


@section('content')
    <section class="appie-hero-area">
        <div class="container">
            <div class="row align-items-center" style="min-height:616px;">
                <div class="col-lg-6">
                    <div class="appie-hero-content">
                        <span>Sellerfulfilment'a Hoşgeldiniz</span>
                        <h1 class="appie-title">Çok Yönlü ve Stratejik Ara Deponuz</h1>
                        <p>Amazon'da satışa başlamak ve işinizi büyütmek için ihtiyacınız olan tüm araçlar bir arada. İster
                            acemi olun ister uzman, Sellerfulfilment, yetenekleriyle işlerinizi her zamankinden daha kolay
                            hale getirir.

                        </p>
                        <ul>
                            <li><a href="{{ url('/pricing') }}"><i class="fas fa-money-bill"></i> Planlar ve Ücretler</a>
                            </li>
                            <li><a class="item-2" href="{{ url('/register') }}">✨ Hemen Başlayalım</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="appie-hero-thumb d-none d-md-block ">
                        <div class="thumb wow animated fadeInUp" data-wow-duration="2000ms" data-wow-delay="200ms">
                            <div id="video" class="basic-2">
                                <div class="image-container">
                                    <div class="video-wrapper">
                                        <a class="popup-youtube"
                                            href="https://www.youtube.com/watch?v=sak0LKEVdDA&ab_channel=SellerFulfilment"
                                            data-effect="fadeIn">
                                            <img class="mx-auto max-w-full rounded-t-xl rounded-tr-xl"
                                                src="{{ asset('themes/' . $theme->folder . '/images/landing/hero/thumbnail.jpg') }}"
                                                alt="alternative">

                                            <span class="video-play-button">
                                                <span></span>
                                            </span>
                                        </a>
                                    </div> <!-- end of video-wrapper -->
                                </div> <!-- end of image-container -->
                                <!-- end of video preview -->

                            </div>
                        </div>
                    </div>
                    <div id="video" class="basic-2 d-block d-md-none">
                        <div class="image-container">
                            <div class="video-wrapper">
                                <a class="popup-youtube"
                                    href="https://www.youtube.com/watch?v=sak0LKEVdDA&ab_channel=SellerFulfilment"
                                    data-effect="fadeIn">
                                    <img class="mx-auto max-w-full rounded-t-xl rounded-tr-xl"
                                        src="{{ asset('themes/' . $theme->folder . '/images/landing/hero/thumbnail.jpg') }}"
                                        alt="alternative">

                                    <span class="video-play-button">
                                        <span></span>
                                    </span>
                                </a>
                            </div> <!-- end of video-wrapper -->
                        </div> <!-- end of image-container -->
                        <!-- end of video preview -->

                    </div>
                </div>
            </div>
        </div>
        <div class="hero-shape-1">
            <img src="{{ asset('themes/' . $theme->folder . '/landing/images/shape/shape-2.png') }}" alt="">
        </div>
        <div class="hero-shape-2">
            <img src="{{ asset('themes/' . $theme->folder . '/landing/images/shape/shape-3.png') }}" alt="">
        </div>
        <div class="hero-shape-3">
            <img src="{{ asset('themes/' . $theme->folder . '/landing/images/shape/shape-4.png') }}" alt="">
        </div>
    </section>


    <section class="appie-service-area pt-90 pb-100" id="service">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="appie-section-title text-center">
                        <h3 class="appie-title">Tüm ihtiyaçlarınızı <br>Kapsayacak şekilde tasarlandı.</h3>
                        <p>Amazon öncelikli olacak şekilde çeşitli marketlerde eticaret ihtiyaçlarınızı her yönüyle
                            kapsayacak.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="appie-single-service text-center mt-30 wow animated fadeInUp" data-wow-duration="2000ms"
                        data-wow-delay="200ms">
                        <div class="icon">
                            <img src="{{ asset('themes/' . $theme->folder . '/images/landing/about/amazon-icon.svg') }}"
                                alt="" style="width:3rem ">

                        </div>
                        <h4 class="appie-title">Amazon FBA</h4>
                        <p>Sağladığımız web tabanlı kolay ara yüz ile FBA gönderi teklifi alabilir, siparişinizi
                            oluşturabilir, siparişinizin durumunu kolay ara yüzümüz ile görebilir ve takibini
                            gerçekleştirebilirsiniz.

                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="appie-single-service text-center mt-30 item-2 wow animated fadeInUp"
                        data-wow-duration="2000ms" data-wow-delay="400ms">
                        <div class="icon">
                            <img src="{{ asset('themes/' . $theme->folder . '/landing/images/arbitrage.svg') }}" alt=""
                                style="width:3rem ">

                        </div>
                        <h4 class="appie-title">Retail Arbitrage</h4>
                        <p>Sellerfulfilment ile FBA'de sadece amazon.com'dan değil, dilediğiniz yerden ürün göndererek FBA
                            koli oluşturabilirsiniz!
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="appie-single-service text-center mt-30 item-3 wow animated fadeInUp"
                        data-wow-duration="2000ms" data-wow-delay="600ms">
                        <div class="icon">
                            <img src="{{ asset('themes/' . $theme->folder . '/images/landing/about/user-avatar.svg') }}"
                                alt="">
                        </div>
                        <h4 class="appie-title">Kolay Kayıt</h4>
                        <p>Sellerfulfilment FBA hizmetleriyle Amazon'da hemen satışa başlayabilir siparişini oluşturabilir
                            ve gönderi planlayabilirsiniz. Kayıt için herhangi bir üyelik ücreti ödemenize gerek yoktur</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="appie-single-service text-center mt-30 item-4 wow animated fadeInUp"
                        data-wow-duration="2000ms" data-wow-delay="800ms">
                        <div class="icon">
                            <img src="{{ asset('themes/' . $theme->folder . '/landing/images/icon/4.png') }}" alt="">
                        </div>
                        <h4 class="appie-title">Destek</h4>
                        <p>7/24 Aktif bir şekilde canlı destek üzerinden temsilcilerimizle görüşebilir veya destek talebi
                            bölümünden destek talebi oluşturabilirsiniz.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section class="appie-features-area pt-100" id="features">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3">
                    <div class="appie-features-tabs-btn">
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home"
                                role="tab" aria-controls="v-pills-home" aria-selected="true"><i class="fas fa-sync"></i>
                                Senkron</a>
                            <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile"
                                role="tab" aria-controls="v-pills-profile" aria-selected="false"><i
                                    class="fas fa-rocket"></i>Hızlı</a>
                            <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages"
                                role="tab" aria-controls="v-pills-messages" aria-selected="false"><i
                                    class="fa fa-dollar-sign"></i> Hesaplı</a>
                            <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings"
                                role="tab" aria-controls="v-pills-settings" aria-selected="false"><i
                                    class="fas fa-bullseye-arrow"></i>Uyumlu</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                            aria-labelledby="v-pills-home-tab">
                            <div class="row align-items-center">
                                <div class="col-lg-6">
                                    <div class="appie-features-thumb text-center wow animated fadeInUp"
                                        data-wow-duration="2000ms" data-wow-delay="200ms">
                                        <img class="wow animated fadeInRight" data-wow-duration="2000ms"
                                            data-wow-delay="200ms"
                                            src="{{ asset('themes/' . $theme->folder . '/landing/images/sync.png') }}"
                                            alt="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="appie-features-content wow animated fadeInRight" data-wow-duration="2000ms"
                                        data-wow-delay="600ms">
                                        <span>Senkron</span>
                                        <h3 class="title">Bırakın <br> Biz yapalım</h3>
                                        <p>Amazon ve Sellerfulfilment hesaplarınızı birbirine bağlayabilir daha kolay bir
                                            Fba ve Dropshipping deneyimi elde edebilirsiniz.</p>
                                        <a class="main-btn" href="#">Devamını Oku</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                            aria-labelledby="v-pills-profile-tab">
                            <div class="row align-items-center">
                                <div class="col-lg-6">
                                    <div class="appie-features-thumb text-center animated fadeInUp"
                                        data-wow-duration="2000ms" data-wow-delay="200ms">
                                        <img class="wow animated fadeInRight" data-wow-duration="2000ms"
                                            data-wow-delay="200ms"
                                            src="{{ asset('themes/' . $theme->folder . '/landing/images/fast.jpg') }}"
                                            alt="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="appie-features-content animated fadeInRight" data-wow-duration="2000ms"
                                        data-wow-delay="600ms">
                                        <span>Hızlı</span>
                                        <h3 class="title">Teslimatlarınızı <br>Düşünmeyin</h3>
                                        <p>Teslimatlarınızı anlaşmalı kargo firmalarımızla en hızlı şekilde teslim edelim.
                                        </p>
                                        <a class="main-btn" href="#">Devamını Oku</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-messages" role="tabpanel"
                            aria-labelledby="v-pills-messages-tab">
                            <div class="row align-items-center">
                                <div class="col-lg-6">
                                    <div class="appie-features-thumb text-center animated fadeInUp"
                                        data-wow-duration="2000ms" data-wow-delay="200ms">
                                        <img class="wow animated fadeInRight" data-wow-duration="2000ms"
                                            data-wow-delay="200ms"
                                            src="{{ asset('themes/' . $theme->folder . '/landing/images/cheap.png') }}"
                                            alt="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="appie-features-content animated fadeInRight" data-wow-duration="2000ms"
                                        data-wow-delay="600ms">
                                        <span>Hesaplı</span>
                                        <h3 class="title">Geniş<br> Kargo Anlaşması</h3>
                                        <p>Geniş kargo ağı ve anlaşmalarımızla en ucuz Fba ve Dropshipping ücret tarifesini
                                            sunuyoruz.</p>
                                        <a class="main-btn" href="#">Devamını Oku</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-settings" role="tabpanel"
                            aria-labelledby="v-pills-settings-tab">
                            <div class="row align-items-center">
                                <div class="col-lg-6">
                                    <div class="appie-features-thumb text-center animated fadeInUp"
                                        data-wow-duration="2000ms" data-wow-delay="200ms">
                                        <img src="{{ asset('themes/' . $theme->folder . '/landing/images/mobile.png') }}"
                                            alt="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="appie-features-content animated fadeInRight" data-wow-duration="2000ms"
                                        data-wow-delay="600ms">
                                        <span>Uyumlu</span>
                                        <h3 class="title">Tüm <br>Cihazlarla Uyumlu</h3>
                                        <p>Yazılımımız sayesinde mobil,masaüstü laptop farketmeksizin işlemlerinizi
                                            istediğiniz cihazınızdan kolayca yapabilirsiniz.</p>
                                        <a class="main-btn" href="#">Devamını Oku</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="features-shape-1">
            <img src="{{ asset('themes/' . $theme->folder . '/landing/images/shape/shape-6.png') }}" alt="">
        </div>
        <div class="features-shape-2">
            <img src="{{ asset('themes/' . $theme->folder . '/landing/images/shape/shape-7.png') }}" alt="">
        </div>
        <div class="features-shape-3">
            <img src="{{ asset('themes/' . $theme->folder . '/landing/images/shape/shape-8.png') }}" alt="">
        </div>
    </section>


    <section class="appie-traffic-area pt-140 pb-180">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="appie-traffic-title">
                        <span>En iyi çözüm</span>
                        <h3 class="title">Kullanımı Kolay Web Arayüzü</h3>

                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="appie-traffic-service mb-30">
                                <div class="icon">
                                    <i class="fal fa-check"></i>
                                </div>
                                <h5 class="title">Otomatik Asin Bilgisi</h5>
                                <p>Asin bilgisini sağladığınız ürünün tüm bilgilerini otomatik getirir.</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="appie-traffic-service item-2 mb-30">
                                <div class="icon">
                                    <i class="fal fa-check"></i>
                                </div>
                                <h5 class="title">Kutu Yerleşim Planı Oluşturma</h5>
                                <p>Girmiş olduğunuz ürün bilgilerine göre otomatik olarak kutu yerleşim planı oluşturulur.
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="appie-traffic-service item-3">
                                <div class="icon">
                                    <i class="fal fa-check"></i>
                                </div>
                                <h5 class="title">Mobil Uyumlu</h5>
                                <p>Tüm cihazlarınızdan güvenle ve kolayca kullanabilirsiniz.</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="appie-traffic-service item-4">
                                <div class="icon">
                                    <i class="fal fa-check"></i>
                                </div>
                                <h5 class="title">Aktif Düzenleme</h5>
                                <p>Gelişmiş arayüz sayesinde siparişlerinizi daha sonradan düzenleyebilir ve otomatik olarak
                                    Amazon hesabınıza senkronlayabiliriz.</p>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="traffic-btn mt-50">
                                <a class="main-btn" href="#">Devamını Oku <i class="fal fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="traffic-thumb ">
            <img class="wow animated fadeInRight" data-wow-duration="2000ms" data-wow-delay="200ms"
                src="{{ asset('themes/' . $theme->folder . '/landing/images/perspective5.png') }}" alt="">
        </div>
    </section>


    <section class="appie-about-3-area pt-100 pb-100" id="features">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="appie-about-thumb-3 wow animated fadeInLeft" data-wow-duration="2000ms"
                        data-wow-delay="400ms">
                        <img src="{{ asset('themes/' . $theme->folder . '/landing/images/pay.png') }}" alt="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="appie-traffic-title">
                        <h3 class="title">Esnek Ödeme Yöntemleri</h3>
                        <p>Birçok ödeme yöntemiyle kolay,güvenli ve hızlı bir şekilde hesabınıza bakiye yükleyip gönderi
                            veya wholesale ürün alımlarınızda kullanabilirsiniz.
                        </p>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="appie-traffic-service mb-30">
                                <div class="icon">
                                    <img src="{{ asset('themes/' . $theme->folder . '/landing/images/shield.png') }}"
                                        alt="">
                                </div>
                                <h5 class="title">Güvenli</h5>
                                <p>Sitemiz 256 bitlik SSL teknolojisiyle korunmaktadır ve hiçbir kart bilgisi kayıt
                                    edilmeden kullanılmaktadır.</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="appie-traffic-service item-2 mb-30">
                                <div class="icon">
                                    <img src="{{ asset('themes/' . $theme->folder . '/landing/images/payoneer-logo.png') }}"
                                        alt="">
                                </div>
                                <h5 class="title">Çeşitli</h5>
                                <p>Payoneer,Banka Transferi,Kredi Kartı gibi birçok ödeme metodunu kullanarak hesabınıza
                                    yükleme yapabilirsiniz.</p>
                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="appie-about-3-area pt-100 pb-160" id="features">
        <div class="container">
            <div class="row align-items-center mt-100  flex-column-reverse flex-lg-row">
                <div class="col-lg-6">
                    <div class="appie-traffic-title">
                        <h3 class="title">Uygun Shipping Fiyatları</h3>
                        <p>Sahip olduğumuz geniş kargo anlaşma ağıyla en uygun fiyat prep ve shipping ücretlerini
                            sağlıyoruz.</p>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="appie-traffic-service mb-30 item-3">
                                <div class="icon">
                                    <img src="{{ asset('themes/' . $theme->folder . '/landing/images/fedex.png') }}">
                                </div>
                                <h5 class="title">Fedex</h5>
                                <p>Mucker plastered bugger all mate morish are.</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="appie-traffic-service item-2 mb-30 item-4">
                                <div class="icon">
                                    <img src="{{ asset('themes/' . $theme->folder . '/landing/images/ups.png') }}">
                                </div>
                                <h5 class="title">Ups</h5>
                                <p>Mucker plastered bugger all mate morish are.</p>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="traffic-btn mt-50">
                                <a class="main-btn" href="#">Devamını Oku<i class="fal fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="appie-about-thumb-3 text-right wow animated fadeInRight" data-wow-duration="2000ms"
                        data-wow-delay="400ms">
                        <img src="{{ asset('themes/' . $theme->folder . '/landing/images/shipping.png') }}">
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="appie-testimonial-area pt-100 pb-160" id="testimonial">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="appie-testimonial-slider">
                        <div class="appie-testimonial-item text-center">
                            <div class="author-info">
                                <h5 class="title">Hasan Sancak</h5>
                            </div>
                            <div class="text">
                                <p>Güzel bir hizmet destek ekibi hızlı bir şekilde yanıt veriyor</p>
                                <ul>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                </ul>
                            </div>
                        </div>
                        <div class="appie-testimonial-item text-center">
                            <div class="author-info">
                                <h5 class="title">Aziz Pazır</h5>
                            </div>
                            <div class="text">
                                <p>Kanada gönderilerim için kullanıyorum fiyat ve hizmet olarak birçok firmadan daha
                                    avantajlı olduğunu düşünüyorum.</p>
                                <ul>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                </ul>
                            </div>
                        </div>
                        <div class="appie-testimonial-item text-center">
                            <div class="author-info">
                                <h5 class="title">Eray Göktepe</h5>
                            </div>
                            <div class="text">
                                <p>Prime ve Vip üyeyim gayet memnunum.</p>
                                <ul>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    @include('theme::landingpage2.partials.pricing')



    @livewire('subscribe')
@endsection
