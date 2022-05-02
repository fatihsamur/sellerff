<div class="shadow-xl rounded-lg p-6">
    <div class="col-span-10 flex flex-col lg:flex-row items-center justify-center sm:justify-end mt-5">

        <label class="block text-gray-700 text-sm font-bold  w-full  mr-5">
            @if ($key == 0)ASIN/SKU @endif
            <div class="input-group"> <input class="form-control" placeholder="ASIN/SKU" aria-label="ASIN/SKU"
                    aria-describedby="input-group-price"
                    @if(!isset($order['order_details']['product'][$key]['manual']))
                    wire:input="skuFormChanged($event.target.value,{{ $key }})"
                    @endif
                    wire:model.debounce.500ms="order.order_details.product.{{ $key }}.sku" :key="{{ $key }}"
                    autocomplete="false">



                <div id="input-group-price" class="input-group-text">
                    <span class="iconify w-4" data-icon="mdi:identifier"></span>
                </div>
            </div>

        </label>
        <label class="block text-gray-700 text-sm font-bold  w-full  mr-5">
            @if ($key == 0)ADET @endif
            <div class="input-group"> <input type="text" class="form-control" placeholder="Adet" aria-label="Adet"
                    aria-describedby="input-group-price"
                    wire:input="quantityChanged({{ $key }},$event.target.value)"
                    wire:model.debounce.300ms="order.order_details.product.{{ $key }}.quantity" :key="{{ $key }}" >
                <div id="input-group-price" class="input-group-text leading-3">
                    <span class="iconify" data-icon="fontisto:shopping-basket-add"></span>
                </div>


            </div>
        </label>
        <label class="block text-gray-700 text-sm font-bold  w-full  mr-5">
            @if ($key == 0) ALIM FİYATI @endif
            <div class="input-group"> <input type="text" class="form-control" aria-label="Width" aria-label="Width"
                    aria-describedby="input-group-price" {{-- @if (isset($order['order_details']['product'][$key]['data_fetched']) && $order['order_details']['product'][$key]['data_fetched'] == true && $order['order_details']['product'][$key]['buying_price'] != null)
                readonly
                placeholder="{{ $order['order_details']['product'][$key]['buying_price'] }}"

                @endif
                @if (
                (!isset($order['order_details']['product'][$key]['data_fetched']) || $order['order_details']['product'][$key]['data_fetched'] == false) ||
                ((isset($order['order_details']['product'][$key]['data_fetched']) && $order['order_details']['product'][$key]['data_fetched'] == true) || $order['order_details']['product'][$key]['buying_price'] == null)) --}}
                    wire:model.debounce.300ms="order.order_details.product.{{ $key }}.buying_price"
                    wire:input="buyingPriceChanged({{ $key }},$event.target.value)"
                    placeholder="Alım Fiyatı"
                {{-- @endif --}}
                :key="{{ $key }}">
                <div id="input-group-price" class="input-group-text leading-3">
                    <span class="iconify" data-icon="carbon:currency-dollar"></span>
                </div>
            </div>

        </label>
        <label class="block text-gray-700 text-sm font-bold  w-full  mr-5">
            @if ($key == 0) WIDTH @endif
            <div class="input-group"> <input type="text" class="form-control" aria-label="Width" aria-label="Width"
                    aria-describedby="input-group-price" @if (isset($order['order_details']['product'][$key]['data_fetched']) && $order['order_details']['product'][$key]['data_fetched'] == true)
                wire:model="order.order_details.product.{{ $key }}.width"
                readonly

                @endif
                @if (!isset($order['order_details']['product'][$key]['data_fetched']) || $order['order_details']['product'][$key]['data_fetched'] == false)
                    wire:model.debounce.300ms="order.order_details.product.{{ $key }}.width"
                    placeholder="Width"
                    wire:input="widthChanged({{ $key }},$event.target.value)"
                @endif
                :key="{{ $key }}">
                <div id="input-group-price" class="input-group-text leading-3">
                    <span class="iconify" data-icon="akar-icons:width"></span>
                </div>
            </div>

        </label>


        <label class="block text-gray-700 text-sm font-bold  w-full  mr-5">
            @if ($key == 0) HEIGHT @endif
            <div class="input-group"> <input type="text" class="form-control" aria-label="Height"
                    aria-describedby="input-group-price" @if (isset($order['order_details']['product'][$key]['data_fetched']) && $order['order_details']['product'][$key]['data_fetched'] == true)
                readonly
                wire:model="order.order_details.product.{{ $key }}.height"

                @endif
                @if (!isset($order['order_details']['product'][$key]['data_fetched']) || $order['order_details']['product'][$key]['data_fetched'] == false)
                    wire:model.debounce.300ms="order.order_details.product.{{ $key }}.height"
                    placeholder="Height"
                    wire:input="heightChanged({{ $key }},$event.target.value)"
                @endif
                :key="{{ $key }}">
                <div id="input-group-price" class="input-group-text leading-3">
                    <span class="iconify w-3" data-icon="akar-icons:height"></span>
                </div>
            </div>
        </label>

        <label class="block text-gray-700 text-sm font-bold  w-full  mr-5">
            @if ($key == 0) LENGTH @endif
            <div class="input-group"> <input type="text" class="form-control" aria-label="Price"
                    aria-describedby="input-group-price" @if (isset($order['order_details']['product'][$key]['data_fetched']) && $order['order_details']['product'][$key]['data_fetched'] == true)
                readonly
                wire:model="order.order_details.product.{{ $key }}.length"

                @endif
                @if (!isset($order['order_details']['product'][$key]['data_fetched']) || $order['order_details']['product'][$key]['data_fetched'] == false)
                    wire:model.debounce.300ms="order.order_details.product.{{ $key }}.length"
                    wire:input="lengthChanged({{ $key }},$event.target.value)"
                    placeholder="Length"
                @endif
                :key="{{ $key }}">
                <div id="input-group-price" class="input-group-text leading-3">
                    <span class="iconify" data-icon="gis:measure"></span>
                </div>
            </div>
        </label>


        <label class="block text-gray-700 text-sm font-bold  w-full  mr-5">
            @if ($key == 0) WEIGHT @endif
            <div class="input-group"> <input type="text" class="form-control" aria-label="Weight"
                    aria-describedby="input-group-price"

                    @if (isset($order['order_details']['product'][$key]['data_fetched']) && $order['order_details']['product'][$key]['data_fetched'] == true)
                readonly
                wire:model="order.order_details.product.{{ $key }}.weight"

                @endif
                @if (!isset($order['order_details']['product'][$key]['data_fetched']) || $order['order_details']['product'][$key]['data_fetched'] == false)
                    wire:model.debounce.300ms="order.order_details.product.{{ $key }}.weight"
                    wire:input="weightChanged({{ $key }},$event.target.value)"
                    placeholder="Weight"
                @endif
                :key="{{ $key }}">
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


    @if ((isset($order['order_details']['product'][$key]['data_fetched']) && $order['order_details']['product'][$key]['data_fetched'] == true) || isset($order['order_details']['product'][$key]['manual']) )
        <div class="col-span-10 flex flex-col lg:flex-row items-center justify-center sm:justify-end mt-5">
          @if(! isset($order['order_details']['product'][$key]['manual']) )
          <label class="block text-gray-700 text-sm font-bold w-full  mr-5">
            <img src="{{ $order['order_details']['product'][$key]['product_image'] }}"
                class="dropdown-toggle w-20 h-20 rounded-full overflow-hidden shadow-lg image-fit zoom-in scale-110 inline">
            <a class="font-medium ml-4">{{ $order['order_details']['product'][$key]['product_name'] }}</a>
            <div class="input-form mt-6"> <label for="validation-form-6"
                    class="form-label w-full flex flex-col sm:flex-row"> Notlar
                </label> <textarea id="validation-form-6"
                    wire:model="order.order_details.product.{{ $key }}.note" class="form-control"
                    name="comment" placeholder="Depoya iletmek istediğiniz not varsa yazabilirsiniz." minlength="10"
                    required></textarea> </div>
        </label>

          @endif
          @if( isset($order['order_details']['product'][$key]['manual']) )
          <label class="block text-gray-700 text-sm font-bold w-full  mr-5">
            <div class="input-group">
              <input type="text" class="form-control" aria-label="Weight"
                        aria-describedby="input-group-price"
                        wire:model.debounce.300ms="order.order_details.product.{{ $key }}.product_name"
                        placeholder="Product Name"
                    :key="{{ $key }}">
              </div>
              <div class="input-form mt-6"> <label for="validation-form-6"
                class="form-label w-full flex flex-col sm:flex-row"> Notlar
            </label> <textarea id="validation-form-6"
                wire:model="order.order_details.product.{{ $key }}.note" class="form-control"
                name="comment" placeholder="Depoya iletmek istediğiniz not varsa yazabilirsiniz." minlength="10"
                required></textarea> </div>
          </label>
          @endif

        </div>
    @endif

</div>
