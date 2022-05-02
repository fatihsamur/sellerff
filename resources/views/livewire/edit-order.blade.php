<div>
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <a href="{{ url('warehouse-sellerfullfilment/order_process') }}">
            <span class="iconify" data-icon="eva:arrow-back-outline" data-width="30"></span>
        </a>

        <h2 class="text-lg font-medium mr-auto">
            Ölçü ve Adet Güncelle
        </h2>

    </div>
    @forelse ($order['order_items'] as $key => $value)
        <div class="col-span-12">
            <div class="shadow-xl rounded-lg p-6">
                <div class="col-span-10 flex flex-col lg:flex-row items-center justify-center sm:justify-end mt-5">
                    <label class="block text-gray-700 text-sm font-bold  w-full  mr-5">
                      @if ($key == 0)<div>RESİM</div> @endif
                        <img class="w-10 h-10 rounded-full overflow-hidden shadow-lg image-fit zoom-in scale-110 inline" src="{{ $value['product_image'] }}" alt="">
                    </label>

                    <label class="block text-gray-700 text-sm font-bold  w-full  mr-5">
                        @if ($key == 0)SKU @endif
                        <div class="input-group">
                            {{ $value['unique_identifier'] }}
                        </div>
                    </label>
                    <label class="block text-gray-700 text-sm font-bold  w-full  mr-5">
                        @if ($key == 0)ADET @endif
                        <div class="input-group"> <input type="text" class="form-control" placeholder="Adet"
                                aria-label="Adet" aria-describedby="input-group-price" {{-- wire:input="quantityChanged({{ $key }},$event.target.value)" --}}
                                wire:model.debounce.300ms="order.order_items.{{ $key }}.quantity"
                                :key="{{ $key }}">
                            <div id="input-group-price" class="input-group-text leading-3">
                                <span class="iconify" data-icon="fontisto:shopping-basket-add"></span>
                            </div>


                        </div>
                    </label>

                    <label class="block text-gray-700 text-sm font-bold  w-full  mr-5">
                        @if ($key == 0) WIDTH @endif
                        <div class="input-group"> <input type="text" class="form-control" aria-label="Width"
                                aria-label="Width" aria-describedby="input-group-price"
                                wire:model.debounce.300ms="order.order_items.{{ $key }}.width"
                                placeholder="Width" :key="{{ $key }}">
                            <div id="input-group-price" class="input-group-text leading-3">
                                <span class="iconify" data-icon="akar-icons:width"></span>
                            </div>
                        </div>

                    </label>


                    <label class="block text-gray-700 text-sm font-bold  w-full  mr-5">
                        @if ($key == 0) HEIGHT @endif
                        <div class="input-group"> <input type="text" class="form-control" aria-label="Height"
                                aria-describedby="input-group-price"
                                wire:model.debounce.300ms="order.order_items.{{ $key }}.height"
                                placeholder="Height" :key="{{ $key }}">
                            <div id="input-group-price" class="input-group-text leading-3">
                                <span class="iconify w-3" data-icon="akar-icons:height"></span>
                            </div>
                        </div>
                    </label>

                    <label class="block text-gray-700 text-sm font-bold  w-full  mr-5">
                        @if ($key == 0) LENGTH @endif
                        <div class="input-group"> <input type="text" class="form-control" aria-label="Price"
                                aria-describedby="input-group-price"
                                wire:model.debounce.300ms="order.order_items.{{ $key }}.length"
                                placeholder="Length" :key="{{ $key }}">
                            <div id="input-group-price" class="input-group-text leading-3">
                                <span class="iconify" data-icon="gis:measure"></span>
                            </div>
                        </div>
                    </label>


                    <label class="block text-gray-700 text-sm font-bold  w-full  mr-5">
                        @if ($key == 0) WEIGHT @endif
                        <div class="input-group"> <input type="text"
                                wire:model="order.order_items.{{ $key }}.weight" class="form-control"
                                aria-label="Weight" aria-describedby="input-group-price" :key="{{ $key }}">
                            <div id="input-group-price" class="input-group-text leading-3">
                                <span class="iconify w-3" data-icon="fa-solid:weight"></span>
                            </div>
                        </div>
                    </label>

                    <label class="block text-gray-700 text-sm font-bold  w-full mr-5 mt-5 md:mt-0">
                        <button
                            class="btn btn-danger h-9 px-5 py-3 flex items-center justify-center text-white font-bold rounded focus:outline-none focus:shadow-outline"
                            type="button" wire:click.prevent="remove({{ $key }})">
                            Çıkar
                        </button>
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
            wire:click="editOrder()">
            Gönder </button>
    </div>
</div>
