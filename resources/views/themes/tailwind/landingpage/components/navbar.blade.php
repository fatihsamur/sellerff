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
    @if((new \Jenssegers\Agent\Agent())->isMobile())
    <li class="group relative">
      <a href="{{ url('landing-blog') }}" class=" mx-8 flex py-2 text-base text-dark group-hover:text-primary lg:mr-0 lg:ml-7 lg:inline-flex lg:py-6 lg:px-0 lg:text-white lg:group-hover:text-white lg:group-hover:opacity-70 xl:ml-12 ">
        Giriş Yap
      </a>
    </li>
    <li class="group relative">
      <a href="{{ url('landing-blog') }}" class=" mx-8 flex py-2 text-base text-dark group-hover:text-primary lg:mr-0 lg:ml-7 lg:inline-flex lg:py-6 lg:px-0 lg:text-white lg:group-hover:text-white lg:group-hover:opacity-70 xl:ml-12">
        Üye Ol
      </a>
    </li>
    @endif
  </ul>

</nav>
