<div
    class="px-5 sm:px-20 mt-10 pt-10 border-t border-gray-200 dark:border-dark-5 flex flex-col items-center {{ $currentStep != 5 ? 'hidden' : '' }}">

    <h1 class="text-4xl text-theme-1 font-medium leading-none mb-6">Siparişiniz Başarıyla Oluşturuldu.
    </h1>
    <div class="airplaneAnimation mb-6 hidden md:block">
        <div class="plane">
            <div class="main-plane"></div>
            <div class="wingOne"></div>
            <div class="wingTwo"></div>
            <div class="pollution"></div>
        </div>
        <div class="clouds">
            <div class="cloudOne"></div>
            <div class="cloudTwo"></div>
            <div class="cloudThree"></div>
        </div>
    </div>
    <div class="font-medium mb-6">Not: Siparişiniz hazır olduğunda box label temin edip sipariş
        detayları
        ekranından yüklemeyi ve FBA depo adresini eklemeyi unutmayınız!
        Siparişiniz hazır olduğunda size mail gönderilecektir.
      </div>
    <div>
        <a href="{{ url('dashboard') }}" class="btn btn-primary mr-1">Panele Dön</a>
        {{-- <a href="{{route('fba.show',$this->order['order_details']['order_id'])}}" class="btn btn-primary mr-1">Siparişi Görüntüle</a> --}}
    </div>
</div>
