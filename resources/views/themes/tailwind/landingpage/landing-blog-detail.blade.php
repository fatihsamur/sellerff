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
              {{-- <li class="group relative">
                <a href="{{ url('landing-blog') }}" class=" mx-8 flex py-2 text-base text-dark group-hover:text-primary lg:mr-0 lg:ml-7 lg:inline-flex lg:py-6 lg:px-0 lg:text-white lg:group-hover:text-white lg:group-hover:opacity-70 xl:ml-12">

              Blog
              </a>
              </li> --}}
            </ul>

          </nav>
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

<!-- ====== Blog Details Section Start -->
<section class="pt-20 pb-10 lg:pt-[120px] lg:pb-20">
  <div class="container">
    <div class="-mx-4 flex flex-wrap justify-center">
      <div class="w-full px-4">
        <div class="wow fadeInUp relative z-20 mb-[60px] h-[300px] overflow-hidden rounded md:h-[400px] lg:h-[500px]" data-wow-delay=".1s
              ">
          <img src="{{ asset('themes/' . $theme->folder . '/images/landing/blog/blog-details-01.jpg') }}" alt="image" class="h-full w-full object-cover object-center" />

          <div class="absolute top-0 left-0 z-10 flex h-full w-full items-end bg-gradient-to-t from-dark-700 to-transparent">
            <div class="flex flex-wrap items-center p-4 pb-4 sm:p-8">
              <div class="mb-4 mr-5 flex items-center md:mr-10">
                <div class="mr-4 h-10 w-10 overflow-hidden rounded-full">
                  <img src="assets/images/blog/author-01.png" alt="image" class="w-full" />
                </div>
                <p class="text-base font-medium text-white">
                  By
                  <a href="javascript:void(0)" class="text-white hover:opacity-70">
                    Samuyl Joshi
                  </a>
                </p>
              </div>
              <div class="mb-4 flex items-center">
                <p class="mr-5 flex items-center text-sm font-medium text-white md:mr-8">
                  <span class="mr-3">
                    <svg width="15" height="15" viewBox="0 0 15 15" class="fill-current">
                      <path d="M3.8958 8.67529H3.10715C2.96376 8.67529 2.86816 8.77089 2.86816 8.91428V9.67904C2.86816 9.82243 2.96376 9.91802 3.10715 9.91802H3.8958C4.03919 9.91802 4.13479 9.82243 4.13479 9.67904V8.91428C4.13479 8.77089 4.03919 8.67529 3.8958 8.67529Z" />
                      <path d="M6.429 8.67529H5.64035C5.49696 8.67529 5.40137 8.77089 5.40137 8.91428V9.67904C5.40137 9.82243 5.49696 9.91802 5.64035 9.91802H6.429C6.57239 9.91802 6.66799 9.82243 6.66799 9.67904V8.91428C6.66799 8.77089 6.5485 8.67529 6.429 8.67529Z" />
                      <path d="M8.93779 8.67529H8.14914C8.00575 8.67529 7.91016 8.77089 7.91016 8.91428V9.67904C7.91016 9.82243 8.00575 9.91802 8.14914 9.91802H8.93779C9.08118 9.91802 9.17678 9.82243 9.17678 9.67904V8.91428C9.17678 8.77089 9.08118 8.67529 8.93779 8.67529Z" />
                      <path d="M11.472 8.67529H10.6833C10.5399 8.67529 10.4443 8.77089 10.4443 8.91428V9.67904C10.4443 9.82243 10.5399 9.91802 10.6833 9.91802H11.472C11.6154 9.91802 11.711 9.82243 11.711 9.67904V8.91428C11.711 8.77089 11.5915 8.67529 11.472 8.67529Z" />
                      <path d="M3.8958 11.1606H3.10715C2.96376 11.1606 2.86816 11.2562 2.86816 11.3996V12.1644C2.86816 12.3078 2.96376 12.4034 3.10715 12.4034H3.8958C4.03919 12.4034 4.13479 12.3078 4.13479 12.1644V11.3996C4.13479 11.2562 4.03919 11.1606 3.8958 11.1606Z" />
                      <path d="M6.429 11.1606H5.64035C5.49696 11.1606 5.40137 11.2562 5.40137 11.3996V12.1644C5.40137 12.3078 5.49696 12.4034 5.64035 12.4034H6.429C6.57239 12.4034 6.66799 12.3078 6.66799 12.1644V11.3996C6.66799 11.2562 6.5485 11.1606 6.429 11.1606Z" />
                      <path d="M8.93779 11.1606H8.14914C8.00575 11.1606 7.91016 11.2562 7.91016 11.3996V12.1644C7.91016 12.3078 8.00575 12.4034 8.14914 12.4034H8.93779C9.08118 12.4034 9.17678 12.3078 9.17678 12.1644V11.3996C9.17678 11.2562 9.08118 11.1606 8.93779 11.1606Z" />
                      <path d="M11.472 11.1606H10.6833C10.5399 11.1606 10.4443 11.2562 10.4443 11.3996V12.1644C10.4443 12.3078 10.5399 12.4034 10.6833 12.4034H11.472C11.6154 12.4034 11.711 12.3078 11.711 12.1644V11.3996C11.711 11.2562 11.5915 11.1606 11.472 11.1606Z" />
                      <path d="M13.2637 3.3697H7.64754V2.58105C8.19721 2.43765 8.62738 1.91189 8.62738 1.31442C8.62738 0.597464 8.02992 0 7.28906 0C6.54821 0 5.95074 0.597464 5.95074 1.31442C5.95074 1.91189 6.35702 2.41376 6.93058 2.58105V3.3697H1.31442C0.597464 3.3697 0 3.96716 0 4.68412V13.2637C0 13.9807 0.597464 14.5781 1.31442 14.5781H13.2637C13.9807 14.5781 14.5781 13.9807 14.5781 13.2637V4.68412C14.5781 3.96716 13.9807 3.3697 13.2637 3.3697ZM6.6677 1.31442C6.6677 0.979841 6.93058 0.716957 7.28906 0.716957C7.62364 0.716957 7.91042 0.979841 7.91042 1.31442C7.91042 1.649 7.64754 1.91189 7.28906 1.91189C6.95448 1.91189 6.6677 1.6251 6.6677 1.31442ZM1.31442 4.08665H13.2637C13.5983 4.08665 13.8612 4.34954 13.8612 4.68412V6.45261H0.716957V4.68412C0.716957 4.34954 0.979841 4.08665 1.31442 4.08665ZM13.2637 13.8612H1.31442C0.979841 13.8612 0.716957 13.5983 0.716957 13.2637V7.16957H13.8612V13.2637C13.8612 13.5983 13.5983 13.8612 13.2637 13.8612Z" />
                    </svg>
                  </span>
                  26 Feb 2023
                </p>

                <p class="mr-5 flex items-center text-sm font-medium text-white md:mr-8">
                  <span class="mr-3">
                    <svg width="18" height="13" viewBox="0 0 18 13" class="fill-current">
                      <path d="M15.9754 0H2.02539C1.09727 0 0.337891 0.759375 0.337891 1.6875V10.6875C0.337891 11.3062 0.647266 11.8406 1.18164 12.15C1.43477 12.2906 1.74414 12.375 2.02539 12.375C2.30664 12.375 2.58789 12.2906 2.86914 12.15L5.34414 10.7156C5.45664 10.6594 5.56914 10.6312 5.68164 10.6312H15.9473C16.8754 10.6312 17.6348 9.87187 17.6348 8.94375V1.6875C17.6629 0.759375 16.9035 0 15.9754 0ZM16.6785 8.94375C16.6785 9.3375 16.3691 9.64687 15.9754 9.64687H5.70977C5.42852 9.64687 5.11914 9.73125 4.86602 9.87187L2.39102 11.3063C2.16602 11.4187 1.91289 11.4187 1.68789 11.3063C1.46289 11.1938 1.35039 10.9688 1.35039 10.7156V1.6875C1.35039 1.29375 1.65977 0.984375 2.05352 0.984375H16.0035C16.3973 0.984375 16.7066 1.29375 16.7066 1.6875V8.94375H16.6785Z" />
                      <path d="M12.5721 3.375H5.03457C4.75332 3.375 4.52832 3.6 4.52832 3.88125C4.52832 4.1625 4.75332 4.3875 5.03457 4.3875H12.6002C12.8814 4.3875 13.1064 4.1625 13.1064 3.88125C13.1064 3.6 12.8533 3.375 12.5721 3.375Z" />
                      <path d="M11.3908 6.55322H5.03457C4.75332 6.55322 4.52832 6.77822 4.52832 7.05947C4.52832 7.34072 4.75332 7.56572 5.03457 7.56572H11.4189C11.7002 7.56572 11.9252 7.34072 11.9252 7.05947C11.9252 6.77822 11.6721 6.55322 11.3908 6.55322Z" />
                    </svg>
                  </span>
                  05
                </p>
                <p class="flex items-center text-sm font-medium text-white">
                  <span class="mr-3">
                    <svg width="20" height="12" viewBox="0 0 20 12" class="fill-current">
                      <path d="M10.2559 3.8125C9.03711 3.8125 8.06836 4.8125 8.06836 6C8.06836 7.1875 9.06836 8.1875 10.2559 8.1875C11.4434 8.1875 12.4434 7.1875 12.4434 6C12.4434 4.8125 11.4746 3.8125 10.2559 3.8125ZM10.2559 7.09375C9.66211 7.09375 9.16211 6.59375 9.16211 6C9.16211 5.40625 9.66211 4.90625 10.2559 4.90625C10.8496 4.90625 11.3496 5.40625 11.3496 6C11.3496 6.59375 10.8496 7.09375 10.2559 7.09375Z" />
                      <path d="M19.7559 5.625C17.6934 2.375 14.1309 0.4375 10.2559 0.4375C6.38086 0.4375 2.81836 2.375 0.755859 5.625C0.630859 5.84375 0.630859 6.125 0.755859 6.34375C2.81836 9.59375 6.38086 11.5312 10.2559 11.5312C14.1309 11.5312 17.6934 9.59375 19.7559 6.34375C19.9121 6.125 19.9121 5.84375 19.7559 5.625ZM10.2559 10.4375C6.84961 10.4375 3.69336 8.78125 1.81836 5.96875C3.69336 3.1875 6.84961 1.53125 10.2559 1.53125C13.6621 1.53125 16.8184 3.1875 18.6934 5.96875C16.8184 8.78125 13.6621 10.4375 10.2559 10.4375Z" />
                    </svg>
                  </span>
                  05
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="-mx-4 flex flex-wrap">
          <div class="w-full px-4 lg:w-8/12">
            <div>
              <h2 class="wow fadeInUp mb-6 text-[26px] font-bold leading-snug text-dark sm:text-3xl sm:leading-snug md:text-4xl md:leading-snug" data-wow-delay=".1s
                    ">
                Facing a challenge is kind of a turn-on for an easy rider
              </h2>
              <p class="wow fadeInUp mb-8 text-base leading-relaxed text-body-color" data-wow-delay=".1s">
                There's a time and place for everything… including asking
                for reviews. For instance: you should not asking for a
                review on your checkout page. The sole purpose of this page
                is to guide your customer to complete their purchase, and
                this means that the page should be as minimalist and
                pared-down possible. You don't want to have any unnecessary
                elements or Call To Actions.
              </p>
              <p class="wow fadeInUp mb-10 text-base leading-relaxed text-body-color" data-wow-delay=".1s">
                There's a time and place for everything… including asking
                for reviews. For instance: you should not asking for a
                review on your checkout page. The sole purpose of this page
                is to guide your customer to complete their purchase, and
                this means that the page should be as minimalist and
                pared-down possible. You don't want to have any unnecessary
                elements or Call To Actions.
              </p>
              <h3 class="wow fadeInUp mb-8 text-2xl font-bold text-dark sm:text-[26px]" data-wow-delay=".1s">
                Sea no quidam vulputate
              </h3>
              <p class="wow fadeInUp mb-10 text-base leading-relaxed text-body-color" data-wow-delay=".1s">
                At quo cetero fastidii. Usu ex ornatus corpora sententiae,
                vocibus deleniti ut nec. Ut enim eripuit eligendi est, in
                iracundia signiferumque quo. Sed virtute suavitate
                suscipiantur ea, dolor this can eloquentiam ei pro. Suas
                adversarium interpretaris eu sit, eum viris impedit ne.
                Erant appareat corrumpit ei vel.
              </p>
              <div class="wow fadeInUp relative z-10 mb-10 overflow-hidden rounded bg-primary bg-opacity-5 py-8 px-6 text-center sm:p-10 md:px-[60px]" data-wow-delay=".1s
                    ">
                <div class="mx-auto max-w-[530px]">
                  <span class="mb-6 flex justify-center text-primary">
                    <svg width="44" height="26" viewBox="0 0 44 26" class="fill-current">
                      <path d="M10.1101 0.00124908C5.46698 -0.0701833 1.25247 2.92998 0.252417 7.00162C-0.319041 9.50175 0.180985 12.0019 1.68106 14.002C3.25258 16.145 5.68128 17.5022 8.39571 17.8593L10.8958 24.0025C11.1816 24.6454 11.8245 25.074 12.5388 25.074C13.2531 25.074 13.896 24.6454 14.1817 24.0025C14.6103 22.931 15.1103 21.7881 15.6104 20.7166C16.8247 18.0022 18.0391 15.2163 18.9677 12.359C19.9677 9.35889 19.5392 6.14443 17.8248 3.71573C16.1104 1.35846 13.396 0.0726814 10.1101 0.00124908ZM16.6104 11.6447C15.6818 14.3592 14.4675 17.145 13.3245 19.788C13.1102 20.3595 12.8245 20.8595 12.6102 21.431L10.1815 15.5735L9.39576 15.5021C7.10992 15.3592 4.96695 14.2163 3.7526 12.5733C2.68112 11.1447 2.32396 9.35889 2.75255 7.64451C3.46687 4.71579 6.53846 2.57281 10.0386 2.57281H10.1101C12.5388 2.57281 14.5389 3.57287 15.8247 5.28724C17.039 7.00162 17.3247 9.43032 16.6104 11.6447Z" />
                      <path d="M42.3267 3.78726C40.6124 1.35856 37.8979 0.00134277 34.612 0.00134277C34.5406 0.00134277 34.5406 0.00134277 34.4692 0.00134277C29.8975 0.00134277 25.7544 3.0015 24.7544 7.00171C24.1829 9.50185 24.6829 12.002 26.183 14.0735C27.7545 16.2165 30.1832 17.5737 32.8977 17.9309L35.3978 24.074C35.6835 24.7169 36.3264 25.1455 37.0407 25.1455C37.7551 25.1455 38.398 24.7169 38.6837 24.074C39.1123 23.0026 39.6123 21.8596 40.1123 20.7882C41.3267 18.0737 42.541 15.2879 43.4696 12.4306C44.4697 9.50184 44.0411 6.21596 42.3267 3.78726ZM41.1124 11.6448C40.1838 14.3592 38.9694 17.1451 37.8265 19.7881C37.6122 20.3596 37.3265 20.8596 37.1122 21.431L34.6835 15.5736L33.8977 15.5022C31.6119 15.3593 29.4689 14.2164 28.2546 12.5734C27.1831 11.1448 26.8259 9.35898 27.2545 7.57317C27.9688 4.64445 31.0404 2.50147 34.5406 2.50147H34.612C37.0407 2.50147 39.0408 3.50153 40.3266 5.2159C41.541 7.00171 41.8267 9.43041 41.1124 11.6448Z" />
                    </svg>
                  </span>
                  <p class="mb-4 text-base font-medium italic leading-[26px] text-dark">
                    A spring of truth shall flow from it: like a new star it
                    shall scatter the darkness of ignorance, and cause a
                    light heretofore unknown to shine amongst men.
                  </p>
                  <span class="text-sm italic text-body-color">
                    “Andrio Domeco”
                  </span>
                </div>
                <div>
                  <span class="absolute left-0 top-0">
                    <svg width="103" height="109" viewBox="0 0 103 109" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <ellipse cx="0.483916" cy="3.5" rx="102.075" ry="105.5" transform="rotate(180 0.483916 3.5)" fill="url(#paint0_linear)" />
                      <defs>
                        <linearGradient id="paint0_linear" x1="-101.591" y1="-50.4346" x2="49.1618" y2="-49.6518" gradientUnits="userSpaceOnUse">
                          <stop stop-color="#3056D3" stop-opacity="0.15" />
                          <stop offset="1" stop-color="white" stop-opacity="0" />
                        </linearGradient>
                      </defs>
                    </svg>
                  </span>
                  <span class="absolute bottom-0 right-0">
                    <svg width="102" height="106" viewBox="0 0 102 106" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <ellipse cx="102.484" cy="105.5" rx="102.075" ry="105.5" fill="url(#paint0_linear)" />
                      <defs>
                        <linearGradient id="paint0_linear" x1="0.409163" y1="51.5654" x2="151.162" y2="52.3482" gradientUnits="userSpaceOnUse">
                          <stop stop-color="#3056D3" stop-opacity="0.5" />
                          <stop offset="1" stop-color="white" stop-opacity=".2" />
                        </linearGradient>
                      </defs>
                    </svg>
                  </span>
                </div>
              </div>

              <h3 class="wow fadeInUp mb-8 text-2xl font-bold text-dark sm:text-[26px]" data-wow-delay=".1s">
                What is it with your ideas?
              </h3>

              <p class="wow fadeInUp mb-8 text-base leading-relaxed text-body-color" data-wow-delay=".1s">
                At quo cetero fastidii. Usu ex ornatus corpora sententiae,
                vocibus deleniti ut nec. Ut enim eripuit eligendi est, in
                iracundia signiferumque quo. Sed virtute suavitate
                suscipiantur ea, dolor this can eloquentiam ei pro. Suas
                adversarium interpretaris eu sit, eum viris impedit ne.
                Erant appareat corrumpit ei vel.
              </p>
              <p class="wow fadeInUp mb-11 text-base leading-relaxed text-body-color" data-wow-delay=".1s">
                At quo cetero fastidii. Usu ex ornatus corpora sententiae,
                vocibus deleniti ut nec. Ut enim eripuit eligendi est, in
                iracundia signiferumque quo. Sed virtute suavitate
                suscipiantur ea, dolor this can eloquentiam ei pro. Suas
                adversarium interpretaris eu sit, eum viris impedit ne.
                Erant appareat corrumpit ei vel.
              </p>

              <div class="-mx-4 mb-12 flex flex-wrap items-center">
                <div class="w-full px-4 md:w-1/2">
                  <div class="wow fadeInUp mb-8 flex flex-wrap items-center md:mb-0" data-wow-delay=".1s">
                    <a href="javascript:void(0)" class="mr-2 mb-2 block rounded bg-primary bg-opacity-5 py-2 px-5 text-xs font-medium text-primary hover:bg-opacity-100 hover:text-white md:mr-4 lg:mr-2 xl:mr-4">
                      Design
                    </a>
                    <a href="javascript:void(0)" class="mr-2 mb-2 block rounded bg-primary bg-opacity-5 py-2 px-5 text-xs font-medium text-primary hover:bg-opacity-100 hover:text-white md:mr-4 lg:mr-2 xl:mr-4">
                      Development
                    </a>
                    <a href="javascript:void(0)" class="mb-2 block rounded bg-primary bg-opacity-5 py-2 px-5 text-xs font-medium text-primary hover:bg-opacity-100 hover:text-white">
                      Info
                    </a>
                  </div>
                </div>
                <div class="w-full px-4 md:w-1/2">
                  <div class="wow fadeInUp flex items-center md:justify-end" data-wow-delay=".1s">
                    <span class="mr-5 text-sm font-medium text-body-color">
                      Share This Post
                    </span>
                    <div class="flex items-center">
                      <a href="javascript:void(0)" class="mr-4 mb-2">
                        <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M0 16C0 7.16344 7.16344 0 16 0C24.8366 0 32 7.16344 32 16C32 24.8366 24.8366 32 16 32C7.16344 32 0 24.8366 0 16Z" fill="#4064AC" />
                          <path d="M19.439 14.4H18.1992H17.7564V13.8839V12.2839V11.7677H18.1992H19.1291C19.3726 11.7677 19.5719 11.5613 19.5719 11.2516V8.51613C19.5719 8.23226 19.3947 8 19.1291 8H17.5128C15.7638 8 14.5461 9.44516 14.5461 11.5871V13.8323V14.3484H14.1033H12.5978C12.2878 14.3484 12 14.6323 12 15.0452V16.9032C12 17.2645 12.2435 17.6 12.5978 17.6H14.059H14.5018V18.1161V23.3032C14.5018 23.6645 14.7454 24 15.0996 24H17.1807C17.3136 24 17.4243 23.9226 17.5128 23.8194C17.6014 23.7161 17.6678 23.5355 17.6678 23.3806V18.1419V17.6258H18.1328H19.1291C19.4169 17.6258 19.6383 17.4194 19.6826 17.1097V17.0839V17.0581L19.9925 15.2774C20.0147 15.0968 19.9925 14.8903 19.8597 14.6839C19.8154 14.5548 19.6161 14.4258 19.439 14.4Z" fill="white" />
                        </svg>
                      </a>
                      <a href="javascript:void(0)" class="mr-4 mb-2">
                        <svg width="32" height="33" viewBox="0 0 32 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd" clip-rule="evenodd" d="M32 16.7347C32 25.5713 24.8366 32.7347 16 32.7347C7.16344 32.7347 0 25.5713 0 16.7347C0 7.89818 7.16344 0.734741 16 0.734741C24.8366 0.734741 32 7.89818 32 16.7347ZM23.6036 12.8349C24.3771 12.7431 25.1147 12.5375 25.8004 12.2334C25.2878 13.0004 24.6395 13.6738 23.8917 14.2128C23.8991 14.3765 23.9028 14.5417 23.9028 14.7074C23.9028 19.7617 20.0558 25.5892 13.0213 25.5892C10.8616 25.5892 8.85088 24.9563 7.15927 23.8708C7.45789 23.9064 7.76307 23.9244 8.07111 23.9244C9.8634 23.9244 11.5122 23.3132 12.8214 22.2873C11.1474 22.2562 9.73534 21.1504 9.24876 19.6313C9.48206 19.6758 9.72136 19.6995 9.96836 19.6995C10.3166 19.6995 10.6552 19.653 10.9757 19.5652C9.22651 19.2141 7.90768 17.6685 7.90768 15.8154C7.90768 15.7995 7.90768 15.7832 7.90796 15.767C8.42335 16.0542 9.01346 16.2262 9.64007 16.2458C8.61444 15.5602 7.93876 14.3891 7.93876 13.0625C7.93876 12.3618 8.12758 11.7044 8.45672 11.1396C10.3431 13.4541 13.1613 14.9766 16.3398 15.1361C16.2742 14.856 16.2402 14.5642 16.2402 14.2644C16.2402 12.1527 17.953 10.44 20.0647 10.44C21.1653 10.44 22.1593 10.9043 22.8569 11.6473C23.7277 11.4759 24.5466 11.1579 25.2856 10.7195C24.9995 11.6131 24.3934 12.3618 23.6036 12.8349Z" fill="#55ACEE" />
                        </svg>
                      </a>
                      <a href="javascript:void(0)" class="mb-2">
                        <svg width="33" height="32" viewBox="0 0 33 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd" clip-rule="evenodd" d="M32.7861 16C32.7861 24.8366 25.6227 32 16.7861 32C7.94958 32 0.786133 24.8366 0.786133 16C0.786133 7.16344 7.94958 0 16.7861 0C25.6227 0 32.7861 7.16344 32.7861 16ZM8.50669 8.82376C8.50669 7.69545 9.36262 6.83666 10.6709 6.83666C11.9795 6.83666 12.7835 7.69545 12.8089 8.82376C12.8089 9.92811 11.9795 10.8117 10.6455 10.8117H10.6207C9.33781 10.8117 8.50669 9.92811 8.50669 8.82376ZM26.3457 23.884V17.2875C26.3457 13.7551 24.4593 12.1112 21.9431 12.1112C19.9109 12.1112 19.0045 13.2292 18.4963 14.0113V12.3813H14.6712C14.7226 13.4602 14.6712 23.8837 14.6712 23.8837H18.496V17.4595C18.496 17.1147 18.5219 16.7733 18.6226 16.5274C18.8998 15.8395 19.5276 15.129 20.5843 15.129C21.969 15.129 22.5212 16.1843 22.5212 17.7296V23.884H26.3457ZM18.4963 14.0113V14.0489H18.4709C18.4745 14.0424 18.4793 14.0358 18.4841 14.0292L18.4841 14.0291C18.4883 14.0232 18.4926 14.0173 18.4963 14.0113ZM8.73421 23.8839H12.5575V12.3812H8.73421V23.8839Z" fill="#007AB9" />
                        </svg>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="w-full px-4 lg:w-4/12">
            <div>
              <div class="wow fadeInUp relative mb-12 overflow-hidden rounded bg-primary py-[60px] px-11 text-center lg:px-8" data-wow-delay=".1s
                    ">
                <h3 class="mb-2 text-2xl font-semibold text-white">
                  Join our newsletter!
                </h3>
                <p class="mb-8 text-base text-white">
                  Enter your email to receive our latest newsletter.
                </p>
                <form>
                  <input type="email" placeholder="Your email address" class="mb-4 h-[50px] w-full rounded border border-transparent bg-white bg-opacity-20 text-center text-sm font-medium text-white placeholder-white outline-none focus:border-white focus-visible:shadow-none" />
                  <input type="submit" value="Subscribe Now" class="mb-6 h-[50px] w-full cursor-pointer rounded bg-[#13C296] text-center text-sm font-medium text-white transition duration-300 ease-in-out hover:bg-opacity-90 hover:shadow-lg" />
                </form>
                <p class="text-sm font-medium text-white">
                  Don't worry, we don't spam
                </p>

                <div>
                  <span class="absolute top-0 right-0">
                    <svg width="46" height="46" viewBox="0 0 46 46" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <circle cx="1.39737" cy="44.6026" r="1.39737" transform="rotate(-90 1.39737 44.6026)" fill="white" fill-opacity="0.44" />
                      <circle cx="1.39737" cy="7.9913" r="1.39737" transform="rotate(-90 1.39737 7.9913)" fill="white" fill-opacity="0.44" />
                      <circle cx="13.6943" cy="44.6026" r="1.39737" transform="rotate(-90 13.6943 44.6026)" fill="white" fill-opacity="0.44" />
                      <circle cx="13.6943" cy="7.9913" r="1.39737" transform="rotate(-90 13.6943 7.9913)" fill="white" fill-opacity="0.44" />
                      <circle cx="25.9911" cy="44.6026" r="1.39737" transform="rotate(-90 25.9911 44.6026)" fill="white" fill-opacity="0.44" />
                      <circle cx="25.9911" cy="7.9913" r="1.39737" transform="rotate(-90 25.9911 7.9913)" fill="white" fill-opacity="0.44" />
                      <circle cx="38.288" cy="44.6026" r="1.39737" transform="rotate(-90 38.288 44.6026)" fill="white" fill-opacity="0.44" />
                      <circle cx="38.288" cy="7.9913" r="1.39737" transform="rotate(-90 38.288 7.9913)" fill="white" fill-opacity="0.44" />
                      <circle cx="1.39737" cy="32.3058" r="1.39737" transform="rotate(-90 1.39737 32.3058)" fill="white" fill-opacity="0.44" />
                      <circle cx="13.6943" cy="32.3058" r="1.39737" transform="rotate(-90 13.6943 32.3058)" fill="white" fill-opacity="0.44" />
                      <circle cx="25.9911" cy="32.3058" r="1.39737" transform="rotate(-90 25.9911 32.3058)" fill="white" fill-opacity="0.44" />
                      <circle cx="38.288" cy="32.3058" r="1.39737" transform="rotate(-90 38.288 32.3058)" fill="white" fill-opacity="0.44" />
                      <circle cx="1.39737" cy="20.0086" r="1.39737" transform="rotate(-90 1.39737 20.0086)" fill="white" fill-opacity="0.44" />
                      <circle cx="13.6943" cy="20.0086" r="1.39737" transform="rotate(-90 13.6943 20.0086)" fill="white" fill-opacity="0.44" />
                      <circle cx="25.9911" cy="20.0086" r="1.39737" transform="rotate(-90 25.9911 20.0086)" fill="white" fill-opacity="0.44" />
                      <circle cx="38.288" cy="20.0086" r="1.39737" transform="rotate(-90 38.288 20.0086)" fill="white" fill-opacity="0.44" />
                    </svg>
                  </span>
                  <span class="absolute bottom-0 left-0">
                    <svg width="46" height="46" viewBox="0 0 46 46" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <circle cx="1.39737" cy="44.6026" r="1.39737" transform="rotate(-90 1.39737 44.6026)" fill="white" fill-opacity="0.44" />
                      <circle cx="1.39737" cy="7.9913" r="1.39737" transform="rotate(-90 1.39737 7.9913)" fill="white" fill-opacity="0.44" />
                      <circle cx="13.6943" cy="44.6026" r="1.39737" transform="rotate(-90 13.6943 44.6026)" fill="white" fill-opacity="0.44" />
                      <circle cx="13.6943" cy="7.9913" r="1.39737" transform="rotate(-90 13.6943 7.9913)" fill="white" fill-opacity="0.44" />
                      <circle cx="25.9911" cy="44.6026" r="1.39737" transform="rotate(-90 25.9911 44.6026)" fill="white" fill-opacity="0.44" />
                      <circle cx="25.9911" cy="7.9913" r="1.39737" transform="rotate(-90 25.9911 7.9913)" fill="white" fill-opacity="0.44" />
                      <circle cx="38.288" cy="44.6026" r="1.39737" transform="rotate(-90 38.288 44.6026)" fill="white" fill-opacity="0.44" />
                      <circle cx="38.288" cy="7.9913" r="1.39737" transform="rotate(-90 38.288 7.9913)" fill="white" fill-opacity="0.44" />
                      <circle cx="1.39737" cy="32.3058" r="1.39737" transform="rotate(-90 1.39737 32.3058)" fill="white" fill-opacity="0.44" />
                      <circle cx="13.6943" cy="32.3058" r="1.39737" transform="rotate(-90 13.6943 32.3058)" fill="white" fill-opacity="0.44" />
                      <circle cx="25.9911" cy="32.3058" r="1.39737" transform="rotate(-90 25.9911 32.3058)" fill="white" fill-opacity="0.44" />
                      <circle cx="38.288" cy="32.3058" r="1.39737" transform="rotate(-90 38.288 32.3058)" fill="white" fill-opacity="0.44" />
                      <circle cx="1.39737" cy="20.0086" r="1.39737" transform="rotate(-90 1.39737 20.0086)" fill="white" fill-opacity="0.44" />
                      <circle cx="13.6943" cy="20.0086" r="1.39737" transform="rotate(-90 13.6943 20.0086)" fill="white" fill-opacity="0.44" />
                      <circle cx="25.9911" cy="20.0086" r="1.39737" transform="rotate(-90 25.9911 20.0086)" fill="white" fill-opacity="0.44" />
                      <circle cx="38.288" cy="20.0086" r="1.39737" transform="rotate(-90 38.288 20.0086)" fill="white" fill-opacity="0.44" />
                    </svg>
                  </span>
                </div>
              </div>

              <div class="-mx-4 mb-8 flex flex-wrap">
                <div class="w-full px-4">
                  <h2 class="wow fadeInUp relative pb-5 text-2xl font-semibold text-dark sm:text-[28px]" data-wow-delay=".1s
                        ">
                    Latest Articles
                  </h2>
                  <span class="mb-10 inline-block h-[2px] w-20 bg-primary"></span>
                </div>

                <div class="w-full px-4 md:w-1/2 lg:w-full">
                  <div class="wow fadeInUp mb-5 flex w-full items-center border-b border-[#F2F3F8] pb-5" data-wow-delay=".1s
                        ">
                    <div class="mr-5 h-20 w-full max-w-[80px] overflow-hidden rounded-full">
                      <img src="{{ asset('themes/' . $theme->folder . '/images/landing/blog/article-author-01.png') }}" alt="image" class="w-full" />

                    </div>
                    <div class="w-full">
                      <h4>
                        <a href="javascript:void(0)" class="mb-1 inline-block text-lg font-medium leading-snug text-dark hover:text-primary lg:text-base xl:text-lg">
                          Create engaging online courses your student…
                        </a>
                      </h4>
                      <p class="text-sm text-body-color">Glomiya Lucy</p>
                    </div>
                  </div>
                </div>
                <div class="w-full px-4 md:w-1/2 lg:w-full">
                  <div class="wow fadeInUp mb-5 flex w-full items-center border-b border-[#F2F3F8] pb-5" data-wow-delay=".1s
                        ">
                    <div class="mr-5 h-20 w-full max-w-[80px] overflow-hidden rounded-full">
                      <img src="{{ asset('themes/' . $theme->folder . '/images/landing/blog/article-author-01.png') }}" alt="image" class="w-full" />

                    </div>
                    <div class="w-full">
                      <h4>
                        <a href="javascript:void(0)" class="mb-1 inline-block text-lg font-medium leading-snug text-dark hover:text-primary lg:text-base xl:text-lg">
                          The ultimate formula for launching online course
                        </a>
                      </h4>
                      <p class="text-sm text-body-color">Andrio jeson</p>
                    </div>
                  </div>
                </div>
                <div class="w-full px-4 md:w-1/2 lg:w-full">
                  <div class="wow fadeInUp mb-5 flex w-full items-center border-b border-[#F2F3F8] pb-5" data-wow-delay=".1s
                        ">
                    <div class="mr-5 h-20 w-full max-w-[80px] overflow-hidden rounded-full">
                      <img src="{{ asset('themes/' . $theme->folder . '/images/landing/blog/article-author-01.png') }}" alt="image" class="w-full" />

                    </div>
                    <div class="w-full">
                      <h4>
                        <a href="javascript:void(0)" class="mb-1 inline-block text-lg font-medium leading-snug text-dark hover:text-primary lg:text-base xl:text-lg">
                          50 Best web design tips & tricks that will help
                          you
                        </a>
                      </h4>
                      <p class="text-sm text-body-color">Samoyel Dayno</p>
                    </div>
                  </div>
                </div>
                <div class="w-full px-4 md:w-1/2 lg:w-full">
                  <div class="wow fadeInUp mb-5 flex w-full items-center border-0 border-[#F2F3F8] pb-5 md:border-b lg:border-0" data-wow-delay=".1s
                        ">
                    <div class="mr-5 h-20 w-full max-w-[80px] overflow-hidden rounded-full">
                      <img src="{{ asset('themes/' . $theme->folder . '/images/landing/blog/article-author-01.png') }}" alt="image" class="w-full" />

                    </div>
                    <div class="w-full">
                      <h4>
                        <a href="javascript:void(0)" class="mb-1 inline-block text-lg font-medium leading-snug text-dark hover:text-primary lg:text-base xl:text-lg">
                          The 8 best landing page builders, reviewed
                        </a>
                      </h4>
                      <p class="text-sm text-body-color">Andrio Glori</p>
                    </div>
                  </div>
                </div>
              </div>

              <div class="wow fadeInUp mb-12 overflow-hidden rounded" data-wow-delay=".1s">
                <img src="{{ asset('themes/' . $theme->folder . '/images/landing/blog/bannder-ad.png') }}" alt="image" class="w-full" />


              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


  </div>
</section>
<!-- ====== Blog Details Section End -->






@endsection
