<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover">
<meta name="csrf-token" content="{{ csrf_token() }}">
{{-- <meta name="theme-color" content="#000"> --}}
<title>MaGICX Communication</title>

<!-- App favicon -->
<link rel="shortcut icon" href="{{URL::to('icons/icon-72x72.png')}}">

<link rel="stylesheet" type="text/css" href="{{URL::to('styles/bootstrap.css')}}">
<link rel="preconnect" href="https://fonts.gstatic.com/">
<link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900,900i|Source+Sans+Pro:300,300i,400,400i,600,600i,700,700i,900,900i&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{URL::to('fonts/css/fontawesome-all.min.css')}}">
<link rel="manifest" href="{{URL::to('_manifest.json')}}" data-pwa-version="set_in_manifest_and_pwa_js">
<link rel="apple-touch-icon" sizes="180x180" href="{{URL::to('app/icons/icon-192x192.png')}}">
@stack('styles')
</head>
<body class="theme-light" data-highlight="highlight-red" data-gradient="body-default">

<div id="preloader"></div>

<div id="page">
    <div class="header header-fixed header-logo-center">

        @if (isset($topBarTitle))
            <a href="index.html" class="header-title">{{$topBarTitle}}</a>
        @else
            <a href="#" class="header-title">Undefined</a>
        @endif

        @if (isset($topBarPrevUrl))
            <a href="#" data-back-button="" class="header-icon header-icon-1"><i class="fas fa-arrow-left"></i></a>
        @else
            
        @endif
        
        <a href="#" data-toggle-theme="" class="header-icon header-icon-4"><i class="fas fa-lightbulb"></i></a>
    </div>
    <div id="footer-bar" class="footer-bar-1">

        <a id="home" href="home" class="active-nav"><i class="fa fa-home"></i><span>Home</span></a>
        <a id="chat" href="chat"><i class="fas fa-comments"></i><span>Chat</span></a>
        <a id="meet" href="meet"><i class="fas fa-video"></i><span>Meeting</span></a>
        <a id="file" href="index-search.html"><i class="fas fa-folder"></i><span>My File</span></a>
        <a id="setting" href="#" data-menu="menu-settings"><i class="fa fa-cog"></i><span>Settings</span></a>

    </div>

    <div class="page-content header-clear-medium">
      
        <input type="hidden" name="allow_sw" id="allow_sw" value="true">

            @yield('content')
        
    </div>

    @yield('content2')

    <div id="menu-settings" class="menu menu-box-bottom menu-box-detached">
        <div class="menu-title mt-0 pt-0"><h1>Settings</h1><p class="color-highlight">Flexible and Easy to Use</p><a href="#" class="close-menu"><i class="fa fa-times"></i></a></div>
        <div class="divider divider-margins mb-n2"></div>
        <div class="content">
            <div class="list-group list-custom-small">
                <a href="#" data-toggle-theme="" data-trigger-switch="switch-dark-mode" class="pb-2 ms-n1">
                <i class="fa font-12 fa-moon rounded-s bg-brown-dark color-white me-3"></i>
                <span>Dark Mode</span>
                <div class="custom-control scale-switch ios-switch">
                    <input data-toggle-theme="" type="checkbox" class="ios-input" id="switch-dark-mode">
                    <label class="custom-control-label" for="switch-dark-mode"></label>
                </div>
                <i class="fa fa-angle-right"></i>
                </a>
            </div>
            <div class="list-group list-custom-small">
                
            
                    
                <form method="POST" action="{{ route('logout') }}">
                @csrf
                    
                    <button type="submit" class="btn btn-xxs w-100 rounded-s btn-full mb-3 text-uppercase font-900 shadow-s bg-red-dark" style="margin-top:10px"><i class="fas fa-sign-out-alt " style="line-height: 25px;"></i>&nbsp;&nbsp;Log Out</button>
                </form>

            </div>
        </div>
    </div>


    

</div>

<script type="text/javascript" src="{{URL::to('scripts/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{URL::to('scripts/custom.js')}}"></script>
<script type="text/javascript" src="{{URL::to('scripts/jquery-3.6.0.min.js')}}"></script>

@stack('scripts')

</body>
</html>