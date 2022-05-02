<div>
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <a href="{{ url('warehouse-sellerfullfilment/order_process') }}">
            <span class="iconify" data-icon="eva:arrow-back-outline" data-width="30"></span>
        </a>

        <h2 class="text-lg font-medium mr-auto">
            Box Düzenle
        </h2>

    </div>
    <div class="pos intro-y grid grid-cols-12 gap-5 mt-5">
        @forelse($boxes as $box)
            <div class="intro-y col-span-12 lg:col-span-6">
                <div class="post intro-y overflow-hidden box mt-5">
                    <div class="post__content tab-content">
                        <div id="content" class="tab-pane p-5 active" role="tabpanel" aria-labelledby="content-tab">
                            <div class="border border-gray-200 dark:border-dark-5 rounded-md p-5 mt-5">
                                Box ID: {{ $box->id }}
                                <div class="mt-5">
                                    <div class="mt-3">
                                        <label class="form-label">Width</label>
                                        <div class="input-group mt-2">
                                            <input wire:model="boxInputs.{{ $box->id }}.width_in" type="text"
                                                class="form-control" placeholder="Width" aria-label="Width"
                                                aria-describedby="input-group-price">
                                        </div>
                                        @error('width') <span class="error text-red-600	">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mt-3">
                                        <label class="form-label">Height</label>
                                        <div class="input-group mt-2">
                                            <input wire:model="boxInputs.{{ $box->id }}.height_in" type="text"
                                                class="form-control" placeholder="Height" aria-label="Height"
                                                aria-describedby="input-group-price">
                                        </div>
                                        @error('height') <span class="error text-red-600	">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mt-3">
                                        <label class="form-label">Length</label>
                                        <div class="input-group mt-2">
                                            <input wire:model="boxInputs.{{ $box->id }}.length_in" type="text"
                                                class="form-control" placeholder="Length" aria-label="Length"
                                                aria-describedby="input-group-price">
                                        </div>
                                        @error('length') <span class="error text-red-600	">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mt-3">
                                        <label class="form-label">Weight</label>
                                        <div class="input-group mt-2">
                                            <input wire:model="boxInputs.{{ $box->id }}.weight_lbs" type="text"
                                                class="form-control" placeholder="Weight" aria-label="Weight"
                                                aria-describedby="input-group-price">
                                        </div>
                                        @error('weight') <span class="error text-red-600	">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mt-3">
                                        <label class="form-label">Tracking Number</label>
                                        <div class="input-group mt-2">
                                            <input wire:model="boxInputs.{{ $box->id }}.tracking_number"
                                                type="text" class="form-control" placeholder="Tracking Number"
                                                aria-label="Tracking Number" aria-describedby="input-group-price">
                                        </div>
                                        @error('tracking_number') <span
                                                class="error text-red-600	">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mt-3">
                                        <label class="form-label">Kutu Durumu</label>
                                        <select name="status" wire:model="boxInputs.{{ $box->id }}.status"
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
                                    <div class="mt-3">
                                        <button
                                            class="btn btn-danger h-9 px-5 py-3 flex items-center justify-center text-white font-bold rounded focus:outline-none focus:shadow-outline"
                                            type="button" wire:click.prevent="deleteBox({{ $box->id }})">
                                            Box Sil
                                        </button>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>
                </div>

            </div>
        @empty
            Box Bulunamadı
        @endforelse
        <div class="intro-y col-span-12 lg:col-span-12 flex justify-end">
            <button wire:click="updateBox" type="button"
                class="dropdown-toggle btn btn-primary shadow-md flex items-center">
                Gönder </button>
        </div>
    </div>
</div>
