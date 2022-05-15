<div>
    <div class="intro-y box lg:mt-5">

        <div class="p-5">
            <div class="flex flex-col-reverse xl:flex-row flex-col">
                <div class="flex-1 mt-6 xl:mt-0">
                    <div class="grid grid-cols-12 gap-x-5">
                        <div class="col-span-12 2xl:col-span-12">
                            <div class="p-5 shadow-lg rounded-lg">
                                <div class="mt-5">
                                    <span class="text-xl font-extra-bold mt-5"> Affiliate Kodunuz : </span>
                                    <span class="text-xl text-theme-1 font-bold">
                                        {{auth()->user()->affiliate_code}} </span>
                                    <button id="copy-address-fullname" class="btn inline  hover:bg-blue-800"
                                        data-clipboard-text="Sellerfulfilment Warehouse">
                                        Kopyala
                                    </button>
                                    <div class="text-md mt-2 ">
                                        Bu kodu kullanarak üye olan tüm üyelerinizin gönderileri üzerinden Fulfilment
                                        puanı kazanabilir biriken puanlarınızı gönderilerinizde kullanabilirsiniz.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="intro-y box col-span-12 lg:col-span-12 mt-4">
                            <div
                                class="flex items-center px-5 py-5 sm:py-0 border-b border-gray-200 dark:border-dark-5">
                                <h2 class="font-medium text-base mr-auto">
                                    Toplam Fulfilment Puanınız - <strong class="text-theme-1">1000</strong>
                                </h2>
                                <div class="dropdown ml-auto sm:hidden">
                                    <a class="dropdown-toggle w-5 h-5 block" href="javascript:;" aria-expanded="false">
                                        <i data-feather="more-horizontal"
                                            class="w-5 h-5 text-gray-600 dark:text-gray-300"></i> </a>
                                    <div class="nav nav-tabs dropdown-menu w-40" role="tablist">
                                        <div class="dropdown-menu__content box dark:bg-dark-1 p-2"> <a
                                                id="work-in-progress-new-tab" href="javascript:;" data-toggle="tab"
                                                data-target="#work-in-progress-new"
                                                class="block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"
                                                role="tab" aria-controls="work-in-progress-new"
                                                aria-selected="true">New</a> <a id="work-in-progress-last-week-tab"
                                                href="javascript:;" data-toggle="tab"
                                                data-target="#work-in-progress-last-week"
                                                class="block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"
                                                role="tab" aria-selected="false">Last Week</a> </div>
                                    </div>
                                </div>
                                <div class="nav nav-tabs ml-auto hidden sm:flex" role="tablist"> <a
                                        id="work-in-progress-mobile-new-tab" data-toggle="tab"
                                        data-target="#work-in-progress-new" href="javascript:;" class="py-5 ml-6 active"
                                        role="tab" aria-selected="true">Toplam</a> </div>
                            </div>
                            <div class="p-5">
                                <div class="tab-content">
                                    <div id="work-in-progress-new" class="tab-pane active" role="tabpanel"
                                        aria-labelledby="work-in-progress-new-tab">
                                        <div>
                                            <div class="flex">
                                                <div class="mr-auto">Toplam Üyeleriniz</div>
                                                <div>20%</div>
                                            </div>
                                            <div class="progress h-1 mt-2">
                                                <div class="progress-bar w-1/2 bg-theme-1" role="progressbar"
                                                    aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="mt-5">
                                            <div class="flex">
                                                <div class="mr-auto">Üyelerinizin Toplam Gönderi Sayısı</div>
                                                <div>2 / 20</div>
                                            </div>
                                            <div class="progress h-1 mt-2">
                                                <div class="progress-bar w-1/4 bg-theme-1" role="progressbar"
                                                    aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="mt-5">
                                            <div class="flex">
                                                <div class="mr-auto">Üyelerinizin Toplam Gönderi Harcamaları
                                                </div>
                                                <div>42</div>
                                            </div>
                                            <div class="progress h-1 mt-2">
                                                <div class="progress-bar w-3/4 bg-theme-1" role="progressbar"
                                                    aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col-span-12 2xl:col-span-12 mt-5">
                      <div class="p-5 shadow-lg rounded-lg">
                          <div class="text-xl font-extra-bold">Abonelikler</div>
                          <div class="mt-2">Aboneliklerde kullanmak istediğiniz varsayılan ödeme yönteminiz.</div>
                          <div class="form-check mt-2"> <label class="form-check-label mr-2" for="checkbox-switch-7">Bakiye</label><input wire:model="IsDefaultCreditCard" id="checkbox-switch-7" class="form-check-switch"
                                  type="checkbox"> <label class="form-check-label ml-2" for="checkbox-switch-7">Kredi Kartı</label> </div>

                      </div>
                  </div> --}}

                    </div>
                    {{-- <button type="button" class="btn btn-primary w-20 mt-3">Save</button> --}}
                </div>

            </div>
        </div>
    </div>

</div>

<script>
    new ClipboardJS('#copy-address-1');
    new ClipboardJS('#copy-address-2');
    new ClipboardJS('#copy-address-fullname');
    new ClipboardJS('#copy-address-city');
    new ClipboardJS('#copy-address-zip-code');
    new ClipboardJS('#copy-address-state');
    new ClipboardJS('#copy-address-phone-number');
</script>
