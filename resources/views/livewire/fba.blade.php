<div>
    <h2 class="intro-y text-lg font-medium mt-10">
        Fba Gönderilerim
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">



        <!-- BEGIN: Users Layout -->
        <div class="intro-y col-span-12 lg:col-span-9 ">
            <div class="intro-y col-span-10 lg:col-span-10 flex justify-start">
                <a href="{{ url('fba/create') }}" class="btn btn-primary mr-1 mb-2"> <span class="iconify"
                        data-icon="bi:plus-lg"></span>
                    Yeni Sipariş Oluştur
                </a>
            </div>
            <div class="intro-y col-span-10 lg:col-span-10 mt-5 ">
                @forelse ($orders as $index => $order)

                    <div id="box{{ $loop->index }}" class="box mt-5 ">

                        <div
                            class="flex flex-col lg:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
                            <div class="lg:ml-2  text-center lg:text-left mt-3 lg:mt-0">
                                <span class="iconify" data-icon="noto:package" data-width="60"></span>
                            </div>
                            <div class="lg:ml-2 lg:mr-auto text-center lg:text-left mt-3 lg:mt-0">
                                <a href="" class="font-medium">Sipariş # {{ $order->id }}</a>
                                <div class="text-gray-600 text-xs mt-0.5">Durumu : {{ $order->status }}</div>
                                <div class="text-gray-600 text-xs mt-0.5">Toplam : $ {{ $order->order_total }}</div>
                                <div class="text-gray-600 text-xs mt-0.5">Oluşturuldu :
                                    {{ $order->created_at->format('d.m.Y') }}</div>
                                <div class="text-gray-600 text-xs mt-0.5">Siparişe Özel Adres :
                                    {{ $order->warehouse_address }}</div>

                                    <span class="flag-icon flag-icon-{{$order->country->country_code }}"
                                    >
                            </div>
                            <div class="relative inline-block p-3 rounded-lg">
                                <span>Toplam Ağırlığı :
                                </span>
                                <span class="px-3 py-2 rounded-full bg-theme-1 text-white mr-1">
                                    {{ $order->total_weight ?? 0 }}
                                    lbs
                                </span>
                            </div>
                            <div class="relative inline-block  p-3 rounded-lg">
                                <span>Toplam Ürün :
                                </span>
                                <span class="px-3 py-2 rounded-full bg-theme-1 text-white mr-1">
                                    {{ (int) $order->total_quantity }}
                                </span>
                            </div>
                            <div class="relative inline-block  p-3 rounded-lg">
                                İşlemler
                                <a href="{{ route('fba.show', $order->id) }}" class="btn btn-primary "><span
                                        class="iconify mr-1" data-icon="akar-icons:eye"></span>
                                    Gözat
                                </a>
                                @if ($order->status == 'Ödeme Bekliyor')
                                    <a href="{{ route('fba.cancel', $order->id) }}" class="btn btn-primary "><span
                                            class="iconify" data-icon="iconoir:cancel"></span>
                                        İptal Et
                                    </a>
                                @endif
                                {{-- @if ($order->status == 'Ödeme Bekliyor')
                                    <button wire:click="payOrder({{ $order->id }})" class="btn btn-primary ">
                                        <span class="iconify mr-1" data-icon="uiw:pay"></span>
                                        Şimdi Öde
                                    </button>
                                @endif --}}
                                @if ($order->box_instruction)
                                    <button wire:click="toggleShowBoxInstruction({{ $order->id }})"
                                        class="btn btn-primary ">
                                        Yerleşim Planı @if (isset($showBoxInstruction[$order->id]) && $showBoxInstruction[$order->id])
                                            Gizle
                                        @else
                                            Göster
                                        @endif
                                    </button>
                                @endif


                            </div>
                        </div>
                        <div class="flex flex-wrap lg:flex-nowrap items-center justify-center p-5">
                            <div class="w-full lg:w-1/2 mb-4 lg:mb-0 ">
                                <div class="flex flex-col lg:flex-row items-center">
                                    <div class="flex flex-wrap -space-x-2 overflow-hidden">

                                        @forelse($order->order_items as $item)
                                            <a href="https://www.amazon.com/dp/{{ $item->unique_identifier }}"
                                                target="_blank">
                                                <span class="inline-block relative ml-2">
                                                    <img class="h-16 w-16" src="{{ $item->product_image }}"
                                                        alt="">
                                                    <span
                                                        class="absolute top-0 right-0 block h-5 w-5 transform -translate-y-1/2 translate-x-1/2 rounded-full ring-2 ring-white bg-green-400 text-center">{{ $item->quantity }}</span>
                                                    <div class="text-wave-600">{{ $item->unique_identifier }}</div>
                                                </span>
                                            </a>
                                        @empty
                                            Siparişinizde Herhangi bir ürün bulunamadı.
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if (isset($showBoxInstruction[$order->id]) && $showBoxInstruction[$order->id])
                            @php
                                $boxsystem = json_decode($order->box_instruction, true);

                            @endphp
                            <div class="p-5 shadow-lg rounded-lg  md:w-1/2 mx-auto ">
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
                                        <div class="border border-2 mx-2 flex flex-wrap p-4">
                                            <span class="text-theme-1 font-bold">KUTU {{ $box_key + 1 }} </span>
                                            @forelse($box as $box_item_key => $box_item)
                                                <div style="background-color:{{ $box_item['color'] }}"
                                                    class="border border-2 flex mx-2 p-4  text-theme-1 font-bold">
                                                    Adet : {{ $box_item['count'] }} Sku : <a target="_blank"
                                                        href="https://www.amazon.com/dp/{{ $box_item_key }}">{{ $box_item_key }}</a>
                                                </div>
                                            @empty
                                            @endforelse


                                        </div>
                                    @empty
                                        Yerleşim Planı Yok
                                    @endforelse
                                </div>
                            </div>
                        @endif
                    </div>
                @empty
                    <div id="box" class="box mt-5 ">
                        <div
                            class="flex flex-col lg:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
                            <div class="lg:ml-2  text-center lg:text-left mt-3 lg:mt-0">

                            </div>
                            <div class="lg:ml-2 lg:mr-auto text-center lg:text-left mt-3 lg:mt-0">

                                <div class="text-gray-600 text-xs mt-0.5">Eşleşen Sipariş Bulunamadı</div>
                            </div>

                        </div>
                        <div class="flex flex-wrap lg:flex-nowrap items-center justify-center p-5">
                            <div class="w-full lg:w-1/2 mb-4 lg:mb-0 ">
                                <div class="flex flex-col lg:flex-row items-center">
                                    <div class="flex -space-x-2 overflow-hidden">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforelse
                <div
                    class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center mt-5 justify-center">
                    {{ $orders->links() }}
                </div>
            </div>

        </div>
        <div class="intro-y col-span-12 lg:col-span-3">
            <div class="w-full sm:w-auto  sm:mt-0 sm:ml-auto md:ml-0">
                <div class="relative text-gray-700 dark:text-gray-300 ">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                        <button type="submit" class="p-1 focus:outline-none focus:shadow-outline">
                            <span class="iconify" data-icon="fluent:box-search-24-filled"
                                style="color: #198cf0;"></span>
                        </button>
                    </span>
                    <input type="search" name="q" wire:model="search"
                        class="border-transparent	py-2 text-sm  w-full rounded-md pl-10 focus:outline-none  bg-white focus:text-gray-900 placeholder:text-blue-400"
                        placeholder="Arama" autocomplete="off">
                </div>
            </div>
            <div class="box mt-6">
                <form class="p-4">
                    <h3 class="sr-only">Categories</h3>
                    <div x-data="{ open: false }" class="border-b border-gray-200 py-6 ">
                        <h3 class="-my-3 flow-root">
                            <span class="iconify w-8 inline" data-icon="codicon:settings"></span>
                            <span class="font-medium text-gray-900 ">
                                FİLTRELER
                            </span>
                        </h3>

                    </div>

                    <div x-data="{ open: true }" class="border-b border-gray-200 py-6">
                        <h3 class="-my-3 flow-root">
                            <button type="button" x-description="Expand/collapse section button"
                                class="py-3 bg-white w-full flex items-center justify-between text-sm text-gray-400 hover:text-gray-500"
                                aria-controls="filter-section-1" @click="open = !open" aria-expanded="true"
                                x-bind:aria-expanded="open.toString()">
                                <span class="font-medium text-gray-900">
                                    Kategori
                                </span>
                                <span class="ml-6 flex items-center">
                                    <svg class="h-5 w-5" x-description="Expand icon, show/hide based on section open state.

                                                                            Heroicon name: solid/plus-sm"
                                        x-show="!(open)" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                        fill="currentColor" aria-hidden="true" style="display: none;">
                                        <path fill-rule="evenodd"
                                            d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <svg class="h-5 w-5" x-description="Collapse icon, show/hide based on section open state.

                                                                            Heroicon name: solid/minus-sm"
                                        x-show="open" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                        fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M5 10a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </span>
                            </button>
                        </h3>
                        <div class="pt-6" x-description="Filter section, show/hide based on section state."
                            id="filter-section-1" x-show="open">
                            <div class="space-y-4">



                                <div class="flex items-center">
                                    <input id="filter-category-1" wire:model="activeFilter.1" value="Ödeme Bekliyor"
                                        type="checkbox"
                                        class="h-4 w-4 border-gray-300 rounded text-wave-600 focus:ring-wave-500">
                                    <label for="filter-category-1" class="ml-3 text-sm text-gray-600">
                                        Ödeme Bekliyor
                                        {{ isset($order) && $order->where('user_id',auth()->user()->id)->where('status', 'Ödeme Bekliyor')->count()? '( ' . $order->where('user_id',auth()->user()->id)->where('status', 'Ödeme Bekliyor')->count() . ' )': '' }}
                                    </label>
                                </div>

                                <div class="flex items-center">
                                    <input id="filter-category-2" wire:model="activeFilter.2" value="Kargo Bekleniyor"
                                        type="checkbox"
                                        class="h-4 w-4 border-gray-300 rounded text-wave-600 focus:ring-wave-500">
                                    <label for="filter-category-2" class="ml-3 text-sm text-gray-600">
                                        Kargo Bekleniyor
                                        {{ isset($order) && $order->where('user_id',auth()->user()->id)->where('status', 'Kargo Bekleniyor')->count()? '( ' . $order->where('user_id',auth()->user()->id)->where('status', 'Kargo Bekleniyor')->count() . ' )': '' }}
                                    </label>
                                </div>
                                <div class="flex items-center">
                                    <input id="filter-category-2" wire:model="activeFilter.3"
                                        value="Eksik Bilgileri Tamamlayın" type="checkbox"
                                        class="h-4 w-4 border-gray-300 rounded text-wave-600 focus:ring-wave-500">
                                    <label for="filter-category-2" class="ml-3 text-sm text-gray-600">
                                        Eksik Bilgileri Tamamlayın
                                        {{ isset($order) && $order->where('user_id',auth()->user()->id)->where('status', 'Eksik Bilgileri Tamamlayın')->count()? '( ' . $order->where('user_id',auth()->user()->id)->where('status', 'Eksik Bilgileri Tamamlayın')->count() . ' )': '' }}
                                    </label>
                                </div>

                                <div class="flex items-center">
                                    <input id="filter-category-2" wire:model="activeFilter.4" value="Depoda İşleniyor"
                                        type="checkbox"
                                        class="h-4 w-4 border-gray-300 rounded text-wave-600 focus:ring-wave-500">
                                    <label for="filter-category-2" class="ml-3 text-sm text-gray-600">
                                        Depoda İşleniyor
                                        {{ isset($order) && $order->where('user_id',auth()->user()->id)->where('status', 'Depoda İşleniyor')->count()? '( ' . $order->where('user_id',auth()->user()->id)->where('status', 'Depoda İşleniyor')->count() . ' )': '' }}
                                    </label>
                                </div>


                                <div class="flex items-center">
                                    <input id="filter-category-3" wire:model="activeFilter.5"
                                        value="Koli Etiketi Bekliyor" type="checkbox"
                                        class="h-4 w-4 border-gray-300 rounded text-wave-600 focus:ring-wave-500">
                                    <label for="filter-category-3" class="ml-3 text-sm text-gray-600">
                                        Koli Etiketi Bekliyor
                                        {{ isset($order) && $order->where('user_id',auth()->user()->id)->where('status', 'Koli Etiketi Bekliyor')->count()? '( ' . $order->where('user_id',auth()->user()->id)->where('status', 'Koli Etiketi Bekliyor')->count() . ' )': '' }}
                                    </label>
                                </div>

                                <div class="flex items-center">
                                    <input id="filter-category-4" wire:model="activeFilter.6"
                                        value="Aracı Firmaya Teslim Edildi" type="checkbox"
                                        class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                    <label for="filter-category-4" class="ml-3 text-sm text-gray-600">
                                        Aracı Firmaya Teslim Edildi
                                        {{ isset($order) && $order->where('user_id',auth()->user()->id)->where('status', 'Aracı Firmaya Teslim Edildi')->count()? '( ' . $order->where('user_id',auth()->user()->id)->where('status', 'Aracı Firmaya Teslim Edildi')->count() . ' )': '' }}
                                    </label>
                                </div>
                                <div class="flex items-center">
                                    <input id="filter-category-4" wire:model="activeFilter.7" value="İptal Edildi"
                                        type="checkbox"
                                        class="h-4 w-4 border-gray-300 rounded text-wave-600 focus:ring-wave-500">
                                    <label for="filter-category-4" class="ml-3 text-sm text-gray-600">
                                        İptal Edildi
                                        {{ isset($order) && $order->where('user_id',auth()->user()->id)->where('status', 'İptal Edildi')->count()? '( ' . $order->where('user_id',auth()->user()->id)->where('status', 'İptal Edildi')->count() . ' )': '' }}
                                    </label>
                                </div>
                                <div class="flex items-center">
                                    <input id="filter-category-4" wire:model="activeFilter.8" value="Tamamlandı"
                                        type="checkbox"
                                        class="h-4 w-4 border-gray-300 rounded text-wave-600 focus:ring-wave-500">
                                    <label for="filter-category-4" class="ml-3 text-sm text-gray-600">
                                        Tamamlandı
                                        {{ isset($order) && $order->where('user_id',auth()->user()->id)->where('status', 'Tamamlandı')->count()? '( ' . $order->where('user_id',auth()->user()->id)->where('status', 'Tamamlandı')->count() . ' )': '' }}
                                    </label>
                                </div>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>




    </div>





</div>
