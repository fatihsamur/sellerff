<div class="p-8 box">
@if(auth()->user()->subscription_date)
       Abonelik Tarihi <p>{{ auth()->user()->subscription_date }}</p>

@endif
    @if(auth()->user()->hasRole('admin'))
        <p>Yönetici Olduğunuz İçin bir Aboneliğe İhtiyacınız Yok 👍</p>
    @else
        @if(auth()->user()->isPrime())
            @if(auth()->user()->subscription_charge_method == 'credit_card')
            <div class="flex flex-col">
                <h5 class="mb-2 text-xl font-bold text-gray-700">Ödeme Bilgilerini Güncelle</h5>
                <p>Varsayılan Ödeme Bilgilerinizi Güncellemek için Aşağıdaki Butona Tıklayabilirsiniz.</p>
                <button data-url="{{ auth()->user() }}" class="inline-flex self-start justify-center w-auto px-4 py-2 mt-5 text-sm font-medium text-white transition duration-150 ease-in-out border border-transparent rounded-md checkout-update bg-wave-600 hover:bg-wave-500 focus:outline-none focus:border-wave-700 focus:shadow-outline-wave active:bg-wave-700">Ödeme Bilgilerini Güncelle</button>
            </div>
            <hr class="my-8 border-gray-200">
            @endif



            <div class="flex flex-col">
                <h5 class="mb-2 text-xl font-bold text-gray-700">Abonelik İptali</h5>
                <p class="text-red-400">Aboneliğinizi İptal Etmek İstiyorsanız Aşağıdaki Butona Tıklayın.</p>
                <p class="text-xs">Not : Aboneliğiniz düşürülecektir.</p>
                <button onclick="cancelClicked()" class="inline-flex self-start justify-center w-auto px-4 py-2 mt-5 text-sm font-medium text-white transition duration-150 ease-in-out bg-red-500 border border-transparent rounded-md hover:bg-red-600 focus:outline-none focus:border-red-600 focus:shadow-outline-red-500 active:bg-red-600">Aboneliği İptal Et</button>
            </div>

	        @include('theme::partials.cancel-modal')
        @else
            <p class="text-gray-600">Aboneliğin fırsatlarından yararlanabilmek için <a class="text-blue-600" href="{{ route('wave.settings', 'plans') }}">Hemen Abone Olun</a></p>
            <a href="{{ route('wave.settings', 'plans') }}" class="inline-flex self-start justify-center w-auto px-4 py-2 mt-5 text-sm font-medium text-white transition duration-150 ease-in-out border border-transparent rounded-md bg-wave-600 hover:bg-wave-500 focus:outline-none focus:border-wave-700 focus:shadow-outline-wave active:bg-wave-700">Planlara Gözat</a>
        @endif
    @endif
</div>
<script>
	window.cancelClicked = function(){
		Alpine.store('confirmCancel').openModal();
	}
</script>
