<div>
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 2xl:col-span-12">
            <div class="grid grid-cols-12 gap-6">

                <div class="col-span-12 mt-8">
                    <div class="intro-y flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">
                            Yönetim Raporları
                        </h2>

                    </div>
                    <!-- BEGIN: General Report -->
                    <div class="col-span-12 sm:col-span-6 md:col-span-4 py-6   relative text-center sm:text-left">

                    </div>
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <span class="iconify" data-icon="icon-park:sales-report"
                                            data-width="30"></span>
                                        <div class="ml-auto">
                                        </div>
                                    </div>
                                    <div class="text-3xl font-medium leading-8 mt-6">{{ $primes }}</div>
                                    <div class="text-base text-gray-600 mt-1">Prime Üye Sayınız</div>
                                </div>
                            </div>
                        </div>

                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-feather="user" class="report-box__icon text-theme-11"></i>

                                    </div>
                                    <div class="text-3xl font-medium leading-8 mt-6">
                                        {{ $user_count }}
                                    </div>
                                    <div class="text-base text-gray-600 mt-1">Toplam Üye Sayınız</div>
                                </div>
                            </div>
                        </div>


                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-feather="dollar-sign" class="report-box__icon text-theme-12"></i>
                                    </div>
                                    <div class="text-3xl font-medium leading-8 mt-6">{{ $user_max_balance }}
                                    </div>
                                    <div class="text-base text-gray-600 mt-1">En Yüksek Bakiye </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">


                                    <div class="flex">

                                        <h2
                                            class="text-3xl text-gray-700 dark:text-gray-600 font-medium leading-none mt-3">
                                            Abonelik Türleri</h2>

                                    </div>
                                    <div class="flex mt-4">
                                        <div class="font-medium">{{ $plans }}</div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="intro-y col-span-12 overflow-auto lg:overflow-auto">
                    <table class="table table-report -mt-2">
                        <thead>
                            <tr>
                                <th class="whitespace-nowrap">EMAİL</th>
                                <th class="whitespace-nowrap">BAKİYE</th>
                                <th class="text-center whitespace-nowrap">FATURA GÜNÜ</th>
                                <th class="text-center whitespace-nowrap">TOPLAM SİPARİŞ SAYISI</th>
                                <th class="text-center whitespace-nowrap">SON SİPARİŞ TARİHİ</th>
                                <th class="text-center whitespace-nowrap">TOPLAM SİPARİŞ ÖDEMELERİ</th>
                                <th class="text-center whitespace-nowrap">TOPLAM ABONELİK ÖDEMELERİ</th>
                                <th class="text-center whitespace-nowrap">EN YÜKSEK SİPARİŞİ</th>
                                <th class="text-center whitespace-nowrap">ÜYELİK TÜRÜ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($users as $user)
                                <tr class="intro-x" wire:key="{{ $loop->index }}">
                                    <td class="w-40">
                                        <div class="flex">
                                            {{ $user->email }}
                                        </div>
                                    </td>

                                    <td>
                                        <a class="font-medium whitespace-nowrap">
                                            {{ $user->balance }}
                                        </a>
                                    </td>
                                    <td class="w-40">
                                        <div class="flex items-center justify-center">
                                            @if ($user->subscription_date != '0000-00-00 00:00:00')
                                                {{ \Carbon\Carbon::parse($user->subscription_date)->format('d') }}
                                            @else
                                            -
                                            @endif


                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="flex items-center justify-center">
                                            {{ $user->orders_count }}
                                        </div>
                                    </td>
                                    <td class="text-center">
                                      <div class="flex items-center justify-center">
                                          {{ $user->orders()->latest()->first()->created_at ?? '-' }}
                                      </div>
                                  </td>
                                    <td class="text-center">
                                        <div class="flex items-center justify-center">
                                            {{ $user->orders_sum_order_total ?? '-' }}
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="flex items-center justify-center">
                                            {{ $user->invoices_sum_invoice_amount ?? '-' }}
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="flex items-center justify-center">
                                            {{ $user->orders_max_order_total ?? '-' }}

                                        </div>
                                    </td>

                                    <td class="text-center">
                                        <div class="flex items-center justify-center">
                                            {{ $user->role_id == 5 ? 'Prime' : 'Basic' }}

                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">
                                        <div class="text-gray-600">
                                            <h1>Bekleyen Bakiye Yükleme İşlemi Bulunmuyor</h1>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse

                        </tbody>

                    </table>
                    {{ $users->links('vendor.pagination.tailwind') }}
                </div>





            </div>
        </div>

    </div>



</div>
