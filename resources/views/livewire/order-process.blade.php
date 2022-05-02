<div>
    <h2 class="intro-y text-lg font-medium mt-10">
        Gönderi İşlemleri
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">


        <div class="col-span-12">
            <div class="flex intro-y ">

                <div class="box mt-6 w-full">
                    <form class="p-4">
                        <h3 class="sr-only">Categories</h3>
                        <div x-data="{ open: false }" class="border-b border-gray-200 py-3 ">
                            <h3 class="-my-3 flow-root">
                                <span class="iconify w-8 inline" data-icon="codicon:settings"></span>
                                <span class="font-medium text-gray-900 ">
                                    FİLTRELER
                                </span>
                            </h3>

                        </div>

                        <div x-data="{ open: true }" class=" border-gray-200 py-3">

                            <div class="pt-6"
                                x-description="Filter section, show/hide based on section state." id="filter-section-1"
                                x-show="open">
                                <div class="flex">
                                    <div class="flex items-center">
                                        <input id="filter-category-1" wire:model="activeFilter.1" value="Ödeme Bekliyor"
                                            type="checkbox"
                                            class="h-4 w-4 border-gray-300 rounded text-wave-600 focus:ring-wave-500">
                                        <label for="filter-category-1" class="ml-3 text-sm text-gray-600">
                                            Ödeme Bekliyor

                                            {{ isset($order_c) && $order_c->where('status', 'Ödeme Bekliyor')->count()? '( ' . $order_c->where('status', 'Ödeme Bekliyor')->count() . ' )': '' }}
                                        </label>
                                    </div>

                                    <div class="flex items-center ml-2">
                                        <input id="filter-category-2" wire:model="activeFilter.2"
                                            value="Kargo Bekleniyor" type="checkbox"
                                            class="h-4 w-4 border-gray-300 rounded text-wave-600 focus:ring-wave-500">
                                        <label for="filter-category-2" class="ml-3 text-sm text-gray-600">
                                            Kargo Bekleniyor
                                            {{ isset($order_c) && $order_c->where('status', 'Kargo Bekleniyor')->count()? '( ' . $order_c->where('status', 'Kargo Bekleniyor')->count() . ' )': '' }}

                                        </label>
                                    </div>
                                    <div class="flex items-center ml-2">
                                        <input id="filter-category-2" wire:model="activeFilter.3"
                                            value="Eksik Bilgileri Tamamlayın" type="checkbox"
                                            class="h-4 w-4 border-gray-300 rounded text-wave-600 focus:ring-wave-500">
                                        <label for="filter-category-2" class="ml-3 text-sm text-gray-600">
                                            Eksik Bilgileri Tamamlayın
                                            {{ isset($order_c) && $order_c->where('status', 'Eksik Bilgileri Tamamlayın')->count()? '( ' . $order_c->where('status', 'Eksik Bilgileri Tamamlayın')->count() . ' )': '' }}
                                        </label>
                                    </div>

                                    <div class="flex items-center ml-2">
                                        <input id="filter-category-2" wire:model="activeFilter.4"
                                            value="Depoda İşleniyor" type="checkbox"
                                            class="h-4 w-4 border-gray-300 rounded text-wave-600 focus:ring-wave-500">
                                        <label for="filter-category-2" class="ml-3 text-sm text-gray-600">
                                            Depoda İşleniyor
                                            {{ isset($order_c) && $order_c->where('status', 'Depoda İşleniyor')->count()? '( ' . $order_c->where('status', 'Depoda İşleniyor')->count() . ' )': '' }}
                                        </label>
                                    </div>


                                    <div class="flex items-center ml-2">
                                        <input id="filter-category-3" wire:model="activeFilter.5"
                                            value="Koli Etiketi Bekliyor" type="checkbox"
                                            class="h-4 w-4 border-gray-300 rounded text-wave-600 focus:ring-wave-500">
                                        <label for="filter-category-3" class="ml-3 text-sm text-gray-600">
                                            Koli Etiketi Bekliyor
                                            {{ isset($order_c) && $order_c->where('status', 'Koli Etiketi Bekliyor')->count()? '( ' . $order_c->where('status', 'Koli Etiketi Bekliyor')->count() . ' )': '' }}
                                        </label>
                                    </div>

                                    <div class="flex items-center ml-2">
                                        <input id="filter-category-4" wire:model="activeFilter.6"
                                            value="Aracı Firmaya Teslim Edildi" type="checkbox"
                                            class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                        <label for="filter-category-4" class="ml-3 text-sm text-gray-600">
                                            Aracı Firmaya Teslim Edildi
                                            {{ isset($order_c) && $order_c->where('status', 'Aracı Firmaya Teslim Edildi')->count()? '( ' . $order_c->where('status', 'Aracı Firmaya Teslim Edildi')->count() . ' )': '' }}
                                        </label>
                                    </div>
                                    <div class="flex items-center ml-2">
                                        <input id="filter-category-4" wire:model="activeFilter.7" value="İptal Edildi"
                                            type="checkbox"
                                            class="h-4 w-4 border-gray-300 rounded text-wave-600 focus:ring-wave-500">
                                        <label for="filter-category-4" class="ml-3 text-sm text-gray-600">
                                            İptal Edildi
                                            {{ isset($order_c) && $order_c->where('status', 'İptal Edildi')->count()? '( ' . $order_c->where('status', 'İptal Edildi')->count() . ' )': '' }}
                                        </label>
                                    </div>
                                    <div class="flex items-center ml-2">
                                        <input id="filter-category-4" wire:model="activeFilter.8" value="Tamamlandı"
                                            type="checkbox"
                                            class="h-4 w-4 border-gray-300 rounded text-wave-600 focus:ring-wave-500">
                                        <label for="filter-category-4" class="ml-3 text-sm text-gray-600">
                                            Tamamlandı
                                            {{ isset($order_c) && $order_c->where('status', 'Tamamlandı')->count()? '( ' . $order_c->where('status', 'Tamamlandı')->count() . ' )': '' }}
                                        </label>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="flex col-span-12">
                <div class="w-full relative text-gray-700 dark:text-gray-300">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                        <button type="submit" class="p-1 focus:outline-none focus:shadow-outline">
                            <span class="iconify" data-icon="fluent:box-search-24-filled"
                                style="color: #198cf0;"></span>
                        </button>
                    </span>
                    <input wire:model="search" type="search" name="q"
                        class="sticky top-0 relative border-transparent	py-2 text-sm w-full rounded-md focus:outline-none  focus:bg-white focus:text-gray-900 placeholder:text-blue-400"
                        placeholder="Arama" autocomplete="off">
                </div>
            </div>
        </div>
        <!-- BEGIN: Users Layout -->
        <div class="intro-y col-span-12 lg:col-span-12 ">
            <div class="intro-y col-span-10 lg:col-span-10 flex justify-start">

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
                                <div class="text-gray-600 text-xs mt-0.5">{{ $order->status }}</div>
                                <div class="text-gray-600 text-xs mt-0.5">Toplam : $ {{ $order->order_total }}</div>
                                <div class="text-gray-600 text-xs mt-0.5">Oluşturuldu :
                                    {{ $order->created_at->format('d.m.Y') }}</div>
                                    <a href="{{ route('warehouse.user.details', $order->id) }}" class="text-wave-600 text-xs mt-0.5">Email :
                                      {{ $order->user->email }}</a>
                                <div class="text-gray-600 text-xs mt-0.5">Siparişe Özel Adres :
                                    {{ $order->warehouse_address }}</div>
                                    <div class="text-gray-600 text-xs mt-0.5">Ülke
                                    <span class="flag-icon flag-icon-{{$order->country->country_code }}"
                                    >
                                </span>
                                   </div>

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
                            @if ($order)
                                <div class="relative inline-block  p-3 rounded-lg">
                                    İşlemler

                                    <div class="dropdown inline-block ml-3" style="position: relative;">
                                        <button
                                            class="dropdown-toggle btn btn-primary w-32  px-4 relative justify-start"
                                            aria-expanded="false">
                                            İşlem Yap
                                            <span
                                                class="w-8 h-8 absolute flex justify-center items-center right-0 top-0 bottom-0 my-auto ml-auto mr-1">
                                                <svg class="inline" xmlns="http://www.w3.org/2000/svg"
                                                    width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    class="feather feather-chevron-down w-4 h-4">
                                                    <polyline points="6 9 12 15 18 9"></polyline>
                                                </svg> </span>
                                        </button>
                                        <div class="dropdown-menu w-32 " id="_jbtkadlip"
                                            data-popper-placement="bottom-end"
                                            style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate3d(0px, 38px, 0px);">
                                            <div class="dropdown-menu__content box dark:bg-dark-1 p-2">
                                                <a href="{{ route('warehouse.order_process.box_create', $order->id) }}"
                                                    class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        class="feather feather-file-text w-4 h-4 mr-2">
                                                        <path
                                                            d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z">
                                                        </path>
                                                        <polyline points="14 2 14 8 20 8"></polyline>
                                                        <line x1="16" y1="13" x2="8" y2="13"></line>
                                                        <line x1="16" y1="17" x2="8" y2="17"></line>
                                                        <polyline points="10 9 9 9 8 9"></polyline>
                                                    </svg> Box Oluştur </a>

                                                @if ($order->boxes()->exists())
                                                    <a href="{{ route('warehouse.order_process.box_update', $order->id) }}"
                                                        class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="1.5" stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            class="feather feather-file-text w-4 h-4 mr-2">
                                                            <path
                                                                d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z">
                                                            </path>
                                                            <polyline points="14 2 14 8 20 8"></polyline>
                                                            <line x1="16" y1="13" x2="8" y2="13"></line>
                                                            <line x1="16" y1="17" x2="8" y2="17"></line>
                                                            <polyline points="10 9 9 9 8 9"></polyline>
                                                        </svg> Box Düzenle </a>
                                                @endif
                                                <a href="{{ route('warehouse.order_process.edit', $order->id) }}"
                                                    class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        class="feather feather-file-text w-4 h-4 mr-2">
                                                        <path
                                                            d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z">
                                                        </path>
                                                        <polyline points="14 2 14 8 20 8"></polyline>
                                                        <line x1="16" y1="13" x2="8" y2="13"></line>
                                                        <line x1="16" y1="17" x2="8" y2="17"></line>
                                                        <polyline points="10 9 9 9 8 9"></polyline>
                                                    </svg>Ölçü & Adet Düzenle</a>

                                                <a href="{{ route('warehouse.order_process.status_change', $order->id) }}"
                                                    class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        class="feather feather-file-text w-4 h-4 mr-2">
                                                        <path
                                                            d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z">
                                                        </path>
                                                        <polyline points="14 2 14 8 20 8"></polyline>
                                                        <line x1="16" y1="13" x2="8" y2="13"></line>
                                                        <line x1="16" y1="17" x2="8" y2="17"></line>
                                                        <polyline points="10 9 9 9 8 9"></polyline>
                                                    </svg>Sipariş Durumu Güncelle </a>
                                                <a href="{{ route('warehouse.order_process.show_user', $order->id) }}"
                                                    class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        class="feather feather-file-text w-4 h-4 mr-2">
                                                        <path
                                                            d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z">
                                                        </path>
                                                        <polyline points="14 2 14 8 20 8"></polyline>
                                                        <line x1="16" y1="13" x2="8" y2="13"></line>
                                                        <line x1="16" y1="17" x2="8" y2="17"></line>
                                                        <polyline points="10 9 9 9 8 9"></polyline>
                                                    </svg>Kullanıcı Bilgilerini Görüntüle</a>
                                                    <a href="{{ route('warehouse.order_process.payment_mail', $order->id) }}"
                                                    class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        class="feather feather-file-text w-4 h-4 mr-2">
                                                        <path
                                                            d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z">
                                                        </path>
                                                        <polyline points="14 2 14 8 20 8"></polyline>
                                                        <line x1="16" y1="13" x2="8" y2="13"></line>
                                                        <line x1="16" y1="17" x2="8" y2="17"></line>
                                                        <polyline points="10 9 9 9 8 9"></polyline>
                                                    </svg>Ödeme Talebi Maili Gönder</a>
                                            </div>
                                        </div>
                                    </div>


                                    @if ($order->status != 'İptal Edildi' && $order->status != 'Tamamlandı')
                                        <a href="{{ route('warehouse.cancel', $order->id) }}" class="btn btn-primary ">
                                            <span class="iconify" data-icon="iconoir:cancel"></span>
                                            İptal Et
                                        </a>
                                    @endif

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
                                    @if ($order->boxes()->exists())
                                        <button wire:click="toggleShowBox({{ $order->id }})"
                                            class="btn btn-primary ">
                                            Box Detaylarını @if (isset($showBox[$order->id]) && $showBox[$order->id])
                                                Gizle
                                            @else
                                                Göster
                                            @endif
                                        </button>
                                    @endif
                                </div>
                            @endif
                        </div>
                        <div class="flex flex-wrap lg:flex-nowrap items-center justify-center ">
                            <div class="w-full mb-4 lg:mb-0 ">
                                <div class="flex flex-col lg:flex-row items-center ">
                                    <div class="overflow-x-auto w-full">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">
                                                        Ürün</th>
                                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">
                                                        Fnsku</th>
                                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">
                                                        Sku</th>
                                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">
                                                        Ölçüler</th>
                                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">
                                                        Müşteri Notu</th>
                                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">
                                                        Labellar</th>
                                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">
                                                        Track & Buyer Order</th>
                                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">
                                                        SKT</th>
                                                        <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">
                                                        SKT Tarihi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($order->order_items as $orderitemkey => $item)
                                                    @php


                                                        $buyer_orders = json_decode($item->buyer_order_id, true);
                                                        if (empty($buyer_orders)) {
                                                            $buyer_orders = [];
                                                        }
                                                    @endphp
                                                    <tr>
                                                        <td class="border">
                                                            <span class="inline-block relative ml-2">
                                                                <img class="w-10 h-10 rounded-full overflow-hidden shadow-lg image-fit zoom-in scale-110 inline"
                                                                    src="{{ $item->product_image }}">
                                                                <span
                                                                    class="absolute top-0 right-0 block h-5 w-5 transform -translate-y-1/2 translate-x-1/2 rounded-full ring-2 ring-white bg-green-400 text-center">{{ $item->quantity }}</span>
                                                            </span>
                                                            <span>{{ Str::limit($item->product_name, 25) }}</span>
                                                        </td>

                                                        <td class="border">{{ $item->fnsku }}</td>
                                                        <td class="border"> <a class="text-wave-500"
                                                                target="_blank"
                                                                href="https://www.amazon.com/dp/{{ $item->unique_identifier }}">{{ $item->unique_identifier }}</a>
                                                        </td>
                                                        <td class="border whitespace-nowrap">
                                                            Weight
                                                            :
                                                            <span
                                                                class="px-2 py-2 rounded-full bg-theme-1 text-white m-1">
                                                                {{ $item->weight }} lbs</span>
                                                            Height
                                                            :
                                                            <span
                                                                class="px-2 py-2 rounded-full bg-theme-1 text-white m-1">{{ $item->height }}
                                                                inc</span>
                                                            Width
                                                            :
                                                            <span
                                                                class="px-2 py-2 rounded-full bg-theme-1 text-white m-1">{{ $item->width }}
                                                                inc</span>
                                                            Length
                                                            :
                                                            <span
                                                                class="px-2 py-2 rounded-full bg-theme-1 text-white m-1">
                                                                {{ $item->length }} inc</span>
                                                        </td>
                                                        <td class="border">{{ $item->customer_note }}</td>
                                                        <td class="border whitespace-nowrap">
                                                            @if ($loop->first)
                                                                @php
                                                                    $labels = json_decode($order->labels, true) ?? [];

                                                                @endphp
                                                                @forelse($labels as $labelkey => $label)
                                                                    @if ($label && file_exists(public_path('storage/label/' . $label)))
                                                                        <a target="_blank"
                                                                            href="{{ asset('/storage/label/' . $label) }}"
                                                                            class="btn btn-primary">Label
                                                                            {{ $labelkey + 1 }}</a>
                                                                    @endif
                                                                @empty
                                                                    Label Bulunamadı
                                                                @endforelse
                                                            @endif
                                                        </td>
                                                        <td class="border">
                                                            <div>
                                                                <span>
                                                                    Tracking:
                                                                    {{ $buyer_orders[0]['tracking_id'] ?? '' }}
                                                                </span>
                                                                <span>Buyer:
                                                                    {{ $buyer_orders[0]['buyer_order_id'] ?? '' }}</span>
                                                            </div>


                                                        </td>
                                                        <td class="border">
                                                            <div>
                                                            @if( $item->skt_required )
                                                              <a href="{{ route('warehouse.order_process.skt_add', $order->id) }}" class="btn btn-primary mt-2 ml-2">
                                                                Skt Ekle
                                                            </a>
                                                            @endif
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @empty
                                                        <tr>
                                                            <td class="border">
                                                                Siparişinizde Herhangi bir ürün bulunamadı.
                                                            </td>
                                                        </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if (isset($showBox[$order->id]) && $showBox[$order->id])
                                <div class="flex flex-wrap lg:flex-nowrap items-center justify-center mt-5">
                                    <div class="w-full mb-4 lg:mb-0 ">
                                        <div class="flex flex-col lg:flex-row items-center ">
                                            <div class="overflow-x-auto w-full">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th
                                                                class="border border-b-2 dark:border-dark-5 whitespace-nowrap">
                                                                BoxID</th>
                                                            <th
                                                                class="border border-b-2 dark:border-dark-5 whitespace-nowrap">
                                                                BoxLabel</th>
                                                            <th
                                                                class="border border-b-2 dark:border-dark-5 whitespace-nowrap">
                                                                Ölçüler</th>
                                                            <th
                                                                class="border border-b-2 dark:border-dark-5 whitespace-nowrap">
                                                                Tracking Number</th>
                                                            <th
                                                                class="border border-b-2 dark:border-dark-5 whitespace-nowrap">
                                                                Durumu</th>


                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        @forelse($order->boxes as $box)
                                                            <tr>
                                                                <td class="border">
                                                                    <span>BOX#{{ $box->id }}</span>
                                                                </td>
                                                                <td class="border">
                                                                    @if (isset($box->box_label))
                                                                        @php
                                                                            $boxLabels = json_decode($box->box_label);
                                                                        @endphp
                                                                        @foreach  ($boxLabels as $key => $item)
                                                                            @if (file_exists(public_path('storage/boxlabels/' . $item)))
                                                                                <a target="_blank"
                                                                                    href="{{ asset('/storage/boxlabels/' . $item) }}"
                                                                                    class="btn btn-primary">Label
                                                                                    {{ $key + 1 }}</a>
                                                                            @endif
                                                                        @endforeach
                                                                    @endif
                                                                </td>
                                                                <td class="border whitespace-nowrap">
                                                                    Weight
                                                                    :
                                                                    <span
                                                                        class="px-2 py-2 rounded-full bg-theme-1 text-white m-1">
                                                                        {{ $box->weight_lbs }} lbs</span>
                                                                    Height
                                                                    :
                                                                    <span
                                                                        class="px-2 py-2 rounded-full bg-theme-1 text-white m-1">{{ $box->height_in }}
                                                                        inc</span>
                                                                    Width
                                                                    :
                                                                    <span
                                                                        class="px-2 py-2 rounded-full bg-theme-1 text-white m-1">{{ $box->width_in }}
                                                                        inc</span>
                                                                    Length
                                                                    :
                                                                    <span
                                                                        class="px-2 py-2 rounded-full bg-theme-1 text-white m-1">
                                                                        {{ $box->length_in }} inc</span>
                                                                </td>
                                                                <td class="border">
                                                                    <span>{{ $box->tracking_number }}</span>
                                                                </td>
                                                                <td class="border">
                                                                    <span>{{ $box->status }}</span>
                                                                </td>
                                                            </tr>
                                                        @empty
                                                            <tr>
                                                                <td class="border">
                                                                    Siparişinizde Herhangi bir box ataması bulunamadı.
                                                                </td>
                                                            </tr>
                                                        @endforelse
                                                    </tbody>
                                                </table>
                                            </div>


                                        </div>



                                    </div>
                                </div>
                            @endif
                            @if (isset($showBoxInstruction[$order->id]) && $showBoxInstruction[$order->id])
                                @php
                                    $boxsystem = json_decode($order->box_instruction, true);

                                @endphp
                                <div class="p-5 shadow-lg rounded-lg  md:w-1/2 mx-auto ">
                                    <span class="text-xl text-theme-1 font-bold ">
                                        Kutu Yerleşim Planı :
                                    </span>
                                    <div class="flex flex-wrap mt-4">
                                        @forelse ($boxsystem as $box_key => $box)
                                            <div class="border border-2 mx-2 flex p-4">
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





        </div>





    </div>
