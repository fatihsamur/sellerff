<div class="col-md-8">
    <div class="contact-form">
        <h4>Bize Yazın</h4>
        <p></p>
        <div class="row">
            <div class="col-md-6">
                <input wire:model="sender" type="text" name="sender" placeholder="İsim Soyisim"
                    data-error="Lütfen isminizi girin">
            </div>
            <div class="col-md-6">
                <input wire:model="email" type="email" name="email" placeholder="Email Adres">
            </div>

            <div class="col-md-12">
                <input wire:model="subject" type="text" name="suject" placeholder="Konu">
            </div>
            <div class="col-md-12">
                <textarea wire:model="message" name="message" placeholder="Nasıl yardımcı olabiliriz ?"></textarea>
            </div>
            <div class="col-md-6">
                <div class="condition-check">
                    <input wire:model="agree" id="terms-conditions" type="checkbox">
                    <label for="terms-conditions">
                        <a href="{{ url('/terms-and-conditions') }}">Sözleşmeyi</a> kabul ediyorum.
                    </label>
                </div>
            </div>
            <div class="col-md-6 text-right">
                <span class="main-btn" wire:click="sendEmail()">
                    Gönder
                </span>
            </div>
        </div>
        @if ($errors->any())
                @foreach ($errors->all() as $key => $error)
                    <div>{{$error}}</div>
                @endforeach
            @endif
    </div>
</div>
