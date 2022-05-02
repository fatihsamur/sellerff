<div>
    <h2 class="intro-y text-lg font-medium mt-10">
        Kullanıcı Bilgileri
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">

        </div>
        <div class="flex col-span-12">
            <div class="w-full relative text-gray-700 dark:text-gray-300">
                <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                    <button type="submit" class="p-1 focus:outline-none focus:shadow-outline">
                    </button>
                </span>
                <input wire:model.debounce.500ms="search" type="search" name="q"
                    class="border-transparent	py-2 text-sm  w-full rounded-md  focus:outline-none  focus:bg-white focus:text-gray-900 placeholder:text-blue-400"
                    placeholder="Arama" autocomplete="off">
            </div>
        </div>
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        <th class="whitespace-nowrap">KULLANICI ID</th>
                        <th class="whitespace-nowrap">KULLANICI EMAİL</th>
                        <th class="whitespace-nowrap">İSİM</th>
                        <th class="whitespace-nowrap">BAKİYE</th>
                        <th class="text-center whitespace-nowrap">ÜYELİK TARİHİ</th>
                        <th class="text-center whitespace-nowrap">SON GİRİŞ TARİHİ</th>
                        <th class="text-center whitespace-nowrap">SON GİRİŞ IP ADRESİ</th>
                        <th class="text-center whitespace-nowrap">AKSİYONLAR</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                        <tr class="intro-x" wire:key="{{ $loop->index }}">
                            <td class="w-40">
                                <div class="flex">
                                    {{ $user->id }}
                                </div>
                            </td>
                            <td class="w-40">
                                <div class="flex">
                                    {{ $user->email }}
                                </div>
                            </td>
                            <td class="w-40">
                                <div class="flex">
                                    {{ $user->name }}
                                </div>
                            </td>
                            <td>
                                <a class="font-medium whitespace-nowrap">
                                    {{ $user->balance }}
                                </a>
                            </td>
                            <td class="w-40">
                                <div class="flex items-center justify-center">
                                    {{ $user->created_at }}
                                </div>
                            </td>
                            <td class="text-center">
                                <div class="flex items-center justify-center">
                                    {{ $user->last_login_at ?? '' }}
                                </div>
                            </td>
                            <td class="text-center">
                                <div class="flex items-center justify-center">
                                    {{ $user->last_login_ip_address ?? '' }}
                                </div>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('admin.user_logs', $user->id) }}" class="btn btn-primary mr-1 mb-2">
                                    <span class="iconify" data-icon="icon-park:log"></span>Loglar</a>
                            </td>
                            <td class="text-center">
                              <a href="{{ route('admin.user.details', $user->id) }}" class="btn btn-primary mr-1 mb-2">
                                  <span class="iconify" data-icon="icon-park:log"></span>Detaylı Göster</a>
                          </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">
                                <div class="text-gray-600">
                                    <h1>Eşleşen Kullanıcı Bulunamadı</h1>
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
                {{ $users->links('vendor.pagination.tailwind') }}
            </div>

        </div>
        <!-- END: Pagination -->
    </div>

</div>
