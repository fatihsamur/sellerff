            <div class="top-bar-boxed flex items-end">
                <!-- BEGIN: Logo -->
                <a href="{{url('/')}}" class="-intro-x hidden md:flex items-center">
                    @include('theme::svg.main-logo-white')

                </a>
                <!-- END: Logo -->
                <div class="-intro-x ml-auto justify-self-center ">
                    <nav class="top-nav">
                        <ul class="flex items-center">
                            <li>
                                <a href="{{ url('/') }}" class="top-menu @if (Request::is('/'))  @endif">
                                    <div class="top-menu__icon"> <i data-feather="home"></i> </div>
                                    <div class="top-menu__title">Anasayfa</div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/pricing') }}" class="top-menu @if (Request::is('pricing'))top-menu--active @endif">
                                    <div class="top-menu__icon"> <i data-feather="package"></i> </div>
                                    <div class="top-menu__title">Fiyatlandırma</div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/information') }}" class="top-menu @if (Request::is('information'))top-menu--active @endif">
                                    <div class="top-menu__icon"> <i data-feather="box"></i> </div>
                                    <div class="top-menu__title">Bilgilendirme</div>
                                </a>
                            </li>

                        </ul>
                    </nav>
                </div>

                <!-- BEGIN: Breadcrumb -->
                <div class="ml-auto justify-self-end ">
                    <nav class="top-nav">
                        <ul class="flex items-center">


                            <li>
                                <a href="{{ url('/login') }}" class="top-menu @if (Request::is('support'))top-menu--active @endif">
                                    <div class="top-menu__icon">
                                    </div>
                                    <div class="top-menu__title">Giriş Yap</div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/register') }}" class="top-menu">
                                    <div class="top-menu__icon"> <i data-feather="user"></i>
                                    </div>
                                    <div class="top-menu__title">Üye Ol</div>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <!-- END: Breadcrumb -->



            </div>
