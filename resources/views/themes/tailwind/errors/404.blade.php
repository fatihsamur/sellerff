<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>

    @if (isset($seo->title))
        <title>{{ $seo->title }}</title>
    @else
        <title>
            {{ setting('site.title', 'Laravel Wave') . ' - ' . setting('site.description', 'The Software as a Service Starter Kit built on Laravel & Voyager') }}
        </title>
    @endif

    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge"> <!-- † -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="url" content="{{ url('/') }}">

    <link rel="icon" href="{{ setting('site.favicon', '/wave/favicon.png') }}" type="image/x-icon">

    {{-- Social Share Open Graph Meta Tags --}}
    @if (isset($seo->title) && isset($seo->description) && isset($seo->image))
        <meta property="og:title" content="{{ $seo->title }}">
        <meta property="og:url" content="{{ Request::url() }}">
        <meta property="og:image" content="{{ $seo->image }}">
        <meta property="og:type" content="@if (isset($seo->type)){{ $seo->type }}@else{{ 'article' }}@endif">
        <meta property="og:description" content="{{ $seo->description }}">
        <meta property="og:site_name" content="{{ setting('site.title') }}">

        <meta itemprop="name" content="{{ $seo->title }}">
        <meta itemprop="description" content="{{ $seo->description }}">
        <meta itemprop="image" content="{{ $seo->image }}">

        @if (isset($seo->image_w) && isset($seo->image_h))
            <meta property="og:image:width" content="{{ $seo->image_w }}">
            <meta property="og:image:height" content="{{ $seo->image_h }}">
        @endif
    @endif

    <meta name="robots" content="index,follow">
    <meta name="googlebot" content="index,follow">

    @if (isset($seo->description))
        <meta name="description" content="{{ $seo->description }}">
    @endif

    <!-- Styles -->
    <link href="{{ asset('themes/' . $theme->folder . '/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('themes/' . $theme->folder . '/css/midone.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('themes/' . $theme->folder . '/css/flag-icons.min.css') }}">
    <script src="https://code.iconify.design/2/2.1.0/iconify.min.js"></script>
    <script src="{{ asset('themes/' . $theme->folder . '/js/clipboard.min.js') }}"></script>
    @livewireStyles
</head>
<body>
<div class="container">
  <!-- BEGIN: Error Page -->
  <div class="error-page flex flex-col lg:flex-row items-center justify-center h-screen text-center lg:text-left">
      <div class="-intro-x lg:mr-20">
          <img alt="Rubick Tailwind HTML Admin Template" class="h-48 lg:h-auto" src="{{ asset('themes/' . $theme->folder . '/images/error-illustration.svg') }}">
      </div>
      <div class="text-white mt-10 lg:mt-0">
          <div class="intro-x text-8xl font-medium">404</div>
          <div class="intro-x text-xl lg:text-3xl font-medium mt-5">Oops. Aradığınız sayfayı bulamadık.</div>
          <div class="intro-x text-lg mt-3">Sayfanın Doğru yazıldığına emin olun</div>
          <a href="{{url('/')}}" class="intro-x btn py-3 px-4 text-white border-white dark:border-dark-5 dark:text-gray-300 mt-10">Anasayfaya Yönlendir</a>
      </div>
  </div>
  <!-- END: Error Page -->
</div>
</body>
