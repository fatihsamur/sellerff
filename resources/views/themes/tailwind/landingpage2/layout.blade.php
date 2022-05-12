<!doctype html>
<html lang="en">

<head>
    {!! SEO::generate() !!}

    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="apple-touch-icon" sizes="180x180"
        href="{{ asset('themes/' . $theme->folder . '/landing/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32"
        href="{{ asset('themes/' . $theme->folder . '/landing/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16"
        href="{{ asset('themes/' . $theme->folder . '/landing/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('themes/' . $theme->folder . '/landing/favicon/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('themes/' . $theme->folder . '/landing/favicon/safari-pinned-tab.svg') }}/"
        color="#5bbad5">
    <link rel="shortcut icon" href="{{ asset('themes/' . $theme->folder . '/landing/images/favicon.png') }} "
        type="image/png">
    <link rel="stylesheet" href="{{ asset('themes/' . $theme->folder . '/landing/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/' . $theme->folder . '/landing/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/' . $theme->folder . '/landing/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/' . $theme->folder . '/landing/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/' . $theme->folder . '/landing/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/' . $theme->folder . '/landing/css/custom-animation.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/' . $theme->folder . '/landing/css/default.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/' . $theme->folder . '/landing/css/style.css') }}">
</head>

<body>



    @include('theme::.landingpage2.partials.navigation')

    @yield('content')

    @include('theme::landingpage2.partials.footer')



    <div class="back-to-top">
        <a href="#"><i class="fal fa-arrow-up"></i></a>
    </div>







    @livewireScripts
    @livewire('livewire-ui-modal')

    <x-livewire-alert::scripts />
    <x-livewire-alert::flash />

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('themes/' . $theme->folder . '/landing/js/vendor/modernizr-3.6.0.min.js') }}"></script>
    <script src="{{ asset('themes/' . $theme->folder . '/landing/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('themes/' . $theme->folder . '/landing/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('themes/' . $theme->folder . '/landing/js/popper.min.js') }}"></script>
    <script src="{{ asset('themes/' . $theme->folder . '/landing/js/wow.js') }}"></script>
    <script src="{{ asset('themes/' . $theme->folder . '/landing/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('themes/' . $theme->folder . '/landing/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('themes/' . $theme->folder . '/landing/js/TweenMax.min.js') }}"></script>
    <script src="{{ asset('themes/' . $theme->folder . '/landing/js/slick.min.js') }}"></script>
    <script src="{{ asset('themes/' . $theme->folder . '/landing/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('themes/' . $theme->folder . '/landing/js/main.js') }}"></script>
    <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
    <script>
        window.__lc = window.__lc || {};
        window.__lc.license = 13514445;;
        (function(n, t, c) {
            function i(n) {
                return e._h ? e._h.apply(null, n) : e._q.push(n)
            }
            var e = {
                _q: [],
                _h: null,
                _v: "2.0",
                on: function() {
                    i(["on", c.call(arguments)])
                },
                once: function() {
                    i(["once", c.call(arguments)])
                },
                off: function() {
                    i(["off", c.call(arguments)])
                },
                get: function() {
                    if (!e._h) throw new Error("[LiveChatWidget] You can't use getters before load.");
                    return i(["get", c.call(arguments)])
                },
                call: function() {
                    i(["call", c.call(arguments)])
                },
                init: function() {
                    var n = t.createElement("script");
                    n.async = !0, n.type = "text/javascript", n.src = "https://cdn.livechatinc.com/tracking.js",
                        t.head.appendChild(n)
                }
            };
            !n.__lc.asyncInit && e.init(), n.LiveChatWidget = n.LiveChatWidget || e
        }(window, document, [].slice))
    </script>
    <noscript><a href="https://www.livechatinc.com/chat-with/13514445/" rel="nofollow">Chat with us</a>, powered by <a
            href="https://www.livechatinc.com/?welcome" rel="noopener nofollow" target="_blank">LiveChat</a></noscript>


</body>

</html>
