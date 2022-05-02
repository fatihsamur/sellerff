<div>
    <!-- BEGIN: Content -->

    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <a href="{{ url('payments') }}">
            <span class="iconify" data-icon="eva:arrow-back-outline" data-width="30"></span>
        </a>

        <h2 class="text-lg font-medium mr-auto">
            Bakiye Yükle
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
                                @if ($selectedPaymentMethod && $selectedPaymentMethod == 'payoneer')
                                    <div
                                        class="col-span-12 sm:col-span-4 2xl:col-span-3 box bg-theme-1 dark:bg-theme-1 p-5 cursor-pointer zoom-in">
                                        <div class="font-medium text-base text-white">Payoneer Adresimiz :</div>
                                        <div class="text-theme-22 dark:text-gray-400">
                                            {{ setting('payment.payoneer_email_address') }}</div>
                                    </div>
                                @elseif($selectedPaymentMethod && $selectedPaymentMethod == 'transferwise')
                                    <div
                                        class="col-span-12 sm:col-span-4 2xl:col-span-3 box bg-theme-1 dark:bg-theme-1 p-5 cursor-pointer zoom-in">

                                        <div class="font-medium text-base text-white">Banka transfer Adresimiz :</div>
                                        <div class="text-theme-22 dark:text-gray-400">
                                            {{ setting('payment.transferwise_address') }}</div>
                                        <div class="text-theme-22 dark:text-gray-400">
                                            {{ setting('payment.transferwise_info1') }}</div>
                                        <div class="text-theme-22 dark:text-gray-400">
                                            {{ setting('payment.transferwise_info2') }}</div>
                                    </div>
                                    <label class="form-label">Gönderenin Adı Soyadı</label>
                                    <div class="input-group mt-2">
                                        <input type="text" wire:model="fullName" class="form-control"
                                            placeholder="Ad Soyad" aria-label="Ad Soyad"
                                            aria-describedby="input-group-price">
                                    </div>
                                @elseif($selectedPaymentMethod && $selectedPaymentMethod == 'localtransfer')
                                    <div
                                        class="col-span-12 sm:col-span-4 2xl:col-span-3 box bg-theme-1 dark:bg-theme-1 p-5 cursor-pointer zoom-in">
                                        <div class="font-medium text-base text-white">
                                            Bu ödeme yöntemi sadece Chase Bank için geçerlidir.
                                            <div class="text-theme-22 dark:text-gray-400">
                                                {{ setting('payment.localtransfer_address') }}</div>
                                            <div class="text-theme-22 dark:text-gray-400">
                                                {{ setting('payment.localtransfer_info1') }}</div>
                                            <div class="text-theme-22 dark:text-gray-400">
                                                {{ setting('payment.localtransfer_info2') }}</div>
                                        </div>

                                    </div>
                                    <div class="mt-3">
                                        <label class="form-label">Gönderenin Adı Soyadı</label>
                                        <div class="input-group mt-2">
                                            <input type="text" wire:model="fullName" class="form-control"
                                                placeholder="Ad Soyad" aria-label="Ad Soyad"
                                                aria-describedby="input-group-price">
                                        </div>
                                        @error('depositAmount')
                                            <span class="error text-red-600	">{{ $message }}</span>
                                        @enderror
                                    </div>
                                @endif

                                <div>
                                  <div class="text-red-500">Not : Aşağıdaki ödeme yöntemlerinden birini kullanarak ödeme yapabilirsiniz.</div>
                                  <div class="text-red-500" >Bakiye Yükleme talebiniz ödemenizin hesaplarımıza geçmesinden sonra 1 gün içerisinde onaylanır. Bizi tercih ettiğiniz için teşekkür ederiz. </div>
                                    <label for="post-form-7" class="form-label mt-4">Ödeme Yöntemi</label>
                                    <select name="selectedPaymentMethod" wire:model="selectedPaymentMethod"
                                        class="w-full h-10 pl-3 pr-6 text-black placeholder-gray-600 border rounded-lg  focus:shadow-outline">
                                        <option value="none">Ödeme Yöntemi Seçin</option>
                                        @forelse($paymentMethods as $paymentMethod)
                                            <option class="placeholder-gray-600 text-black"
                                                wire:key="paymet{{ $loop->index }}"
                                                value="{{ $paymentMethod->code }}"
                                                @if ($paymentMethod->code == $selectedPaymentMethod) selected @endif>
                                                {{ $paymentMethod->name }}
                                            </option>
                                        @empty
                                            <option>Henüz ödeme yöntemi eklenmemiş</option>
                                        @endforelse
                                    </select>
                                    @error('selectedPaymentMethod')
                                        <span class="error text-red-600	">{{ $message }}</span>
                                    @enderror

                                </div>

                                <div class="mt-3 mb-10">
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
                                @if ($selectedPaymentMethod && $selectedPaymentMethod == 'stripe')
                                <div class="mt-5" >



                                  <form
                                  action="{{ route('stripe.pay',['id' => auth()->user()->id] ) }}"
                        method="post"
                        class="require-validation"
                        data-cc-on-file="false"
                        id="payment-form">
                                  @csrf
                                      <div class="w-full pt-1 pb-5 mt-5">
                                          <div class="bg-wave-500 text-white overflow-hidden rounded-full w-20 h-20 mx-auto shadow-lg flex justify-center items-center">
                                              <i class="mdi mdi-credit-card-outline text-3xl"></i>
                                          </div>
                                      </div>
                                      <div class="mb-10">
                                          <h1 class="text-center font-bold text-xl uppercase">Stripe Ödeme</h1>
                                      </div>

                                      <div class="mb-3">
                                          <label class="font-bold text-sm mb-2 ml-1 required">İsim Soyisim</label>
                                          <div>
                                              <input wire:model="stripeName" class="w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-wave-500 transition-colors" placeholder="John Smith" type="text"/>
                                          </div>
                                      </div>
                                      <div class="mb-3">
                                          <label  class="font-bold text-sm mb-2 ml-1 card required">Kart Numarası</label>
                                          <div>
                                              <input wire:model="card" class="w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-wave-500 transition-colors" placeholder="0000 0000 0000 0000" type="text"/>
                                          </div>
                                      </div>
                                      <div class="mb-3 -mx-2 flex items-end">
                                          <div class="px-2 w-1/2">
                                              <label class="font-bold text-sm mb-2 ml-1">Geçerlilik Tarihi</label>
                                              <div>
                                                  <select wire:model="expMonth" class="form-select w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-wave-500 transition-colors cursor-pointer expiration required">
                                                      <option value="01">01 - Ocak</option>
                                                      <option value="02">02 - Şubat</option>
                                                      <option value="03">03 - Mart</option>
                                                      <option value="04">04 - Nisan</option>
                                                      <option value="05">05 - Mayıs</option>
                                                      <option value="06">06 - Haziran</option>
                                                      <option value="07">07 - Temmuz</option>
                                                      <option value="08">08 - Ağustos</option>
                                                      <option value="09">09 - Eylül</option>
                                                      <option value="10">10 - Ekim</option>
                                                      <option value="11">11 - Kasım</option>
                                                      <option value="12">12 - Aralık</option>
                                                  </select>
                                              </div>
                                          </div>
                                          <div class="px-2 w-1/2">
                                              <select wire:model="expYears" class="form-select w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-wave-500 transition-colors cursor-pointer expiration required">
                                                  <option value="2022">2022</option>
                                                  <option value="2023">2023</option>
                                                  <option value="2024">2024</option>
                                                  <option value="2025">2025</option>
                                                  <option value="2026">2026</option>
                                                  <option value="2027">2027</option>
                                                  <option value="2028">2028</option>
                                                  <option value="2029">2029</option>
                                              </select>
                                          </div>
                                      </div>
                                      <div class="mb-10">
                                          <label class="font-bold text-sm mb-2 ml-1">Güvenlik Kodu</label>
                                          <div>
                                              <input wire:model="cvv" class="w-32 px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-wave-500 transition-colors cvc required" placeholder="000" type="text"/>
                                          </div>
                                      </div>
                                      <div class="text-red-500">Yapacağınız ödemeler tamamen AES-256 ve SSL güvenliği altında gerçekleşecek olup STRIPE üzerinden herhangi bir Kart bilgisi saklanmadan gerçekleşmektedir.</div>
                                      <div class="mt-5">
                                          <button wire:click.prevent="chargeUserViaStripe({{auth()->user()->id}})" class="block w-full max-w-xs mx-auto bg-wave-500 hover:bg-wave-700 focus:bg-wave-700 text-white rounded-lg px-3 py-3 font-semibold"><i class="mdi mdi-lock-outline mr-1"></i> ÖDE $({{$depositAmount}})</button>
                                      </div>
                                  </form>

                                </div>
                                @endif
                                @if ($selectedPaymentMethod && $selectedPaymentMethod == 'payoneer')
                                    <div class="mt-3">
                                        <label class="form-label">Ödemenin Gönderildiği Payoneer Maili</label>
                                        <div class="input-group mt-2">
                                            <input type="text" wire:model="payoneerTransferNumber"
                                                class="form-control" placeholder="Payoneer Maili"
                                                aria-label="Gönderici Mail Adresiniz Transfer No" aria-describedby="input-group-price">
                                        </div>
                                        @error('payoneerTransferNumber')
                                            <span class="error text-red-600	">{{ $message }}</span>
                                        @enderror
                                    </div>
                                @endif
                            </div>
                        </div>
                        @if($selectedPaymentMethod && $selectedPaymentMethod != 'stripe')
                        <div class="flex w-full justify-end mt-5">
                            <button type="button" class="dropdown-toggle btn btn-primary shadow-md flex items-center"
                                wire:click="createDepositRequest">
                                Gönder </button>
                        </div>
                        @endif
                        <ul>
                 @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                                          @endforeach
                </ul>


                    </div>
                </div>
            </div>
        </div>
        <!-- END: Post Content -->

    </div>
    <div class="mt-2 text-sm text-red-500" id="card-errors">

    <!-- END: Content -->
</div>
