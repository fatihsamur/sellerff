<div>
    <div class="flex items-center mt-8">
        <h2 class="intro-y text-lg font-medium mr-auto">
            Fba Koli Oluştur
        </h2>
    </div>


{{--     {{serialize($inputs)}}
    {{serialize($order)}} --}}
    <!-- BEGIN: Wizard Layout -->
    <div class="intro-y box py-10 sm:py-20 mt-5 px-10">
        <div class="wizard flex flex-col lg:flex-row justify-center px-5 sm:px-20">
            <div class="intro-x lg:text-center flex items-center lg:block flex-1 z-10">
                <button
                    class="w-10 h-10 rounded-full btn {{ $currentStep != 1 ? 'text-gray-600 bg-gray-200 dark:bg-dark-1' : 'btn-primary' }}">1</button>
                <div class="lg:w-32 font-medium text-base lg:mt-3 ml-3 lg:mx-auto">Sipariş Oluştur</div>
            </div>
            <div class="intro-x lg:text-center flex items-center mt-5 lg:mt-0 lg:block flex-1 z-10">
                <button
                    class="w-10 h-10 rounded-full btn {{ $currentStep != 2 ? 'text-gray-600 bg-gray-200 dark:bg-dark-1' : 'btn-primary' }}">2</button>
                <div class="lg:w-32 text-base lg:mt-3 ml-3 lg:mx-auto text-gray-700 dark:text-gray-600">Tahmini
                    Fiyat
                    İçin
                    Ödeme Yap
                </div>
            </div>
            <div class="intro-x lg:text-center flex items-center mt-5 lg:mt-0 lg:block flex-1 z-10">
                <button
                    class="w-10 h-10 rounded-full btn {{ $currentStep != 3 ? 'text-gray-600 bg-gray-200 dark:bg-dark-1' : 'btn-primary' }}">3</button>
                <div class="lg:w-32 text-base lg:mt-3 ml-3 lg:mx-auto text-gray-700 dark:text-gray-600">Label
                    Yükle
                </div>
            </div>
            <div class="intro-x lg:text-center flex items-center mt-5 lg:mt-0 lg:block flex-1 z-10">
                <button
                    class="w-10 h-10 rounded-full btn {{ $currentStep != 4 ? 'text-gray-600 bg-gray-200 dark:bg-dark-1' : 'btn-primary' }}">4</button>
                <div class="lg:w-32 text-base lg:mt-3 ml-3 lg:mx-auto text-gray-700 dark:text-gray-600">Buyer
                    Order ID
                    Gir
                </div>
            </div>
            <div class="intro-x lg:text-center flex items-center mt-5 lg:mt-0 lg:block flex-1 z-10">
                <button
                    class="w-10 h-10 rounded-full btn {{ $currentStep != 5 ? 'text-gray-600 bg-gray-200 dark:bg-dark-1' : 'btn-primary' }}">5</button>
                <div class="lg:w-32 text-base lg:mt-3 ml-3 lg:mx-auto text-gray-700 dark:text-gray-600">Tamamla
                </div>
            </div>
            <div class="wizard__line hidden lg:block w-2/3 bg-gray-200 dark:bg-dark-1 absolute mt-5"></div>
        </div>
        @include('livewire.steps.step'.$currentStep)
    </div>
    <!-- END: Wizard Layout -->

</div>

<script type="text/javascript">
    window.onload = function() {
        Livewire.on('stepChanged', (step) => {
            if (step == 5) {
                confetti.start(5000);
            }
        });

    }
</script>
