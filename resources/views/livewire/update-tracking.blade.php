<div>
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <a href="{{ route('fba.show', $order['id']) }}">
            <span class="iconify" data-icon="eva:arrow-back-outline" data-width="30"></span>
        </a>

        <h2 class="text-lg font-medium mr-auto">
            Buyer Order ve Tracking Ekle
        </h2>

    </div>
    <div class="col-span-12">
        @if ($errors->any())

            @foreach ($errors->all() as $key => $error)


                <span class="text-sm text-red-600">{{ $error }}
                    @if (!$loop->last), @endif
                </span>
            @endforeach
        @endif
    </div>
    @forelse ($order['order_items'] as $key => $value)
        <div class="col-span-12">
            <div class="shadow-xl rounded-lg p-6">
                <div class="col-span-10 flex flex-col lg:flex-row items-center justify-center sm:justify-end mt-5">
                    <label class="block text-gray-700 text-sm font-bold  w-full  mr-5">
                        @if ($key == 0)<div>RESİM</div> @endif
                        <img class="w-10 h-10 rounded-full overflow-hidden shadow-lg image-fit zoom-in scale-110 inline"
                            src="{{ $value['product_image'] }}" alt="">
                    </label>

                    <label class="block text-gray-700 text-sm font-bold  w-full  mr-5">
                        @if ($key == 0)SKU @endif
                        <div class="input-group">
                            {{ $value['unique_identifier'] }}
                        </div>
                    </label>
                    <label class="block text-gray-700 text-sm font-bold  w-full  mr-5">
                        @if ($key == 0)BUYER ORDER ID @endif
                        <div class="input-group"> <input type="text" class="form-control"
                                placeholder="BUYER ORDER ID" aria-label="Adet" aria-describedby="input-group-price"
                                {{-- wire:input="quantityChanged({{ $key }},$event.target.value)" --}}
                                wire:model.debounce.300ms="buyer_list.{{ $key }}.buyer_order_id"
                                :key="{{ $key }}">



                        </div>
                    </label>

                    <label class="block text-gray-700 text-sm font-bold  w-full  mr-5">
                        @if ($key == 0) TRACKING ID @endif
                        <div class="input-group"> <input type="text" class="form-control" aria-label="Width"
                                aria-label="Width" aria-describedby="input-group-price"
                                wire:model.debounce.300ms="buyer_list.{{ $key }}.tracking_id"
                                placeholder="TRACKING ID" :key="{{ $key }}">

                        </div>

                    </label>


                </div>






            </div>

        </div>
    @empty
        <div class="col-span-12">
            <span class="whitespace-nowrap">Henüz bir ürün eklemediniz.</span>
        </div>
    @endforelse
    <div class="flex w-full justify-end mt-5">
        <button type="button" class="dropdown-toggle btn btn-primary shadow-md flex items-center"
            wire:click="updateTracking()">
            Gönder </button>
    </div>
</div>
