<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>
    Sellerfulfilment - Amazon Seller Amazon Ara Deponuz
  </title>
  <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon" />

  {{-- CSS Files --}}
  <link href="{{ asset('themes/' . $theme->folder . '/css/landing/styles.css') }}" rel="stylesheet">
  <link href="{{ asset('themes/' . $theme->folder . '/css/landing/animate.css') }}" rel="stylesheet">
  <link href="{{ asset('themes/' . $theme->folder . '/css/landing/magnific-popup.css') }}" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{ asset('themes/' . $theme->folder . '/css/landing/tailwind.css') }}">

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



  <!-- ==== WOW JS ==== -->
  <script src="{{ asset('themes/' . $theme->folder . '/js/landing/wow.min.js') }}"></script>

  <script>
    new WOW().init();

  </script>
</head>

<body>

  @yield('content')





@include('theme::landingpage.components.footer')

  <!-- ====== Back To Top Start -->
  <a href="javascript:void(0)" class="back-to-top fixed bottom-4 left-8   z-[999] hidden h-10 w-10 items-center justify-center rounded-md bg-primary text-white shadow-md transition duration-300 ease-in-out hover:bg-dark">
    <span class="mt-[6px] h-3 w-3 rotate-45 border-t border-l border-white"></span>
  </a>
  <!-- ====== Back To Top End -->

  <!-- ====== All Scripts -->



  <!-- jQuery 1.7.2+ or Zepto.js 1.0+ -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>



  <!--   magnific js -->
  <script src="{{ asset('themes/' . $theme->folder . '/js/landing/jquery.magnific-popup.js') }}"></script>



  {{-- main js --}}
  <script src="{{ asset('themes/' . $theme->folder . '/js/landing/main.js') }}"></script>



  <script>
    // ==== for menu scroll
    const pageLink = document.querySelectorAll(".ud-menu-scroll");

    pageLink.forEach((elem) => {
      elem.addEventListener("click", (e) => {
        e.preventDefault();
        document.querySelector(elem.getAttribute("href")).scrollIntoView({
          behavior: "smooth"
          , offsetTop: 1 - 60
        , });
      });
    });

    // section menu active
    function onScroll(event) {
      const sections = document.querySelectorAll(".ud-menu-scroll");
      const scrollPos =
        window.pageYOffset ||
        document.documentElement.scrollTop ||
        document.body.scrollTop;

      for (let i = 0; i < sections.length; i++) {
        const currLink = sections[i];
        const val = currLink.getAttribute("href");
        const refElement = document.querySelector(val);
        const scrollTopMinus = scrollPos + 73;
        if (
          refElement.offsetTop <= scrollTopMinus &&
          refElement.offsetTop + refElement.offsetHeight > scrollTopMinus
        ) {
          document
            .querySelector(".ud-menu-scroll")
            .classList.remove("active");
          currLink.classList.add("active");
        } else {
          currLink.classList.remove("active");
        }
      }
    }

    window.document.addEventListener("scroll", onScroll);

  </script>

  {{-- live chat --}}
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
