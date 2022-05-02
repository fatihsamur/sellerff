@extends('theme::layouts.app')

@section('content')

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
                            Marketler arası
                            <br>
                            sipariş gönderimi hiç bu kadar kolay olmamıştı.
                        </div>
                        <div class="-intro-x mt-5 text-lg text-white text-opacity-70 dark:text-gray-500">Neredeyse Tüm
                            E-ticaret platformlarıyla Entegre Çalışın.</div>
                    </div>
                </div>
                <!-- END: Login Info -->
                <!-- BEGIN: Login Form -->
                <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
                    <div
                        class="my-auto mx-auto xl:ml-20 bg-white dark:bg-dark-1 xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                        <form action="#" method="POST">
                            @csrf
                            <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
                                Giriş Yap
                            </h2>
                            <div class="intro-x mt-2 text-gray-500 xl:hidden text-center">Tüm gönderilerinizi tek bir yerden
                                yönlendirin. Manage all your e-commerce accounts in one place</div>


                            <div class="intro-x mt-8">
                                @if (setting('auth.email_or_username') && setting('auth.email_or_username') == 'username')
                                    <input id="username" type="username" name="username" required
                                        class="intro-x login__input form-control py-3 px-4 border-gray-300 block"
                                        placeholder="Kullanıcı Adı">
                                @else
                                    <input id="email" type="email" name="email" required
                                        class="intro-x login__input form-control py-3 px-4 border-gray-300 block"
                                        placeholder="Email">
                                @endif
                                @if ($errors->has('username'))
                                    <div class="mt-1 text-red-500">
                                        {{ $errors->first('username') }}
                                    </div>
                                @endif
                                @if ($errors->has('email'))
                                    <div class="mt-1 text-red-500">
                                        {{ $errors->first('email') }}
                                    </div>
                                @endif
                                <input id="password" name="password" type="password"
                                    class="intro-x login__input form-control py-3 px-4 border-gray-300 block mt-4"
                                    placeholder="Şifre">
                                @if ($errors->has('password'))
                                    <div class="mt-1 text-red-500">
                                        {{ $errors->first('password') }}
                                    </div>
                                @endif
                            </div>


                            <div class="intro-x flex text-gray-700 dark:text-gray-600 text-xs sm:text-sm mt-4">
                                <div class="flex items-center mr-auto">
                                    <input {{ old('remember') ? ' checked' : '' }} id="remember" name="remember"
                                        type="checkbox" class="form-check-input border mr-2">
                                    <label class="cursor-pointer select-none" for="remember">Beni Hatırla</label>
                                </div>
                                <a href="{{ route('password.request') }}">Şifrenizi Unuttunuz Mu?</a>
                            </div>
                            <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                                <button type="submit"
                                    class="btn btn-primary py-3 px-4 w-full xl:w-32 xl:mr-3 align-top">Giriş</button>
                                <a href="{{ route('register') }}"
                                    class="btn btn-outline-secondary py-3 px-4 w-full xl:w-32 mt-3 xl:mt-0 align-top">Üye
                                    Ol</a>
                            </div>
                            <div class="intro-x mt-10 xl:mt-24 text-gray-700 dark:text-gray-600 text-center xl:text-left">
                                Hizmetleri kullanarak aşağıdaki koşulları kabul etmiş sayılırsınız
                                <br>
                                <a class="text-theme-1 dark:text-theme-10" href="">Şartlar ve Koşullar</a> & <a
                                    class="text-theme-1 dark:text-theme-10" href="">Gizlilik Politikası</a>
                        </form>
                    </div>
                </div>
            </div>
            <!-- END: Login Form -->
        </div>


    </div>










@endsection
