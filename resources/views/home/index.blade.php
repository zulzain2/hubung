
@extends('layouts.app')

@push('styles')

@endpush

@section('content')


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

<div class="content">
    <div class="row mb-n2">
    <div class="col-4 pe-2">
    <div class="card card-style mx-0 mb-3">
    <div class="p-3">
    <h4 class="font-700 text-uppercase font-12 opacity-50 mt-n2">Pending</h4>
    <h1 class="font-700 font-34 color-red-dark  mb-0">29</h1>
    <i class="fa fa-arrow-right float-end mt-n3 opacity-20"></i>
    </div>
    </div>
    </div>
    <div class="col-4 ps-2 pe-2">
    <div class="card card-style mx-0 mb-3">
    <div class="p-3">
    <h4 class="font-700 text-uppercase font-12 opacity-50 mt-n2">Assigned</h4>
    <h1 class="font-700 font-34 color-blue-dark mb-0">15</h1>
    <i class="fa fa-arrow-right float-end mt-n3 opacity-20"></i>
    </div>
    </div>
    </div>
    <div class="col-4 ps-2">
    <div class="card card-style mx-0 mb-3">
    <div class="p-3">
    <h4 class="font-700 text-uppercase font-12 opacity-50 mt-n2">Compete</h4>
    <h1 class="font-700 font-34 color-green-dark mb-0">17</h1>
    <i class="fa fa-arrow-right float-end mt-n3 opacity-20"></i>
    </div>
    </div>
    </div>
    </div>
    </div>

    <div class="card card-style">
        <div class="d-flex px-3 py-3">
        <div class="align-self-center">
            <a href="#" class="icon icon-xs rounded-xs color-white bg-blue-dark me-3"><i class="fas fa-comments"></i></a>
        </div>
        <div class="align-self-center">
        <h5>Chat</h5>
        <p class="mb-0 mt-n2 opacity-50 font-11">3 Unread</p>
        </div>
        <div class="ms-auto align-self-center">
        <a href="#" class="btn btn-xxs bg-highlight text-uppercase font-800">GO</a>
        </div>
        </div>
        </div>

        <div class="card card-style">
            <div class="d-flex px-3 py-3">
            <div class="align-self-center">
            <a href="#" class="icon icon-xs rounded-xs color-white bg-mint-dark me-3"><i class="fas fa-video"></i></a>
            </div>
            <div class="align-self-center">
            <h5>Meet</h5>
            <p class="mb-0 mt-n2 opacity-50 font-11">2 Upcoming</p>
            </div>
            <div class="ms-auto align-self-center">
            <a href="#" class="btn btn-xxs bg-highlight text-uppercase font-800">GO</a>
            </div>
            </div>
            </div>

            <div class="card card-style">
                <div class="d-flex px-3 py-3">
                <div class="align-self-center">
                <a href="#" class="icon icon-xs rounded-xs color-white bg-teal-dark me-3"><i class="fas fa-folder-open"></i></a>
                </div>
                <div class="align-self-center">
                <h5>File</h5>
                <p class="mb-0 mt-n2 opacity-50 font-11">5.4/15 GB</p>
                </div>
                <div class="ms-auto align-self-center">
                <a href="#" class="btn btn-xxs bg-highlight text-uppercase font-800">GO</a>
                </div>
                </div>
                </div>




@endsection

@push('scripts')

<script>

</script>

@endpush
