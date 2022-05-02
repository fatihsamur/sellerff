<div>
    <h2 class="intro-y text-lg font-medium mt-10">
        Bekleyen Bakiye Yükleme Talepleri
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <a href="{{ route('admin.deposit_user') }}" class="btn btn-primary shadow-md mr-2 mr-auto">Kullanıcıya Bakiye Aktar</a>


        </div>
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        <th class="whitespace-nowrap">KULLANICI EMAİL</th>
                        <th class="whitespace-nowrap">ÖDEME YÖNTEMİ</th>
                        <th class="whitespace-nowrap">GÖNDERENİN ADI SOYADI</th>
                        <th class="whitespace-nowrap">GÖNDERİLEN</th>
                        <th class="whitespace-nowrap">MİKTAR</th>
                        <th class="text-center whitespace-nowrap">DURUM</th>
                        <th class="text-center whitespace-nowrap">TARİH</th>
                        <th class="text-center whitespace-nowrap">AKSİYONLAR</th>

                    </tr>
                </thead>
                <tbody>
                    @forelse($waitingDepositRequests as $deposit)
                        <tr class="intro-x" wire:key="{{ $loop->index }}">
                            <td class="w-40">
                                <div class="flex">
                                    {{ $deposit->user->email }}
                                </div>
                            </td>
                            <td class="w-40">
                                <div class="flex">
                                    {{ $deposit->payment_method->name }}
                                </div>
                            </td>
                            <td class="w-40">
                              <div class="flex">
                                  {{ $deposit->sender_name??'' }}
                              </div>
                          </td>
                          <td class="w-40">
                            <div class="flex">
                                {{ $deposit->transfer_number??'' }}
                            </div>
                        </td>
                            <td>
                                <a class="font-medium whitespace-nowrap">{{ $deposit->amount }}</a>
                            </td>
                            <td class="w-40">
                                <div class="flex items-center justify-center">
                                    {{ ucfirst($deposit->status) }}
                                </div>
                            </td>
                            <td class="text-center">{{ $deposit->created_at }}</td>
                            <td class="text-center">
                              <button wire:click="approveDepositRequest({{$deposit->id}})" class="btn btn-primary mr-1 mb-2"> <span class="iconify" data-icon="clarity:success-line"></span> </button>
                              <button wire:click="denyDepositRequest({{$deposit->id}})" class="btn btn-danger mr-1 mb-2"> <span class="iconify" data-icon="ant-design:close-outlined"></span> </button>
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
        </div>
        <!-- END: Data List -->
        <!-- BEGIN: Pagination -->
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
            <div
                class="pagination intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center self-end justify-self-center">
                {{ $waitingDepositRequests->links('vendor.pagination.tailwind') }}
            </div>

        </div>
        <!-- END: Pagination -->
    </div>

</div>
