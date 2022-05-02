<div
    class="px-5 sm:px-20 mt-10 pt-10 border-t border-gray-200 dark:border-dark-5 {{ $currentStep != 4 ? 'hidden' : '' }}">

    <div class="font-medium text-base">Buyer Order Id Gir</div>
    <div class="text-red-500">Lütfen siparişinizdeki ürünleri satın aldığınız platformun sipariş numaralarını giriniz.</div>
    <div class="text-red-500">Dilerseniz bu ekrandaki bilgileri boş bırakarak siparişinizi tamamlayabilirsiniz. Bu ekrandaki bilgileri henüz kaydetmek istemiyorsanız İleri butonuyla devam edebilirsiniz.</div>

    <div class="grid grid-cols-12 gap-4 gap-y-5 mt-5">

        @foreach ($order['order_details']['product'] as $key => $value)
            <div class="col-span-12" wire:key="s{{$loop->index}}" >
                @include('livewire.steps.buyer-order', ['key' => $key, 'value' => $value])
            </div>

        @endforeach


    </div>
</div>



    <div class="col-span-12 flex items-center justify-center sm:justify-end mt-5">
        <button class="btn btn-primary w-24 ml-2" wire:click="submitForm">İleri</button>
    </div>





</div>
