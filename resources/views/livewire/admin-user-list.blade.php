<div>
    <h2 class="intro-y text-lg font-medium mt-10">
        Kullanıcı {{$user->id}} Detaylı Bilgileri
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">

        </div>
        <div class="flex col-span-12">

        </div>
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        <th class="whitespace-nowrap">LINE1</th>
                        <th class="whitespace-nowrap">LINE2</th>
                        <th class="whitespace-nowrap">EYALET</th>
                        <th class="whitespace-nowrap">ŞEHIR</th>
                        <th class="text-center whitespace-nowrap">ZIP CODE</th>
                        <th class="text-center whitespace-nowrap">NUMARA</th>
                    </tr>
                    <tr>
                        <th class="whitespace-nowrap">FATURA LINE1</th>
                        <th class="whitespace-nowrap">FATURA LINE2</th>
                        <th class="whitespace-nowrap">FATURA EYALET</th>
                        <th class="whitespace-nowrap">FATURA ŞEHIR</th>
                        <th class="text-center whitespace-nowrap">FATURA ZIP CODE</th>
                        <th class="text-center whitespace-nowrap">BILLING NUMARA</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="intro-x">
                        <td class="w-40">
                            <div class="flex">
                                {{ $user->line1 }}
                            </div>
                        </td>
                        <td class="w-40">
                            <div class="flex">
                                {{ $user->line2 }}
                            </div>
                        </td>
                        <td class="w-40">
                            <div class="flex">
                                {{ $user->state }}
                            </div>
                        </td>
                        <td>
                            <a class="font-medium whitespace-nowrap">
                                {{ $user->city }}
                            </a>
                        </td>
                        <td class="w-40">
                            <div class="flex items-center justify-center">
                                {{ $user->zip_code }}
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="flex items-center justify-center">
                                {{ $user->phone_number ?? '' }}
                            </div>
                        </td>

                    </tr>
                    <tr class="intro-x">
                        <td class="w-40">
                            <div class="flex">
                                {{ $user->billing_line1 ?? '' }}
                            </div>
                        </td>
                        <td class="w-40">
                            <div class="flex">
                                {{ $user->billing_line2 ?? '' }}
                            </div>
                        </td>
                        <td class="w-40">
                            <div class="flex">
                                {{ $user->billing_state ?? '' }}
                            </div>
                        </td>
                        <td>
                            <a class="font-medium whitespace-nowrap">
                                {{ $user->billing_city ?? '' }}
                            </a>
                        </td>
                        <td class="w-40">
                            <div class="flex items-center justify-center">
                                {{ $user->billing_zip_code ?? '' }}
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="flex items-center justify-center">
                                {{ $user->billing_phone_number ?? '' }}
                            </div>
                        </td>

                    </tr>


                </tbody>
            </table>
        </div>
        <!-- END: Data List -->

    </div>

</div>
