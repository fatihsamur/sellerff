<div>
    <div class="intro-y box lg:mt-5">

        <div class="p-5">
            <div class="flex flex-col-reverse xl:flex-row flex-col">
                <div class="flex-1 mt-6 xl:mt-0">
                    <div class="grid grid-cols-12 gap-x-5">
                        <div class="col-span-12 2xl:col-span-12">
                            <div class="p-5 shadow-lg rounded-lg">
                                <div class="text-xl font-extra-bold">Depo</div>
                                <div class="text-md mt-2 text-red-500">
                                Lütfen aşağıdaki adresi Amazon satıcı hesabınızda gönderim planı hazırlarken "Ship from" adresi olarak ayarlayınız.
                                </div>
                                <div class="text-md mt-2 text-red-500">
                                Sellerfulfilment aracılığı ile gönderilen tüm siparişlerinizde aşağıdaki adresi kullanmanızı rica ederiz.
                                </div>
                                <div class="mt-5">
                                    <div class="text-md font-extra-bold mt-3">Özel Depo Adresiniz : </div>
                                    <span class="text-xl font-extra-bold mt-5"> Fullname : </span>
                                    <span class="text-xl text-theme-1 font-bold">
                                        Sellerfulfilment Warehouse </span>
                                    <button id="copy-address-fullname" class="btn inline  hover:bg-blue-800"
                                        data-clipboard-text="Sellerfulfilment Warehouse">
                                        Kopyala
                                    </button>
                                    <span class="text-xl font-extra-bold ml-5">Address 1 : </span>
                                    <span class="text-xl text-theme-1 font-bold">
                                        {{ auth()->user()->shipping_address_line() . auth()->user()->shipping_address_line_2() }}</span>
                                    <button id="copy-address-1" class="btn inline  hover:bg-blue-800"
                                        data-clipboard-text="{{ auth()->user()->shipping_address_line() . auth()->user()->shipping_address_line_2()  }}">
                                        Kopyala
                                    </button>

                                    <span class="text-xl font-extra-bold ml-5">City : </span>
                                    <span class="text-xl text-theme-1 font-bold">CHICAGO</span>
                                    <button id="copy-address-city" class="btn inline  hover:bg-blue-800"
                                        data-clipboard-text="CHICAGO">
                                        Kopyala
                                    </button>
                                    <span class="text-xl font-extra-bold ml-5">Zip Code : </span>
                                    <span class="text-xl text-theme-1 font-bold">60644-5503</span>
                                    <button id="copy-address-zip-code" class="btn inline  hover:bg-blue-800"
                                        data-clipboard-text="60644-5503">
                                        Kopyala
                                    </button>
                                    <span class="text-xl font-extra-bold ml-5">State : </span>
                                    <span class="text-xl text-theme-1 font-bold">Illinois</span>
                                    <button id="copy-address-state" class="btn inline  hover:bg-blue-800"
                                        data-clipboard-text="Illinois">
                                        Kopyala
                                    </button>
                                    <span class="text-xl font-extra-bold ml-5">Phone Number : </span>
                                    <span class="text-xl text-theme-1 font-bold">+17862385215</span>
                                    <button id="copy-address-phone-number" class="btn inline  hover:bg-blue-800"
                                        data-clipboard-text="+17862385215">
                                        Kopyala
                                    </button>
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
