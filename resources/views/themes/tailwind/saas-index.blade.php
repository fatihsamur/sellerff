<div
    class="items-center flex flex-col justify-between lg:flex-row md:px-12 lg:px-20 p-4 dark:bg-gray-800 transition duration-500">
    <div class="text-container pl-10  md:mt-10 md:w-1/2">
        <div class="text-center flex flex-col lg:flex-row items-center pt-16">
            @include('theme::svg.main-logo')
        </div>
        <h1 class="text-4xl md:text-4xl text-black font-bold dark:text-white tracking-normal leading-10 mt-2"><span
                class="text-wave-500">Çok Yönlü ve Stratejik </span>Ara Depo ile Ticaretinizi Hızlandırın</h1>

        <h2 class="text-gray-700 text-xl font-light dark:text-white mt-8">
            SellerFullfilment size dünyaya açılabilmeniz için gerekli olan tüm hizmetleri sağlayıp; işletmenizi
            büyütebilmenize yardımcı olacaktır.
        </h2>



        <div
            class="buttons-container flex justify-center md:justify-start space-x-2 md:space-x-4 text-white dark:text-white my-12">
            <a href="{{url('pricing')}}"
                class="font-semibold rounded-md text-lg md:text-base bg-wave-500 px-4 py-2 md:px-8 md:py-4 cursor-pointer transform transition duration-200 hover:shadow-xl hover:-translate-y-1">
                <span class="hidden lg:inline-block">Browse</span> Fiyatlarımız </a>

            <a
               href="{{url('register')}}" class=" ml-3 font-semibold rounded-md text-lg md:text-base bg-red-500 px-4 py-2 md:px-8 md:py-4 cursor-pointer transform transition duration-200 hover:shadow-xl hover:-translate-y-1">
                <span class="hidden lg:inline-block">Access</span> Şimdi Başla </a>
        </div>
    </div>

    <div class="hidden lg:block ml-6 mr-6 image-container ml-10 md:w-1/2 md:mt-10 md:-mr-20">
        <img class=" rounded-lg mt-12" src="{{ asset('themes/' . $theme->folder . '/images/saas-images/hero.jpg') }}"
            alt="">
    </div>
</div>

<!-- Hero Area End -->

<!-- Services Section Start -->
<section id="services" class="py-24">
    <div class="container">
        <div class="text-center">
            <h2 class="mb-12 section-heading wow fadeInDown" data-wow-delay="0.3s">Servislerimiz</h2>
        </div>
        <div class="flex flex-wrap">
            <!-- Services item -->
            <div class="w-full sm:w-1/2 md:w-1/2 lg:w-1/3">
                <div class="m-4 wow fadeInRight" data-wow-delay="0.3s">
                    <div class="icon text-5xl">
                        <i class="lni lni-cog"></i>
                    </div>
                    <div>
                        <h3 class="service-title">FBA</h3>
                        <p class="text-gray-600">Sağladığımız web tabanlı kolay ara yüz ile saniyeler içerisinde ASIN
                            numaraları ile FBA gönderi teklifinizi alın ve siparişinizi oluşturun, siparişinizin
                            durumunu kolay ara yüzümüz ile kolayca görebilir, kontrol edebilir ve takibini
                            gerçekleştirebilirsiniz.</p>
                    </div>
                </div>
            </div>
            <!-- Services item -->
            <div class="w-full sm:w-1/2 md:w-1/2 lg:w-1/3">
                <div class="m-4 wow fadeInRight" data-wow-delay="0.6s">
                    <div class="icon text-5xl">
                        <i class="lni lni-bar-chart"></i>
                    </div>
                    <div>
                        <h3 class="service-title">Retail Arbitrage FBA</h3>

                        <p class="text-gray-600">Sellerfulfilment ile FBA'de sadece amazon.com'dan değil, dilediğiniz
                            yerden ürün göndererek FBA koli oluşturabilirsiniz!</p>
                    </div>
                </div>
            </div>
            <!-- Services item -->
            <div class="w-full sm:w-1/2 md:w-1/2 lg:w-1/3">
                <div class="m-4 wow fadeInRight" data-wow-delay="0.9s">
                    <div class="icon text-5xl">
                        <i class="lni lni-briefcase"></i>
                    </div>
                    <div>
                        <h3 class="service-title">Kolay Kayıt</h3>
                        <p class="text-gray-600">Sellerfulfilment FBA hizmetleriyle Amazon'da hemen satışa
                            başlayabilir. Hemen siparişini oluşturabilir ve FBA olarak gönderi planlayabilirsiniz. Kayıt
                            için herhangi bir üyelik ücreti ödemenize gerek yoktur</p>
                    </div>
                </div>
            </div>
            <!-- Services item -->
            <div class="w-full sm:w-1/2 md:w-1/2 lg:w-1/3">
                <div class="m-4 wow fadeInRight" data-wow-delay="1.2s">
                    <div class="icon text-5xl">
                        <i class="lni lni-pencil-alt"></i>
                    </div>
                    <div>
                        <h3 class="service-title">Payoneer İle Ödeme Imkanı</h3>
                        <p class="text-gray-600">Sellerfulfilment ile yapacağınız FBA gönderimlerinizin ödemelerin
                            Payoneer kullanabilirsiniz. Alternatif ödeme yöntemleride mevcuttur. Transferwise ve Banka
                            ödemesi. </p>
                    </div>
                </div>
            </div>
            <!-- Services item -->
            <div class="w-full sm:w-1/2 md:w-1/2 lg:w-1/3">
                <div class="m-4 wow fadeInRight" data-wow-delay="1.5s">
                    <div class="icon text-5xl">
                        <i class="lni lni-mobile"></i>
                    </div>
                    <div>
                        <h3 class="service-title">İş Takibi Kolaylığı</h3>
                        <p class="text-gray-600">Siparişlerinizin her aşamasını online yazılımımız sayesinde
                            siparişinizdeki envanterinizi takip edebilirsiniz. FBA ürün göndermek hiç bu kadar kolay
                            olmamıştı.</p>
                    </div>
                </div>
            </div>
            <!-- Services item -->
            <div class="w-full sm:w-1/2 md:w-1/2 lg:w-1/3">
                <div class="m-4 wow fadeInRight" data-wow-delay="1.8s">
                    <div class="icon text-5xl">
                        <i class="lni lni-layers"></i>
                    </div>
                    <div>
                        <h3 class="service-title">Dropshipping</h3>
                        <p class="text-gray-600">Sellerfulfilment ile Dropshipping siparişlerini yerine
                            getirebilirsiniz. Dropshipping gönderilerde sadece hızlı kargo hizmetimiz vardır. </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Services Section End -->


<!-- Feature Section Start -->
<div id="feature" class="bg-blue-100 py-24">
    <div class="container">
        <div class="flex flex-wrap items-center">
            <div class="w-full lg:w-1/2">
                <div class="mb-5 lg:mb-0">
                    <h2 class="mb-12 section-heading wow fadeInDown text-4xl" data-wow-delay="0.3s">Hakkımızda</h2>

                    <div class="flex flex-wrap">

                        <div class="w-full ">
                            <div class="m-3">

                                <div class="features-content">
                                    <h4 class="feature-title text-2xl">Amerika'daki Ara Deponuz</h4>
                                    <p class="text-xl">
                                        Sellerfulfilment 1.000 m2 kapalı depo hacmi ile 2020 yılından bu yana Amazon FBA
                                        ve ara depo hizmeti vermektedir. </p>

                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            <div class="w-full lg:w-1/2">
                <div class="mx-3 lg:mr-0 lg:ml-3 wow fadeInRight" data-wow-delay="0.3s">

                    <img src="{{ asset('themes/' . $theme->folder . '/images/saas-images/feature/img-1.svg') }}"
                        alt="">

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Feature Section End -->


<!-- Clients Section Start -->
<div id="clients" class="py-16 bg-blue-100">
    <div class="container">
        <div class="text-center">
            <h2 class="mb-12 section-heading wow fadeInDown" data-wow-delay="0.3s">İş Ortakları</h2>
        </div>
        <div class="flex flex-wrap justify-center items-center">
            <div class="w-1/2 md:w-1/4 lg:w-1/4">
                <div class="m-3 wow fadeInUp" data-wow-delay="0.3s">
                    <img class=""
                        src="{{ asset('themes/' . $theme->folder . '/images/saas-images/clients/img1.png') }}" alt="">

                </div>
            </div>
            <div class="w-1/2 md:w-1/4 lg:w-1/4">
                <div class="m-3 wow fadeInUp" data-wow-delay="0.6s">
                    <img class=""
                        src="{{ asset('themes/' . $theme->folder . '/images/saas-images/clients/img2.png') }}" alt="">

                </div>
            </div>
            <div class="w-1/2 md:w-1/4 lg:w-1/4">
                <div class="m-3 wow fadeInUp" data-wow-delay="0.9s">
                    <img class=""
                        src="{{ asset('themes/' . $theme->folder . '/images/saas-images/clients/img4.png') }}" alt="">

                </div>
            </div>
            <div class="w-1/2 md:w-1/4 lg:w-1/4">
                <div class="m-3 wow fadeInUp" data-wow-delay="1.2s">
                    <img class=""
                        src="{{ asset('themes/' . $theme->folder . '/images/saas-images/clients/img3.png') }}" alt="">

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Clients Section End -->

<!-- Testimonial Section Start -->
<section id="testimonial" class="py-24 bg-gray-800">
    <div class="container">
        <div class="flex justify-center mx-3">
            <div class="w-full lg:w-7/12">
                <div id="testimonials" class="testimonials">
                    <!-- testimonial item start -->
                    <div class="item focus:outline-none">
                        <div class="text-center py-10 px-8 md:px-10 rounded border border-gray-900">
                            <div class="text-center">


                            </div>
                            <div class="mx-auto w-24 h-24 shadow-md rounded-full bg-white flex items-center ">
                                <img class="rounded-full w-full" src="{{ asset('logos/seller_logo.png') }}" alt="">

                            </div>
                            <div class="mb-2">
                                <h2 class="font-bold text-lg uppercase text-blue-600 mb-2">BRK EXPRESS LLC</h2>
                                <h3 class="font-medium text-white text-sm">5659 W TAYLOR ST CHICAGO,IL 60644</h3>
                                <h3 class="font-medium text-white text-sm mt-2">TELEFON : +17862385215</h3>
                                <h3 class="font-medium text-white text-sm mt-2">DETAYLI BİLGİ :
                                    info@sellerfulfilment.com</h3>
                            </div>
                        </div>
                    </div>
                    <!-- testimonial item end -->


                </div>
            </div>
        </div>
    </div>
</section>
<!-- Testimonial Section End -->

<!-- Pricing section Start -->
<section id="pricing" class="py-24">

    @include('theme::partials.plans')

</section>
<!-- Pricing Table Section End -->


<!-- Contact Section Start -->
<section id="contact" class="py-24">
    <div class="container">
        <div class="text-center">
            <h2 class="mb-12 text-4xl text-gray-700 font-bold tracking-wide wow fadeInDown" data-wow-delay="0.3s">
                İletişim</h2>
        </div>

        <div class="flex flex-wrap contact-form-area wow fadeInUp" data-wow-delay="0.4s">
                @livewire('contact')
            <div class="w-full md:w-1/2">
                <div class="ml-3 md:ml-12 wow fadeIn">
                    <h2 class="uppercase font-bold text-xl text-gray-700 mb-5">Bize Ulaşın</h2>
                    <div>
                        <div class="flex flex-wrap mb-6 items-center">
                            <div class="contact-icon">
                                <i class="lni lni-map-marker"></i>
                            </div>
                            <p class="pl-3">
                              5659 W TAYLOR ST CHICAGO, IL 60644
                            </p>
                        </div>
                        <div class="flex flex-wrap mb-6 items-center">
                            <div class="contact-icon">
                                <i class="lni lni-envelope"></i>
                            </div>
                            <p class="pl-3">
                                <a href="#" class="block">info@sellerfulfilment.com</a>
                                <a href="#" class="block">support@sellerfulfilment.com</a>
                            </p>
                        </div>
                        <div class="flex flex-wrap mb-6 items-center">
                            <div class="contact-icon">
                                <i class="lni lni-phone-set"></i>
                            </div>
                            <p class="pl-3">
                                <a class="lock">+1 7862385215</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact Section End -->
