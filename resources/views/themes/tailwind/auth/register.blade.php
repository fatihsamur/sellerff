@extends('theme::layouts.app')



<div class="login">
    <div class="container sm:px-10">
        <div class="block xl:grid grid-cols-2 gap-4">
            <!-- BEGIN: Login Info -->
            <div class="hidden xl:flex flex-col min-h-screen">
                <a href="{{ url('/') }}" class="-intro-x flex items-center pt-5">
                    @include('theme::svg.main-logo-white')
                </a>
                <div class="my-auto">
                    <img alt="Rubick Tailwind HTML Admin Template" class="-intro-x w-1/2 -mt-16"
                        src="{{ asset('themes/' . $theme->folder . '/images/illustration.svg') }}">
                    <div class="-intro-x text-white font-medium text-4xl leading-tight mt-10">
                        Aramıza Katılın,
                        <br>
                        siparişlerinizi istediğiniz ülkeye kolayca gönderelim.
                    </div>
                    <div class="-intro-x mt-5 text-lg text-white text-opacity-70 dark:text-gray-500">Neredeyse Tüm
                        E-ticaret platformlarıyla entegre bir ara depo hayal edin.</div>
                </div>
            </div>
            <!-- END: Login Info -->
            <!-- BEGIN: Login Form -->
            <!-- BEGIN: Register Form -->
            <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
                <div
                    class="my-auto mx-auto xl:ml-20 bg-white dark:bg-dark-1 xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                    <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
                        Üye Ol
                    </h2>
                    <form action="#" method="POST">
                        @csrf
                        <div class="intro-x mt-8">
                            <input name="name" type="text"
                                class="intro-x login__input form-control py-3 px-4 border-gray-300 block"
                                placeholder="Hasan Bayar veya Sirket Adınız LLC">

                            @error('name')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror

                            <input name="phone" type="text"
                                class="intro-x login__input form-control py-3 px-4 border-gray-300 block mt-4"
                                placeholder="Telefon : 5554441122">
                            @error('phone')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror

                            <input name="line1" type="text"
                                class="intro-x login__input form-control py-3 px-4 border-gray-300 block mt-4"
                                placeholder="Satır1 : Örnek Caddesi">
                            @error('line1')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                            <input name="line2" type="text"
                                class="intro-x login__input form-control py-3 px-4 border-gray-300 block mt-4"
                                placeholder="Satır2 : 104.sok 5/6 ">
                            @error('line2')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror

                            <input name="state" type="text"
                                class="intro-x login__input form-control py-3 px-4 border-gray-300 block mt-4"
                                placeholder="Alaska">
                            @error('state')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                            <input name="city" type="text"
                                class="intro-x login__input form-control py-3 px-4 border-gray-300 block mt-4"
                                placeholder="Ankara">
                            @error('city')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                            <input name="zip_code" type="text"
                                class="intro-x login__input form-control py-3 px-4 border-gray-300 block mt-4"
                                placeholder="Posta Kodu: 06000">
                            @error('zip_code')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror

                            @if (setting('auth.username_in_registration') == 'yes')
                                <input name="username" type="text"
                                    class="intro-x login__input form-control py-3 px-4 border-gray-300 block"
                                    placeholder="Kullanıcı Adı">
                                @error('username')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            @endif
                            <input name="email" type="text"
                                class="intro-x login__input form-control py-3 px-4 border-gray-300 block mt-4"
                                placeholder="Email : ornek@gmail.com">
                            @error('email')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror

                            @livewire('password-strong-checker')
                        </div>

                            @livewire('apply-affiliate')
                        <div class="intro-x flex items-center text-gray-700 dark:text-gray-600 mt-4 text-xs sm:text-sm">
                            <input id="conditions" name="conditions" id="remember-me" type="checkbox"
                                class="form-check-input border mr-2">
                            <label class="cursor-pointer select-none" for="remember-me">Koşulları Okudum, Kabul
                                Ediyorum</label>
                            <a class="text-theme-1 dark:text-theme-10 ml-1" href="">Gizlilik Politikası</a>.
                        </div>
                        <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                            <button class="btn btn-primary py-3 px-4 w-full xl:w-32 xl:mr-3 align-top">Üye Ol</button>
                            <a href="{{ route('login') }}"
                                class="btn btn-outline-secondary py-3 px-4 w-full xl:w-32 mt-3 xl:mt-0 align-top">Giriş
                                Yap</a>
                        </div>
                    </form>
                </div>
            </div>

            <!-- END: Register Form -->
        </div>
        <!-- END: Login Form -->
    </div>


</div>
