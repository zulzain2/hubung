<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="domain" content="{{ URL::to('') }}">
    <meta name="theme-color" content="#000">
    <title>MaGICX Communication</title>

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::to('icons/icon-72x72.png') }}">

    <link rel="stylesheet" type="text/css" href="{{ URL::to('styles/bootstrap.css') }}">
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link
        href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900,900i|Source+Sans+Pro:300,300i,400,400i,600,600i,700,700i,900,900i&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('fonts/font-awesome-pro/css/all.min.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/placeholder-loading/dist/css/placeholder-loading.min.css">

    <link rel="manifest" href="{{ URL::to('_manifest.json') }}" data-pwa-version="set_in_manifest_and_pwa_js">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ URL::to('app/icons/icon-192x192.png') }}">
</head>

<body class="theme-light" data-highlight="highlight-red" data-gradient="body-default">
    <div id="preloader">
        <div class="spinner-border color-highlight" role="status"></div>
    </div>
    <div id="page">
        <div class="page-content pb-0">
            <div class="card bg-transparent" data-card-height="cover">
                <div class="card-center text-center">
                    <i class="fa fa-exclamation-triangle fa-8x color-red-dark"></i>
                    <h1 class="fa-6x mt-5 font-900">404</h1>
                    <h4 class="mb-5 mt-3">Page not Found</h4>
                    <p>
                        The page you're looking for cannot be found.<br>
                        How about trying the homepage?
                    </p>
                    <div class="row ms-5 me-5 mt-5 mb-0">
                        <div class="col-3"></div>
                        <div class="col-6">
                            <a href="/home"
                                class="btn btn-m rounded-sm btn-full bg-red-dark text-uppercase font-900">Home</a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{ URL::to('scripts/plugins/bootstrap/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::to('scripts/plugins/jquery/jquery-3.6.0.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::to('scripts/plugins/moment/moment.js') }}"></script>
    <script type="text/javascript" src="{{ URL::to('scripts/plugins/meet/external_api.js') }}"></script>
    <script type="text/javascript" src="{{ URL::to('scripts/plugins/clipboard/clipboard.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::to('scripts/custom.js') }}"></script>
</body>

</html>
