@php
$notifications_count = auth()
    ->user()
    ->unreadNotifications->count();
@endphp

@if (!isset($show_all_notifications))

    @php
        $unreadNotifications = auth()
            ->user()
            ->unreadNotifications->take(5);
    @endphp

    <div class="intro-x dropdown mr-4 sm:mr-6">
        <div class="dropdown-toggle notification notification--light cursor-pointer" role="button" aria-expanded="false">
            <i data-feather="bell" class="notification__icon dark:text-gray-300"></i>
            {{ $notifications_count ?? 0 }}
        </div>
    @else
        @php
            $unreadNotifications = auth()
                ->user()
                ->unreadNotifications->all();
        @endphp
@endif


<div class="notification-content pt-2 dropdown-menu">
    <div class="notification-content__box dropdown-menu__content box dark:bg-dark-6">
        @if (!isset($show_all_notifications))
            <div class="notification-content__title">Notifications</div>
        @endif
        <div id="notifications-none"
            class="@if ($notifications_count > 0){{ 'hidden' }}@endif @if (isset($show_all_notifications)){{ 'bg-gray-150' }}@endif flex items-center justify-center h-24 w-full text-gray-600 font-medium">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4">
                </path>
            </svg>
            All Caught Up!
        </div>

        @foreach ($unreadNotifications as $index => $notification)
            @php $notification_data = (object)$notification->data; @endphp
            <div id="notification-li-{{ $index + 1 }}"
                class="cursor-pointer relative flex items-center @if (!isset($show_all_notifications)){{ 'hover:bg-gray-50' }}@endif ">
                <div class="w-12 h-12 flex-none image-fit mr-1">
                    <img alt="Rubick Tailwind HTML Admin Template" class="rounded-full"
                        src="dist/images/profile-13.jpg">
                    <div class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white">
                    </div>
                </div>
                <div class="ml-2 overflow-hidden">
                    <div class="flex items-center">
                        <a href="javascript:;" class="font-medium truncate mr-5">Johnny Depp</a>
                        <div class="text-xs text-gray-500 ml-auto whitespace-nowrap">06:05 AM</div>
                    </div>
                    <div class="w-full truncate text-gray-600 mt-0.5">Contrary to popular belief, Lorem
                        Ipsum is not simply random text. It has roots in a piece of classical Latin
                        literature from 45 BC, making it over 20</div>
                </div>
                <span data-id="{{ $notification->id }}" data-listid="{{ $index + 1 }}"
                    class="flex justify-start w-full py-1 pl-16 ml-1 text-xs text-gray-500 cursor-pointer k hover:text-gray-700 mark-as-read hover:underline">
                    <svg class="absolute w-4 h-4 mt-1 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    Mark as Read
                </span>
            </div>
        @endforeach

    </div>
</div>
</div>
