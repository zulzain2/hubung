
@extends('layouts.app')

@push('styles')

@endpush

@section('content')

<div id="initialize-meeting">
    <div class="card card-style">
        <div class="content mb-0">
            <h3 class="text-center"> Create Meeting</h3>
            <p></p>
            <div class="input-style input-style-always-active has-borders has-icon validate-field mb-4">
                <i class="fas fa-home color-blue-dark"></i>
                <input id="meetingName" type="name" class="form-control validate-name" placeholder="Enter meeting name">
                <label class="color-theme opacity-50 text-uppercase font-700 font-10">Meeting Name</label>
                <i class="fa fa-times disabled invalid color-red-dark"></i>
                <i class="fa fa-check disabled valid color-green-dark"></i>
                <em>(required)</em>
            </div>
            <div class="input-style input-style-always-active has-borders has-icon validate-field mb-4">
                <i class="fa fa-user color-blue-dark"></i>
                <input id="usrName" type="name" class="form-control validate-name" placeholder="Enter your name">
                <label class="color-theme opacity-50 text-uppercase font-700 font-10">Nick Name</label>
                <i class="fa fa-times disabled invalid color-red-dark"></i>
                <i class="fa fa-check disabled valid color-green-dark"></i>
                <em>(required)</em>
            </div>
            <div class="input-style input-style-always-active has-borders has-icon validate-field mb-4">
                <i class="fas fa-envelope-open color-blue-dark"></i>
                <input id="usrEmail" type="email" class="form-control validate-text" placeholder="Enter your email address">
                <label class="color-theme opacity-50 text-uppercase font-700 font-10">Email</label>
                <i class="fa fa-times disabled invalid color-red-dark"></i>
                <i class="fa fa-check disabled valid color-green-dark"></i>
                <em>(optional)</em>
            </div>

        

            <div class="d-flex no-effect collapsed" data-trigger-switch="toggle-id" data-bs-toggle="collapse" href="#collapseExample4" role="button" aria-expanded="false" aria-controls="collapseExample4">
                <div class="pt-1">
                    <h5 class="font-600">Password Protected</h5>
                </div>
                <div class="ms-auto me-4 pe-2">
                    <div class="custom-control android-switch">
                        <input type="checkbox" class="android-input" id="toggle-id">
                        <label class="custom-control-label" for="toggle-id"></label>
                    </div>
                </div>
            </div>
        

            <div id="password_meeting" class="input-style input-style-always-active has-borders has-icon validate-field mb-4" style="display:none">
                <i class="fas fa-key color-blue-dark"></i>
                <input type="name" class="form-control validate-name" placeholder="Enter room password">
                <label class="color-theme opacity-50 text-uppercase font-700 font-10">Password</label>
                <i class="fa fa-times disabled invalid color-red-dark"></i>
                <i class="fa fa-check disabled valid color-green-dark"></i>
                <em>(optional)</em>
            </div>
        
            <div class="row">
                <div class="col-12 text-center">
                    {{-- <button id="start-meeting" type="button" class="btn btn-s rounded-s text-uppercase font-900 shadow-s border-red-dark  bg-red-light"><i class="fas fa-play"></i>&nbsp;&nbsp;Start Meeting</button> --}}
                    <a href="#" id="start-meeting" data-menu="portfolio-2" class="btn btn-s rounded-s text-uppercase font-900 shadow-s border-red-dark  bg-red-light"><i class="fas fa-play"></i>&nbsp;&nbsp;Start Meeting</a>
                    

                </div>
            </div>
        </div>
    </div>

    <div class="card card-style">
        <div class="content mb-0">
            <h1>Meeting Log</h1>
            <p class="font-10 color-highlight mt-n2 mb-0">All your recent meeting displayed here.</p>
            <div id="meeting-log" class="list-group list-custom-large mb-4">
                
               <p class="text-center"><br>Your recent list is currently empty. Chat with your team and you will find all your recent meetings here.<br><br></p>

            </div>
        </div>
    </div>
</div>
    





@endsection


@section('content2')

<div id="portfolio-2" class="menu menu-box-right" data-menu-width="cover" data-menu-effect="menu-over" >
    <div id="meet_iframe" style="width: 100%;height: 100vh;z-index:9999"></div>
</div>

@endsection


@push('scripts')
<script type="text/javascript" src="{{URL::to('scripts/external_api.js')}}"></script>
@endpush