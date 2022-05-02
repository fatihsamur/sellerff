<div>
    <h2 class="intro-y text-lg font-medium mt-10">
        Box Ayarları
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <div class="alert alert-warning show flex items-center mb-2" role="alert"> <i data-feather="alert-circle"
                    class="w-6 h-6 mr-2"></i> Oluşturulan Box Numaraları Silinememektedir.Bu yüzden Box ekleme
                işlemlerini dikkatli yapınız! </div>
        </div>

        <div class="intro-y col-span-12 lg:col-span-12 mt-5 ">
            @forelse ($boxes as $index => $box)

                <div id="box{{ $loop->index }}" class="box mt-5 ">
                    <div class="flex flex-col lg:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
                        <div class="lg:ml-2  text-center lg:text-left mt-3 lg:mt-0">
                            <span wire:ignore class="iconify" data-icon="noto:package" data-width="60"></span>
                        </div>
                        <div class="lg:ml-2 lg:mr-auto text-center lg:text-left mt-3 lg:mt-0">
                            <a href="" class="font-medium">BOX#{{ $box->id }}</a>
                        </div>
                        <div class="relative inline-block p-3 rounded-lg">
                            <span>Oluşturulma Tarihi :
                            </span>
                            <span class="px-3 py-2 rounded-full bg-theme-1 text-white mr-1">
                                {{ $box->created_at ?? 'Bulunamadı' }}
                            </span>
                            <span>Toplam Envanter Sayısı :
                            </span>
                            <span class="px-3 py-2 rounded-full bg-theme-1 text-white mr-1">
                                {{ $box->order_items_count }}
                            </span>
                        </div>

                        <div wire:click="toggleBox('{{ $box->id }}')"
                            class="relative inline-block bg-theme-1 text-white  p-3 rounded-lg cursor-pointer">
                            Detay @if (isset($box_expanded[$box->id]) && $box_expanded[$box->id]) Gizle @else Göster @endif
                        </div>
                    </div>
                    @if (isset($box_expanded[$box->id]) && $box_expanded[$box->id])
                        @forelse($box->order_items as $item)
                            <div class="flex flex-wrap lg:flex-nowrap items-center border-b p-5">
                                <div class="w-full mb-4 lg:mb-0 ">
                                    <div class="flex flex-col lg:flex-row items-center ">
                                        <div class="flex -space-x-2 overflow-hidden items-center">
                                            <span class="inline-block relative ml-2">
                                                <img class="h-16 w-16" src="{{ $item->product_image }}" alt="">
                                                <span
                                                    class="absolute top-0 right-0 block h-5 w-5 transform -translate-y-1/2 translate-x-1/2 rounded-full ring-2 ring-white bg-green-400 text-center">{{ $item->quantity }}</span>
                                            </span>
                                            <span
                                                class="ml-4">{{ Str::limit($item->product_name, 25) }}</span>
                                            <span class="ml-4 ">Sku : {{ $item->unique_identifier }}</span>
                                            <span class="ml-4 ">Fnsku : {{ $item->fnsku ?? '' }}</span>
                                            <span class="ml-4 whitespace-nowrap">
                                                Weight
                                                :
                                                <span class="px-2 py-2 rounded-full bg-theme-1 text-white m-1">
                                                    {{ $item->weight }} lbs</span>
                                                Height
                                                :
                                                <span
                                                    class="px-2 py-2 rounded-full bg-theme-1 text-white m-1">{{ $item->height }}
                                                    lbs</span>
                                                Width
                                                :
                                                <span
                                                    class="px-2 py-2 rounded-full bg-theme-1 text-white m-1">{{ $item->width }}
                                                    lbs</span>
                                                Length
                                                :
                                                <span class="px-2 py-2 rounded-full bg-theme-1 text-white m-1">
                                                    {{ $item->length }} lbs</span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @empty
                            <div>
                                Sipariş İtem Bulunamadı
                            </div>
                        @endforelse
                    @endif
                </div>

                @empty
                    <div id="box" class="box mt-5 ">
                        <div class="flex flex-col lg:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
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


                <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center mt-5 justify-center">
                    {{ $boxes->links() }}
                </div>

            </div>

        </div>
    </div>
