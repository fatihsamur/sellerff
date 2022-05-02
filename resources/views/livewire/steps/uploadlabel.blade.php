<div class="shadow-xl rounded-lg p-6">
    <div class="col-span-10 flex flex-col lg:flex-row items-center justify-center sm:justify-end mt-5 w-full">
        <div class="col-span-10 flex flex-col lg:flex-row items-center justify-center sm:justify-end mt-5 w-full">
            <label class="block text-gray-700 text-sm font-bold w-full  mr-5">
                <div>
                    <img src="{{ $order['order_details']['product'][$key]['product_image'] }}"
                        class="dropdown-toggle w-20 h-20 rounded-full overflow-hidden shadow-lg image-fit zoom-in scale-110 inline">
                    <a
                        class="font-medium ml-4 w-1/2">{{ $order['order_details']['product'][$key]['product_name'] }}</a>
                </div>
                <div class="input-form mt-6">
                    <form data-single="true" class="dropzone">
                        <div class="fallback"> <input name="file" type="file"
                                wire:model="order.order_details.product.{{ $key }}.label" /> </div>
                        <div class="dz-message" data-dz-message>
                            <div class="text-lg font-medium">Dosyaları Buraya Sürükleyebilir veya tıklayıp
                                seçebilirsiniz.</div>
                            @if (isset($order['order_details']['product'][$key]['label']) && $order['order_details']['product'][$key]['label'])
                                <div class="text-gray-600">
                                    {{ $order['order_details']['product'][$key]['label']->getFilename() }}
                                </div>
                            @endif
                        </div>
                    </form>


                </div>
            </label>
        </div>
        </label>
    </div>

</div>
