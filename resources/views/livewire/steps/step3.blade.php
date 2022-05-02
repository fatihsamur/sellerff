<div
    class="px-5 sm:px-20 mt-10 pt-10 border-t border-gray-200 dark:border-dark-5 {{ $currentStep != 3 ? 'hidden' : '' }}">

    <div class="font-medium text-base">Label Yükle</div>
    <span class="text-red-500">Lütfen Ürün etiketlerinizi (FNSKU) Amazon Satıcı hesabınızda " 30-up Labels" formatında oluşturunuz</span>
    <br>
    <span class="text-red-500">Not: Lütfen siparişinizdeki tüm ürünleri tek bir pdf evrakı olarak amazon satıcı hesabınızda oluşturarak dosyaları seç ile yüklemesinin tamamlayınız.</span>
    <br>
    <span class="text-red-500"> Bu sayfadaki etiketlerin yüklenmesi zorunludur. Siparişinizdeki ürünleri depomuza göndermeden önce mutlaka,  ürünlerinizin amazon satıcı hesabınızda eklemenizi ve amazon depolarına gönderime izin verip vermediğini kontrol etmenizi öneririz.</span>
    <br>
    <span class="text-red-500">Teşekkür ederiz.</span>
    <div class="col-span-12">
        <div class="input-form mt-6">
            <form data-single="true" class="dropzone">
                <div class="fallback"> <input name="file" type="file" wire:model="order.order_details.labels"
                        multiple />
                </div>
                <div class="dz-message" data-dz-message>
                    <div class="text-lg font-medium">Dosyaları Buraya Sürükleyebilir veya tıklayıp
                        seçebilirsiniz.</div>
                    @if (isset($order['order_details']['labels']) && $order['order_details']['labels'])
                        <div class="text-gray-600">
                            @forelse ($order['order_details']['labels'] as $label)
                                {{ $label->getFilename() }},
                            @empty
                            @endforelse
                        </div>
                    @endif
                </div>

            </form>


        </div>

        @foreach ($order['order_details']['product'] as $key => $value)
            <div class="shadow-xl rounded-lg p-6">
                <div
                    class="col-span-10 flex flex-col lg:flex-row items-center justify-center sm:justify-end mt-5 w-full">
                    <div
                        class="col-span-10 flex flex-col lg:flex-row items-center justify-center sm:justify-end mt-5 w-full">
                        <label class="block text-gray-700 text-sm font-bold w-full  mr-5">
                            <div>
                                <img src="{{ $order['order_details']['product'][$key]['product_image'] }}"
                                    class="dropdown-toggle w-20 h-20 rounded-full overflow-hidden shadow-lg image-fit zoom-in scale-110 inline">
                                <a
                                    class="font-medium ml-4 w-1/2">{{ $order['order_details']['product'][$key]['product_name'] }} - {{$order['order_details']['product'][$key]['quantity'] }} Adet</a>
                            </div>

                        </label>
                    </div>
                    </label>
                </div>
                <label for="regular-form-1" class="form-label">Fnsku Kodu</label> <input
                    wire:model="order.order_details.product.{{ $key }}.fnsku" id="regular-form-1" type="text"
                    class="form-control" placeholder="Fnsku Kodu">
            </div>

        @endforeach


    </div>
    @if ($errors->any())
        <div class="text-sm text-red-600">
            Devam etmek için form alanlarını doğru bir biçimde doldurduğunuza emin olun.
        </div>
        @foreach ($errors->all() as $key => $error)

            <span class="text-sm text-red-600">{{ $error }}
                @if (!$loop->last), @endif
            </span>
        @endforeach
    @endif

</div>



<div class="col-span-12 flex items-center justify-center sm:justify-end mt-5">
    <button class="btn btn-primary w-24 ml-2" wire:click="thirdStepSubmit">İleri</button>
</div>





</div>
