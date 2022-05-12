            <div class="top-bar-boxed flex items-center">
                <!-- BEGIN: Logo -->
                <a href="{{url('/')}}" class="-intro-x hidden md:flex items-center">
                    @include('theme::svg.main-logo-white')
                </a>
                <!-- END: Logo -->
                <!-- BEGIN: Breadcrumb -->
                <div class="mr-auto">

                </div>
                <!-- END: Breadcrumb -->
                <!-- BEGIN: Search -->
                <div class="intro-x relative mr-3 sm:mr-6">
                    <div class="search hidden sm:block">
                        <input type="text"
                            class="search__input form-control dark:bg-dark-1 border-transparent placeholder-theme-13"
                            placeholder="Arama...">
                        <i data-feather="search" class="search__icon dark:text-gray-300"></i>
                    </div>
                    <a class="notification notification--light sm:hidden" href=""> <i data-feather="search"
                            class="notification__icon dark:text-gray-300"></i> </a>
<!--                     <div class="search-result">
                        <div class="search-result__content">
                            <div class="search-result__content__title">Pages</div>
                            <div class="mb-5">
                                <a href="" class="flex items-center">
                                    <div
                                        class="w-8 h-8 bg-theme-18 text-theme-9 flex items-center justify-center rounded-full">
                                        <i class="w-4 h-4" data-feather="inbox"></i>
                                    </div>
                                    <div class="ml-3">Mail Settings</div>
                                </a>
                                <a href="" class="flex items-center mt-2">
                                    <div
                                        class="w-8 h-8 bg-theme-17 text-theme-11 flex items-center justify-center rounded-full">
                                        <i class="w-4 h-4" data-feather="users"></i>
                                    </div>
                                    <div class="ml-3">Users & Permissions</div>
                                </a>
                                <a href="" class="flex items-center mt-2">
                                    <div
                                        class="w-8 h-8 bg-theme-14 text-theme-10 flex items-center justify-center rounded-full">
                                        <i class="w-4 h-4" data-feather="credit-card"></i>
                                    </div>
                                    <div class="ml-3">Transactions Report</div>
                                </a>
                            </div>
                        </div>
                    </div> -->
                </div>
                <!-- END: Search -->
                <!-- BEGIN: Notifications -->
                @include('theme::partials.notifications')


                <!-- END: Notifications -->
                <!-- BEGIN: Account Menu -->
                <div class="intro-x dropdown w-8 h-8">
                    <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in scale-110"
                        role="button" aria-expanded="false">
                        <img src="{{ auth()->user()->avatar() .
                            '?' .
                            time() }}"
                            alt="{{ auth()->user()->name }}'s Avatar">
                    </div>
                    <div class="dropdown-menu w-56">
                        <div class="dropdown-menu__content box bg-theme-26 dark:bg-dark-6 text-white">
                            <div class="p-4 border-b border-theme-27 dark:border-dark-3">
                                @if (auth()->user()->onTrial())
                                    <div class="relative items-center justify-center hidden h-full md:flex">
                                        <span
                                            class="px-3 py-1 text-xs text-red-600 bg-red-100 border border-gray-200 rounded-md">You
                                            have {{ auth()->user()->daysLeftOnTrial() }} @if (auth()->user()->daysLeftOnTrial() > 1){{ 'Days' }}@else{{ 'Day' }}@endif left
                                            on your Trial</span>
                                    </div>
                                @endif
                                <div class="font-medium">{{ auth()->user()->name }}</div>
                                @employee
                                <div class="flex items-center">
                                  Depo Personeli
                                </div>
                                @endemployee
                                @notemployee
                                <div class="flex items-center">
                                    <div class="text-theme-28 mt-0.5 dark:text-gray-600">Bakiye :
                                        {{ auth()->user()->balance }} $
                                        <a href="{{ url('payments/create') }}" class="btn btn-sm btn-primary ml-2">
                                            <i data-feather="plus" class="w-2 h-2"></i>
                                        </a>
                                    </div>
                                </div>
                                @endnotemployee
                            </div>
                            @notemployee
                            <div class="p-2">
                                <a href="{{ url('payments') }}"
                                    class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md">
                                    <i data-feather="user" class="w-4 h-4 mr-2"></i> Bakiye İşlemleri </a>

                                @trial
                                <a href="{{ route('wave.settings', 'plans') }}"
                                    class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md">Upgrade
                                    My Account</a>
                                @endtrial

                                <a href="{{ route('wave.settings') }}"
                                    class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md">
                                    <i data-feather="help-circle" class="w-4 h-4 mr-2"></i> Ayarlar </a>
                            </div>
                            @endnotemployee
                            <div class="p-2 border-t border-theme-27 dark:border-dark-3">
                                <a href="{{ route('wave.logout') }}"
                                    class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md">
                                    <i data-feather="toggle-right" class="w-4 h-4 mr-2"></i> Çıkış </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: Account Menu -->
            </div>
