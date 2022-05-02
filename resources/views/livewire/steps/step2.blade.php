<div
    class="px-5 sm:px-20 mt-10 pt-10 border-t border-gray-200 dark:border-dark-5 {{ $currentStep != 2 ? 'hidden' : '' }}">
    <div class="font-medium text-base">Tahmini Fiyat İçin Ödeme Yap</div>
    <div class="grid grid-cols-12 gap-4 gap-y-5 mt-5">

        <!-- BEGIN: Basic Select -->
        <div class=" col-span-12 ">
            <div class="p-5 shadow-lg rounded-lg">
                <span class="text-xl font-extra-bold">Siparişinize Özel Adresiniz : </span>
                <span class="text-xl font-extra-bold ml-5"> Fullname : </span>
                <span class="text-xl text-theme-1 font-bold">
                    Sellerfulfilment Warehouse </span>
                <button id="copy-address-fullname" class="btn inline  hover:bg-blue-800"
                    data-clipboard-text="Sellerfulfilment Warehouse">
                    Kopyala
                </button>
                <span class="text-xl font-extra-bold ml-5">Address 1 : </span>
                <span class="text-xl text-theme-1 font-bold">
                    {{ auth()->user()->shipping_address_line() }}</span>
                <button id="copy-address-1" class="btn inline  hover:bg-blue-800"
                    data-clipboard-text="{{ auth()->user()->shipping_address_line()}}">
                    Kopyala
                </button>
                <span class="text-xl font-extra-bold ml-5">Address 2 : </span>
                <span class="text-xl text-theme-1 font-bold">
                    {{ auth()->user()->shipping_address_line_2() .
                        '/' .
                        $order['order_details']['order_id'] }}</span>
                <button id="copy-address-2" class="btn inline  hover:bg-blue-800"
                    data-clipboard-text="{{ auth()->user()->shipping_address_line_2() .
                        '/' .
                        $order['order_details']['order_id'] }}">
                    Kopyala
                </button>
                <span class="text-xl font-extra-bold ml-5">City : </span>
                <span class="text-xl text-theme-1 font-bold">CHICAGO</span>
                <button id="copy-address-city" class="btn inline  hover:bg-blue-800" data-clipboard-text="CHICAGO">
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
                <button id="copy-address-state" class="btn inline  hover:bg-blue-800" data-clipboard-text="Illinois">
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
        <div class="col-span-12 md:col-span-6 md:mr-3 mt-5">
            <section
                class="text center mb-4 md:w-72 border-t-8 p-5 bg-white dark:bg-gray-800 rounded border-purple-600 border-2"
                style="height: 356px;">
                <section class="w-full flex flex-col">
                    <header class="text-3xl text-center md:mt-5 dark:text-white">
                        Standart Üyelik Fiyatı
                    </header>
                    <header class="w-full md:flex justify-center text-center mb-2 mt-3">
                        <span class="text-2xl dark:text-white">
                            $ {{ number_format($order['order_details']['total_price_basic'], 2) }}
                        </span>
                    </header>

                    <header class="w-full md:flex justify-center text-center mt-3">
                        <span class="text-lg dark:text-white whitespace-pre">
                            Standart Üyelik Politikası Gereği
                            Standart Üyeliklerde Herhangi
                            Bir İndirim Uygulanmaz.
                        </span>
                    </header>
                    <header class="text-center md:mt-5 mt-5 dark:text-white p-2 ">
                        Ürünleriniz :
                        @forelse ($order['order_details']['product'] as $product)
                            <div>
                                {{ $product['sku'] }} - {{ $product['quantity'] }}
                            </div>
                        @empty
                            Ürünler bulunamadı.
                        @endforelse
                        <div>
                            Ortalama Ürün fiyatınız : $
                            {{ number_format($order['order_details']['total_price_basic'] / $order['order_details']['total_quantity'], 2) }}
                        </div>
                    </header>

                </section>
            </section>
        </div>
        <div class="col-span-12 md:col-span-6  md:ml-3 mt-5">
            <section
                class="text-center mb-4 md:w-72 border-t-8 p-5 bg-primary btn-primary dark:bg-gray-800 rounded border-purple-600 border-2 "
                style="height:356px">
                <section class="w-full">
                    <header class="text-3xl text-center md:mt-5 dark:text-white">

                        <div class="text-white text-lg ml-3 flex justify-center">
                            @include('theme::svg.main-logo-white',['size' => '5.5rem'])
                        </div>
                        Prime Üyelik Fiyatı
                    </header>
                    <header class="w-full md:flex justify-center text-center mb-2">
                        <span class="text-2xl dark:text-white">
                            $ {{ number_format($order['order_details']['total_price_prime'], 2) }}
                        </span>
                    </header>
                    <header class="w-full md:flex justify-center text-center mt-3">
                        <span class="text-lg dark:text-white whitespace-pre">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" viewBox="0 0 24 24"
                                class="w-8 h-8 text-indigo-800 dark:text-white font-bold inline">
                                <path d="M5 13l4 4L19 7">
                                </path>
                            </svg>
                            @if (setting('marketing.prime_discount_rate'))
                                Prime Abonelerimiz için % {{ setting('marketing.prime_discount_rate') }} daha uygun
                                gönderim imkanı.
                            @endif
                        </span>
                    </header>


                    <header class="text-center md:mt-5 mt-5 dark:text-white p-2 ">
                        Ürünleriniz :
                        @forelse ($order['order_details']['product'] as $product)
                            <div>
                                {{ $product['sku'] }} - {{ $product['quantity'] }}
                            </div>
                        @empty
                            Ürünler bulunamadı.
                        @endforelse
                        <div>
                            Ortalama Ürün fiyatınız : $
                            {{ number_format($order['order_details']['total_price_prime'] / $order['order_details']['total_quantity'], 2) }}
                        </div>
                    </header>
                    @notprime
                    <a href="{{ url('settings/plans') }}" class="btn btn-sm mt-5 ">Üyeliğinizi Prime'a Yükseltin</a>
                    @endnotprime
                </section>

            </section>
        </div>
        @if ($boxsystem && count($boxsystem) > 0)
            <div class="col-span-12 md:col-span-12 ">
                <div class="p-5 shadow-lg rounded-lg  md:w-1/2 mx-auto">
                    <span class="text-xl text-theme-1 font-bold ">
                        Kutu Yerleşim Planı :
                    </span>
                    <div class="text-theme-1">
                        Amazon satıcı hesabınızda gönderim planı oluştururken kutuların içerisine hangi
                        ürünlerin
                        yerleştirileceği bilgisi aşağıda yer almaktadır.<br> Lütfen gönderi planınızı
                        sırasıyla
                        aşağıdaki
                        kutu içeriğindeki ürün bilgilerine göre oluşturun.
                        <br>
                    </div>
                    <div class="flex mt-4 flex-wrap">
                        @forelse ($boxsystem as $box_key => $box)
                            <div class="border border-2 mx-2 flex p-4">
                                <span class="text-theme-1 font-bold">KUTU {{ $box_key + 1 }} </span>
                                @forelse($box['counts'] as $box_counts_key => $box_counts)
                                    <div style="background-color:{{ $box_counts['color'] }}"
                                        class="border border-2 flex mx-2 p-4  text-theme-1 font-bold">
                                        Adet : {{ $box_counts['count'] }} Sku : <a target="_blank"
                                            href="https://www.amazon.com/dp/{{ $box_counts_key }}">{{ $box_counts_key }}</a>
                                    </div>
                                @empty
                                @endforelse


                            </div>
                        @empty
                            Yerleşim Planı Yok
                        @endforelse
                    </div>
                </div>
            </div>
        @endif
        <div class="col-span-12 md:col-span-12 ">
            <div class="p-5 shadow-lg rounded-lg  md:w-1/2 mx-auto ">
                <span class="text-xl text-theme-1 font-bold ">
                    Not: Ekranda gösterilen fiyatlar, sağladığınız veriler doğrultusunda oluşturulmuş tahmini bir
                    fiyattır.
                    +/- Yönlü ödeme değişikliklerinde sizinle irtibata geçilecektir.
                </span>
                <br>
                <span class="text-xl text-theme-1 font-bold">
                Not: Yukarıda belirtilen teslimat adresi bu siparişinize özel adresinizdir. Her siparişinizin teslimat adresi farklıdır. " Address 2 " bölümü her siparişinizde değişmektedir. Lütfen siparişinizdeki ürünleri depomuza gönderirken siparişe özel adresinize gönderdiğinizden emin olunuz.
                </span>


            </div>
        </div>


        <div class="intro-y col-span-12 flex items-center justify-center sm:justify-end mt-5">
            <button class="btn btn-secondary w-24" wire:click="back(1)">Geri</button>
            <a class="btn btn-primary w-24 ml-2" data-toggle="modal"
                data-target="#static-backdrop-modal-preview">İleri</a>
            <a
                class="btn btn-primary ml-2 whitespace-nowrap" data-toggle="modal"
                data-target="#odeme-yapma">Ödeme Yapmadan Devam Et</a>
        </div>

    </div>
</div>

<div id="static-backdrop-modal-preview" class="modal" data-backdrop="static" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body px-5 py-10">
                <div class="text-center">
                    <div class="mb-5">Bu işlem sonrasında miktar bakiyenizden eksilecektir. Onaylıyor musunuz?
                    </div>
                    <br>
                    <div class="mb-5">
                    Not: Ödemesi yapılan siparişte değişiklik veya iptal işlemi yapamazsınız. Dilerseniz ödemenizi sayfada yer alan Ödeme Yapmadan Devam Et linkini tıklayarak daha sonra yapabilirsiniz.
                    </div>
                    <button type="button" data-dismiss="modal" wire:click="secondStepSubmit"
                        class="btn btn-primary w-24">Devam Et</button>
                    <button type="button" data-dismiss="modal" class="btn btn-danger w-24">Geri Dön</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="odeme-yapma" class="modal" data-backdrop="static" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body px-5 py-10">
                <div class="text-center">
                    <div class="mb-5">
                    Siparişinizin işleme alınabilmesi için, siparişinizdeki ürünlerinizin depomuza teslim edilmesinden ÖNCE mutlaka ödemesinin yapılmasını rica ederiz.
                    </div>
                    <button type="button" data-dismiss="modal" wire:click="secondStepSubmit(true)"
                        class="btn btn-primary w-24">Devam Et</button>
                    <button type="button" data-dismiss="modal" class="btn btn-danger w-24">Geri Dön</button>
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
