<div class="grid grid-cols-12 gap-6 mt-8">
    <div class="col-span-12 lg:col-span-3 2xl:col-span-2">
        <h2 class="intro-y text-lg font-medium mr-auto mt-2">
            Destek Taleplerim
        </h2>
        <!-- BEGIN: Inbox Menu -->
        <div class="intro-y box bg-theme-1 p-5 mt-6">
            <a href="{{url('tickets/create')}}" type="button" class="btn text-gray-700 dark:text-gray-300 w-full bg-white dark:bg-theme-1 mt-1"> <i
                    class="w-4 h-4 mr-2" data-feather="edit-3"></i> Yeni Talep </a>
            <div class="border-t border-theme-3 dark:border-dark-5 mt-6 pt-6 text-white">
                <a href="" class="flex items-center px-3 py-2 rounded-md bg-theme-20 dark:bg-dark-1 font-medium"> <i
                        class="w-4 h-4 mr-2" data-feather="file-plus"></i>Oluşturuldu</a>
                <a href="" class="flex items-center px-3 py-2 mt-2 rounded-md"> <i class="w-4 h-4 mr-2"
                        data-feather="zoom-in"></i> İncelemede </a>
                <a href="" class="flex items-center px-3 py-2 mt-2 rounded-md"> <i class="w-4 h-4 mr-2"
                        data-feather="check"></i> Kapandı </a>
            </div>
            <div class="border-t border-theme-3 dark:border-dark-5 mt-4 pt-4 text-white">
            </div>
        </div>
    </div>
    <div class="col-span-12 lg:col-span-9 2xl:col-span-10">
        <!-- BEGIN: Inbox Filter -->
        <div class="intro-y flex flex-col-reverse sm:flex-row items-center">
            <div class="w-full sm:w-auto relative mr-auto mt-3 sm:mt-0">
                <i class="w-4 h-4 absolute my-auto inset-y-0 ml-3 left-0 z-10 text-gray-700 dark:text-gray-300"
                    data-feather="search"></i>
                <input type="text"
                    class="form-control w-full sm:w-64 box px-10 text-gray-700 dark:text-gray-300 placeholder-theme-13"
                    placeholder="Talep Ara">
                <div class="inbox-filter dropdown absolute inset-y-0 mr-3 right-0 flex items-center"
                    data-placement="bottom-start">
                    <i class="dropdown-toggle w-4 h-4 cursor-pointer text-gray-700 dark:text-gray-300" role="button"
                        aria-expanded="false" data-feather="chevron-down"></i>
                    <div class="inbox-filter__dropdown-menu dropdown-menu pt-2">
                        <div class="dropdown-menu__content box p-5">
                            <div class="grid grid-cols-12 gap-4 gap-y-3">
                                <div class="col-span-6">
                                    <label for="input-filter-1" class="form-label text-xs">Başlangıç</label>
                                    <input id="input-filter-1" type="text" class="form-control flex-1"
                                        placeholder="01-12-2019">
                                </div>
                                <div class="col-span-6">
                                    <label for="input-filter-2" class="form-label text-xs">Bitiş</label>
                                    <input id="input-filter-2" type="text" class="form-control flex-1"
                                        placeholder="03-12-2019">
                                </div>
                                <div class="col-span-12">
                                    <label for="input-filter-3" class="form-label text-xs">Konu</label>
                                    <input id="input-filter-3" type="text" class="form-control flex-1"
                                        placeholder="Konu">
                                </div>

                                <div class="col-span-12 flex items-center mt-3">
                                    <button class="btn btn-secondary w-32 ml-auto">Filtre Oluştur</button>
                                    <button class="btn btn-primary w-32 ml-2">Ara</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full sm:w-auto flex">
                <button class="btn btn-primary shadow-md mr-2">Canlı Destek ile Görüş</button>
            </div>
        </div>
        <!-- END: Inbox Filter -->
        <!-- BEGIN: Inbox Content -->
        <div class="intro-y inbox box mt-5">
            <div
                class="p-5 flex flex-col-reverse sm:flex-row text-gray-600 border-b border-gray-200 dark:border-dark-1">
                <div
                    class="flex items-center mt-3 sm:mt-0 border-t sm:border-0 border-gray-200 pt-5 sm:pt-0 mt-5 sm:mt-0 -mx-5 sm:mx-0 px-5 sm:px-0">
                    <input class="form-check-input" type="checkbox">

                    <a href="javascript:;" class="w-5 h-5 ml-5 flex items-center justify-center dark:text-gray-300"> <i
                            class="w-4 h-4" data-feather="refresh-cw"></i> </a>

                </div>
                <div class="flex items-center sm:ml-auto">
                    <div class="dark:text-gray-300">1 - 50 of 5,238</div>
                    <a href="javascript:;" class="w-5 h-5 ml-5 flex items-center justify-center dark:text-gray-300"> <i
                            class="w-4 h-4" data-feather="chevron-left"></i> </a>
                    <a href="javascript:;" class="w-5 h-5 ml-5 flex items-center justify-center dark:text-gray-300"> <i
                            class="w-4 h-4" data-feather="chevron-right"></i> </a>

                </div>
            </div>
            <div class="overflow-x-auto sm:overflow-x-visible">
                @forelse($tickets as $ticket)
                    <div class="intro-y">
                      <a href="{{route('fba.tickets.show',['id'=>$ticket->id])}}">
                        <div
                            class="inbox__item inbox__item--active inline-block sm:block text-gray-700 dark:text-gray-500 bg-gray-100 dark:bg-dark-1 border-b border-gray-200 dark:border-dark-1">
                            <div class="flex px-5 py-3">
                                <div class="w-72 flex-none flex items-center mr-2">
                                    <input class="form-check-input flex-none" type="checkbox">
                                    <div class="w-6 h-6 flex-none image-fit relative ">
                                    </div>
                                    <div class="inbox__item--sender truncate">{{ $ticket->title }}</div>
                                </div>
                                <div class="w-64 sm:w-auto truncate">{{ Str::limit($ticket->conversations[0]->message,50) }} </div>
                                <div class="flex items-center justify-center text-theme-9  ml-auto">  {{$ticket->status}} </div>
                                <div class="inbox__item--time whitespace-nowrap ml-auto ">06:05 AM</div>
                            </div>
                        </div>
                      </a>
                    </div>
                @empty
                    <div class="intro-y">
                        Herhangi Bir Kayıt Bulunamadı
                    </div>
                @endforelse



            </div>
            <div class="p-5 flex flex-col sm:flex-row items-center text-center sm:text-left text-gray-600">
                <div class="dark:text-gray-300">Toplam {{$ticket_count }} Destek Talebi oluşturuldu {{$closed_ticket_count}} adedi kapandı</div>
                <div class="sm:ml-auto mt-2 sm:mt-0 dark:text-gray-300">Son Oluşturulan Talep: {{ $latest_ticket_time }}</div>
            </div>
        </div>
        <!-- END: Inbox Content -->
    </div>
</div>
