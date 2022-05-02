<div>
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <a href="{{ url('warehouse-sellerfullfilment/order_process') }}">
            <span class="iconify" data-icon="eva:arrow-back-outline" data-width="30"></span>
        </a>

        <h2 class="text-lg font-medium mr-auto">
            Son Kullanım Tarihi Ekle
        </h2>

    </div>

    @forelse ($order->order_items as $key => $value)
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
                        @if ($key == 0)SON KULLANIM TARİHİ EKLE @endif
                        <div class="input-group"> <input type="text" class="form-control" placeholder="2022-03-09"
                                aria-label="Adet" aria-describedby="input-group-price"
                                wire:model.debounce.300ms="skt.{{$key}}"
                                :key="{{ $key }}">



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
            wire:click="saveSkt()">
            Gönder </button>
    </div>
</div>
