@extends('theme::layouts.app')



@section('content')
    <!-- component -->
    <div class="flex  justify-center items-center h-screen bg-gray-200">
        <div class="container">
            <div class="text-center">
            <div class="mx-auto flex justify-center">
                @include('theme::svg.main-logo-white')
            </div>
                <h3 class='text-xl md:text-3xl mt-10'>Bu Bölüm Yakında Hizmetinizde Olacak.</h3>

            </div>
            <div class="flex flex-wrap mt-10 justify-center">
                <div class="m-3">
                    <a href="https://www.facebook.com/sellerfulfilment" title="sellerfulfilment On Facebook"
                        class="md:w-32 bg-white tracking-wide text-gray-800 font-bold rounded border-2 border-blue-600 hover:border-blue-600 hover:bg-blue-600 hover:text-white shadow-md py-2 px-6 inline-flex items-center">
                        <span class="mx-auto">Facebook</span>
                    </a>
                </div>
                <div class="m-3 ml-3">
                    <a href="https://twitter.com/sellerfulfilment" title="sellerfulfilment On Twitter"
                        class="md:w-32 bg-white tracking-wide text-gray-800 font-bold rounded border-2 border-red-600 hover:border-red-600 hover:bg-red-600 hover:text-white shadow-md py-2 px-6 inline-flex items-center">
                        <span class="mx-auto">Twitter</span>
                    </a>
                </div>
                <div class="m-3 ml-3">
                    <a href="https://pinterest.com/sellerfulfilment/" title="sellerfulfilment On Pinterest"
                        class="md:w-32 bg-white tracking-wide text-gray-800 font-bold rounded border-2 border-red-600 hover:border-red-600 hover:bg-red-600 hover:text-white shadow-md py-2 px-6 inline-flex items-center">
                        <span class="mx-auto">Instagram</span>
                    </a>
                </div>

            </div>

        </div>
    </div>
@endsection
