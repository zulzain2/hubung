@extends('layouts.app')

@push('styles')

@endpush

@section('content')
    <div class="row">
        <div class="col-xl-8 offset-xl-2 col-lg-12 col-sm-12">

            <div id="meeting-index">

                <div class="card card-style bg-theme pb-0">
                    <div class="content" id="tab-group-1">
                        <div class="tab-controls tabs-small tabs-rounded" data-highlight="bg-highlight">
                            <a href="#" id="meeting-tab-1" data-active="" data-bs-toggle="collapse" data-bs-target="#tab-1"
                                class="bg-highlight no-click" aria-expanded="true"><i
                                    class="far fa-plus-square"></i>&nbsp;&nbsp;
                                Create</a>
                            <a href="#" id="meeting-tab-2" data-bs-toggle="collapse" data-bs-target="#tab-2"
                                aria-expanded="false" class="collapsed"><i class="fas fa-person-booth"></i>&nbsp;&nbsp;
                                Join</a>
                            <a href="#" id="meeting-tab-3" data-bs-toggle="collapse" data-bs-target="#tab-3"
                                aria-expanded="false" class="collapsed"><i class="far fa-calendar-alt"></i>&nbsp;&nbsp;
                                Schedule</a>
                        </div>



                        <div class="clearfix mb-3"></div>
                        <div data-bs-parent="#tab-group-1" class="collapse show" id="tab-1" style="">
                            <form class="needs-validation" id="createMeetingForm" novalidate>
                                <h3 class="text-center"> Create Meeting</h3>
                                <p></p>

                                <div class="input-style input-style-always-active has-borders has-icon mb-4">
                                    <i class="fas fa-home color-highlight"></i>
                                    <input id="meetingName" type="name" class="form-control"
                                        placeholder="Enter meeting name" required>
                                    <label class="color-theme opacity-50 text-uppercase font-700 font-10">Meeting
                                        Name</label>
                                    <em>(required)</em>
                                </div>
                                {{-- <div class="input-style input-style-always-active has-borders has-icon validate-field mb-4">
                                <i class="fa fa-user color-blue-dark"></i> --}}
                                <input id="usrName" type="hidden" class="form-control validate-name usrName"
                                    placeholder="Enter display name">
                                {{-- <label class="color-theme opacity-50 text-uppercase font-700 font-10">Nick Name</label>
                                <i class="fa fa-times disabled invalid color-red-dark"></i>
                                <i class="fa fa-check disabled valid color-green-dark"></i>
                                <em>(required)</em>
                            </div> --}}

                                <div class="d-flex no-effect collapsed" data-trigger-switch="toggle-id"
                                    data-bs-toggle="collapse" href="#collapseExample4" role="button" aria-expanded="false"
                                    aria-controls="collapseExample4">
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

                                <div id="password_meeting"
                                    class="input-style input-style-always-active has-borders has-icon mb-4"
                                    style="display:none">
                                    <i class="fas fa-key color-highlight"></i>
                                    <input type="name" class="form-control" placeholder="Enter room password">
                                    <label class="color-theme opacity-50 text-uppercase font-700 font-10">Password</label>
                                    <em>(optional)</em>
                                </div>

                                <div class="row">
                                    <div class="col-12 text-center">
                                        {{-- <button type="submit">submit</button> --}}
                                        {{-- <button id="start-meeting" type="button" class="btn btn-s rounded-s text-uppercase font-900 shadow-s border-red-dark  bg-red-light"><i class="fas fa-play"></i>&nbsp;&nbsp;Start Meeting</button> --}}
                                        <a href="#" id="start-meeting"
                                            class="btn btn-s rounded-s text-uppercase font-900 shadow-s border-highlight bg-highlight"><i
                                                class="fas fa-play"></i>&nbsp;&nbsp;Start Meeting</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div data-bs-parent="#tab-group-1" class="collapse" id="tab-2" style="">
                            <h3 class="text-center"> Join Meeting</h3>
                            <p></p>

                            <form class="needs-validation" novalidate id="joinMeetingForm">
                                <div class="input-style input-style-always-active has-borders has-icon validate-field mb-4">
                                    <i class="fas fa-home color-highlight"></i>
                                    <input id="meetingNameJoin" type="name" class="form-control validate-name"
                                        placeholder="Enter meeting name" required>
                                    <label class="color-theme opacity-50 text-uppercase font-700 font-10">Meeting
                                        Name</label>
                                    <em>(required)</em>
                                </div>

                                {{-- <div class="input-style input-style-always-active has-borders has-icon validate-field mb-4">
                            <i class="fa fa-user color-blue-dark"></i> --}}
                                <input id="usrNameJoin" type="hidden" class="form-control validate-name usrName"
                                    placeholder="Enter display name" value="">
                                {{-- <label class="color-theme opacity-50 text-uppercase font-700 font-10">Nick Name</label>
                            <i class="fa fa-times disabled invalid color-red-dark"></i>
                            <i class="fa fa-check disabled valid color-green-dark"></i>
                            <em>(required)</em>
                        </div> --}}

                                <div class="row">
                                    <div class="col-12 text-center">
                                        <a href="#" id="join-meeting"
                                            class="btn btn-s rounded-s text-uppercase font-900 shadow-s border-highlight bg-highlight"><i
                                                class="fas fa-play"></i>&nbsp;&nbsp;Join Meeting</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div data-bs-parent="#tab-group-1" class="collapse" id="tab-3" style="">

                            <h3 class="text-center"> Schedule Meeting</h3>
                            <p></p>

                            <form class="needs-validation" novalidate id="scheduleMeetingForm">
                                <div class="input-style input-style-always-active has-borders has-icon mb-4">
                                    <i class="fas fa-home color-highlight"></i>
                                    <input id="meetingNameSchedule" type="name" class="form-control"
                                        placeholder="Enter meeting name" required>
                                    <label class="color-theme opacity-50 text-uppercase font-700 font-10">Meeting
                                        Name</label>
                                    <em>(required)</em>
                                </div>

                                <div class="input-style input-style-always-active has-borders has-icon mb-4">
                                    <i class="far fa-calendar-alt color-highlight"></i>
                                    <input id="meetingDateSchedule" type="date" class="form-control" required>
                                    <label class="color-theme opacity-50 text-uppercase font-700 font-10">Date</label>
                                    <em>(required)</em>
                                </div>

                                <div class="input-style input-style-always-active has-borders has-icon mb-4">
                                    <i class="far fa-clock color-highlight"></i>
                                    <input id="meetingStartSchedule" type="time" class="form-control" required>
                                    <label class="color-theme opacity-50 text-uppercase font-700 font-10">Start</label>
                                    <em>(required)</em>
                                </div>

                                <div class="input-style input-style-always-active has-borders has-icon mb-4">
                                    <i class="far fa-clock color-highlight"></i>
                                    <input id="meetingEndSchedule" type="time" class="form-control" required>
                                    <label class="color-theme opacity-50 text-uppercase font-700 font-10">End</label>
                                    <em>(required)</em>
                                </div>

                                <div class="d-flex no-effect collapsed" data-trigger-switch="toggle-id-schedule"
                                    data-bs-toggle="collapse" href="#collapseExample4" role="button" aria-expanded="false"
                                    aria-controls="collapseExample4">
                                    <div class="pt-1">
                                        <h5 class="font-600">Password Protected</h5>
                                    </div>
                                    <div class="ms-auto me-4 pe-2">
                                        <div class="custom-control android-switch">
                                            <input type="checkbox" class="android-input" id="toggle-id-schedule">
                                            <label class="custom-control-label" for="toggle-id-schedule"></label>
                                        </div>
                                    </div>
                                </div>

                                <div id="password_meeting_schedule"
                                    class="input-style input-style-always-active has-borders has-icon mb-4"
                                    style="display:none">
                                    <i class="fas fa-key color-highlight"></i>
                                    <input type="name" class="form-control" placeholder="Enter room password">
                                    <label class="color-theme opacity-50 text-uppercase font-700 font-10">Password</label>
                                    <em>(optional)</em>
                                </div>

                                <div class="row">
                                    <div class="col-12 text-center">
                                        <a href="#" id="schedule-meeting"
                                            class="btn btn-s rounded-s text-uppercase font-900 shadow-s border-highlight bg-highlight"><i
                                                class="fas fa-play"></i>&nbsp;&nbsp;Schedule Meeting</a>
                                    </div>
                                </div>
                            </form>

                        </div>


                    </div>
                </div>


                <div class="card card-style bg-theme pb-0">
                    <div class="content" id="tab-group-2">
                        <div class="tab-controls tabs-small tabs-rounded" data-highlight="bg-highlight">
                            <a href="#" id="meeting-schedule" data-active="" data-bs-toggle="collapse"
                                data-bs-target="#schedule" class="bg-highlight no-click" aria-expanded="true"><i
                                    class="far fa-calendar-alt"></i>&nbsp;&nbsp;
                                Schedule</a>
                            <a href="#" id="meeting-log" data-bs-toggle="collapse" data-bs-target="#log"
                                aria-expanded="false" class="collapsed"><i class="fas fa-stream"></i> &nbsp;&nbsp; Log</a>
                        </div>
                        <div data-bs-parent="#tab-group-2" class="collapse show" id="schedule" style="">

                            <div id="schedule-log" class="">
                                <div class="content mb-0">
                                    <h1>Meeting Schedule</h1>
                                    <p class="font-10 color-highlight mt-n2 mb-0">All your upcoming meeting displayed here.
                                    </p>
                                    <span class="cal-message mt-3 mb-3">
                                        <i class="fa fa-bell font-18 color-green-dark"></i>
                                        <strong class="color-gray-dark ps-0">All scheduled meeting comes with
                                            reminder.</strong>
                                        <strong class="color-gray-dark ps-0">On start of meeting, notification will be
                                            sent.</strong>
                                    </span>
                                    <div class="divider mb-3"></div>
                                    <div id="schedule-log-list">

                                        <br>

                                        <div class="d-flex justify-content-center">
                                            <div class="spinner-border color-highlight text-center" role="status">
                                                <span class="sr-only">Loading...</span>
                                            </div>
                                        </div>

                                        <br>
                                        {{-- <div class="cal-schedule">
                                    <em>08:00 PM<br>10:00 AM</em>
                                    <strong>Closing Hours</strong>
                                    <span><i class="fa fa-map-marker"></i>Envato Headquarters</span>
                                </div>
                                <div class="cal-schedule">
                                    <em>10:00 AM<br>12:00 AM</em>
                                    <strong>Meeting with Board</strong>
                                    <span><i class="fa fa-building"></i>Office, Envato Headquarters</span>
                                </div>
                                <div class="cal-schedule">
                                    <em>12:00 AM<br>02:00 PM</em>
                                    <strong>Lunch</strong>
                                    <span><i class="fa fa-shopping-bag"></i>McDonalds, Town Hall</span>
                                </div>
                                <div class="cal-schedule">
                                    <em>02:00 PM<br>05:00 PM</em>
                                    <strong>Quarter Report</strong>
                                    <span><i class="fa fa-building"></i>Office, Envato Headquarters</span>
                                </div>
                                <div class="cal-schedule">
                                    <em>05:00 PM<br>07:00 PM</em>
                                    <strong>Get Wife from Work</strong>
                                    <span><i class="fa fa-car"></i>Wife's Work Headquarters</span>
                                </div>
                                <div class="cal-schedule">
                                    <em>07:00 PM<br>09:00 PM</em>
                                    <strong>Watch Movie</strong>
                                    <span><i class="fa fa-at"></i>with <u class="color-green-dark">John Doe</u>, <u
                                            class="color-orange-dark">Carla Black</u></span>
                                </div>
                                <div class="cal-schedule">
                                    <em>09:00 PM<br>10:00 PM</em>
                                    <strong>Call David</strong>
                                    <span><i class="fa fa-phone"></i>Call David's Office Number</span>
                                </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div data-bs-parent="#tab-group-2" class="collapse" id="log" style="">
                            <div id="meeting-log" class="">
                                <div class="content mb-0">
                                    <h1>Meeting Log</h1>
                                    <p class="font-10 color-highlight mt-n2 mb-0">All your recent meeting displayed here.
                                    </p>
                                    <div id="meeting-log-list" class="list-group list-custom-large mb-4">

                                        <br>

                                        <div class="d-flex justify-content-center">
                                            <div class="spinner-border color-highlight text-center" role="status">
                                                <span class="sr-only">Loading...</span>
                                            </div>
                                        </div>

                                        <br>


                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </div>

@endsection


@section('content2')

    <div id="toast-1" class="toast toast-tiny toast-top bg-blue-dark fade hide text-center" data-bs-delay="1000"
        data-autohide="true" style="z-index:9999"><i class="far fa-copy"></i>&nbsp;&nbsp;Copied</div>

    <div id="toast-2" class="toast toast-tiny toast-top bg-red-dark fade hide text-center" data-bs-delay="1000"
        data-autohide="true" style="z-index:9999"><i class="fa fa-times me-3"></i>&nbsp;&nbsp;Copied Error</div>

    <div id="portfolio-2" class="menu menu-box-right" data-menu-width="cover" data-menu-effect="menu-over" style="overflow:hidden">
        <div id="meet_iframe" style="width: 100%;height: 95vh;z-index:999"></div>

        <div class="row" style="height:5vh">
            <div class="col-lg-12">
               
                    <table style="border:none;height:100%;width: 100%;background-color: transparent !important;">
                        <tr>
                            <td style="border:none;vertical-align:middle;background-color: transparent !important;"> <a href="#" id="inviteBtn" class="btn btn-xs btn-full rounded-xs text-uppercase font-900 shadow-s bg-dark-light" style="height:100%">Invite</a></td>
                        </tr>
                    </table>
                
            </div>
        </div>
        

    </div>


    <div id="menu-meeting-invitation" class="menu menu-box-bottom menu-box-detached rounded-m" data-menu-height="320"
        style="display: block; height: 405px;">
        <div class="menu-title">
            <h1>Invite More People</h1>
            <p class="color-theme opacity-50">Share the meeting link to invite others</p>
            <a href="#" class="close-menu-meeting-invitation"><i class="fa fa-times"></i></a>
        </div>
        <div class="divider divider-margins mb-1 mt-3"></div>
        <div class="content">
            <div class="row mb-0">
                <div class="col-2">
                    <span class="icon icon-xl rounded-xl bg-gray-dark"><i class="fas fa-video font-30"></i></span>
                </div>
                <div class="col-10 ps-4">
                    <div class="d-flex">
                        <div>
                            <p class="font-700 color-theme ps-2">Meeting Name</p>
                        </div>
                        <div class="ms-auto">
                            <p id="invite-meeting-name"></p>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div>
                            <p class="font-700 color-theme ps-2">Invitor</p>
                        </div>
                        <div class="ms-auto">
                            <p id="invite-invitor"></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="divider mt-3 mb-3"></div>
            <div class="row mb-0">
                <div class="col-3">
                    <h4 class="font-14">Share Link</h4>
                </div>
                <div class="col-8">
                    <h4 id="invite-link" class="font-14 text-end"></h4>
                </div>
                <div class="col-1">
                    <!-- Trigger -->
                    <a href="#" class="copy-btn" data-clipboard-target="#invite-link">
                        <i class="far fa-copy"></i>
                    </a>

                </div>
                <div class="divider divider-margins w-100 mt-2 mb-2"></div>
                <div class="col-6">
                    <h4 class="font-14 mt-1">Share Invitation</h4>
                </div>
                <div class="col-6">
                    <h4 class="font-14 text-end mt-1">
                        <i class="far fa-copy"></i>&nbsp;
                        <i class="far fa-envelope"></i>&nbsp;
                        <i class="fab fa-google"></i>&nbsp;
                        <i class="fab fa-windows"></i>&nbsp;
                        <i class="fab fa-yahoo"></i>&nbsp;

                    </h4>
                </div>
                <div class="divider divider-margins w-100 mt-2 mb-2"></div>
            </div>
        </div>
    </div>

    <div id="menu-meeting-schedule-config" class="menu menu-box-bottom menu-box-detached" style="display: block;">
        <div class="menu-title mt-n1 text-center">
            <h3 class="mt-3">Options</h3>
        </div>
        <div class="content mb-0 mt-0">
            <div class="list-group list-custom-small list-icon-0">
                <a href="#"
                    class="shareToFacebook external-link">
                    <i class="font-18 fas fa-edit color-yellow-light"></i>
                    <span class="font-13">Edit</span>
                    <i class="fa fa-angle-right"></i>
                </a>
                <a href="#" data-menu="menu-meeting-share" class="menu-meeting-share shareToTwitter external-link">
                    <i class="font-18 fa fa-share-alt color-mail"></i>
                    <span class="font-13">Share</span>
                    <i class="fa fa-angle-right"></i>
                </a>
                <a href="#"
                    class="shareToLinkedIn external-link">
                    <i class="font-18 far fa-trash-alt color-red-dark"></i>
                    <span class="font-13">Delete</span>
                    <i class="fa fa-angle-right"></i>
                </a>
            </div>
        </div>
    </div>

    <div id="menu-meeting-share" class="menu menu-box-top menu-box-detached" style="display: block;">
        <div class="menu-title mt-n1">
            <h1>Share the invitation</h1>
            <p class="color-highlight">Just Tap the Social Icon. We'll add the invitation template</p><a href="#" class="close-menu"><i
                    class="fa fa-times"></i></a>
        </div>
        <div class="content mb-0">
            <div class="divider mb-0"></div>
            <div class="list-group list-custom-small list-icon-0">
                <a href="#"
                    class="shareToFacebook external-link">
                    <i class="font-18 far fa-copy color-twitter"></i>
                    <span class="font-13">Copy Meeting Invitation</span>
                    <i class="fa fa-angle-right"></i>
                </a>
                <a href="#" class="shareToTwitter external-link">
                    <i class="font-18 far fa-envelope color-brown-dark"></i>
                    <span class="font-13">Your Default Email</span>
                    <i class="fa fa-angle-right"></i>
                </a>
                <a href="#"
                    class="shareToLinkedIn external-link">
                    <i class="font-18 fab fa-google color-google"></i>
                    <span class="font-13">Google Email</span>
                    <i class="fa fa-angle-right"></i>
                </a>
                <a href="#">
                    <i class="font-18 fab fa-microsoft color-teal-dark"></i>
                    <span class="font-13">Outlook Email</span>
                    <i class="fa fa-angle-right"></i>
                </a>
                <a href="#" class="shareToMail external-link border-0">
                    <i class="font-18 fab fa-yahoo color-magenta-dark"></i>
                    <span class="font-13">Yahoo Email</span>
                    <i class="fa fa-angle-right"></i>
                </a>
            </div>
        </div>
    </div>

@endsection
