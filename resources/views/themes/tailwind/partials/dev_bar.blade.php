<div
    x-init="$watch('open', value => {
        if(value){
            document.body.classList.add('overflow-hidden');
            let thisElement = $el;
        } else {
            document.body.classList.remove('overflow-hidden');
        }})"
    id="wave_dev_bar"
    class="fixed bottom-0 left-0 z-40 w-full h-screen transition-all duration-150 ease-out transform"
    x-data="{ open: false, url: '', active: '' }"
    :class="{ 'translate-y-full': !open, 'translate-y-0': open }"
    x-on:keydown.escape.window="open = false"
    x-cloak>
    <div class="fixed inset-0 z-20 bg-black bg-opacity-25" x-show="open" @click="open=false"></div>



    <div class="absolute inset-0 z-30 hidden sm:block" :class="{ 'bottom-0': !open }">

        <div class="inset-0 transition duration-200 ease-out" :class="{ 'absolute h-14': open, 'relative h-10 -mt-10': !open }">
            <div class="w-full h-full border-t border-blue-500 bg-gradient-to-r from-wave-500 via-blue-500 to-purple-600" :class="{ 'overflow-hidden': open }">
                <div class="flex justify-between w-full h-full">
                    <div class="flex h-full">
                        @if(!auth()->guest() && auth()->user()->can('browse_admin'))
                            <div @click="open=true; url='/admin'; active='admin';" class="flex items-center justify-center h-full text-xs leading-none text-blue-100 border-l border-blue-500 cursor-pointer hover:bg-wave-600" :class="{ 'px-3': !open, 'px-5': open, 'bg-wave-600': active == 'admin' && open, 'bg-wave-500': active != 'admin' }">
                                Admin
                            </div>
                        @endif
                    </div>
                    <div x-show="open" @click="open=false" class="flex flex-col items-center justify-center h-full text-white border-l border-purple-500 opacity-75 cursor-pointer w-14 hover:bg-black hover:bg-opacity-10 hover:opacity-100">

                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                        <span class="text-xs opacity-50">esc</span>
                    </div>
                </div>
            </div>
        </div>


        <div class="relative w-full h-full overflow-hidden bg-white">
            <iframe class="w-full h-full pt-14" :src="url"></iframe>
        </div>
    </div>
</div>
