<div>
        <h2 class="intro-y text-lg font-medium mt-10">
            Kullanıcı Log Bilgileri
        </h2>
        <div class="grid grid-cols-12 gap-6 mt-5">

        <div class="col-span-12">
            <div class="flex intro-y ">

                <div class="box mt-6 w-full">
                    <form class="p-4">
                        <h3 class="sr-only">Categories</h3>
                        <div x-data="{ open: false }" class="border-b border-gray-200 py-3 ">
                            <h3 class="-my-3 flow-root">
                                <span class="iconify w-8 inline" data-icon="codicon:settings"></span>
                                <span class="font-medium text-gray-900 ">
                                    FİLTRELER
                                </span>
                            </h3>

                        </div>

                        <div x-data="{ open: true }" class=" border-gray-200 py-3">

                            <div class="pt-6"
                                x-description="Filter section, show/hide based on section state." id="filter-section-1"
                                x-show="open">
                                <div class="flex">
                                    <div class="flex items-center">
                                        <input id="filter-category-1" wire:model="activeFilter.1" value="Yönetim Bakiye Düzenleme İşlemi"
                                            type="checkbox"
                                            class="h-4 w-4 border-gray-300 rounded text-wave-600 focus:ring-wave-500">
                                        <label for="filter-category-1" class="ml-3 text-sm text-gray-600">
                                        Yönetim Bakiye Düzenleme İşlemi
                                        </label>
                                    </div>

                                    <div class="flex items-center ml-2">
                                        <input id="filter-category-2" wire:model="activeFilter.2"
                                            value="Sipariş Ödemesi Yapıldı" type="checkbox"
                                            class="h-4 w-4 border-gray-300 rounded text-wave-600 focus:ring-wave-500">
                                        <label for="filter-category-2" class="ml-3 text-sm text-gray-600">
                                        Sipariş Ödemesi Yapıldı
                                        </label>
                                    </div>
                                    <div class="flex items-center ml-2">
                                        <input id="filter-category-2" wire:model="activeFilter.3"
                                            value="Bakiye Yükleme İşlemi" type="checkbox"
                                            class="h-4 w-4 border-gray-300 rounded text-wave-600 focus:ring-wave-500">
                                        <label for="filter-category-2" class="ml-3 text-sm text-gray-600">
                                        Bakiye Yükleme İşlemi
                                        </label>
                                    </div>

                                    <div class="flex items-center ml-2">
                                        <input id="filter-category-2" wire:model="activeFilter.4"
                                            value="Plan Değiştirildi" type="checkbox"
                                            class="h-4 w-4 border-gray-300 rounded text-wave-600 focus:ring-wave-500">
                                        <label for="filter-category-2" class="ml-3 text-sm text-gray-600">
                                        Plan Değiştirildi
                                        </label>
                                    </div>


                                    <div class="flex items-center ml-2">
                                        <input id="filter-category-3" wire:model="activeFilter.5"
                                            value="Sipariş Değişikliği Yapıldı" type="checkbox"
                                            class="h-4 w-4 border-gray-300 rounded text-wave-600 focus:ring-wave-500">
                                        <label for="filter-category-3" class="ml-3 text-sm text-gray-600">
                                        Sipariş Değişikliği Yapıldı
                                        </label>
                                    </div>

                                    <div class="flex items-center ml-2">
                                        <input id="filter-category-4" wire:model="activeFilter.6"
                                            value="Sipariş İadesi Yapıldı" type="checkbox"
                                            class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                        <label for="filter-category-4" class="ml-3 text-sm text-gray-600">
                                            Sipariş İadesi Yapıldı
                                        </label>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
            <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
                <a href="{{ route('admin.user_list') }}">
                    <span class="iconify" data-icon="eva:arrow-back-outline" data-width="30"></span>
                </a>
            </div>
            <!-- BEGIN: Data List -->
            <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
                <table class="table table-report -mt-2">
                    <thead>
                        <tr>
                            <th class="whitespace-nowrap">KULLANICI BİLGİLERİ</th>
                            <th class="whitespace-nowrap">LOG ID</th>
                            <th class="whitespace-nowrap">AKTİVİTE</th>
                            <th class="whitespace-nowrap">DETAY</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($logs as $log)
                            <tr class="intro-x" wire:key="{{ $loop->index }}">
                                <td class="w-40">
                                    <div class="flex">
                                        UserID: {{$log->user->id}}
                                        <br>
                                        Email : {{ $log->user->email }}
                                        <br>
                                        Adı : {{ $log->user->name }}
                                        <br>
                                        Bakiye : {{ $log->user->balance }}
                                    </div>
                                </td>
                                <td class="w-40">
                                    <div class="flex">
                                        {{ $log->id }}
                                    </div>
                                </td>
                                <td class="w-40">
                                    <div class="flex">
                                        {{ $log->activity_type }}
                                    </div>
                                </td>
                                <td>
                                    @if ($log->activity_type == 'Yönetim Bakiye Düzenleme İşlemi')
                                        @php
                                            $data = json_decode($log->activity_data);
                                            $old_balance = $data->old_balance ?? 0;
                                            $new_balance = $data->new_balance ?? 0;
                                            $description = $data->description ?? 0;
                                            $process_type = $data->process_type ?? 0;
                                        @endphp
                                        <div class="font-medium whitespace-nowrap"> Eski Bakiye :{{ $old_balance }}</div>
                                        <div class="font-medium whitespace-nowrap"> Yeni Bakiye :{{ $new_balance }}</div>
                                        @if ($description)
                                            <div class="font-medium whitespace-nowrap"> Açıklama :{{ $description }}</div>
                                        @endif
                                        @if ($process_type)
                                            <div class="font-medium whitespace-nowrap"> İşlem Tipi :{{ $process_type }}</div>
                                        @endif
                                    @endif
                                    @if ($log->activity_type == 'Sipariş Ödemesi Yapıldı')
                                        @php
                                            $data = json_decode($log->activity_data);
                                            $price = $data->price ?? 0;
                                            $old_balance = $data->old_balance ?? 0;
                                            $new_balance = $data->new_balance ?? 0;
                                            $order_id = $data->order_id ?? 0;
                                        @endphp
                                        <div class="font-medium whitespace-nowrap"> Fiyat : {{ $price }}</div>
                                        <div class="font-medium whitespace-nowrap"> Eski Bakiye :{{ $old_balance }}</div>
                                        <div class="font-medium whitespace-nowrap"> Yeni Bakiye :{{ $new_balance }}</div>
                                        @if ($order_id)
                                            <div class="font-medium whitespace-nowrap"> Sipariş Numarası
                                                :{{ $order_id }}
                                        @endif
            </div>
            @endif
            @if ($log->activity_type == 'Bakiye Yükleme İşlemi')
                @php
                    $data = json_decode($log->activity_data);
                    $amount = $data->amount ?? 0;
                    $payment_method = $data->payment_method ?? 0;
                    $transfer_number = $data->transfer_number ?? 'Yok';
                @endphp
                <div class="font-medium whitespace-nowrap"> Miktar : {{ $amount }}</div>
                <div class="font-medium whitespace-nowrap"> Ödeme Yöntemi :{{ $payment_method }}
                </div>
                @if($data->payment_method == 'stripe')
                <div class="font-medium whitespace-nowrap">
                    <a href="{{ $transfer_number }}" target="_blank" >Makbuz Görüntüle</a></div>
                @else
                <div class="font-medium whitespace-nowrap"> Transfer Numarası
                    :{{ $transfer_number }}</div>
                @endif

            @endif
            @if ($log->activity_type == 'Plan Değiştirildi')
                @php
                    $data = json_decode($log->activity_data);
                    $old_plan = $data->old_plan ?? 0;
                    $new_plan = $data->new_plan ?? 0;
                    $old_plan_price = $data->old_plan_price ?? 0;
                    $new_plan_price = $data->new_plan_price ?? 0;
                @endphp
                <div class="font-medium whitespace-nowrap"> Eski Plan : {{ $old_plan }}</div>
                <div class="font-medium whitespace-nowrap"> Yeni Plan :{{ $new_plan }}</div>
                <div class="font-medium whitespace-nowrap"> Eski Plan Fiyatı
                    :{{ $old_plan_price }}</div>
                <div class="font-medium whitespace-nowrap"> Yeni Plan Fiyatı
                    :{{ $new_plan_price }}</div>
            @endif
            @if ($log->activity_type == 'Sipariş Değişikliği Yapıldı')
                @php
                    $data = json_decode($log->activity_data);
                    $order_id = $data->order_id ?? 0;
                    $total_quantity = $data->total_quantity ?? 0;
                    $price = $data->price ?? 0;
                @endphp
                <div class="font-medium whitespace-nowrap"> Fiyat : {{ $price }}</div>
                <div class="font-medium whitespace-nowrap"> Toplam Sayı :{{ $total_quantity }}</div>
                <div class="font-medium whitespace-nowrap"> Sipariş Numarası
                    :{{ $order_id }}</div>
            @endif
            @if ($log->activity_type == 'Sipariş İadesi Yapıldı')
                                        @php
                                            $data = json_decode($log->activity_data);
                                            $price = $data->price ?? 0;
                                            $order = $data->order ?? 0;

                                        @endphp
                                        <div class="font-medium whitespace-nowrap"> Sipariş Numarası : {{ $order }}</div>
                                        <div class="font-medium whitespace-nowrap"> Fiyatlandırma : {{ $price }}</div>
                                    @endif
            </td>
            <td class="w-40">
                <div class="flex">
                    {{ $log->created_at }}
                </div>
                </tr>
            @empty
                <div class="alert alert-info">
                    <p>Herhangi bir Aktirivete Bulunamadı.</p>
                </div>
                @endforelse

                </tbody>
                </table>
        </div>
        <!-- END: Data List -->
        <!-- BEGIN: Pagination -->
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
            <div
                class="pagination intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center self-end justify-self-center">
                {{ $logs->links('vendor.pagination.tailwind') }}
            </div>

        </div>
        <!-- END: Pagination -->
    </div>

    </div>
