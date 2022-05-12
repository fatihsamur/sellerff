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

<!-- ====== Banner Section Start -->
<div class="relative z-10 overflow-hidden bg-primary pt-[100px] pb-[80px] md:pt-[130px] lg:pt-[160px]">
  <div class="container">
    <div class="-mx-4 flex flex-wrap items-center">
      <div class="w-full px-4">
        <div class="text-center">
          <h1 class="text-4xl font-semibold text-white">Blog </h1>
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

<!-- ====== Blog Section Start -->
<section class="pt-20 pb-10 lg:pt-[120px] lg:pb-20">
  <div class="container">
    <div class="-mx-4 flex flex-wrap">
      <div class="w-full px-4 md:w-1/2 lg:w-1/3">
        <div class="wow fadeInUp group mb-10" data-wow-delay=".1s">
          <div class="mb-8 overflow-hidden rounded">
            <a href="{{ url('landing-blog-detail') }}" class="block">
              <img src="{{ asset('themes/' . $theme->folder . '/images/landing/blog/blog-01.jpg') }}" alt="image" class="w-full transition group-hover:rotate-6 group-hover:scale-125" />
            </a>
          </div>
          <div>
            <span class="mb-5 inline-block rounded bg-primary py-1 px-4 text-center text-xs font-semibold leading-loose text-white">
              Dec 22, 2023
            </span>
            <h3>
              <a href="{{ url('landing-blog-detail') }}" class="mb-4 inline-block text-xl font-semibold text-dark hover:text-primary sm:text-2xl lg:text-xl xl:text-2xl">
                Meet AutoManage, the best AI management tools
              </a>
            </h3>
            <p class="text-base text-body-color">
              Lorem Ipsum is simply dummy text of the printing and
              typesetting industry.
            </p>
          </div>
        </div>
      </div>
      <div class="w-full px-4 md:w-1/2 lg:w-1/3">
        <div class="wow fadeInUp group mb-10" data-wow-delay=".15s">
          <div class="mb-8 overflow-hidden rounded">
            <a href="{{ url('landing-blog-detail') }}" class="block">

              <img src="{{ asset('themes/' . $theme->folder . '/images/landing/blog/blog-01.jpg') }}" alt="image" class="w-full transition group-hover:rotate-6 group-hover:scale-125" />

            </a>
          </div>
          <div>
            <span class="mb-5 inline-block rounded bg-primary py-1 px-4 text-center text-xs font-semibold leading-loose text-white">
              Mar 15, 2023
            </span>
            <h3>
              <a href="{{ url('landing-blog-detail') }}" class="mb-4 inline-block text-xl font-semibold text-dark hover:text-primary sm:text-2xl lg:text-xl xl:text-2xl">

                How to earn more money as a wellness coach
              </a>
            </h3>
            <p class="text-base text-body-color">
              Lorem Ipsum is simply dummy text of the printing and
              typesetting industry.
            </p>
          </div>
        </div>
      </div>
      <div class="w-full px-4 md:w-1/2 lg:w-1/3">
        <div class="wow fadeInUp group mb-10" data-wow-delay=".2s">
          <div class="mb-8 overflow-hidden rounded">
            <a href="{{ url('landing-blog-detail') }}" class="block">

              <img src="{{ asset('themes/' . $theme->folder . '/images/landing/blog/blog-01.jpg') }}" alt="image" class="w-full transition group-hover:rotate-6 group-hover:scale-125" />

            </a>
          </div>
          <div>
            <span class="mb-5 inline-block rounded bg-primary py-1 px-4 text-center text-xs font-semibold leading-loose text-white">
              Jan 05, 2023
            </span>
            <h3>
              <a href="{{ url('landing-blog-detail') }}" class="mb-4 inline-block text-xl font-semibold text-dark hover:text-primary sm:text-2xl lg:text-xl xl:text-2xl">

                The no-fuss guide to upselling and cross selling
              </a>
            </h3>
            <p class="text-base text-body-color">
              Lorem Ipsum is simply dummy text of the printing and
              typesetting industry.
            </p>
          </div>
        </div>
      </div>


    </div>
  </div>
</section>
<!-- ====== Blog Section End -->





@endsection
