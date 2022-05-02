<div>
    <!-- BEGIN: Content -->

    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <a href="{{ route('admin.deposit_requests') }}">
            <span class="iconify" data-icon="eva:arrow-back-outline" data-width="30"></span>
        </a>

        <h2 class="text-lg font-medium mr-auto">
            Kullanıcıya Bakiye Aktar
        </h2>

    </div>
    <div class="pos intro-y grid grid-cols-12 gap-5 mt-5">
        <!-- BEGIN: Post Content -->

        <div class="intro-y col-span-12 lg:col-span-8">
            <div class="post intro-y overflow-hidden box mt-5">
                <div class="post__content tab-content">
                    <div id="content" class="tab-pane p-5 active" role="tabpanel" aria-labelledby="content-tab">
                        <div class="border border-gray-200 dark:border-dark-5 rounded-md p-5 mt-5">
                            <div class="mt-5">
                                <div class="mt-3">
                                    <div>
                                        <label for="post-form-7" class="form-label mt-4">Yöntem</label>
                                        <select name="depositType" wire:model="depositType"
                                            class="w-full h-10 pl-3 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:shadow-outline">
                                            <option value="Artış" selected>Artırma</option>
                                            <option value="Azaltma">Azaltma</option>
                                        </select>
                                        @error('depositType')
                                            <span class="error text-red-600	">{{ $message }}</span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="mt-3">
                                    <label class="form-label">Ödeme Miktarı</label>
                                    <div class="input-group mt-2">
                                        <input type="text" wire:model="depositAmount" class="form-control"
                                            placeholder="Ödeme Miktarı" aria-label="Ödeme Miktarı"
                                            aria-describedby="input-group-price">
                                    </div>

                                    @error('depositAmount')
                                        <span class="error text-red-600	">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mt-3">
                                    <label class="form-label">Kullanıcı Emaili</label>
                                    <div class="input-group mt-2">
                                        <input type="text" wire:model="usermail" class="form-control"
                                            placeholder="Email" aria-label="Email" aria-describedby="input-group-price">
                                    </div>

                                    @error('usermail')
                                        <span class="error text-red-600	">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mt-3">
                                    <label class="form-label">Açıklama (Opsiyonel)</label>
                                    <div class="input-group mt-2">
                                        <input type="text" wire:model="description" class="form-control"
                                            placeholder="Açıklama" aria-label="Açıklama"
                                            aria-describedby="input-group-price">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex w-full justify-end mt-5">
                            <button type="button" class="dropdown-toggle btn btn-primary shadow-md flex items-center"
                                wire:click="depositUser()">
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
