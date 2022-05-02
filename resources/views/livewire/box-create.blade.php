<div>
    <!-- BEGIN: Content -->

    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <a href="{{ url('warehouse-sellerfullfilment/order_process') }}">
            <span class="iconify" data-icon="eva:arrow-back-outline" data-width="30"></span>
        </a>

        <h2 class="text-lg font-medium mr-auto">
            Box Oluştur
        </h2>

    </div>
    <div class="pos intro-y grid grid-cols-12 gap-5 mt-5">
        <!-- BEGIN: Post Content -->
        <div class="intro-y col-span-12 lg:col-span-8">
            <div class="post intro-y overflow-hidden box mt-5">
                <div class="post__content tab-content">
                    <div id="content" class="tab-pane p-5 active" role="tabpanel" aria-labelledby="content-tab">
                        <div class="col-span-12">
                            @if ($errors->any())
                                <div class="text-sm text-red-600">
                                    Devam etmek için form alanlarını doğru bir biçimde doldurduğunuza emin olun.
                                </div>
                                @foreach ($errors->all() as $key => $error)
                                    <span class="text-sm text-red-600">{{ $error }}
                                        @if (!$loop->last), @endif
                                    </span>
                                @endforeach
                            @endif
                        </div>
                        <div class="border border-gray-200 dark:border-dark-5 rounded-md p-5 mt-5">
                            <div class="mt-5">

                                {{-- <div class="mt-3">
                                    <label class="form-label">Width Inc</label>
                                    <div class="input-group mt-2">
                                        <input wire:model="width" type="text" class="form-control" placeholder="Width"
                                            aria-label="Width" aria-describedby="input-group-price">
                                    </div>

                                </div>
                                <div class="mt-3">
                                    <label class="form-label">Height Inc</label>
                                    <div class="input-group mt-2">
                                        <input wire:model="height" type="text" class="form-control"
                                            placeholder="Height" aria-label="Height"
                                            aria-describedby="input-group-price">
                                    </div>

                                </div>
                                <div class="mt-3">
                                    <label class="form-label">Length Inc</label>
                                    <div class="input-group mt-2">
                                        <input wire:model="length" type="text" class="form-control"
                                            placeholder="Length" aria-label="Length"
                                            aria-describedby="input-group-price">
                                    </div>

                                </div>
                                <div class="mt-3">
                                    <label class="form-label">Weight Lbs</label>
                                    <div class="input-group mt-2">
                                        <input wire:model="weight" type="text" class="form-control"
                                            placeholder="Weight" aria-label="Weight"
                                            aria-describedby="input-group-price">
                                    </div>

                                </div> --}}
                                <div class="mt-3">
                                    <label class="form-label">Tracking Number</label>
                                    <div class="input-group mt-2">
                                        <input wire:model="tracking_number" type="text" class="form-control"
                                            placeholder="Tracking Number" aria-label="Tracking Number"
                                            aria-describedby="input-group-price">
                                    </div>

                                </div>
                                <div class="mt-3">
                                    <label class="form-label">Kutu Durumu</label>
                                    <select name="status" wire:model="status"
                                        class="w-full h-10 pl-3 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:shadow-outline">
                                        <option value="none">Durum Seçiniz</option>
                                        <option value="Koli Etiketi Bekleniyor">Koli Etiketi Bekleniyor
                                        </option>
                                        <option value="Kargoya Verilmeyi Bekliyor">Kargoya
                                            Verilmeyi Bekliyor
                                        </option>
                                        <option value="Aracı Firmaya Teslim Edildi">Aracı Firmaya
                                            Teslim Edildi
                                        </option>
                                    </select>
                                </div>
                                {{-- <div class="mt-3">
                                    <label class="form-label">Ürünler</label>

                                    <button wire:click="add({{ $i }})"
                                        class="dropdown-toggle btn btn-primary shadow-md flex items-center">Ürün
                                        Ekle</button>
                                    @forelse ($inputs as $key => $value)
                                        <div class="flex items-center mt-3">
                                            <input wire:model="box_items.{{ $key }}.quantity" type="text"
                                                class="form-control inline-block " placeholder="Adet" aria-label="Adet"
                                                aria-describedby="input-group-price">
                                            <select name="status" wire:model="box_items.{{ $key }}.sku"
                                                class="ml-3 w-full h-10 pl-3 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:shadow-outline inline-block">
                                                <option value="none">Ürün Seçiniz</option>
                                                @forelse ($order->order_items as $product)
                                                    <option value="{{ $product->unique_identifier }}">SKU:
                                                        {{ $product->unique_identifier }}
                                                        {{ Str::limit($product->product_name, 30) }}</option>
                                                @empty
                                                    <option value="none">Ürün Bulunamadı</option>
                                                @endforelse
                                            </select>
                                            <button wire:click="remove({{ $key }})"
                                                class="ml-2 dropdown-toggle btn btn-danger shadow-md flex items-center">Çıkar</button>
                                        </div>
                                    @empty
                                        <div class="mt-4">Ürün Ekleyin </div>
                                    @endforelse

                                </div> --}}
                            </div>
                        </div>
                        <div class="flex w-full justify-end mt-5">
                            <button type="button" class="dropdown-toggle btn btn-primary shadow-md flex items-center"
                                wire:click="createBox({{ $order->order_items }},{{ $order }})">
                                Gönder </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Post Content -->

    </div>

    <!-- END: Content -->
</div>
