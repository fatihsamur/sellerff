<div>
    <h2 class="intro-y text-lg font-medium mt-10">
        Sipariş Detayları
    </h2>

    <div class="text-red-500">
      Siparişinizin tamamlanabilmesi için aşağıdaki belirtilen işlemleri depomuz ile birlikte hareket ederek tamamlamanızı rica ederiz :
    </div>
    <div class="text-wave-500 text-xs">
    1 - Siparişinizin statüsü  "  Eksik Bilgileri Tamamlayın " statüsünde ise sağ tarafta yer alan Label Yükle ve Buyer Order ID Gir linkleri tıklayarak eksiklikleri tamamlayınız.
    </div>
    <div class="text-wave-500 text-xs">
    2- Siparişinizdeki tüm ürünlerin amazon depolarına gönderilebilir ( örnek Hazmat olmayan ürün ) olduğundan emin olmak için amazon satıcı hesabınızda kargo planınızı oluşturmayı deneyiniz. Box ölçü ve ağırlık bilgileri aşamasına kadar ilerleyiniz.
    </div>
    <div class="text-wave-500 text-xs">
    3-  Amazon satıcı hesabınızda Kargo planı oluştururken herhangi bir ürün için amazon son kullanma tarihinin girilmesi amazon tarafından isteniyor ise bu sayfanın sağ tarafında bulunan ilgili ASIN numarası yanındaki SKT kutucuğunu işaretleyiniz.
    </div>
    <div class="text-wave-500 text-xs">
    4- Ödemenizi Yapınız ve ürünlerinizi depomuza gönderiniz.
    </div>
    <div class="text-wave-500 text-xs">
    5- Siparişinizin statüsünün "Kargo Bekleniyor" olduğundan emin olunuz. Kargo bekleniyor statüsünde olmayan siparişleriniz depomuza teslim edilse dahi işlemlerine başlanılması ertelenecektir.
    </div>
    <div class="text-wave-500 text-xs">
    6- Siparişinizdeki tüm ürünler depomuza teslim edildiğinde ve bir eksiklik yok ise işlemlerine başlanılacaktır. Siparişlerindeki tüm ürünler depoya teslim edilmesine rağmen 2 gün içerisinde bir işlem yapılmamış ise sağ tarafta bulunan tüm ürünlerim teslim edildi linkini tıklayarak depoya bildirimde bulunabilirsiniz Siparişinizdeki ürünlerin hazırlıklık işlemleri tamamlandıktan sonra tarafınıza koli Etiketleri Bekleniyor maili gönderilecektir.
    </div>
    <div class="text-wave-500 text-xs">
    7- Kolu etiketleri bekleniyor maili tarafınıza iletildikten sonra aşağıda kolilerinizin ölçü, ağırlık bilgileri ve var ise SKT tarihlerini görüyor olacaksınız. Tarafınıza sağlanan bilgiler ile amazon satıcı hesabınızda yarım kalan gönderi planınızı tamamlayınız. Oluşturduğunuz Box Label etiketini yükleyiniz.
    </div>
    <div class="text-wave-500 text-xs">
    8- Box label etiketinizi yüklediğinizde siparişinizin durumunda bir değişiklik olmayacaktır. Etiketlerinizi yüklemeniz yeterlidir.
    </div>
    <div class="text-wave-500 text-xs">
    9- Box etiket işlemleriniz bittekten sonra ve siparişiniz sevk edildiğinde takip numaralarınızı içeren bir mail tarafınıza gönderilecek ve siparişinizin durumu tamamlandı olarak güncellenecektir.
    </div>
    <div class="text-wave-500 text-xs">
    10- Birlikte çalışma kurallarına uyulmaması ve işlemleri yapmamanız halinde siparişinizin gecikebileceğini lütfen unutmayın. Ayrıca bir sorunuz var ise support@sellerfulfilment.com adresine mail göndermenizi rica ederiz.
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">

        <div class="intro-y col-span-12 lg:col-span-9">

            <div class="box flex p-5 h-full flex-wrap">
                <h2 class="intro-y text-lg font-medium w-full">
                    Kolileriniz
                </h2>
                @if ($errors->any())
                    @foreach ($errors->all() as $key => $error)
                        <div class="col-span-12 w-full">
                            <span class="text-sm text-red-600">{{ $error }}
                                @if (!$loop->last)
                                    ,
                                @endif
                            </span>
                        </div>
                    @endforeach
                @endif
                @if ($order->boxes->count() > 0)

                    @forelse ($order->boxes as $box)
                        <div class="border-2 ml-5 p-3 ">
                            <a class="font-medium mt-5 text-wave-600">BOX#{{ $box->id }}</a>
                            <div class="mt-5">
                                <span class="font-medium font-bold">Width :
                                </span>
                                <span class="text-wave-600">{{ number_format($box->width_in * 2.54, 2) }} cm
                                    {{ $box->width_in }} inc</span>
                            </div>
                            <div class="mt-5">
                                <span class="font-medium font-bold">Height :
                                </span>
                                <span class="text-wave-600">{{ number_format($box->height_in * 2.54, 2) }} cm
                                    {{ $box->height_in }} inc</span>
                            </div>
                            <div class="mt-5">
                                <span class="font-medium font-bold">Length :
                                </span>
                                <span class="text-wave-600">{{ number_format($box->length_in * 2.54, 2) }} cm
                                    {{ $box->length_in }} inc</span>
                            </div>
                            <div class="mt-5">
                                <span class="font-medium font-bold">Weight :
                                </span>
                                <span class="text-wave-600">{{ number_format($box->weight_lbs / 2.2046, 2) }} kg
                                    {{ $box->weight_lbs }} lbs</span>
                            </div>


                            <div class="font-medium mt-5">Durum : <span class="text-wave-600">{{ $box->status }}
                            </div>
                            <div class="font-medium mt-5">
                                Lütfen Kutu etiketi tipini " Thermal Printing Paper" olarak ayarlayınız.
                            </div>
                            @if ($box->status == 'Aracı Firmaya Teslim Edildi')
                                <div class="font-medium mt-5">Tracking Number : <span
                                        class=" text-wave-600">{{ $box->tracking_number }}</span>
                                </div>
                            @endif
                            <div class="font-medium mt-5">


                                @forelse ($box->box_items as $box_item)
                                    <div class="mt-3">
                                      Ürünler
                                        <div>SKU : <a target="_blank"
                                                href="https://www.amazon.com/dp/{{ $box_item->order_item->unique_identifier }}"
                                                class="text-wave-600">{{ $box_item->order_item->unique_identifier }}</a>
                                        </div>
                                        <div>Adet : <span class="text-wave-600">{{ $box_item->quantity }}</span>
                                        </div>
                                    </div>
                                @empty
                                @endforelse
                                @if ($box->status == 'Koli Etiketi Bekleniyor')
                                    <div class="mt-4 block">
                                        <div class="mt-5 block">
                                            <div class="mt-4">Koli Etiketleri</div>
                                            <input type="file" class="block mt-4" wire:model="boxLabels" multiple>
                                            <div>
                                                @php
                                                    $boxLabels = json_decode($box->box_label);
                                                @endphp
                                                @if ($boxLabels)
                                                    @foreach ($boxLabels as $boxLabel)
                                                        <span> {{ $boxLabel }} @if (!$loop->last)
                                                                ,
                                                            @endif
                                                        </span>
                                                    @endforeach
                                                @endif
                                            </div>
                                            <div wire:click="updateBoxLabel({{ $box->id }})"
                                                class="btn btn-primary mt-4">

                                                {{ $box->box_label ? 'Koli Etiketi Güncelle' : 'Koli Etiketi Yükle' }}
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @empty
                        Box Bulunamadı
                    @endforelse
                @else
                @endif
                @php
                    $boxsystem = json_decode($order->box_instruction, true);
                @endphp
                @if($boxsystem)
                <div class="p-5 shadow-lg rounded-lg  w-full mt-5 ">
                    <span class="text-xl text-theme-1 font-bold ">
                        Kutu Yerleşim Planı :

                    </span>

                    <div class="text-theme-1">
                        Amazon satıcı hesabınızda gönderim planı oluştururken kutuların içerisine hangi
                        ürünlerin
                        yerleştirileceği bilgisi aşağıda yer almaktadır.<br> Lütfen gönderi planınızı
                        sırasıyla
                        aşağıdaki
                        kutu içeriğindeki ürün bilgilerine göre oluşturun.
                        <br>
                    </div>
                    <div class="flex mt-4 flex-wrap">
                        @forelse ($boxsystem as $box_key => $box)
                            <div class="border border-2 mx-2 flex flex-wrap p-4">
                                <span class="text-theme-1 font-bold">KUTU {{ $box_key + 1 }} </span>
                                @forelse($box as $box_item_key => $box_item)
                                    <div style="background-color:{{ $box_item['color'] }}"
                                        class="border border-2 flex mx-2 p-4  text-theme-1 font-bold">
                                        Adet : {{ $box_item['count'] }} Sku : <a target="_blank"
                                            href="https://www.amazon.com/dp/{{ $box_item_key }}">{{ $box_item_key }}</a>
                                    </div>
                                @empty
                                @endforelse


                            </div>
                        @empty
                            Yerleşim Planı Yok
                        @endforelse
                    </div>
                </div>
                @endif
            </div>


            <div class="mt-5 box">
            </div>
        </div>

        <div class="intro-y col-span-12 lg:col-span-3">
            <div class="box p-4">
                <h2 class="intro-y text-lg font-medium border-b ">
                    <a class="font-medium text-wave-600">Sipariş#{{ $order->id }}</a>
                    <div class="text-sm text-gray-600">Oluşturuldu : {{ $order->created_at->format('d.m.Y') }}</div>
                    <div class="text-sm text-gray-600">Durumu : {{ $order->status }}</div>
                    <div class="text-sm text-gray-600">Toplam : $ {{ $order->order_total }}</div>
                    <div class="text-sm mt-1">Kolinizdeki Ürünleri Aşağıdaki Adrese Gönderdiğinizden Emin Olun</div>
                    <div class="text-sm mt-1">Adres : <span
                            class="text-wave-600">{{ $order->warehouse_address }}</span> </div>
                </h2>

                <div class="flex flex-wrap items-center mt-4 ">

                    @if ($order->anyFnskuOrLabelMissing())
                        <a href="{{ route('fba.update_label_fnsku', $order->id) }}" class="btn btn-primary">
                            Label & Fnsku Ekle
                        </a>
                    @endif

                    @if ($order->anyMissingBuyerOrderId())
                        <a href="{{ route('fba.update_tracking', $order->id) }}" class="btn btn-primary ml-2">
                            Buyer Order & Tracking Ekle
                        </a>
                    @endif

                    @if ($order->status == 'Ödeme Bekliyor')
                        <button wire:click="payOrder" class="btn btn-primary mt-2 ml-2">
                            Şimdi Öde
                        </button>
                    @endif
                    @if($order->status == 'Ödeme Bekliyor' )
                    <a href="{{ route('fba.asin_update', $order->id) }}" class="btn btn-primary mt-2 ml-2">
                      Asin Ekle/Çıkar
                  </a>
                  @endif
                  <a wire:click="productsArrived({{ $order->id }})" class="btn btn-primary mt-2 ml-2">
                      Ürünlerim Depoya Ulaştı
                  </a>

                </div>
            </div>

            <div class="mt-5 box p-4">
                <h2 class="intro-y text-lg font-medium border-b ">
                    Ürünleriniz
                </h2>
                @forelse ($order->order_items as $orderitemkey => $item)
                    <div class="flex items-center mt-4">
                        <span class="inline-block relative ml-2">
                            <img class="h-10 w-10 rounded-full" src="{{ $item->product_image }}" alt="">
                            <span
                                class="absolute top-0 right-0 block h-5 w-5 transform -translate-y-1/2 translate-x-1/2 rounded-full ring-2 ring-white bg-green-400 text-center">{{ $item->quantity }}</span>
                        </span>
                        <div class="ml-4">
                            <div class="text-sm leading-5 font-medium text-gray-900">
                                <a class="text-wave-500" target="_blank"
                                    href="https://www.amazon.com/dp/{{ $item->unique_identifier }}">{{ $item->unique_identifier }}</a>
                            </div>
                        </div>
                        <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600 ml-2" value="{{$orderitemkey}}" wire:model="sktRequired.{{$item->order_id}}.{{$orderitemkey}}" id="a" ><span class="ml-2 text-gray-700">SKT</span>
                        @if( $item->skt )
                        <span class="ml-4">{{ \Carbon\Carbon::parse($item->skt)->format('d.m.Y') ?? '' }}</span>
                        @endif
                    </div>
                    <hr class="mt-2 mb-2">
                @empty
                    Siparişinizde Ürün Bulunmamaktadır.
                @endforelse
            </div>
        </div>





    </div>





</div>
