
<div class="w-full md:w-1/2">
                <div class="contact">
                    <h2 class="uppercase font-bold text-xl text-gray-700 mb-5 ml-3">İletişim Formu</h2>
                    <form id="contactForm" >
                        <div class="flex flex-wrap">
                            <div class="w-full sm:w-1/2 md:w-full lg:w-1/2">
                                <div class="mx-3">
                                    <input type="text" wire:model="sender" class="form-input rounded-full" id="name" name="name"
                                        placeholder="İsim" required data-error="Please enter your name">
                                </div>
                            </div>
                            <div class="w-full sm:w-1/2 md:w-full lg:w-1/2">
                                <div class="mx-3">
                                    <input type="text" wire:model="email" placeholder="Email" id="email" class="form-input rounded-full"
                                        name="email" required data-error="Please enter your email">
                                </div>
                            </div>
                            <div class="w-full">
                                <div class="mx-3">
                                    <input type="text" wire:model="subject" placeholder="Konu" id="subject" name="subject"
                                        class="form-input rounded-full" required
                                        data-error="Please enter your subject">
                                </div>
                            </div>
                            <div class="w-full">
                                <div class="mx-3">
                                    <input wire:model="message" class="form-input rounded-lg" id="message" name="message"
                                        placeholder="Mesajınız" rows="5" data-error="Write your message"
                                        required></input>
                                </div>
                            </div>
                            @if ($errors->any())
                    <div class="text-sm text-red-600">
                        Devam etmek için form alanlarını doğru bir biçimde doldurduğunuza emin olun.
                    </div>
                    @foreach ($errors->all() as $key => $error)
                    <span class="text-sm text-red-600">{{ $error }}
                            @if (!$loop->last), @endif
                        </span>


                    @endforeach
                    @endif
                            <div class="w-full">
                                <div class="submit-button mx-3">
                                    <a class="btn" id="form-submit" wire:click="sendEmail()">Gönder</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
