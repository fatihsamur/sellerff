<div>
    <h2 class="intro-y text-lg font-medium mt-10">
        Bakiye İşlemleri
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <a href="{{ url('payments/create') }}" class="btn btn-primary shadow-md mr-2 mr-auto">Bakiye Yükle</a>


        </div>
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        <th class="whitespace-nowrap">ÖDEME YÖNTEMİ</th>
                        <th class="whitespace-nowrap">MİKTAR</th>
                        <th class="text-center whitespace-nowrap">DURUM</th>
                        <th class="text-center whitespace-nowrap">TARİH</th>

                    </tr>
                </thead>
                <tbody>
                    @forelse($deposits as $deposit)
                        <tr class="intro-x" wire:key="{{$loop->index}}" >
                            <td class="w-40">
                                <div class="flex">
                                    {{ $deposit->payment_method->name }}
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
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">
                                <div class="text-gray-600">
                                    <h1>Bakiyenizde hiç ödeme yapılmamış</h1>
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
                {{ $deposits->links('vendor.pagination.tailwind') }}
            </div>

        </div>
        <!-- END: Pagination -->
    </div>

</div>
