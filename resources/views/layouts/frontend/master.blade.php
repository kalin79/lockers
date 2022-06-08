<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield('meta_tags')

    <link href="{{ asset('css/fonts.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/main.css') }}" rel="stylesheet">
    <meta name="robots" content="index, follow">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <link rel="apple-touch-icon" sizes="57x57" href="/ico2.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/ico2.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/ico2.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/ico2.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/ico2.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/ico2.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/ico2.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/ico2.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/ico20.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/ico2.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/ico2.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/ico2.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/ico2.png">
    <link rel="shortcut icon" href="/favicon.ico">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff"> --}}
</head>
<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MZFL3P7"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <div id="app" class="backgroundGlobal">
          <div class="contentBlur">
               @include('includes.frontend.header.header')
               @yield('content')
               @include('includes.frontend.footer.footer')
          </div>
    </div>
    {{-- @include('includes.frontend.load.load') --}}
    <script src="{{ asset('js/app.js') }}"></script>

</body>
</html>