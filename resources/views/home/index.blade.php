
@extends('layouts.app')

@push('styles')

@endpush

@section('content')

<div class="splide single-slider slider-no-arrows slider-no-dots" id="single-slider-home">
    <div class="splide__track">
        <div class="splide__list">
            <div class="splide__slide">
                <div class="card rounded-m shadow-l mx-3">
                <div class="card-bottom text-center mb-0">
                    <h1 class="color-white font-700 mb-n1">Anytime Anywhere</h1>
                    <p class="color-white opacity-80 mb-4">The Menu Everyone Requested.</p>
                </div>
                <div class="card-overlay bg-gradient"></div>
                <img class="img-fluid" src="images/pictures/13.jpg">
                </div>
            </div>
            <div class="splide__slide">
                <div class="card rounded-m shadow-l mx-3">
                    <div class="card-bottom text-center mb-0">
                        <h1 class="color-white font-700 mb-n1">Carefuly Built</h1>
                        <p class="color-white opacity-80 mb-4">Flexibility, Speed, Ease of Use.</p>
                    </div>
                    <div class="card-overlay bg-gradient"></div>
                    <img class="img-fluid" src="images/pictures/28.jpg">
                </div>
            </div>
            <div class="splide__slide">
                <div class="card rounded-m shadow-l mx-3">
                <div class="card-bottom text-center mb-0">
                    <h1 class="color-white font-700 mb-n1">Elite Quality</h1>
                    <p class="color-white opacity-80 mb-4">Mobile Website, App or PWA Ready.</p>
                </div>
                <div class="card-overlay bg-gradient"></div>
                <img class="img-fluid" src="images/pictures/29.jpg">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card card-style">
    <div class="content mt-0 mb-0">
        <div class="list-group list-custom-large">
            <a href="#" data-toggle-theme="" data-trigger-switch="toggle-dark-home" class="border-0">
                <i class="fa font-12 fa-moon rounded-s bg-highlight color-white me-3"></i>
                <span class="font-600">Dark Mode</span>
                <strong>MaGICX will Remember</strong>
                    <div class="custom-control scale-switch ios-switch">
                        <input data-toggle-theme="" type="checkbox" class="ios-input" id="toggle-dark-home">
                        <label class="custom-control-label" for="toggle-dark-home"></label>
                    </div>
                <i class="fa fa-angle-right"></i>
            </a>
        </div>
    </div>
</div>

<div class="card card-style">
    <div class="row me-2 ms-2 mt-5">
        <div class="col-6 text-center">
            <i class="fa fa-trophy color-yellow-dark fa-3x"></i>
            <h2 class="mt-3 mb-1">Future Proof</h2>
            <p>Built to last, with the latest quality code</p>
        </div>
        <div class="col-6 text-center">
            <i class="fab fa-cloudscale color-highlight fa-3x"></i>
            <h2 class="mt-3 mb-1">Powerful</h2>
            <p>Speed, Features and Flexibility all in One!</p>
        </div>
        <div class="col-6 text-center">
            <i class="fa fa-check color-green-dark fa-3x"></i>
            <h2 class="mt-3 mb-1">Easy to Use</h2>
            <p>Customers love our work for it's ease.</p>
        </div>
        <div class="col-6 text-center">
            <i class="fa fa-life-ring color-blue-dark fa-3x"></i>
            <h2 class="mt-3 mb-1">Customer Care</h2>
            <p>We treat others like we want to be treated.</p>
        </div>
    </div>
</div>

@endsection

@push('scripts')

<script>

</script>

@endpush
