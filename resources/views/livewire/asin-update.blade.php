<div>
  <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
    <a href="{{ url('fba') }}">
        <span class="iconify" data-icon="eva:arrow-back-outline" data-width="30"></span>
    </a>

    <h2 class="text-lg font-medium mr-auto">
        Asin Ekle/Çıkar
    </h2>

</div>
    <div class="col-span-12">

            </div>



            <div class="col-span-12">
                @if ($errors->any())
                    <div class="text-sm text-red-600">
                        Devam etmek için form alanlarını doğru bir biçimde doldurduğunuza emin olun.
                    </div>
                    @foreach ($errors->all() as $key => $error)


                        @if ($error == 'Ürün bilgileri alınamadı')
                            <div class="text-sm text-red-600">
                                <span
                                    wire:click="getProductData('{{ $lastFetchError['sku'] }}','{{ $lastFetchError['id'] }}')"
                                    class="btn">
                                    <span class="iconify" data-icon="ion:refresh-circle"
                                        data-width="20"></span>Tekrar Denemek İçin Tıklayın
                                </span>

                            </div>

                        @endif
                        @if(preg_match('/productnotfoundid_/i',$error,$matches))
                        <div class="text-sm mt-3">
                          <span wire:click="setManuel({{
                             preg_match('/productnotfoundid_/i',$error,$matches) ? explode('_',$error)[1] : null;
                            }})" class="btn">
                              <span class="iconify mr-1" data-icon="bi:keyboard" data-width="20"> </span> Manuel
                              Devam etmek için Tıklayın
                          </span>

                      </div>
                      @endif
                        <span class="text-sm text-red-600">{{ $error }}
                            @if (!$loop->last), @endif
                        </span>
                    @endforeach
                @endif
            </div>

            @forelse ($inputs as $key => $value)
                <div class="col-span-12">
                    @include('livewire.line-asin-update', ['key' => $key, 'value' => $value])
                </div>
            @empty
                <div class="col-span-12">
                    <span class="whitespace-nowrap">Henüz bir ürün eklemediniz.</span>
                </div>
            @endforelse
            <div class="flex w-full items-end mt-5">
            <button
            class="btn btn-primary h-9 px-5 py-3 flex items-center justify-center text-white font-bold rounded focus:outline-none focus:shadow-outline inline"
            type="button" wire:click.prevent="add({{ $i }})">
            <span class="iconify mr-1" data-icon="mdi:package-variant-plus" data-width="20"
                data-height="20"></span>
            Ekle
        </button>
        <button
            class="btn btn-primary h-9 px-5 py-3 flex items-center justify-center text-white font-bold rounded focus:outline-none focus:shadow-outline inline ml-3"
            type="button" wire:click="updateOrder(true)">
            Güncelle
        </button>
        </div>

                <div class="col-span-12 mt-4 flex ">
                    <div class="relative inline-block shadow-xl p-3 rounded-lg">
                        <span>Toplam Ürün Ağırlığı
                        </span>
                        <span class="px-3 py-2 rounded-full bg-theme-1 text-white mr-1 block md:flex">
                            {{ number_format($order['order_details']['total_weight'], 4, '.', '') ?? 0 }}
                            lbs
                        </span>
                    </div>


                    <div class="relative inline-block shadow-xl p-3 rounded-lg ">
                        <span class="ml-3">Toplam Ürün Adedi
                        </span>
                        <span class="px-3 py-2 rounded-full bg-theme-1 text-white mr-1 block md:flex">
                            {{ $order['order_details']['total_quantity'] ?? 0 }}</span>
                    </div>
                    <div class="relative inline-block shadow-xl p-3 rounded-lg ">
                      <span class="ml-3">Toplam Fiyat
                      </span>
                      <span class="px-3 py-2 rounded-full bg-theme-1 text-white mr-1 block md:flex">
                          {{ number_format($order['order_details']['total_price'], 4, '.', '') ?? 0 }}</span>
                  </div>


                </div>

</div>
