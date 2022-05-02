<div>
    <div class="intro-y box lg:mt-5">

        @php
            $user = auth()->user();
        @endphp
        <div class="p-5">
            <div class="flex flex-col-reverse xl:flex-row flex-col">
                <div class="flex-1 mt-6 xl:mt-0">
                    <div class="grid grid-cols-12 gap-x-5">
                        <div class="col-span-12 2xl:col-span-12">
                            <div class="p-5 rounded-lg flex flex-col">
                                <form class="flex flex-col" action="{{ route('wave.settings.profile_update.post') }}"
                                    method="POST">
                                    <div class="mt-5">
                                        <label for="line1"
                                            class="block text-sm font-medium leading-5 text-gray-700">Adres
                                            Satır 1</label>
                                        <div class="mt-1 rounded-md shadow-sm">
                                            <input value="{{ $user->line1 }}" id="line1" type="text" name="line1"
                                                placeholder="Adres Satır 1" class="w-full form-input">
                                        </div>
                                    </div>
                                    <div class="mt-5">
                                        <label for="line1"
                                            class="block text-sm font-medium leading-5 text-gray-700">Kayıtlı İsim</label>
                                        <div class="mt-1 rounded-md shadow-sm">
                                            <input value="{{ $user->name }}" id="name" type="text" name="name"
                                                placeholder="Kayıtlı İsim" class="w-full form-input">
                                        </div>
                                    </div>
                                    <div class="mt-5">
                                        <label for="line2"
                                            class="block text-sm font-medium leading-5 text-gray-700">Adres
                                            Satır 2</label>
                                        <div class="mt-1 rounded-md shadow-sm">
                                            <input value="{{ $user->line2 }}" id="line2" type="text" name="line2"
                                                placeholder="line2" class="w-full form-input">
                                        </div>
                                    </div>
                                    <div class="mt-5">
                                        <label for="state"
                                            class="block text-sm font-medium leading-5 text-gray-700">Eyalet</label>
                                        <div class="mt-1 rounded-md shadow-sm">
                                            <input value="{{ $user->state }}" id="state" type="text" name="state"
                                                placeholder="Eyalet" class="w-full form-input">
                                        </div>
                                    </div>
                                    <div class="mt-5">
                                        <label for="current_password"
                                            class="block text-sm font-medium leading-5 text-gray-700">Şehir</label>
                                        <div class="mt-1 rounded-md shadow-sm">
                                            <input value="{{ $user->city }}" id="city" type="text" name="city"
                                                placeholder="Şehir" class="w-full form-input">
                                        </div>
                                    </div>
                                    <div class="mt-5">
                                        <label for="post_code"
                                            class="block text-sm font-medium leading-5 text-gray-700">Posta Kodu</label>
                                        <div class="mt-1 rounded-md shadow-sm">
                                            <input value="{{ $user->zip_code }}" id="zip_code" type="text"
                                                name="zip_code" placeholder="Posta Kodu" class="w-full form-input">
                                        </div>
                                    </div>
                                    <div class="mt-5">
                                        <label for="phone_number"
                                            class="block text-sm font-medium leading-5 text-gray-700">Cep
                                            Telefonu</label>
                                        <div class="mt-1 rounded-md shadow-sm">
                                            <input value="{{ $user->phone_number }}" id="phone_number" type="text"
                                                name="phone_number" placeholder="Cep Telefonu"
                                                class="w-full form-input">
                                        </div>
                                    </div>
                                    <input type="hidden" name="_method" value="POST">
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-primary w-20 mt-3 ml-auto">Güncelle</button>
                                </form>
                            </div>
                        </div>
                        {{-- <div class="col-span-12 2xl:col-span-12 mt-5">
                      <div class="p-5 shadow-lg rounded-lg">
                          <div class="text-xl font-extra-bold">Abonelikler</div>
                          <div class="mt-2">Aboneliklerde kullanmak istediğiniz varsayılan ödeme yönteminiz.</div>
                          <div class="form-check mt-2"> <label class="form-check-label mr-2" for="checkbox-switch-7">Bakiye</label><input wire:model="IsDefaultCreditCard" id="checkbox-switch-7" class="form-check-switch"
                                  type="checkbox"> <label class="form-check-label ml-2" for="checkbox-switch-7">Kredi Kartı</label> </div>

                      </div>
                  </div> --}}

                    </div>
                    {{-- <button type="button" class="btn btn-primary w-20 mt-3">Save</button> --}}
                </div>

            </div>
        </div>
    </div>

</div>
