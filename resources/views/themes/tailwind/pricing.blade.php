@extends('theme::layouts.app')

@section('content')

<div class="py-20">
  <div class="sm:mx-auto sm:w-full sm:max-w-5xl">
    <h1 class="max-w-md text-4xl font-extrabold text-gray-900 sm:mx-auto lg:max-w-none lg:text-5xl sm:text-center">Planlarımız</h1>
    <p class="max-w-md mx-auto mt-5 text-lg text-gray-500 lg:max-w-none lg:text-xl sm:text-center">Başarılı olmanıza yardımcı olacak her şey. Her büyüklükteki işletmeye uyacak basit şeffaf fiyatlandırma.</p>


  </div>

  @include('theme::partials.plans')
</div>


@endsection
