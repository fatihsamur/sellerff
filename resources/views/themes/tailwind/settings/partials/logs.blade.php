<div class="box">
    @php
        $logs = auth()
            ->user()
            ->user_activity()
            ->paginate(10);
    @endphp


    <table class="table table-report -mt-2">
        <thead>
            <tr>

                <th class="whitespace-nowrap">LOG ID</th>
                <th class="whitespace-nowrap">AKTİVİTE</th>
                <th class="whitespace-nowrap">DETAY</th>
                <th class="whitespace-nowrap">TARİH</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($logs as $log)
                <tr class="intro-x" wire:key="{{ $loop->index }}">

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
                                <div class="font-medium whitespace-nowrap"> Sipariş Numarası :{{ $order_id }}</div>
                            @endif
                        @endif
                        @if ($log->activity_type == 'Bakiye Yükleme İşlemi')
                            @php
                                $data = json_decode($log->activity_data);
                                $amount = $data->amount ?? 0;
                                $payment_method = $data->payment_method ?? 0;
                                $transfer_number = $data->transfer_number ?? 'Yok';
                            @endphp
                            <div class="font-medium whitespace-nowrap"> Miktar : {{ $amount }}</div>
                            <div class="font-medium whitespace-nowrap"> Ödeme Yöntemi :{{ $payment_method }}</div>
                            @if($data->payment_method == 'stripe')
                            <div class="font-medium whitespace-nowrap">
                                <a href="{{ $transfer_number }}" target="_blank" >Makbuz Görüntüle</a></div>
                            @else
                            <div class="font-medium whitespace-nowrap"> Transfer Numarası
                                :{{ $transfer_number }}</div>
                            @endif
                        @endif
                        @if ($log->activity_type == 'Plan Değiştirildi' || $log->activity_type == 'Plan İptal Edildi')
                            @php
                                $data = json_decode($log->activity_data);
                                $old_plan = $data->old_plan ?? 0;
                                $new_plan = $data->new_plan ?? 0;
                                $old_plan_price = $data->old_plan_price ?? 0;
                                $new_plan_price = $data->new_plan_price ?? 0;
                            @endphp
                            <div class="font-medium whitespace-nowrap"> Eski Plan : {{ $old_plan }}</div>
                            <div class="font-medium whitespace-nowrap"> Yeni Plan :{{ $new_plan }}</div>
                            <div class="font-medium whitespace-nowrap"> Eski Plan Fiyatı :{{ $old_plan_price }}</div>
                            <div class="font-medium whitespace-nowrap"> Yeni Plan Fiyatı :{{ $new_plan_price }}</div>
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
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center mt-5 justify-center">
        {{ $logs->links('vendor.pagination.tailwind') }}
    </div>
</div>
