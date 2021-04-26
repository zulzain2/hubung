<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover">
<meta name="theme-color" content="#000">
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

    <input type="hidden" name="allow_sw" id="allow_sw" value="false">
    
    @yield('content')
        

<script type="text/javascript" src="{{URL::to('scripts/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{URL::to('scripts/custom.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

@stack('scripts')

</body>
</html>