<div class="shadow-xl rounded-lg p-6">
    <div class="col-span-10 flex flex-col lg:flex-row items-center justify-center sm:justify-end mt-5">
        <div class="col-span-10 flex flex-col lg:flex-row items-center justify-center sm:justify-end mt-5 w-full">
            <label class="block text-gray-700 text-sm font-bold w-full  mr-5">
                <div>
                    <img src="{{ $order['order_details']['product'][$key]['product_image'] }}"
                        class="dropdown-toggle w-20 h-20 rounded-full overflow-hidden shadow-lg image-fit zoom-in scale-110 inline">
                    <a
                        class="font-medium ml-4 w-1/2">{{ $order['order_details']['product'][$key]['product_name'] }}</a>
                </div>

                {{-- <button
                    class="btn btn-primary h-9 px-5 py-3 flex items-center justify-center text-white font-bold rounded focus:outline-none focus:shadow-outline"
                    type="button" wire:click.prevent="addBuyerOrderInput({{$key}},{{ $buyerOrderIndex }})">
                    <span class="iconify mr-1" data-icon="mdi:package-variant-plus" data-width="20"
                        data-height="20"></span>
                    Buyer Order Id Ekle
                </button> --}}
                <div class="input-form mt-6">

                    <div class="flex mt-3">
                        <input wire:model="order.order_details.product.{{ $key }}.buyer_order_id"
                            id="regular-form-1g" type="text" class="form-control"
                            placeholder="BuyerOrder Id Giriniz">
                        <input wire:model="order.order_details.product.{{ $key }}.tracking_id"
                            id="regular-form-1s {{ $key }}" type="text" class="form-control ml-5"
                            placeholder="Tracking Id Giriniz">
                        {{-- <button
                                    class="ml-5 btn btn-danger h-9 px-5 py-3 flex items-center justify-center text-white font-bold rounded focus:outline-none focus:shadow-outline"
                                    type="button"
                                    wire:click.prevent="removeBuyerOrderInput({{$key}},{{ $buyerOrderIndex }})">
                                    Çıkar
                                </button> --}}
                    </div>

                </div>
            </label>
        </div>
        </label>
    </div>

</div>
