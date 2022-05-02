<div
    class="px-5 sm:px-20 mt-10 pt-10 border-t border-gray-200 dark:border-dark-5 {{ $currentStep != 1 ? 'hidden' : '' }}">


    {{-- @if ($boxsystem && count($boxsystem) > 2)
        {{ dd($boxsystem,$order['order_details']['total_weight_f'], $order['order_details']['total_prod_count'] ) }}
    @endif --}}
    <div class="font-medium text-base">Sipariş Oluştur</div>

    <div class="grid grid-cols-12 gap-4 gap-y-5 mt-5">

        <div class="col-span-6">
            <div class="mt-1 relative">
                <button type="button"
                    class="relative w-full bg-white border border-gray-300 rounded-md shadow-sm pl-3 pr-10 py-2 text-left cursor-default focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    aria-haspopup="listbox" aria-expanded="true" aria-labelledby="listbox-label"
                    wire:click="countriesToggle">
                    <span class="flex items-center">
                        <span class="ml-3 block truncate">
                            @if ($selectedCountry)
                                <span
                                    class="flag-icon flag-icon-{{ json_decode($selectedCountry)->country_code }}"></span>
                            @endif

                            {{ $selectedCountry ? json_decode($selectedCountry)->name : 'Ülke Seçiniz' }}
                        </span>
                    </span>
                    <span class="ml-3 absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                        <!-- Heroicon name: solid/selector -->
                        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </span>
                </button>

                @if ($countriesOpen)
                    <ul class="z-10 mt-1 w-full bg-white shadow-lg max-h-56 rounded-md py-1 text-base ring-1 ring-black ring-opacity-5 overflow-auto focus:outline-none sm:text-sm"
                        tabindex="-1" role="listbox" aria-labelledby="listbox-label"
                        aria-activedescendant="listbox-option-3">
                        @forelse($countries as $country)
                            <li class="text-gray-900 cursor-default select-none relative py-2 pl-3 pr-9"
                                id="listbox-option-0" role="option" value="{{ $country->country_code }}"
                                wire:click="handleCountrySelected('{{ $country }}')">
                                <div class="flex items-center">
                                    <span class="flag-icon flag-icon-{{ $country->country_code }}"></span>
                                    <span
                                        class="font-normal ml-3 block truncate
                            @if ($selectedCountry && $country->country_code == json_decode($selectedCountry)->country_code)
                            font-semibold
                            @endif
                            ">
                                        {{ $country->name }}
                                    </span>
                                </div>

                                @if ($selectedCountry && $country->country_code == json_decode($selectedCountry)->country_code)
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




            @error('selectedCountry') <span class="error">{{ $message }}</span> @enderror
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
                    @include('livewire.steps.form-line', ['key' => $key, 'value' => $value])
                </div>
            @empty
                <div class="col-span-12">
                    <span class="whitespace-nowrap">Henüz bir ürün eklemediniz.</span>
                </div>
            @endforelse
            @if ($selectedCountry && $selectedCountry != 'none')
            <div class="col-span-12">
                <button
                    class="btn btn-primary h-9 px-5 py-3 flex items-center justify-center text-white font-bold rounded focus:outline-none focus:shadow-outline"
                    type="button" wire:click.prevent="add({{ $i }})">
                    <span class="iconify mr-1" data-icon="mdi:package-variant-plus" data-width="20"
                        data-height="20"></span>
                    Ekle
                </button>
            </div>

            @if ($isAddClicked)
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


                </div>
            @endif
    </div>



</div>


@endif
@if ($selectedCountry && count($inputs))
    <div class="col-span-12 flex items-center justify-center sm:justify-end mt-5">


        <button class="btn btn-primary w-24 ml-2" wire:click="firstStepSubmit">İleri</button>

    </div>
@endif




</div>
