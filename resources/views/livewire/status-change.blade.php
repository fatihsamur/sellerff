<div>
    <!-- BEGIN: Content -->

    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <a href="{{ url('warehouse-sellerfullfilment/order_process') }}">
            <span class="iconify" data-icon="eva:arrow-back-outline" data-width="30"></span>
        </a>

        <h2 class="text-lg font-medium mr-auto">
            Sipariş Durumu Güncelle
        </h2>

    </div>
    <div class="pos intro-y grid grid-cols-12 gap-5 mt-5">
        <!-- BEGIN: Post Content -->

        <div class="intro-y col-span-12 lg:col-span-6">
            <div class="post intro-y overflow-hidden box mt-5">
                <div class="post__content tab-content">
                    <div id="content" class="tab-pane p-5 active" role="tabpanel" aria-labelledby="content-tab">
                        <div class="border border-gray-200 dark:border-dark-5 rounded-md p-5 mt-5">
                            <div class="mt-5">
                                <div class="mt-3">
                                    <label class="form-label">Sipariş Durumu</label>
                                    <select name="status" wire:model="status"
                                        class="w-full h-10 pl-3 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:shadow-outline">
                                        <option value="none">Durum Seçiniz</option>
                                        <option>Kargo Bekleniyor
                                        </option>
                                        <option value="Eksik Bilgileri Tamamlayın">Eksik Bilgileri Tamamlayın
                                        </option>
                                        <option value="Depoda İşleniyor">Depoda İşleniyor
                                        </option>
                                        <option value="Koli Etiketi Bekliyor">Koli Etiketi Bekliyor
                                        </option>
                                        <option value="İptal Edildi">İptal Edildi
                                        </option>
                                        <option value="Tamamlandı">Tamamlandı
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="flex w-full justify-end mt-5">
                            <button type="button" class="dropdown-toggle btn btn-primary shadow-md flex items-center"
                                wire:click="updateStatus">
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
