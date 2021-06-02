@extends('layouts.app')

@section('content')

<div id="chat"></div>

<div class="header header-fixed header-logo-center">
    <a id="chat-show-name" href="index.html" class="header-title"></a>
    <a href="#" data-back-button="" class="header-icon header-icon-1"><i class="fas fa-arrow-left"></i></a>
    <a href="#" data-toggle-theme="" class="header-icon header-icon-4"><i class="fas fa-ellipsis-v"></i></a>
</div>

<div id="chat-content" class="content mt-5">
   
</div>
@endsection
    
@section('content2')
    <div id="footer-bar" class="d-flex">
        <div class="me-3 speach-icon">
        <a href="#" data-menu="menu-upload" class="bg-gray-dark ms-2"><i class="fa fa-plus pt-2"></i></a>
        </div>
        <div class="flex-fill speach-input">
        <input type="text" class="form-control" placeholder="Enter your Message here">
        </div>
        <div class="ms-3 speach-icon">
        <a href="#" class="bg-blue-dark me-2"><i class="fa fa-arrow-up pt-2"></i></a>
        </div>
    </div>

    <div id="menu-upload" class="menu menu-box-bottom menu-box-detached rounded-m" data-menu-height="255" data-menu-effect="menu-over">
        <div class="list-group list-custom-small ps-2 me-4">
        <a href="#">
            <i class="font-14 fa fa-file color-gray-dark"></i>
            <span class="font-13">File</span>
            <i class="fa fa-angle-right"></i>
        </a>
        <a href="#">
            <i class="font-14 fa fa-image color-gray-dark"></i>
            <span class="font-13">Photo</span>
            <i class="fa fa-angle-right"></i>
        </a>
        <a href="#">
            <i class="font-14 fa fa-video color-gray-dark"></i>
            <span class="font-13">Video</span>
            <i class="fa fa-angle-right"></i>
        </a>
        <a href="#">
            <i class="font-14 fa fa-user color-gray-dark"></i>
            <span class="font-13">Camera</span>
            <i class="fa fa-angle-right"></i>
        </a>
        <a href="#">
            <i class="font-14 fa fa-map-marker color-gray-dark"></i>
            <span class="font-13">Location</span>
            <i class="fa fa-angle-right"></i>
        </a>
        </div>
    </div>
@endsection
