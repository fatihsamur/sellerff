        <!-- BEGIN: Top Bar -->
        <div class="-mt-10 md:-mt-5 -mx-3 sm:-mx-8 px-3 sm:px-8 pt-3 md:pt-0">
            @if (auth()->guest())
                @include('theme::menus.guest')
            @else
                <!-- Otherwise we want to show the menu for the logged in user -->
                @include('theme::menus.authenticated')
                <!-- BEGIN: Top Menu -->
                <nav class="top-nav">
                    <ul>
                        {{-- @customer --}}
                        @notemployee
                        <li>
                            <a href="{{ url('/dashboard') }}" class="top-menu @if (Request::is('dashboard'))top-menu--active @endif">
                                <div class="top-menu__icon"> <i data-feather="home"></i> </div>
                                <div class="top-menu__title">Panelim</div>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/orders') }}" class="top-menu @if (Request::is('orders'))top-menu--active @endif">
                                <div class="top-menu__icon"> <i data-feather="package"></i> </div>
                                <div class="top-menu__title">Gönderilerim</div>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/other-services') }}" class="top-menu @if (Request::is('other-services'))top-menu--active @endif">
                                <div class="top-menu__icon"> <i data-feather="box"></i> </div>
                                <div class="top-menu__title">Ek Hizmetler</div>
                            </a>
                        </li>
                        <li>

                            <a href="{{ url('/fba') }}" class="top-menu @if (Request::is('fba', 'fba/*'))top-menu--active @endif">
                                <div class="top-menu__icon"> <span class="iconify" data-icon="whh:amazon"></span>
                                </div>
                                <div class="top-menu__title">FBA</div>
                            </a>

                        </li>
                        <li>
                        <a href="{{ url('/dropshipping') }}" class="top-menu @if (Request::is('dropshipping', 'dropshipping/*'))top-menu--active @endif">
                                <div class="top-menu__icon"> <span class="iconify" data-icon="whh:amazon"></span>
                                </div>
                                <div class="top-menu__title">Dropshipping</div>
                            </a>
                        </li>

                        @endnotemployee
                        {{-- @endcustomer --}}
                        @admin

                        <li>
                            <a href="{{ url('/admin-sellerfullfilment') }}" class="top-menu @if (Request::is('admin-sellerfullfilment', 'admin-sellerfullfilment/*'))top-menu--active @endif">
                                <div class="top-menu__icon"> <span class="iconify"
                                        data-icon="dashicons:admin-settings"></span>

                                </div>
                                <div class="top-menu__title">Yönetim</div>
                            </a>
                            <ul class="">
                                <li>
                                    <a href="{{ route('admin.deposit_requests') }}" class="top-menu">
                                        <div class="top-menu__icon"> <span class="iconify"
                                                data-icon="carbon:currency-dollar"></span> </div>
                                        <div class="top-menu__title">Bakiye İşlemleri</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.user_list') }}" class="top-menu">
                                        <div class="top-menu__icon"> <span class="iconify"
                                                data-icon="clarity:users-solid"></span> </div>
                                        <div class="top-menu__title">Kullanıcılar</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.reports') }}" class="top-menu">
                                        <div class="top-menu__icon"> <span class="iconify"
                                                data-icon="carbon:report"></span> </div>
                                        <div class="top-menu__title">Raporlar</div>
                                    </a>
                                </li>
                            </ul>
                        </li>


                        @endadmin
                        @employee -
                        <li>
                            <a href="#" class="top-menu">
                                <div class="top-menu__icon"> <span class="iconify"
                                        data-icon="fa-solid:warehouse"></span> </div>
                                <div class="top-menu__title">Depo İşlemleri</div>
                            </a>
                            <ul class="">
                                <li>
                                    <a href="{{ route('warehouse.order_process') }}" class="top-menu">
                                        <div class="top-menu__icon"> <span class="iconify"
                                                data-icon="bx:bx-package"></span> </div>
                                        <div class="top-menu__title">Gönderi İşlemleri</div>
                                    </a>
                                </li>
                                {{-- <li>
                                <a href="{{ route('warehouse.box_settings') }}" class="top-menu">
                                    <div class="top-menu__icon"> <span class="iconify"
                                            data-icon="bx:bx-package"></span> </div>
                                    <div class="top-menu__title">Box Ayarları</div>
                                </a>
                            </li> --}}

                            </ul>
                        </li>
                        @endemployee

                    </ul>
                </nav>
                <!-- END: Top Menu -->

            @endif
        </div>
        <!-- END: Top Bar -->
