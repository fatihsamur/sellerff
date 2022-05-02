@extends('theme::layouts.app')

@section('content')
@php

$user = $order->user()->first();
$logs = $user->user_activity()->paginate(10);
@endphp


    <div>
        <h2 class="intro-y text-lg font-medium mt-10">
            Kullanıcı Log Bilgileri
        </h2>
        <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
                <a href="{{ route('warehouse.order_process') }}">
                    <span class="iconify" data-icon="eva:arrow-back-outline" data-width="30"></span>
                </a>
            </div>
            <div>
              <div>Güncel Bakiye : {{$user->balance}}</div>
              <div>Email : {{$user->email}}</div>
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
                                            <div class="font-medium whitespace-nowrap"> İşlem Tipi :{{ $process_type }}
                                            </div>
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
                <div class="font-medium whitespace-nowrap"> Transfer Numarası
                    :{{ $transfer_number }}</div>
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

@endsection
