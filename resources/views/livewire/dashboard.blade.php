<div>
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 2xl:col-span-10">
            <div class="grid grid-cols-12 gap-6">

                <div class="col-span-12 mt-8">
                    <div class="intro-y flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">
                            Hesap Bilgileri
                        </h2>

                    </div>
                    <!-- BEGIN: General Report -->
                    <div class="col-span-12 sm:col-span-6 md:col-span-4 py-6   relative text-center sm:text-left">
                        <div class="text-xl 2xl:text-base font-medium -mb-1"> Merhaba {{ auth()->user()->name }}, <span
                                class="text-gray-700 dark:text-gray-500 font-normal"> hoşgeldiniz</span> </div>
                    </div>
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-feather="dollar-sign" class="report-box__icon text-theme-10"></i>
                                        <div class="ml-auto">
                                            <a href="{{ url('payments/create') }}" class="btn btn-primary mr-1 mb-2">
                                                <i data-feather="plus" class="w-4 h-4 ml-0.5"></i> </a>
                                        </div>
                                    </div>
                                    <div class="text-3xl font-medium leading-8 mt-6">{{ $user->balance }}</div>
                                    <div class="text-base text-gray-600 mt-1">Bakiyeniz</div>
                                </div>
                            </div>
                        </div>

                        <div wire:click="goToOrders" class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-feather="package" class="report-box__icon text-theme-11"></i>

                                    </div>
                                    <div class="text-3xl font-medium leading-8 mt-6">
                                        {{ $user->orders()->count() ?? 0 }}
                                    </div>
                                    <div class="text-base text-gray-600 mt-1">Siparişler</div>
                                </div>
                            </div>
                        </div>


                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-feather="check-circle" class="report-box__icon text-theme-12"></i>
                                    </div>
                                    <div class="text-3xl font-medium leading-8 mt-6">{{ $completedOrdersRate }} %
                                    </div>
                                    <div class="text-base text-gray-600 mt-1">Sipariş Tamamlandı</div>
                                </div>
                            </div>
                        </div>


                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    @prime
                                    <div class="flex">
                                        <h2
                                            class="text-3xl text-gray-700 dark:text-gray-600 font-medium leading-none mt-3">
                                            Abonelik
                                        </h2>
                                    </div>
                                    <div class="font-medium mt-3" style="color:green;">Tebrikler</div>
                                    <span class="iconify" data-icon="clarity:success-standard-solid"
                                        data-width="30" style="color: green;"></span>
                                    <div class="font-small" style="color:green;">Prime aboneliğin avantajlarından
                                        faydalanmaktasınız
                                    </div>
                                    @endprime
                                    @notprime
                                    <div class="flex">

                                        <h2
                                            class="text-3xl text-gray-700 dark:text-gray-600 font-medium leading-none mt-3">
                                            Abonelik</h2>

                                    </div>
                                    <div class="flex mt-4">
                                        <div class="font-medium">Prime Aboneliğiniz bulunmamaktadır.</div>


                                    </div>
                                    <a href="{{ url('/settings/plans') }}"
                                        class="text-theme-1 block font-extrabold mt-4">Prime Üyeliği edinin</a>
                                    @endnotprime
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 lg:col-span-6 mt-6">
                    <div class="ads-box box p-8 relative overflow-hidden bg-theme-3 intro-y">
                        <div class="ads-box__title w-full sm:w-72 text-white text-xl -mt-3">Tüm ihtiyaçlarınız için
                            oluşturulmuş Akıllı Depo</div>
                        <div
                            class="w-full sm:w-72 leading-relaxed text-white text-opacity-70 dark:text-gray-600 dark:text-opacity-100 mt-3">
                            Sellerfullfilment ile tüm marketlerdeki kargolarınızı seçtiğiniz ülkeye güvenli ve hızlı bir
                            şekilde teslim edelim.</div>
                        <a href="{{ url('fba/create') }}"
                            class="btn w-32 bg-white dark:bg-dark-2 dark:text-white mt-6 sm:mt-10">Hemen Başla</a>
                        <img class="hidden sm:block absolute top-0 right-0 w-2/5 -mt-3 mr-2"
                            src="{{ asset('themes/' . $theme->folder . '/images/woman-illustration.svg') }}">
                    </div>
                </div>

                <div class="col-span-12 lg:col-span-6 mt-6">
                    <div class="ads-box box p-8 relative overflow-hidden intro-y">
                        <div class="ads-box__title w-full sm:w-52 text-theme-1 dark:text-white text-xl -mt-3">Arkadaşını
                            davet et 500 $'a kadar <span class="font-medium">ÜCRETSİZ</span> bonus kazan!</div>
                        <div class="w-full sm:w-60 leading-relaxed text-gray-600 mt-2">Davet et kazan kampanyamızdan tüm
                            üyelerimiz yararlanabilmektedir.</div>
                        <div class="w-48 relative mt-6 cursor-pointer ">
                            <div class="form-control text-sm" >{{ auth()->user()->affiliate_code }}</div>
                            <svg data-clipboard-text="{{ auth()->user()->affiliate_code }}" id="copy-affiliate-link"
                                xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round"
                                class="feather feather-copy absolute right-0 top-0 bottom-0 my-auto mr-4 w-4 h-4">
                                <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                            </svg>
                        </div>
                        <img class="hidden sm:block absolute top-0 right-0 w-1/2 mt-1 -mr-12"
                            alt="Rubick Tailwind HTML Admin Template"
                            src="{{ asset('themes/' . $theme->folder . '/images/phone-illustration.svg') }}">
                    </div>
                </div>

                <div class="col-span-12 lg:col-span-12 mt-8">
                    <div class="intro-y block sm:flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">
                            Bu Ay İçindeki Siparişleriniz
                        </h2>

                    </div>
                    <div class="intro-y box p-5 mt-12 sm:mt-5" style="height: 24rem;">
                        <livewire:livewire-line-chart key="two" :line-chart-model="$lineChartModel" />

                    </div>
                </div>
                <!-- END: Sales Report -->




            </div>
        </div>

    </div>

</div>


<script>
    new ClipboardJS('#copy-affiliate-link');
</script>
