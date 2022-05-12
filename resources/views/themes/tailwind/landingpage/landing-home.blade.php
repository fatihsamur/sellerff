@extends('theme::landingpage/landing-layout')

@section("content")
<!-- ====== Navbar Section Start -->
<div class="ud-header absolute top-0 left-0 z-40 flex w-full items-center bg-transparent">
  <div class="container">
    <div class="relative -mx-4 flex items-center justify-between mt-[6px]">
      <div class="w-60 max-w-full px-4">
        <a href="{{ url('/') }}" class="navbar-logo block w-full">
          <img src="{{ asset('themes/' . $theme->folder . '/images/landing/logo/logo-white.svg') }}" alt="logo" class="header-logo w-full" />
        </a>
      </div>
      <div class="flex w-full items-center justify-between px-4">
        <div>
          <button id="navbarToggler" class="absolute right-4 top-1/2 block -translate-y-1/2 rounded-lg px-3 py-[6px] ring-primary focus:ring-2 lg:hidden">
            <span class="relative my-[6px] block h-[2px] w-[30px] bg-white"></span>
            <span class="relative my-[6px] block h-[2px] w-[30px] bg-white"></span>
            <span class="relative my-[6px] block h-[2px] w-[30px] bg-white"></span>
          </button>
          @include('theme::landingpage.components.navbar')
        </div>
        <div class="hidden justify-end pr-16 sm:flex lg:pr-0">
          <a href="{{ url('/login') }}" class="loginBtn py-3 px-7 text-base font-medium text-white hover:opacity-70">

            Giriş
          </a>
          <a href="{{ url('/register') }}" class="signUpBtn rounded-lg bg-white bg-opacity-20 py-3 px-6 text-base font-medium text-white duration-300 ease-in-out hover:bg-opacity-100 hover:text-dark">

            Kaydol
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- ====== Navbar Section End -->

<!-- ====== Hero Section Start -->
<div id="home" class="relative overflow-hidden bg-primary pt-[120px] md:pt-[130px] lg:pt-[160px]">
  <div class="container">
    <div id="hero-video" class="-mx-4 flex flex-col items-center">
      <div class="w-full px-4">
        <div class="hero-content wow fadeInUp mx-auto max-w-[780px] text-center" data-wow-delay=".2s">
          <h1 class="mb-8 text-3xl font-bold leading-snug text-white sm:text-4xl sm:leading-snug md:text-[45px] md:leading-snug">
            Amazon'da Ticaret Kolaylaştırıldı </h1>
          <p class="mx-auto mb-10 max-w-[600px] text-base text-[#e4e4e4] sm:text-lg sm:leading-relaxed md:text-xl md:leading-relaxed">
            Amazon'da satışa başlamak ve işinizi büyütmek için ihtiyacınız olan tüm araçlar bir arada. İster acemi
            olun ister uzman,
            Sellerfulfilment, yetenekleriyle işlerinizi her zamankinden
            daha kolay hale getirir.
          </p>
          <ul class="mb-10 flex flex-wrap items-center justify-center">
            <li>
              <a href="#pricing" class="inline-flex items-center justify-center rounded-lg bg-white py-4 px-6 text-center text-base font-medium text-dark transition duration-300 ease-in-out hover:text-primary hover:shadow-lg sm:px-10">
                Planlar ve Ücretler
              </a>
            </li>
            <li>
              <a href="{{ url('/register') }}" class="flex items-center py-4 px-6 text-base font-medium text-white transition duration-300 ease-in-out hover:opacity-70 sm:px-10">

                Şimdi Başlayın
                <span class="pl-2">
                  <svg width="20" height="8" viewBox="0 0 20 8" class="fill-current">
                    <path d="M19.2188 2.90632L17.0625 0.343819C16.875 0.125069 16.5312 0.0938193 16.2812 0.281319C16.0625 0.468819 16.0312 0.812569 16.2188 1.06257L18.25 3.46882H0.9375C0.625 3.46882 0.375 3.71882 0.375 4.03132C0.375 4.34382 0.625 4.59382 0.9375 4.59382H18.25L16.2188 7.00007C16.0312 7.21882 16.0625 7.56257 16.2812 7.78132C16.375 7.87507 16.5 7.90632 16.625 7.90632C16.7812 7.90632 16.9375 7.84382 17.0312 7.71882L19.1875 5.15632C19.75 4.46882 19.75 3.53132 19.2188 2.90632Z" />
                  </svg>
                </span>
              </a>
            </li>
          </ul>



        </div>
      </div>
      <div class="w-full px-4">
        <!-- Video -->
        <div id="video" class="basic-2">

          <!-- Video Preview -->
          <div class="image-container">
            <div class="video-wrapper">
              <a class="popup-youtube" href="https://www.youtube.com/watch?v=sak0LKEVdDA&ab_channel=SellerFulfilment" data-effect="fadeIn">
                <img class="mx-auto max-w-full rounded-t-xl rounded-tr-xl" src="{{ asset('themes/' . $theme->folder . '/images/landing/hero/thumbnail.jpg') }}" alt="alternative">

                <span class="video-play-button">
                  <span></span>
                </span>
              </a>
            </div> <!-- end of video-wrapper -->
          </div> <!-- end of image-container -->
          <!-- end of video preview -->

        </div> <!-- end of basic-2 -->
        <!-- end of video -->
      </div>
    </div>
  </div>

</div>
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
  <path fill="#3056D3" fill-opacity="1" d="M0,160L80,165.3C160,171,320,181,480,170.7C640,160,800,128,960,112C1120,96,1280,96,1360,96L1440,96L1440,0L1360,0C1280,0,1120,0,960,0C800,0,640,0,480,0C320,0,160,0,80,0L0,0Z">
  </path>
</svg>
<!-- ====== Hero Section End -->


<!-- ====== Features Section Start -->
<section id="features" class="pt-20 pb-8 lg:pt-[120px] lg:pb-[70px]">
  <div class="container">
    <div class="-mx-4 flex flex-wrap">
      <div class="w-full px-4">
        <div class="mb-12 max-w-[620px] lg:mb-20">

          <h2 class="mb-4 text-3xl font-bold text-dark sm:text-4xl md:text-[42px]">
            Çok Yönlü ve Stratejik Ara Depo ile Ticaretinizi Hızlandırın
          </h2>
          <p class="text-lg leading-relaxed text-body-color sm:text-xl sm:leading-relaxed">
            SellerFullfilment size dünyaya açılabilmeniz için gerekli olan tüm hizmetleri sağlayıp; işletmenizi
            büyütebilmenize
            yardımcı olacaktır.
          </p>
        </div>
      </div>
    </div>
    <div class="-mx-4 flex flex-wrap">
      <div class="w-full px-4 md:w-1/2 lg:w-1/4">
        <div class="wow fadeInUp group mb-12 bg-white" data-wow-delay=".1s">
          <div class="relative mx-auto z-10 mb-8 flex h-[70px] w-[70px] items-center justify-center rounded-2xl bg-transparent">

            <img src="{{ asset('themes/' . $theme->folder . '/images/landing/about/amazon-icon.svg') }}" alt="">

          </div>
          <h4 class="mb-3 text-center text-xl font-bold text-dark">
            AMAZON FBA
          </h4>
          <p class="mb-8 text-center text-body-color lg:mb-11">
            Sağladığımız web tabanlı kolay ara yüz ile FBA gönderi
            teklifi alabilir,
            siparişinizi oluşturabilir, siparişinizin durumunu kolay ara yüzümüz ile görebilir ve takibini
            gerçekleştirebilirsiniz. </p>

        </div>
      </div>
      <div class="w-full px-4 md:w-1/2 lg:w-1/4">
        <div class="wow fadeInUp group mb-12 bg-white" data-wow-delay=".15s">
          <div class="relative mx-auto z-10 mb-8 flex h-[70px] w-[70px] items-center justify-center rounded-2xl bg-transparent">
            <img src="{{ asset('themes/' . $theme->folder . '/images/landing/about/ecom-icon.svg') }}" alt="">

          </div>
          <h4 class="mb-3 text-center text-xl font-bold text-dark">
            RETAIL ARBITRAGE FBA </h4>
          <p class="mb-8 text-center text-body-color lg:mb-11">
            Sellerfulfilment ile FBA'de sadece amazon.com'dan değil, dilediğiniz yerden ürün göndererek FBA koli
            oluşturabilirsiniz! </p>

        </div>
      </div>
      <div class="w-full px-4 md:w-1/2 lg:w-1/4">
        <div class="wow fadeInUp group mb-12 bg-white" data-wow-delay=".2s">
          <div class="relative mx-auto z-10 mb-8 flex h-[70px] w-[70px] items-center justify-center rounded-2xl bg-transparent">
            <img src="{{ asset('themes/' . $theme->folder . '/images/landing/about/flow-chart.svg') }}" alt="">

          </div>
          <h4 class="mb-3 text-center text-xl font-bold text-dark">
            İŞ TAKIBI KOLAYLIĞI </h4>
          <p class="mb-8 text-center text-body-color lg:mb-11">
            Siparişlerinizin her aşamasını online yazılımımız sayesinde siparişinizdeki envanterinizi takip
            edebilirsiniz. FBA ürün
            göndermek hiç bu kadar kolay olmamıştı. </p>

        </div>
      </div>
      <div class="w-full px-4 md:w-1/2 lg:w-1/4">
        <div class="wow fadeInUp group mb-12 bg-white" data-wow-delay=".25s">
          <div class="relative z-10 mx-auto mb-8 flex h-[70px] w-[70px] items-center justify-center rounded-2xl bg-transparent">
            <img src="{{ asset('themes/' . $theme->folder . '/images/landing/about/user-avatar.svg') }}" alt="">

          </div>
          <h4 class="mb-3 text-xl text-center font-bold text-dark">
            KOLAY KAYIT </h4>
          <p class="mb-8 text-body-color text-center lg:mb-11">
            Sellerfulfilment FBA hizmetleriyle Amazon'da hemen satışa başlayabilir. Hemen siparişini oluşturabilir ve
            FBA olarak
            gönderi planlayabilirsiniz. Kayıt için herhangi bir üyelik ücreti ödemenize gerek yoktur </p>

        </div>
      </div>
    </div>
  </div>
</section>
<!-- ====== Features Section End -->


<!-- ====== About Section Start -->
<section id="about" class="bg-[#f3f4fe] pt-20 pb-20 lg:pt-[120px] lg:pb-[120px]">
  <div class="container">
    <div class="wow fadeInUp bg-white" data-wow-delay=".2s">
      <div class="-mx-4 flex flex-wrap">
        <div class="w-full ">
          <div id="about-wave" class="items-center justify-between overflow-hidden border lg:flex">
            <div class="w-full py-12 px-7 sm:px-12 md:p-16 lg:max-w-[565px] lg:py-9 lg:px-16 xl:max-w-[640px] xl:p-[70px]">

              <h2 class="mb-6 text-3xl font-bold text-dark sm:text-4xl sm:leading-snug 2xl:text-[40px]">
                Amerika'daki Ara Deponuz
              </h2>
              <p class="mb-9 text-base leading-relaxed text-body-color">
                Amazon'da satış yapıyorsunuz ve ara depo ihtiyacınız mı var? O zaman Sellerfulfilment'la
                tanışmalısınız.
                Sellerfulfilment'la, Amerika ve Kanada ülkelerinde Online Arbitrage, Wholesale ve FBA gönderilerinizi
                planlayabilirsiniz. Kolay kullanılabilir web tabanlı arayüzle hemen siparişinizi
                oluşturabilir, fiyat teklifinizi alabilirsiniz. Gönderinizin durumunu her an takip edebilir ve
                işlemlerinizi gerçekleştirebilirsiniz.

              </p>
              <p class="mb-9 text-base leading-relaxed text-body-color">
                Tüm bu işlemleri sizin yerinize biz yaparken siz de kendi işinize odaklanabilir, satışlarınızı
                artırabilirsiniz.
              </p>
              <a href="https://sellerfulfilment.com/register" class="inline-flex items-center justify-center rounded bg-primary py-4 px-6 text-base font-medium text-white transition duration-300 ease-in-out hover:bg-opacity-90 hover:shadow-lg">
                Şimdi Dene
              </a>
            </div>
            <div class="p-4 rounded text-center">
              <div class="relative p-12 lg:p-16 z-10 inline-block">
                <img src="{{ asset('themes/' . $theme->folder . '/images/2225.png') }}" alt="image" class="rounded-lg mx-auto lg:ml-auto" />

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

</section>
<!-- ====== About Section End -->

<!-- ====== About-2 Section Start -->
<section id="about" class="bg-[#f3f4fe] pt-20 pb-20 lg:pt-[120px] lg:pb-[120px]">
  <div class="container">
    <div class="wow fadeInUp bg-white" data-wow-delay=".2s">
      <div class="-mx-4 flex flex-wrap">
        <div class="w-full ">
          <div id="about-wave" class="items-center justify-between overflow-hidden border lg:flex">

            <div class="p-4 rounded text-center">
              <div class="relative p-12 lg:p-16 z-10 inline-block">
                <img src="{{ asset('themes/' . $theme->folder . '/images/11111.png') }}" alt="image" class="rounded-lg mx-auto lg:ml-auto" />

              </div>
            </div>
            <div class="w-full py-12 px-7 sm:px-12 md:p-16 lg:max-w-[565px] lg:py-9 lg:px-16 xl:max-w-[640px] xl:p-[70px]">

              <h2 class="mb-6 text-3xl font-bold text-dark sm:text-4xl sm:leading-snug 2xl:text-[40px]">
                Kolay Web Arayüzü
              </h2>
              <p class="mb-9 text-base leading-relaxed text-body-color">
                Sellerfulfilment, sahip olduğu gelişmiş arayüzü sayesinde siparişlerinizi kusursuz bir şekilde
                yönetmenizi sağlar. Sağladığımız web tabanlı kolay ara yüz ile saniyeler içerisinde ASIN numaraları
                ile FBA gönderi teklifinizi alın ve
                siparişinizi oluşturun, siparişinizin durumunu kolay ara yüzümüz ile kolayca görebilir, kontrol
                edebilir ve takibini
                gerçekleştirebilirsiniz.



              </p>
              <p class="mb-9 text-base leading-relaxed text-body-color">
                Tüm bu işlemleri sizin yerinize biz yaparken siz de kendi işinize odaklanabilir, satışlarınızı
                artırabilirsiniz.
              </p>
              <a href="https://sellerfulfilment.com/register" class="inline-flex items-center justify-center rounded bg-primary py-4 px-6 text-base font-medium text-white transition duration-300 ease-in-out hover:bg-opacity-90 hover:shadow-lg">
                Şimdi Dene
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

</section>
<!-- ====== About-2 Section End -->

<!-- ====== Pricing Section Start -->
<section id="pricing" class="relative z-20 overflow-hidden bg-white pt-20 pb-12 lg:pt-[120px] lg:pb-[90px]">
  <div class="container">
    <div class="-mx-4 flex flex-wrap">
      <div class="w-full px-4">
        <div class="mx-auto mb-[60px] max-w-[620px] text-center lg:mb-20">
          <span class="mb-2 block text-lg font-semibold text-primary">
            Planlar ve Ücretler </span>
          <h2 class="mb-4 text-3xl font-bold text-dark sm:text-4xl md:text-[40px]">

            Basit ve uygun fiyatlandırma planları.
          </h2>
          <p class="text-lg leading-relaxed text-body-color sm:text-xl sm:leading-relaxed">
            Hemen şimdi kayıt olun
            Sınırlı süre geçerli fırsattan faydalanın
            SellerFulfilment'in harika özelliklerini hemen şimdi kullanmaya başlayın!
          </p>
        </div>
      </div>
    </div>

    <div class="flex flex-wrap items-center justify-center">
      <div class="w-full md:w-1/2 lg:w-1/3">
        <div class="wow fadeInUp relative z-10 mb-10 overflow-hidden rounded-xl border border-primary border-opacity-20 bg-white py-10 px-8 text-center shadow-pricing sm:p-12 lg:py-10 lg:px-6 xl:p-12" data-wow-delay=".15s
              ">
          <span class="mb-2 block text-base font-medium uppercase text-dark">
            BASIC
          </span>
          <h2 class="mb-9 text-[28px] font-semibold text-primary">
            $ 0/mo
          </h2>

          <div class="mb-10">
            <p class="mb-1 text-base font-medium leading-loose text-body-color">
              Online Teklif Alma

            </p>
            <p class="mb-1 text-base font-medium leading-loose text-body-color">
              ASIN ile Desi Hesaplama

            </p>
            <p class="mb-1 text-base font-medium leading-loose text-body-color">
              Prep Hizmeti

            </p>
            <p class="mb-1 text-base font-medium leading-loose text-body-color">
              Hızlı Gönderim

            </p>
            <p class="mb-1 text-base font-medium leading-loose text-body-color">
              Standart Fiyatlandırma

            </p>
            <p class="mb-1 text-base font-medium leading-loose text-body-color">
              Standart Üyelik
            </p>
          </div>
          <div class="w-full">
            <a href="javascript:void(0)" class="inline-block rounded-full border border-[#D4DEFF] bg-transparent py-4 px-11 text-center text-base font-medium text-primary transition duration-300 ease-in-out hover:border-primary hover:bg-primary hover:text-white">
              Hemen Başlayın
            </a>
          </div>
          <span class="absolute left-0 bottom-0 z-[-1] block h-14 w-14 rounded-tr-full bg-primary">
          </span>
        </div>
      </div>



      <div class="w-full md:w-1/2 lg:w-1/3">
        <div class="wow fadeInUp relative z-10 mb-10 overflow-hidden rounded-xl border border-primary border-opacity-20 bg-white py-10 px-8 text-center shadow-pricing sm:p-12 lg:py-10 lg:px-6 xl:p-12" data-wow-delay=".15s
              ">
          <span class="mb-2 block text-base font-medium uppercase text-dark">
            PRIME
          </span>
          <h2 class="mb-9 text-[28px] font-semibold text-primary">
            $ 19.99/mo
          </h2>

          <div class="mb-10">
            <p class="mb-1 text-base font-medium leading-loose text-body-color">
              Online Teklif Alma

            </p>
            <p class="mb-1 text-base font-medium leading-loose text-body-color">
              ASIN ile Desi Hesaplama

            </p>
            <p class="mb-1 text-base font-medium leading-loose text-body-color">
              Prep Hizmeti + Ürün Birleştirme

            </p>
            <p class="mb-1 text-base font-medium leading-loose text-body-color">
              Hızlı Gönderim

            </p>
            <p class="mb-1 text-base font-medium leading-loose text-body-color">
              Hizmetlerimizden %12 indirim kazanabilirsiniz.

            </p>
            <p class="mb-1 text-base font-medium leading-loose text-body-color">
              Prime Üyelik
            </p>
          </div>
          <div class="w-full">
            <a href="javascript:void(0)" class="inline-block rounded-full border border-[#D4DEFF] bg-transparent py-4 px-11 text-center text-base font-medium text-primary transition duration-300 ease-in-out hover:border-primary hover:bg-primary hover:text-white">
              Hemen Başlayın
            </a>
          </div>

          <span class="absolute right-0 top-0 z-[-1] block h-14 w-14 rounded-bl-full bg-secondary">
          </span>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- ====== Pricing Section End -->


<!-- ====== Faq Section Start -->
<section id="faq" class="relative z-20 overflow-hidden bg-[#f3f4ff] pt-20 pb-12 lg:pt-[120px] lg:pb-[90px]">
  <div class="container">
    <div class="-mx-4 flex flex-wrap">
      <div class="w-full px-4">
        <div class="mx-auto mb-[60px] max-w-[620px] text-center lg:mb-20">
          <span class="mb-2 block text-lg font-semibold text-primary">
            Sıkça Sorulan Sorular
          </span>
          <h2 class="mb-4 text-3xl font-bold text-dark sm:text-4xl md:text-[42px]">
            Sorunuz var mı?
          </h2>
          <p class="text-lg leading-relaxed text-body-color sm:text-xl sm:leading-relaxed">
            SellerFulfilment'ın size nasıl yardımcı olabileceğinden emin değil misiniz? İşte değerli müşterilerimizden
            duyduğumuz en sık sorulan bazı soruların cevapları.
          </p>
        </div>
      </div>
    </div>

    <div class="-mx-4 flex flex-wrap">
      <div class="w-full px-4 lg:w-1/2">
        <div class="single-faq wow fadeInUp mb-8 w-full rounded-lg border border-[#F3F4FE] bg-white p-5 sm:p-8" data-wow-delay=".1s
              ">
          <button class="faq-btn flex w-full items-center text-left">
            <div class="mr-5 flex h-10 w-full max-w-[40px] items-center justify-center rounded-lg bg-primary bg-opacity-5 text-primary">
              <svg width="17" height="10" viewBox="0 0 17 10" class="icon fill-current">
                <path d="M7.28687 8.43257L7.28679 8.43265L7.29496 8.43985C7.62576 8.73124 8.02464 8.86001 8.41472 8.86001C8.83092 8.86001 9.22376 8.69083 9.53447 8.41713L9.53454 8.41721L9.54184 8.41052L15.7631 2.70784L15.7691 2.70231L15.7749 2.69659C16.0981 2.38028 16.1985 1.80579 15.7981 1.41393C15.4803 1.1028 14.9167 1.00854 14.5249 1.38489L8.41472 7.00806L2.29995 1.38063L2.29151 1.37286L2.28271 1.36548C1.93092 1.07036 1.38469 1.06804 1.03129 1.41393L1.01755 1.42738L1.00488 1.44184C0.69687 1.79355 0.695778 2.34549 1.0545 2.69659L1.05999 2.70196L1.06565 2.70717L7.28687 8.43257Z" fill="#3056D3" stroke="#3056D3" />
              </svg>
            </div>
            <div class="w-full">
              <h4 class="text-base font-semibold text-black sm:text-lg">
                SellerFulfilment bana neler sağlıyor?
              </h4>
            </div>
          </button>
          <div class="faq-content hidden pl-[62px]">
            <p class="py-3 text-base leading-relaxed text-body-color">
              SellerFulfilment olarak, hizmetlerimizin müşterilerimiz için onlarca avantajı bulunmaktadır.
              Hizmetlerimizi kısaca sıralarsak;
              kalite güvence kontrolleri, FNSKU etiketleme, paketleme ve takım oluşturma, çoklu torbalama, kutulama,
              shrinkleme ve
              daha fazlası. Ürünler uzman ekibimiz tarafından paketlenir ve Amazon depolarına sevk edilir.
            </p>
          </div>
        </div>
        <div class="single-faq wow fadeInUp mb-8 w-full rounded-lg border border-[#F3F4FE] bg-white p-5 sm:p-8" data-wow-delay=".15s
              ">
          <button class="faq-btn flex w-full items-center text-left">
            <div class="mr-5 flex h-10 w-full max-w-[40px] items-center justify-center rounded-lg bg-primary bg-opacity-5 text-primary">
              <svg width="17" height="10" viewBox="0 0 17 10" class="icon fill-current">
                <path d="M7.28687 8.43257L7.28679 8.43265L7.29496 8.43985C7.62576 8.73124 8.02464 8.86001 8.41472 8.86001C8.83092 8.86001 9.22376 8.69083 9.53447 8.41713L9.53454 8.41721L9.54184 8.41052L15.7631 2.70784L15.7691 2.70231L15.7749 2.69659C16.0981 2.38028 16.1985 1.80579 15.7981 1.41393C15.4803 1.1028 14.9167 1.00854 14.5249 1.38489L8.41472 7.00806L2.29995 1.38063L2.29151 1.37286L2.28271 1.36548C1.93092 1.07036 1.38469 1.06804 1.03129 1.41393L1.01755 1.42738L1.00488 1.44184C0.69687 1.79355 0.695778 2.34549 1.0545 2.69659L1.05999 2.70196L1.06565 2.70717L7.28687 8.43257Z" fill="#3056D3" stroke="#3056D3" />
              </svg>
            </div>
            <div class="w-full">
              <h4 class="text-base font-semibold text-black sm:text-lg">
                SellerFulfilment hangi pazaryerlerini kapsıyor?
              </h4>
            </div>
          </button>
          <div class="faq-content hidden pl-[62px]">
            <p class="py-3 text-base leading-relaxed text-body-color">
              SellerFulfilment şu anda kaynak mağaza olarak Amazon.com (Amerika), Amazon.ca (Kanada) ve satış
              mağazaları
              olarak Amazon.com (Amerika), Amazon.ca (Kanada) konumlarında hizmet vermektedir.
            </p>
          </div>
        </div>
        <div class="single-faq wow fadeInUp mb-8 w-full rounded-lg border border-[#F3F4FE] bg-white p-5 sm:p-8" data-wow-delay=".2s
              ">
          <button class="faq-btn flex w-full items-center text-left">
            <div class="mr-5 flex h-10 w-full max-w-[40px] items-center justify-center rounded-lg bg-primary bg-opacity-5 text-primary">
              <svg width="17" height="10" viewBox="0 0 17 10" class="icon fill-current">
                <path d="M7.28687 8.43257L7.28679 8.43265L7.29496 8.43985C7.62576 8.73124 8.02464 8.86001 8.41472 8.86001C8.83092 8.86001 9.22376 8.69083 9.53447 8.41713L9.53454 8.41721L9.54184 8.41052L15.7631 2.70784L15.7691 2.70231L15.7749 2.69659C16.0981 2.38028 16.1985 1.80579 15.7981 1.41393C15.4803 1.1028 14.9167 1.00854 14.5249 1.38489L8.41472 7.00806L2.29995 1.38063L2.29151 1.37286L2.28271 1.36548C1.93092 1.07036 1.38469 1.06804 1.03129 1.41393L1.01755 1.42738L1.00488 1.44184C0.69687 1.79355 0.695778 2.34549 1.0545 2.69659L1.05999 2.70196L1.06565 2.70717L7.28687 8.43257Z" fill="#3056D3" stroke="#3056D3" />
              </svg>
            </div>
            <div class="w-full">
              <h4 class="text-base font-semibold text-black sm:text-lg">
                Bir ara depo kullanmanın bana ne tür yararları olacak?
              </h4>
            </div>
          </button>
          <div class="faq-content hidden pl-[62px]">
            <p class="py-3 text-base leading-relaxed text-body-color">
              Sizin için oluşturulan özel depo adresi aracılığıyla ürününüz çoğu zaman çok daha uygun fiyata ara
              depoya iletilir. Tüm
              ürünleriniz veya gönderimi olmayan(undeliverable) ürünleriniz için ara depo seçeneğini
              kullanabilirsiniz. Depoya ulaşan
              ürününüz özenle kontrol edilir ve sizin etiketleriniz ile tekrardan paketlenir. Sizin adınıza pakete
              mesajınız veya veya
              dilerseniz promosyon ürünleriniz eklenir ve sizin adınıza alıcıya gönderilir. Ara depo sistemi
              entegrasyonu ile
              ürünlerini gönderdiğiniz ara depo ile iletişim kurabilir, ticket oluşturarak hızlı bir şekilde
              ürünlerinizin son durumu
              ile ilgili bilgi alabilirsiniz.
            </p>
          </div>
        </div>
      </div>
      <div class="w-full px-4 lg:w-1/2">
        <div class="single-faq wow fadeInUp mb-8 w-full rounded-lg border border-[#F3F4FE] bg-white p-5 sm:p-8" data-wow-delay=".1s
              ">
          <button class="faq-btn flex w-full items-center text-left">
            <div class="mr-5 flex h-10 w-full max-w-[40px] items-center justify-center rounded-lg bg-primary bg-opacity-5 text-primary">
              <svg width="17" height="10" viewBox="0 0 17 10" class="icon fill-current">
                <path d="M7.28687 8.43257L7.28679 8.43265L7.29496 8.43985C7.62576 8.73124 8.02464 8.86001 8.41472 8.86001C8.83092 8.86001 9.22376 8.69083 9.53447 8.41713L9.53454 8.41721L9.54184 8.41052L15.7631 2.70784L15.7691 2.70231L15.7749 2.69659C16.0981 2.38028 16.1985 1.80579 15.7981 1.41393C15.4803 1.1028 14.9167 1.00854 14.5249 1.38489L8.41472 7.00806L2.29995 1.38063L2.29151 1.37286L2.28271 1.36548C1.93092 1.07036 1.38469 1.06804 1.03129 1.41393L1.01755 1.42738L1.00488 1.44184C0.69687 1.79355 0.695778 2.34549 1.0545 2.69659L1.05999 2.70196L1.06565 2.70717L7.28687 8.43257Z" fill="#3056D3" stroke="#3056D3" />
              </svg>
            </div>
            <div class="w-full">
              <h4 class="text-base font-semibold text-black sm:text-lg">
                SellerFulfilment ile fatura oluşturabilir miyim?
              </h4>
            </div>
          </button>
          <div class="faq-content hidden pl-[62px]">
            <p class="py-3 text-base leading-relaxed text-body-color">
              Gerektiğinde mağazanıza özel bilgileri girerek kolayca otomatik fatura da oluşturabilirsiniz.
            </p>
          </div>
        </div>
        <div class="single-faq wow fadeInUp mb-8 w-full rounded-lg border border-[#F3F4FE] bg-white p-5 sm:p-8" data-wow-delay=".15s
              ">
          <button class="faq-btn flex w-full items-center text-left">
            <div class="mr-5 flex h-10 w-full max-w-[40px] items-center justify-center rounded-lg bg-primary bg-opacity-5 text-primary">
              <svg width="17" height="10" viewBox="0 0 17 10" class="icon fill-current">
                <path d="M7.28687 8.43257L7.28679 8.43265L7.29496 8.43985C7.62576 8.73124 8.02464 8.86001 8.41472 8.86001C8.83092 8.86001 9.22376 8.69083 9.53447 8.41713L9.53454 8.41721L9.54184 8.41052L15.7631 2.70784L15.7691 2.70231L15.7749 2.69659C16.0981 2.38028 16.1985 1.80579 15.7981 1.41393C15.4803 1.1028 14.9167 1.00854 14.5249 1.38489L8.41472 7.00806L2.29995 1.38063L2.29151 1.37286L2.28271 1.36548C1.93092 1.07036 1.38469 1.06804 1.03129 1.41393L1.01755 1.42738L1.00488 1.44184C0.69687 1.79355 0.695778 2.34549 1.0545 2.69659L1.05999 2.70196L1.06565 2.70717L7.28687 8.43257Z" fill="#3056D3" stroke="#3056D3" />
              </svg>
            </div>
            <div class="w-full">
              <h4 class="text-base font-semibold text-black sm:text-lg">
                SellerFulfilment ile Dropshipping yapabilir miyim?
              </h4>
            </div>
          </button>
          <div class="faq-content hidden pl-[62px]">
            <p class="py-3 text-base leading-relaxed text-body-color">
              Sellerfulfilment ile Dropshipping siparişlerini yerine getirebilirsiniz. Dropshipping gönderilerde
              sadece hızlı kargo
              hizmetimiz vardır.
            </p>
          </div>
        </div>
        <div class="single-faq wow fadeInUp mb-8 w-full rounded-lg border border-[#F3F4FE] bg-white p-5 sm:p-8" data-wow-delay=".2s
              ">
          <button class="faq-btn flex w-full items-center text-left">
            <div class="mr-5 flex h-10 w-full max-w-[40px] items-center justify-center rounded-lg bg-primary bg-opacity-5 text-primary">
              <svg width="17" height="10" viewBox="0 0 17 10" class="icon fill-current">
                <path d="M7.28687 8.43257L7.28679 8.43265L7.29496 8.43985C7.62576 8.73124 8.02464 8.86001 8.41472 8.86001C8.83092 8.86001 9.22376 8.69083 9.53447 8.41713L9.53454 8.41721L9.54184 8.41052L15.7631 2.70784L15.7691 2.70231L15.7749 2.69659C16.0981 2.38028 16.1985 1.80579 15.7981 1.41393C15.4803 1.1028 14.9167 1.00854 14.5249 1.38489L8.41472 7.00806L2.29995 1.38063L2.29151 1.37286L2.28271 1.36548C1.93092 1.07036 1.38469 1.06804 1.03129 1.41393L1.01755 1.42738L1.00488 1.44184C0.69687 1.79355 0.695778 2.34549 1.0545 2.69659L1.05999 2.70196L1.06565 2.70717L7.28687 8.43257Z" fill="#3056D3" stroke="#3056D3" />
              </svg>
            </div>
            <div class="w-full">
              <h4 class="text-base font-semibold text-black sm:text-lg">
                SellerFulfilment kullanırken hangi ödeme yöntemlerini kullanabilirim?
              </h4>
            </div>
          </button>
          <div class="faq-content hidden pl-[62px]">
            <p class="py-3 text-base leading-relaxed text-body-color">
              Sellerfulfilment ile yapacağınız FBA gönderimlerinizin ödemelerin Payoneer kullanabilirsiniz. Alternatif
              ödeme
              yöntemleride mevcuttur. Transferwise ve Banka ödemesi.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="absolute bottom-0 right-0 z-[-1]">
    <svg width="1440" height="886" viewBox="0 0 1440 886" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path opacity="0.5" d="M193.307 -273.321L1480.87 1014.24L1121.85 1373.26C1121.85 1373.26 731.745 983.231 478.513 729.927C225.976 477.317 -165.714 85.6993 -165.714 85.6993L193.307 -273.321Z" fill="url(#paint0_linear)" />
      <defs>
        <linearGradient id="paint0_linear" x1="1308.65" y1="1142.58" x2="602.827" y2="-418.681" gradientUnits="userSpaceOnUse">
          <stop stop-color="#3056D3" stop-opacity="0.36" />
          <stop offset="1" stop-color="#F5F2FD" stop-opacity="0" />
          <stop offset="1" stop-color="#F5F2FD" stop-opacity="0.096144" />
        </linearGradient>
      </defs>
    </svg>
  </div>
</section>
<!-- ====== Faq Section End -->


<!-- ====== Contact Start ====== -->
<section id="contact" class="relative py-20 md:py-[120px]">
  <div class="absolute top-0 left-0 z-[-1] h-1/2 w-full bg-[#f3f4fe] lg:h-[45%] xl:h-1/2"></div>
  <div class="container px-4">
    <div class="-mx-4 flex flex-wrap items-center">
      <div class="w-full px-4 lg:w-7/12 xl:w-8/12">
        <div class="ud-contact-content-wrapper">
          <div class="ud-contact-title mb-12 lg:mb-[150px]">
            <span class="mb-5 text-base font-semibold text-dark">
              İLETİŞİM
            </span>
            <h2 class="text-[35px] font-semibold">
              BİZE ULAŞIN <br />

            </h2>
          </div>
          <div class="mb-12 sm:flex sm:flex-col justify-between lg:mb-0">
            <div class="mb-8 flex w-[330px] max-w-full">


              <div class="mr-6 text-[32px] text-primary">
                <svg width="29" height="35" viewBox="0 0 29 35" class="fill-current">
                  <path d="M14.5 0.710938C6.89844 0.710938 0.664062 6.72656 0.664062 14.0547C0.664062 19.9062 9.03125 29.5859 12.6406 33.5234C13.1328 34.0703 13.7891 34.3437 14.5 34.3437C15.2109 34.3437 15.8672 34.0703 16.3594 33.5234C19.9688 29.6406 28.3359 19.9062 28.3359 14.0547C28.3359 6.67188 22.1016 0.710938 14.5 0.710938ZM14.9375 32.2109C14.6641 32.4844 14.2812 32.4844 14.0625 32.2109C11.3828 29.3125 2.57812 19.3594 2.57812 14.0547C2.57812 7.71094 7.9375 2.625 14.5 2.625C21.0625 2.625 26.4219 7.76562 26.4219 14.0547C26.4219 19.3594 17.6172 29.2578 14.9375 32.2109Z" />
                  <path d="M14.5 8.58594C11.2734 8.58594 8.59375 11.2109 8.59375 14.4922C8.59375 17.7188 11.2187 20.3984 14.5 20.3984C17.7812 20.3984 20.4062 17.7734 20.4062 14.4922C20.4062 11.2109 17.7266 8.58594 14.5 8.58594ZM14.5 18.4297C12.3125 18.4297 10.5078 16.625 10.5078 14.4375C10.5078 12.25 12.3125 10.4453 14.5 10.4453C16.6875 10.4453 18.4922 12.25 18.4922 14.4375C18.4922 16.625 16.6875 18.4297 14.5 18.4297Z" />
                </svg>
              </div>
              <div>
                <h5 class="mb-6 text-lg font-semibold">Adresimiz</h5>
                <p class="text-base text-body-color">
                  5659 W TAYLOR ST CHICAGO, IL 60644
                </p>
              </div>
            </div>
            <div class="mb-8 flex w-[330px] max-w-full">
              <div class="mr-6 text-[32px] text-primary">
                <svg width="34" height="25" viewBox="0 0 34 25" class="fill-current">
                  <path d="M30.5156 0.960938H3.17188C1.42188 0.960938 0 2.38281 0 4.13281V20.9219C0 22.6719 1.42188 24.0938 3.17188 24.0938H30.5156C32.2656 24.0938 33.6875 22.6719 33.6875 20.9219V4.13281C33.6875 2.38281 32.2656 0.960938 30.5156 0.960938ZM30.5156 2.875C30.7891 2.875 31.0078 2.92969 31.2266 3.09375L17.6094 11.3516C17.1172 11.625 16.5703 11.625 16.0781 11.3516L2.46094 3.09375C2.67969 2.98438 2.89844 2.875 3.17188 2.875H30.5156ZM30.5156 22.125H3.17188C2.51562 22.125 1.91406 21.5781 1.91406 20.8672V5.00781L15.0391 12.9922C15.5859 13.3203 16.1875 13.4844 16.7891 13.4844C17.3906 13.4844 17.9922 13.3203 18.5391 12.9922L31.6641 5.00781V20.8672C31.7734 21.5781 31.1719 22.125 30.5156 22.125Z" />
                </svg>
              </div>
              <div>
                <h5 class="mb-6 text-lg font-semibold">Nasıl yardımcı olabiliriz?</h5>
                <p class="text-base text-body-color">
                  Email: info@sellerfulfilment.com
                </p>
                <p class="text-base text-body-color">
                  Email: support@sellerfulfilment.com
                </p>
                <p class="text-base text-body-color">
                  Tel: +1 7862385215
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
      {{-- <div class="w-full px-4 lg:w-5/12 xl:w-4/12">
        <div class="wow fadeInUp rounded-lg bg-white py-10 px-8 shadow-testimonial sm:py-12 sm:px-10 md:p-[60px] lg:p-10 lg:py-12 lg:px-10 2xl:p-[60px]" data-wow-delay=".2s
              ">
          <h3 class="mb-8 text-2xl font-semibold md:text-[26px]">
            İletişim Formu
          </h3>
          <form>
            <div class="mb-6">
              <label for="fullName" class="block text-xs text-dark"> İsim Soyisim* </label>
              <input type="text" name="fullName" placeholder="Mehmet Yılmaz" class="w-full border-0 border-b border-[#f1f1f1] py-4 focus:border-primary focus:outline-none" />
            </div>
            <div class="mb-6">
              <label for="email" class="block text-xs text-dark">Email*</label>
              <input type="email" name="email" placeholder="örnek@gmail.com" class="w-full border-0 border-b border-[#f1f1f1] py-4 focus:border-primary focus:outline-none" />
            </div>
            <div class="mb-6">
              <label for="phone" class="block text-xs text-dark">Telefon*</label>
              <input type="text" name="phone" placeholder="+90 532 123 45 67" class="w-full border-0 border-b border-[#f1f1f1] py-4 focus:border-primary focus:outline-none" />
            </div>
            <div class="mb-6">
              <label for="message" class="block text-xs text-dark">Mesajınız*</label>
              <textarea name="message" rows="1" placeholder="Mesajınızı buraya yazınız" class="w-full resize-none border-0 border-b border-[#f1f1f1] py-4 focus:border-primary focus:outline-none"></textarea>
            </div>
            <div class="mb-0">
              <button type="submit" class="inline-flex items-center justify-center rounded bg-primary py-4 px-6 text-base font-medium text-white transition duration-300 ease-in-out hover:bg-dark">
                Gönder
              </button>
            </div>
          </form>
        </div>
      </div> --}}

    </div>
  </div>
</section>
<!-- ====== Contact End ====== -->




@endsection
