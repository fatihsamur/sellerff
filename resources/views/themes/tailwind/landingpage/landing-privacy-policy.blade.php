@extends('theme::landingpage/landing-layout')

@section("content")

<!-- ====== Navbar Section Start -->
<div class="ud-header absolute top-0 left-0 z-40 flex w-full items-center bg-transparent">
  <div class="container">
    <div class="relative -mx-4 flex items-center justify-between">
      <div class="w-60 max-w-full px-4">
        <a href="{{ url('/') }}" class="navbar-logo block w-full py-5">

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
          <nav id="navbarCollapse" class="absolute right-4 top-full hidden w-full max-w-[250px] rounded-lg bg-white py-5 shadow-lg lg:static lg:block lg:w-full lg:max-w-full lg:bg-transparent lg:py-0 lg:px-4 lg:shadow-none xl:px-6">
            <ul class="blcok lg:flex">
              <li class="group relative">
                <a href="{{ url('/') }}" class=" mx-8 flex py-2 text-base text-dark group-hover:text-primary lg:mr-0 lg:inline-flex lg:py-6 lg:px-0 lg:text-white lg:group-hover:text-white lg:group-hover:opacity-70">

                  Anasayfa
                </a>
              </li>
              <li class="group relative">
                <a href="{{ url('/') }}#features" class=" mx-8 flex py-2 text-base text-dark group-hover:text-primary lg:mr-0 lg:ml-7 lg:inline-flex lg:py-6 lg:px-0 lg:text-white lg:group-hover:text-white lg:group-hover:opacity-70 xl:ml-12">

                  Özellikler
                </a>
              </li>
              <li class="group relative">
                <a href="{{ url('/') }}#pricing" class=" mx-8 flex py-2 text-base text-dark group-hover:text-primary lg:mr-0 lg:ml-7 lg:inline-flex lg:py-6 lg:px-0 lg:text-white lg:group-hover:text-white lg:group-hover:opacity-70 xl:ml-12">

                  Ücretler
                </a>
              </li>
              <li class="group relative">
                <a href="{{ url('/') }}#faq" class=" mx-8 flex py-2 text-base text-dark group-hover:text-primary lg:mr-0 lg:ml-7 lg:inline-flex lg:py-6 lg:px-0 lg:text-white lg:group-hover:text-white lg:group-hover:opacity-70 xl:ml-12">

                  S.S.S
                </a>
              </li>
              <li class="group relative">
                <a href="{{ url('/') }}#contact" class=" mx-8 flex py-2 text-base text-dark group-hover:text-primary lg:mr-0 lg:ml-7 lg:inline-flex lg:py-6 lg:px-0 lg:text-white lg:group-hover:text-white lg:group-hover:opacity-70 xl:ml-12">

                  İletişim
                </a>
              </li>
              <li class="group relative">
                <a href="{{ url('landing-blog') }}" class=" mx-8 flex py-2 text-base text-dark group-hover:text-primary lg:mr-0 lg:ml-7 lg:inline-flex lg:py-6 lg:px-0 lg:text-white lg:group-hover:text-white lg:group-hover:opacity-70 xl:ml-12">

                  Blog
                </a>
              </li>
            </ul>

          </nav>
        </div>
        <div class="hidden justify-end pr-16 sm:flex lg:pr-0">
          <a href="https://sellerfulfilment.com/login" class="loginBtn py-3 px-7 text-base font-medium text-white hover:opacity-70">
            Giriş
          </a>
          <a href="https://sellerfulfilment.com/register" class="signUpBtn rounded-lg bg-white bg-opacity-20 py-3 px-6 text-base font-medium text-white duration-300 ease-in-out hover:bg-opacity-100 hover:text-dark">
            Kaydol
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- ====== Navbar Section End -->

<!-- ====== Banner Section Start -->
<div class="relative z-10 overflow-hidden bg-primary pt-[100px] pb-[80px] md:pt-[130px] lg:pt-[160px]">
  <div class="container">
    <div class="-mx-4 flex flex-wrap items-center">
      <div class="w-full px-4">
        <div class="text-center">
          <h1 class="text-4xl font-semibold text-white">Gizlilik Politikası </h1>
        </div>
      </div>
    </div>
  </div>
  <div>
    <span class="absolute top-0 left-0 z-[-1]">
      <svg width="495" height="470" viewBox="0 0 495 470" fill="none" xmlns="http://www.w3.org/2000/svg">
        <circle cx="55" cy="442" r="138" stroke="white" stroke-opacity="0.04" stroke-width="50" />
        <circle cx="446" r="39" stroke="white" stroke-opacity="0.04" stroke-width="20" />
        <path d="M245.406 137.609L233.985 94.9852L276.609 106.406L245.406 137.609Z" stroke="white" stroke-opacity="0.08" stroke-width="12" />
      </svg>
    </span>
    <span class="absolute top-0 right-0 z-[-1]">
      <svg width="493" height="470" viewBox="0 0 493 470" fill="none" xmlns="http://www.w3.org/2000/svg">
        <circle cx="462" cy="5" r="138" stroke="white" stroke-opacity="0.04" stroke-width="50" />
        <circle cx="49" cy="470" r="39" stroke="white" stroke-opacity="0.04" stroke-width="20" />
        <path d="M222.393 226.701L272.808 213.192L259.299 263.607L222.393 226.701Z" stroke="white" stroke-opacity="0.06" stroke-width="13" />
      </svg>
    </span>
  </div>
</div>
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
  <path fill="#3056D3" fill-opacity="1" d="M0,160L80,165.3C160,171,320,181,480,170.7C640,160,800,128,960,112C1120,96,1280,96,1360,96L1440,96L1440,0L1360,0C1280,0,1120,0,960,0C800,0,640,0,480,0C320,0,160,0,80,0L0,0Z">
  </path>
</svg>
<!-- ====== Banner Section End -->

<!-- ====== About Section Start -->
<section id="about" class="bg-[#f3f4fe] pt-20 pb-20 lg:pt-[120px] lg:pb-[120px]">
  <div class="container">
    <div class="wow fadeInUp bg-white" data-wow-delay=".2s">
      <div class="-mx-4 flex flex-wrap">
        <div class="w-full px-4">
          <div class="items-center justify-between overflow-hidden border lg:flex">
            <div class="w-full py-12 px-7 sm:px-12 md:p-16 lg:max-w-[565px] lg:py-9 lg:px-16 xl:max-w-[640px] xl:p-[70px]">
              <span class="mb-5 inline-block bg-primary py-2 px-5 text-sm font-medium text-white">
                About Us
              </span>
              <h2 class="mb-6 text-3xl font-bold text-dark sm:text-4xl sm:leading-snug 2xl:text-[40px]">
                Brilliant Toolkit to Build Nextgen Website Faster.
              </h2>
              <p class="mb-9 text-base leading-relaxed text-body-color">
                The main ‘thrust' is to focus on educating attendees on how
                to best protect highly vulnerable business applications with
                interactive panel discussions and roundtables led by subject
                matter experts.
              </p>
              <p class="mb-9 text-base leading-relaxed text-body-color">
                The main ‘thrust' is to focus on educating attendees on how
                to best protect highly vulnerable business applications with
                interactive panel.
              </p>
              <a href="javascript:void(0)" class="inline-flex items-center justify-center rounded bg-primary py-4 px-6 text-base font-medium text-white transition duration-300 ease-in-out hover:bg-opacity-90 hover:shadow-lg">
                Learn More
              </a>
            </div>
            <div class="text-center">
              <div class="relative z-10 inline-block">
                <img src="assets/images/about/about-image.svg" alt="image" class="mx-auto lg:ml-auto" />
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- ====== About Section End -->
<!-- ====== About Section Start -->
<section id="about" class="bg-[#f3f4fe] pt-20 pb-20 lg:pt-[120px] lg:pb-[120px]">
  <div class="container">
    <div class="wow fadeInUp bg-white" data-wow-delay=".2s">
      <div class="-mx-4 flex flex-wrap">
        <div class="w-full px-4">
          <div class="items-center justify-between overflow-hidden border lg:flex">
            <div class="w-full py-12 px-7 sm:px-12 md:p-16 lg:max-w-[565px] lg:py-9 lg:px-16 xl:max-w-[640px] xl:p-[70px]">
              <span class="mb-5 inline-block bg-primary py-2 px-5 text-sm font-medium text-white">
                About Us
              </span>
              <h2 class="mb-6 text-3xl font-bold text-dark sm:text-4xl sm:leading-snug 2xl:text-[40px]">
                Brilliant Toolkit to Build Nextgen Website Faster.
              </h2>
              <p class="mb-9 text-base leading-relaxed text-body-color">
                The main ‘thrust' is to focus on educating attendees on how
                to best protect highly vulnerable business applications with
                interactive panel discussions and roundtables led by subject
                matter experts.
              </p>
              <p class="mb-9 text-base leading-relaxed text-body-color">
                The main ‘thrust' is to focus on educating attendees on how
                to best protect highly vulnerable business applications with
                interactive panel.
              </p>
              <a href="javascript:void(0)" class="inline-flex items-center justify-center rounded bg-primary py-4 px-6 text-base font-medium text-white transition duration-300 ease-in-out hover:bg-opacity-90 hover:shadow-lg">
                Learn More
              </a>
            </div>
            <div class="text-center">
              <div class="relative z-10 inline-block">
                <img src="assets/images/about/about-image.svg" alt="image" class="mx-auto lg:ml-auto" />
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- ====== About Section End -->







@endsection
