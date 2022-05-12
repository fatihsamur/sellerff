<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  @if (isset($seo->title))
  <title>{{ $seo->title }}</title>
  @else
  <title>
    {{ setting('site.title', 'sellerfulfilment') . ' - ' . setting('site.description', 'Amazon Seller Automation') }}


  </title>
  @endif

  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge"> <!-- † -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="url" content="{{ url('/') }}">

  <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('themes/' . $theme->folder . '/landing/favicon/apple-touch-icon.png')}}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('themes/' . $theme->folder . '/landing/favicon/favicon-32x32.png')}}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('themes/' . $theme->folder . '/landing/favicon/favicon-16x16.png')}}">
  <link rel="manifest" href="{{ asset('themes/' . $theme->folder . '/landing/favicon/site.webmanifest')}}">
  <link rel="mask-icon" href="{{ asset('themes/' . $theme->folder . '/landing/favicon/safari-pinned-tab.svg')}}/" color="#5bbad5">

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


  @if (Request::is('/'))
  {{-- saas theme --}}
  <!-- Icon -->

  <link rel="stylesheet" type="text/css" href="{{ asset('themes/' . $theme->folder . '/css/LineIcons.2.0.css') }}">

  <!-- Animate -->
  <link rel="stylesheet" type="text/css" href="{{ asset('themes/' . $theme->folder . '/css/animate.css') }}">

  <!-- Tiny Slider  -->
  <link rel="stylesheet" type="text/css" href="{{ asset('themes/' . $theme->folder . '/css/tiny-slider.css') }}">

  <!-- Tailwind css -->
  <link rel="stylesheet" type="text/css" href="{{ asset('themes/' . $theme->folder . '/css/tailwind.css') }}">
  @endif


  @livewireStyles
</head>

<body class="
@if (Request::is('login') ){{ ' overflow-hidden' }}@endif
">


  <div id="fullscreenLoader" style="z-index: 5000000;" class="fixed inset-0 top-0 left-0 flex flex-col items-center justify-center hidden   w-full h-full bg-gray-900 opacity-50">
    <svg class="w-5 h-5 mr-3 -ml-1 text-white animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
      <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
      </circle>
      <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
      </path>
    </svg>
    <p id="fullscreenLoaderMessage" class="mt-4 text-sm font-medium text-white uppercase"></p>
  </div>
  <!-- End Full Loader -->




  @notprime
  @notadmin
  {{-- @livewire('call-to-action') --}}
  @endnotadmin
  @endnotprime


  <div class="main flex flex-col min-h-screen

        @if (config('wave.dev_bar')){{ 'pb-10' }}@endif">



    @if (config('wave.demo') && Request::is('/'))
    @include('theme::partials.demo-header')
    @endif

    @include('theme::partials.header')








    @if (!Request::is('/login') && !Request::is('/register'))
    <div class="content">
      @yield('content')
    </div>
    @endif

    @if (Request::is('/login'))
    @include('theme::partials.login')
    @endif
    @if (Request::is('/register'))
    @include('theme::partials.register')
    @endif

    @if (Request::is('/'))
    @include('theme::partials.footer')
    @endif

    @admin
    @if (config('wave.dev_bar'))
    @include('theme::partials.dev_bar')
    @endif
    @endadmin








    <!-- Scripts -->
    @livewireScripts
    @livewireChartsScripts

    @livewire('livewire-ui-modal')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <x-livewire-alert::scripts />
    <x-livewire-alert::flash />
    <script src="{{ asset('themes/' . $theme->folder . '/js/app.js') }}"></script>
    <script src="{{ asset('themes/' . $theme->folder . '/js/midone.js') }}"></script>
    <script>
      window.setCookie = function(c_name, value, exdays) {
        var exdate = new Date();
        exdate.setDate(exdate.getDate() + exdays);
        var c_value = escape(value) + ((exdays == null) ? "" : "; expires=" + exdate.toUTCString());
        document.cookie = c_name + "=" + c_value;
      }


      window.getCookie = function(c_name) {
        var c_value = document.cookie;
        var c_start = c_value.indexOf(" " + c_name + "=");
        if (c_start == -1) {
          c_start = c_value.indexOf(c_name + "=");
        }
        if (c_start == -1) {
          c_value = null;
        } else {
          c_start = c_value.indexOf("=", c_start) + 1;
          var c_end = c_value.indexOf(";", c_start);
          if (c_end == -1) {
            c_end = c_value.length;
          }
          c_value = unescape(c_value.substring(c_start, c_end));
        }
        return c_value;
      }


      window.checkSession = function() {
        var c = getCookie("visited");
        if (c === "yes") {
          return true;
        } else {
          setCookie("visited", "yes", 30);
          return false;
        }

      }

      let loaderElement = document.getElementById('fullscreenLoader');
      let loaderTimeout = null;

      Livewire.hook('message.sent', () => {
        if (loaderTimeout == null) {
          loaderTimeout = setTimeout(() => {
            //göster
            loaderElement.classList.remove('hidden');
          }, 1500);
        }
      });

      Livewire.hook('message.received', () => {
        if (loaderTimeout != null) {
          //gizle
          loaderElement.classList.add('hidden');
          clearTimeout(loaderTimeout);
          loaderTimeout = null;
        }
      });

    </script>
    @include('theme::partials.toast')

    @if (session('message'))
    <script>
      setTimeout(function() {
        popToast("{{ session('message_type') }}", "{{ session('message') }}");
      }, 10);

    </script>
    @endif
    @waveCheckout


  </div>

  @if (Request::is('/'))

  {{-- saas theme --}}
  <!-- All js Here -->
  <script src="{{ asset('themes/' . $theme->folder . '/js/wow.js') }}"></script>

  <script src="{{ asset('themes/' . $theme->folder . '/js/tiny-slider.js') }}"></script>

  <script src="{{ asset('themes/' . $theme->folder . '/js/contact-form.js') }}"></script>

  <script src="{{ asset('themes/' . $theme->folder . '/js/main.js') }}"></script>

  @endif






  <script>
    window.__lc = window.__lc || {};
    window.__lc.license = 13514445;;
    (function(n, t, c) {
      function i(n) {
        return e._h ? e._h.apply(null, n) : e._q.push(n)
      }
      var e = {
        _q: []
        , _h: null
        , _v: "2.0"
        , on: function() {
          i(["on", c.call(arguments)])
        }
        , once: function() {
          i(["once", c.call(arguments)])
        }
        , off: function() {
          i(["off", c.call(arguments)])
        }
        , get: function() {
          if (!e._h) throw new Error("[LiveChatWidget] You can't use getters before load.");
          return i(["get", c.call(arguments)])
        }
        , call: function() {
          i(["call", c.call(arguments)])
        }
        , init: function() {
          var n = t.createElement("script");
          n.async = !0, n.type = "text/javascript", n.src = "https://cdn.livechatinc.com/tracking.js", t.head.appendChild(n)
        }
      };
      !n.__lc.asyncInit && e.init(), n.LiveChatWidget = n.LiveChatWidget || e
    }(window, document, [].slice))

  </script>
  <noscript><a href="https://www.livechatinc.com/chat-with/13514445/" rel="nofollow">Chat with us</a>, powered by <a href="https://www.livechatinc.com/?welcome" rel="noopener nofollow" target="_blank">LiveChat</a></noscript> <!-- End of LiveChat code -->
</body>

</html>
