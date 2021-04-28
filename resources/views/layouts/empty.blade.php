<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover">
<meta name="theme-color" content="#000">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="domain" content="{{ URL::to('') }}">
<meta name="theme-color" content="#000">
<title>MaGICX Communication</title>

<!-- App favicon -->
<link rel="shortcut icon" href="{{URL::to('icons/icon-72x72.png')}}">

<link rel="stylesheet" type="text/css" href="{{URL::to('styles/bootstrap.css')}}">
<link rel="preconnect" href="https://fonts.gstatic.com/">
<link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900,900i|Source+Sans+Pro:300,300i,400,400i,600,600i,700,700i,900,900i&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{URL::to('fonts/css/fontawesome-all.min.css')}}">
{{-- <link rel="manifest" href="{{URL::to('_manifest.json')}}" data-pwa-version="set_in_manifest_and_pwa_js"> --}}
<link rel="apple-touch-icon" sizes="180x180" href="{{URL::to('app/icons/icon-192x192.png')}}">
@stack('styles')
</head>
<body class="theme-light" data-highlight="highlight-red" data-gradient="body-default">
    <div id="preloader"></div>
    <input type="hidden" name="allow_sw" id="allow_sw" value="false">
    
    @yield('content')
        
    <div id="menu-install-pwa-android" class="menu menu-box-bottom menu-box-detached rounded-l">
        <div class="boxed-text-l mt-4 pb-3">
            <img class="rounded-l mb-3" src="{{URL::to('/icons/icon-128x128.png')}}" alt="img" width="90" height="90">
            <h4 class="mt-3">Install Communication on your Android</h4>
            <p>
            Install Communication on your android, and access it just like a regular app. It really is that simple!
            </p>
            <a href="#" class="pwa-install btn btn-s rounded-s shadow-l text-uppercase font-900 bg-highlight mb-2">Install Now</a><br>
            <a href="#" class="pwa-dismiss close-menu color-gray-dark text-uppercase font-900 opacity-60 font-10 pt-2">Maybe later</a>
            <div class="clear"></div>
        </div>
    </div>
        
    <div id="menu-install-pwa-ios" class="menu menu-box-bottom menu-box-detached rounded-l">
        <div class="boxed-text-xl mt-4 pb-3">
            <img class="rounded-l mb-3" src="{{URL::to('/icons/icon-128x128.png')}}" alt="img" width="90" height="90">
            <h4 class="mt-3">Install Communication on your IOS</h4>
            <p class="mb-0 pb-0">
            Install Communication, and access it like a regular app. Open your Safari menu and tap "Add to Home Screen".
            </p>
            <div class="clearfix pt-3"></div>
            <a href="#" class="pwa-dismiss close-menu color-highlight text-uppercase font-700">Maybe later</a>
        </div>
    </div>

<script type="text/javascript" src="{{URL::to('scripts/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{URL::to('scripts/jquery-3.6.0.min.js')}}"></script>
<script type="text/javascript" src="{{URL::to('scripts/moment.js')}}"></script>
<script type="text/javascript" src="{{URL::to('scripts/custom.js')}}"></script>
{{-- <script type="text/javascript" src="{{URL::to('scripts/sw_initialize.js')}}"></script> --}}

@stack('scripts')

</body>
</html>