<div>


    <section class="appie-project-area pb-100 pt-90">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="appie-project-box wow animated slideInUp" data-wow-duration="1000ms"
                        data-wow-delay="0ms">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="appie-project-content">
                                    <h3 class="title">Gündemi Takip Edin</h3>
                                    <p>Amazon'da satış yapmak,Sellerfulfilment ile nasıl satış yapılır ve daha birçok
                                        konuda
                                        yapılan paylaşımları takipte kalın.</p>

                                    <div class="input-box mt-30">
                                        <input wire:model="email" type="text" placeholder="Email Adresiniz">
                                        <button wire:click="subscribe()">Gönder</button>
                                    </div>
                                    @error('email')
                                        <div>
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>


    </section>



</div>
