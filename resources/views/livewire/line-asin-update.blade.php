<div class="shadow-xl rounded-lg p-6">
    <div class="col-span-10 flex flex-col lg:flex-row items-center justify-center sm:justify-end mt-5">
        {{-- <label class="block text-gray-700 text-sm font-bold w-full  mr-5">
            @if ($key == 0)
                MARKET
            @endif
            <div class="mt-1 relative">
                <button type="button"
                    class="relative w-full bg-white border border-gray-300 rounded-md shadow-sm pl-3 pr-10 py-2 text-left cursor-default focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    aria-haspopup="listbox" aria-expanded="true" aria-labelledby="listbox-label"
                    wire:click="marketPlacesToggle({{ $key }})">
                    <span class="flex items-center">
                        <span class="block truncate text-xs">
                            @if (isset($selectedMarketplace[$key]))
                                <span class="iconify w-3 mr-2 inline"
                                    data-icon="cib:{{ $selectedMarketplace[$key]->code ?? '' }}">
                                </span>
                            @endif
                            {{ isset($selectedMarketplace[$key]) ? ucwords($selectedMarketplace[$key]->name ?? '') : 'Market Seçiniz' }}
                        </span>
                    </span>
                    <span class="ml-3 absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </span>
                </button>
                @if (isset($marketPlacesOpen[$key]))
                    <ul class="relative md:absolute z-10 mt-1 w-full bg-white shadow-lg max-h-56 rounded-md py-1 text-base ring-1 ring-black ring-opacity-5 overflow-auto focus:outline-none sm:text-sm"
                        tabindex="-1" role="listbox" aria-labelledby="listbox-label"
                        aria-activedescendant="listbox-option-3">
                        @forelse($marketplaces as $marketplace)
                            <li class="text-gray-900 cursor-default select-none relative py-2 pl-3 pr-9"
                                id="listbox-option-0" role="option" value="{{ $marketplace->code }}"
                                wire:click="handleMarketPlaceSelected({{ $key }},'{{ $marketplace }}')">
                                <div class="flex items-center">
                                    <span class="iconify w-3" data-icon="cib:{{ $marketplace->code }}"></span>
                                    <span
                                        class="font-normal ml-3 block truncate
                                                  @if (isset($selectedMarketplace[$key]) && $marketplace->code ?? ('' == $selectedMarketplace[$key]->code ?? ''))) font-semibold @endif
                                                  ">
                                        {{ ucwords($marketplace->name) }}
                                    </span>
                                </div>

                                @if (isset($selectedMarketplace[$key]) && $marketplace->code ?? ('' == $selectedMarketplace[$key]->code ?? ''))
                                    <span class="text-indigo-600 absolute inset-y-0 right-0 flex items-center pr-4">
                                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </span>
                                @endif
                            </li>
                        @empty
                            <li class="text-gray-900 cursor-default select-none relative py-2 pl-3 pr-9"
                                id="listbox-option-0" role="option">
                                Aktif Ülke Yok
                            </li>
                        @endforelse
                    </ul>
                @endif
            </div>
        </label> --}}
        <label class="block text-gray-700 text-sm font-bold  w-full  mr-5">
            @if ($key == 0)
                ASIN/SKU
            @endif
            <div class="input-group"> <input class="form-control" placeholder="ASIN/SKU" aria-label="ASIN/SKU"
                    aria-describedby="input-group-price"
                    @if (!isset($order['order_details']['product'][$key]['manual'])) wire:input="skuFormChanged($event.target.value,{{ $key }})" @endif
                    @if (isset($order['order_details']['product'][$key]) && isset($order['order_details']['product'][$key]['source']) && $order['order_details']['product'][$key]['source'] == 'db') disabled @endif
                    wire:model.debounce.500ms="order.order_details.product.{{ $key }}.sku"
                    :key="{{ $key }}" autocomplete="false">



                <div id="input-group-price" class="input-group-text">
                    <span class="iconify w-4" data-icon="mdi:identifier"></span>
                </div>
            </div>

        </label>
        <label class="block text-gray-700 text-sm font-bold  w-full  mr-5">
            @if ($key == 0)
                ADET
            @endif
            <div class="input-group"> <input type="text" class="form-control" placeholder="Adet" aria-label="Adet"
                    aria-describedby="input-group-price"
                    wire:input="quantityChanged({{ $key }},$event.target.value)"
                    wire:model.debounce.300ms="order.order_details.product.{{ $key }}.quantity"
                    :key="{{ $key }}">
                <div id="input-group-price" class="input-group-text leading-3">
                    <span class="iconify" data-icon="fontisto:shopping-basket-add"></span>
                </div>


            </div>
        </label>
        <label class="block text-gray-700 text-sm font-bold  w-full  mr-5">
            @if ($key == 0)
                ALIM FİYATI
            @endif
            <div class="input-group"> <input type="text" class="form-control" aria-label="Width" aria-label="Width"
                    aria-describedby="input-group-price" {{-- @if (isset($order['order_details']['product'][$key]['data_fetched']) && $order['order_details']['product'][$key]['data_fetched'] == true && $order['order_details']['product'][$key]['buying_price'] != null)
              readonly
              placeholder="{{ $order['order_details']['product'][$key]['buying_price'] }}"

              @endif
              @if (!isset($order['order_details']['product'][$key]['data_fetched']) || $order['order_details']['product'][$key]['data_fetched'] == false || ((isset($order['order_details']['product'][$key]['data_fetched']) && $order['order_details']['product'][$key]['data_fetched'] == true) || $order['order_details']['product'][$key]['buying_price'] == null)) --}}
                    wire:model.debounce.300ms="order.order_details.product.{{ $key }}.buying_price"
                    wire:input="buyingPriceChanged({{ $key }},$event.target.value)" placeholder="Alım Fiyatı"
                    @if (isset($order['order_details']['product'][$key]) && isset($order['order_details']['product'][$key]['source']) && $order['order_details']['product'][$key]['source'] == 'db') disabled @endif

                    {{-- @endif --}} :key="{{ $key }}">
                <div id="input-group-price" class="input-group-text leading-3">
                    <span class="iconify" data-icon="carbon:currency-dollar"></span>
                </div>
            </div>

        </label>
        <label class="block text-gray-700 text-sm font-bold  w-full  mr-5">
            @if ($key == 0)
                WIDTH
            @endif
            <div class="input-group"> <input type="text" class="form-control" aria-label="Width" aria-label="Width"
                    aria-describedby="input-group-price"
                    @if (isset($order['order_details']['product'][$key]['data_fetched']) && $order['order_details']['product'][$key]['data_fetched'] == true) wire:model="order.order_details.product.{{ $key }}.width"
              readonly @endif
                    @if (!isset($order['order_details']['product'][$key]['data_fetched']) || $order['order_details']['product'][$key]['data_fetched'] == false) wire:model.debounce.300ms="order.order_details.product.{{ $key }}.width"
                  placeholder="Width"
                  wire:input="widthChanged({{ $key }},$event.target.value)" @endif
                  @if (isset($order['order_details']['product'][$key]) && isset($order['order_details']['product'][$key]['source']) && $order['order_details']['product'][$key]['source'] == 'db') disabled @endif
                    :key="{{ $key }}">
                <div id="input-group-price" class="input-group-text leading-3">
                    <span class="iconify" data-icon="akar-icons:width"></span>
                </div>
            </div>

        </label>


        <label class="block text-gray-700 text-sm font-bold  w-full  mr-5">
            @if ($key == 0)
                HEIGHT
            @endif
            <div class="input-group"> <input type="text" class="form-control" aria-label="Height"
                    aria-describedby="input-group-price"
                    @if (isset($order['order_details']['product'][$key]['data_fetched']) && $order['order_details']['product'][$key]['data_fetched'] == true) readonly
              wire:model="order.order_details.product.{{ $key }}.height" @endif
                    @if (!isset($order['order_details']['product'][$key]['data_fetched']) || $order['order_details']['product'][$key]['data_fetched'] == false) wire:model.debounce.300ms="order.order_details.product.{{ $key }}.height"
                  placeholder="Height"
                  wire:input="heightChanged({{ $key }},$event.target.value)" @endif
                  @if (isset($order['order_details']['product'][$key]) && isset($order['order_details']['product'][$key]['source']) && $order['order_details']['product'][$key]['source'] == 'db') disabled @endif
                    :key="{{ $key }}">
                <div id="input-group-price" class="input-group-text leading-3">
                    <span class="iconify w-3" data-icon="akar-icons:height"></span>
                </div>
            </div>
        </label>

        <label class="block text-gray-700 text-sm font-bold  w-full  mr-5">
            @if ($key == 0)
                LENGTH
            @endif
            <div class="input-group"> <input type="text" class="form-control" aria-label="Price"
                    aria-describedby="input-group-price"
                    @if (isset($order['order_details']['product'][$key]['data_fetched']) && $order['order_details']['product'][$key]['data_fetched'] == true) readonly
              wire:model="order.order_details.product.{{ $key }}.length" @endif
                    @if (!isset($order['order_details']['product'][$key]['data_fetched']) || $order['order_details']['product'][$key]['data_fetched'] == false) wire:model.debounce.300ms="order.order_details.product.{{ $key }}.length"
                  wire:input="lengthChanged({{ $key }},$event.target.value)"
                  placeholder="Length" @endif
                  @if (isset($order['order_details']['product'][$key]) && isset($order['order_details']['product'][$key]['source']) && $order['order_details']['product'][$key]['source'] == 'db') disabled @endif
                    :key="{{ $key }}">
                <div id="input-group-price" class="input-group-text leading-3">
                    <span class="iconify" data-icon="gis:measure"></span>
                </div>
            </div>
        </label>


        <label class="block text-gray-700 text-sm font-bold  w-full  mr-5">
            @if ($key == 0)
                WEIGHT
            @endif
            <div class="input-group"> <input type="text" class="form-control" aria-label="Weight"
                    aria-describedby="input-group-price"
                    @if (isset($order['order_details']['product'][$key]['data_fetched']) && $order['order_details']['product'][$key]['data_fetched'] == true) readonly
              wire:model="order.order_details.product.{{ $key }}.weight" @endif
                    @if (!isset($order['order_details']['product'][$key]['data_fetched']) || $order['order_details']['product'][$key]['data_fetched'] == false) wire:model.debounce.300ms="order.order_details.product.{{ $key }}.weight"
                  wire:input="weightChanged({{ $key }},$event.target.value)"
                  placeholder="Weight" @endif
                  @if (isset($order['order_details']['product'][$key]) && isset($order['order_details']['product'][$key]['source']) && $order['order_details']['product'][$key]['source'] == 'db') disabled @endif
                    :key="{{ $key }}">
                <div id="input-group-price" class="input-group-text leading-3">
                    <span class="iconify w-3" data-icon="fa-solid:weight"></span>
                </div>
            </div>
        </label>

        <label class="block text-gray-700 text-sm font-bold  w-full mr-5 mt-5 md:mt-0">
            @if (count($order['order_details']['product']) > 1)
                <button
                    class="btn btn-danger h-9 px-5 py-3 flex items-center justify-center text-white font-bold rounded focus:outline-none focus:shadow-outline"
                    type="button" wire:click.prevent="remove({{ $key }})">
                    Çıkar
                </button>
            @endif
        </label>
    </div>


    {{-- @if ((isset($order['order_details']['product'][$key]['data_fetched']) && $order['order_details']['product'][$key]['data_fetched'] == true) || isset($order['order_details']['product'][$key]['manual'])) --}}
    @if (isset($order['order_details']['product'][$key]) && isset($order['order_details']['product'][$key]['product_name']) && isset($order['order_details']['product'][$key]['product_image']))
        <div class="col-span-10 flex flex-col lg:flex-row items-center justify-center sm:justify-end mt-5">
            @if (!isset($order['order_details']['product'][$key]['manual']))
                <label class="block text-gray-700 text-sm font-bold w-full  mr-5">
                    <img src="{{ $order['order_details']['product'][$key]['product_image'] }}"
                        class="dropdown-toggle w-20 h-20 rounded-full overflow-hidden shadow-lg image-fit zoom-in scale-110 inline">
                    <a class="font-medium ml-4">{{ $order['order_details']['product'][$key]['product_name'] }}</a>
                    <div class="input-form mt-6"> <label for="validation-form-6"
                            class="form-label w-full flex flex-col sm:flex-row"> Notlar
                        </label> <textarea id="validation-form-6"
                            wire:model="order.order_details.product.{{ $key }}.note" class="form-control"
                            name="comment" placeholder="Depoya iletmek istediğiniz not varsa yazabilirsiniz."
                            minlength="10" required></textarea> </div>
                </label>
            @endif
            @if (isset($order['order_details']['product'][$key]['manual']))
                <label class="block text-gray-700 text-sm font-bold w-full  mr-5">
                    <div class="input-group">
                        <input type="text" class="form-control" aria-label="Weight"
                            aria-describedby="input-group-price"
                            wire:model.debounce.300ms="order.order_details.product.{{ $key }}.product_name"
                            placeholder="Product Name" :key="{{ $key }}">
                    </div>
                    <div class="input-form mt-6"> <label for="validation-form-6"
                            class="form-label w-full flex flex-col sm:flex-row"> Notlar
                        </label> <textarea id="validation-form-6"
                            wire:model="order.order_details.product.{{ $key }}.note" class="form-control"
                            name="comment" placeholder="Depoya iletmek istediğiniz not varsa yazabilirsiniz."
                            minlength="10" required></textarea> </div>
                </label>
            @endif

        </div>
    @endif

</div>
