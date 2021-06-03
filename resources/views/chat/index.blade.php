@extends('layouts.app')

@section('content')

<style>
  .page-content{
    height: 100vh;
  }
</style>

<div id="chat"></div>

<div class="row h-100 mb-0">
  <div class="col-xl-4 col-lg-4 col-sm-12 h-100">
    <div class="row h-100 mb-0">
      <div class="col-12 h-100">

            {{-- <div class="search-page">
                <div class="search-box search-header bg-theme card-style me-3 ms-3 mb-0">
                    <i class="fa fa-search"></i>
                    <input type="text" class="border-0" placeholder="What are you looking for? " data-search="">
                    <input type="text" class="border-0" placeholder="What are you looking for? ">
                    <a href="#" class="disabled"><i class="fa fa-times-circle color-red-dark"></i></a>
                </div>
            </div>  --}}

            <div class="card card-style h-100 mb-0">
            
                        <div class="content my-2">

                            <div id="chat-preview" class="list-group list-custom-large"></div>

                        </div>
               


                    <a href="/contact"
                        class="btn px-0 mb-3 rounded-xl text-uppercase font-900 shadow-s border-highlight  bg-highlight" style="
                            position: fixed; 
                            width: 50px; 
                            height: 50px; 
                            bottom: 0px; 
                            right: 10px; 
                            border-radius: 50px; 
                            writing-mode: vertical-rl;">

                        <table style="width:100%;height:100%;background-color: #1b1d2100!important;border:none">
                            <tr>
                                <td style="text-align:center;vertical-align:middle;background-color: #1b1d2100!important;border:none">
                                    <i class="fas fa-user-plus" style="font-size: 18px;text-align: center;"></i>
                                </td>
                            </tr>
                        </table>

                    </a>
            </div>

            
        </div>
    </div>
  </div>

  <div class="col-xl-8 col-lg-8 col-sm-12 d-none d-xl-block d-lg-block h-100">
    <div class="row mb-0" style="height: calc(100% - 60px);">
      <div class="col-12 h-100" style="overflow-y: scroll;">

        <div id="chat-content" class="content"></div>

      </div>
    </div>
    <div class="chat-send row mb-0" style="height:60px;display:none">
      <div class="col-12 h-100">
        <div  class="d-flex" style="">
            <div class="me-3 speach-icon text-center">
            <a href="#" data-menu="menu-upload" class="bg-gray-dark ms-2"><i class="fa fa-plus pt-2"></i></a>
            </div>
            <div class="flex-fill speach-input">
            <input type="text" class="form-control" placeholder="Enter your Message here">
            </div>
            <div class="ms-3 speach-icon text-center me-2">
            <a href="#" class="bg-highlight me-2"><i class="fas fa-feather-alt pt-2"></i></a>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

 
@endsection


@section('content2')

    <div id="menu-upload" class="col-lg-6 offset-lg-3 menu menu-box-bottom menu-box-detached rounded-m" data-menu-height="255" data-menu-effect="menu-over">
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