<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-WKPMWQT');</script>
    <!-- End Google Tag Manager -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    @yield('meta_tags')

    <link href="{{ asset('css/fonts.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/main.css') }}" rel="stylesheet">
    <meta name="robots" content="index, follow">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WKPMWQT"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <div id="app" class="backgroundGlobal">
          <div class="contentBlur">
               @include('includes.frontend.header.header')
               @yield('content')
               @include('includes.frontend.footer.footer')
               <a href="https://wa.link/c2lu7f" target="_blank" class="boxWhatsApp" id="boxWhatsApp">
                    <div class="relative">
                        <img src="/frontend/images/whatsApp.svg" alt="" >
                        <div class="boxTextWhatsApp">
                            <p>
                                Contacta con un asesor...
                            </p>
                        </div>
                    </div>
                </a>
          </div>
    </div>
    {{-- @include('includes.frontend.load.load') --}}
    <script src="{{ asset('js/app.js') }}"></script>

</body>
</html>