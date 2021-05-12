@extends('layouts.app')

@push('styles')

@endpush

@section('content')


<style>
    .header-clear-medium{
    margin-top: 8vh !important;
    margin-bottom: 8vh !important;
    height: 84vh;
    padding-top: 0px !important;
    padding-bottom: 0px !important;
    }
</style>

  <div class="row" style="height: 100%;margin-bottom: 0px;">
      <div class="col-md-4 col-lg-4 col-sm-12">

            <div class="search-page" style="height: 9%;">
                <div class="search-box search-header bg-theme card-style me-3 ms-3 mb-0">
                    <i class="fa fa-search"></i>
                    {{-- <input type="text" class="border-0" placeholder="What are you looking for? " data-search=""> --}}
                    <input type="text" class="border-0" placeholder="What are you looking for? ">
                    <a href="#" class="disabled"><i class="fa fa-times-circle color-red-dark"></i></a>
                </div>
            </div>

          <div class="card card-style ms-3" style="height: 89%;">

            
                {{-- <div class="ph-item ph-no-space ph-no-border pt-2"> --}}
    <div class="content my-2">
        <div class="list-group list-custom-large">



            <a href="chat/13">


                {{-- <div class="row mt-3 mb-3">
                <div class="col-3">
                    <div class="ph-col-12">
                        <div class="ph-avatar" style="width:50px;min-width:50px"></div>
                    </div>
                </div>
                <div class="col-9">
                    <div class="ph-row">
                        <div class="ph-col-10"></div>
                        <div class="ph-col-2 empty"></div>
                        <div class="ph-col-12"></div>
                        <div class="ph-col-6"></div>
                        <div class="ph-col-6 empty"></div>
                    </div>
                </div>
            </div> --}}



                <img src="images/pictures/1s.jpg" style="width:40px !important;margin-right: 15px;"
                    class="preload-img img-fluid rounded-circle">

                <span>Kamil</span>
                <strong>A powerful Mobile Template</strong>
                <span class="badge bg-dark-light mt-2">12:15 PM</span>
                <span class="badge rounded-pill bg-fade-red-light color-red-dark">06</span>
            </a>
            <a href="#">

                {{-- <div class="row mt-3 mb-3">
            <div class="col-3">
                <div class="ph-col-12">
                    <div class="ph-avatar" style="width:50px;min-width:50px"></div>
                </div>
            </div>
            <div class="col-9">
                <div class="ph-row">
                    <div class="ph-col-10"></div>
                    <div class="ph-col-2 empty"></div>
                    <div class="ph-col-12"></div>
                    <div class="ph-col-6"></div>
                    <div class="ph-col-6 empty"></div>
                </div>
            </div>
        </div> --}}

                <img src="images/pictures/2s.jpg" style="width:40px !important;margin-right: 15px;"
                    class="preload-img img-fluid rounded-circle">

                <span>Sara</span>
                <strong>A powerful Mobile Template</strong>
                <span class="badge bg-dark-light mt-2">12:15 PM</span>
                <span class="badge rounded-pill bg-fade-red-light color-red-dark">06</span>
            </a>
            <a href="#">

                {{-- <div class="row mt-3 mb-3">
            <div class="col-3">
                <div class="ph-col-12">
                    <div class="ph-avatar" style="width:50px;min-width:50px"></div>
                </div>
            </div>
            <div class="col-9">
                <div class="ph-row">
                    <div class="ph-col-10"></div>
                    <div class="ph-col-2 empty"></div>
                    <div class="ph-col-12"></div>
                    <div class="ph-col-6"></div>
                    <div class="ph-col-6 empty"></div>
                </div>
            </div>
        </div> --}}

                <img src="images/pictures/3s.jpg" style="width:40px !important;margin-right: 15px;"
                    class="preload-img img-fluid rounded-circle">

                <span>Fuad</span>
                <strong>A powerful Mobile Template</strong>
                <span class="badge bg-dark-light mt-2">12:15 PM</span>
                
            </a>
            <a href="#">

                {{-- <div class="row mt-3 mb-3">
            <div class="col-3">
                <div class="ph-col-12">
                    <div class="ph-avatar" style="width:50px;min-width:50px"></div>
                </div>
            </div>
            <div class="col-9">
                <div class="ph-row">
                    <div class="ph-col-10"></div>
                    <div class="ph-col-2 empty"></div>
                    <div class="ph-col-12"></div>
                    <div class="ph-col-6"></div>
                    <div class="ph-col-6 empty"></div>
                </div>
            </div>
        </div> --}}

                <img src="images/pictures/4s.jpg" style="width:40px !important;margin-right: 15px;"
                    class="preload-img img-fluid rounded-circle">

                <span>Nabila</span>
                <strong>A powerful Mobile Template</strong>
                <span class="badge bg-dark-light mt-2">12:15 PM</span>
                <span class="badge rounded-pill bg-fade-red-light color-red-dark">06</span>
            </a>
            <a href="#">

                {{-- <div class="row mt-3 mb-3">
            <div class="col-3">
                <div class="ph-col-12">
                    <div class="ph-avatar" style="width:50px;min-width:50px"></div>
                </div>
            </div>
            <div class="col-9">
                <div class="ph-row">
                    <div class="ph-col-10"></div>
                    <div class="ph-col-2 empty"></div>
                    <div class="ph-col-12"></div>
                    <div class="ph-col-6"></div>
                    <div class="ph-col-6 empty"></div>
                </div>
            </div>
        </div> --}}

                <img src="images/pictures/5s.jpg" style="width:40px !important;margin-right: 15px;"
                    class="preload-img img-fluid rounded-circle">

                <span>Intan</span>
                <strong>A powerful Mobile Template</strong>
                <span class="badge bg-dark-light mt-2">12:15 PM</span>
               
            </a>
            <a href="#" style="border-bottom: none;">

                {{-- <div class="row mt-3 mb-3">
            <div class="col-3">
                <div class="ph-col-12">
                    <div class="ph-avatar" style="width:50px;min-width:50px"></div>
                </div>
            </div>
            <div class="col-9">
                <div class="ph-row">
                    <div class="ph-col-10"></div>
                    <div class="ph-col-2 empty"></div>
                    <div class="ph-col-12"></div>
                    <div class="ph-col-6"></div>
                    <div class="ph-col-6 empty"></div>
                </div>
            </div>
        </div> --}}

                <img src="images/pictures/6s.jpg" style="width:40px !important;margin-right: 15px;"
                    class="preload-img img-fluid rounded-circle">

                <span>Hafiz</span>
                <strong>A powerful Mobile Template</strong>
                <span class="badge bg-dark-light mt-2">12:15 PM</span>
                
            </a>
        </div>
    </div>
{{-- </div> --}}
          </div>
      </div>
    <div class="col-md-8 col-lg-8 col-sm-12 d-none d-lg-block" style="height:90%;overflow: scroll;">

        <div class="content">
            <div class="speech-bubble speech-right color-black">
                These are chat bubbles, right? They look awesome don't they?
            </div>
            <div class="clearfix"></div>
            <div class="speech-bubble speech-left bg-highlight">
                Yeap!
            </div>
            <div class="clearfix"></div>
            <div class="speech-bubble speech-left bg-highlight">
                They also expand to a certain point, just like the ones that Mobile Chat apps have!
            </div>
            <div class="clearfix"></div>
            <div class="speech-bubble speech-right color-black">
                Awesome! Images too?
            </div>
            <div class="clearfix"></div>
            <p class="text-center mb-0 font-11">Yesterday, 1:45 AM</p>
            <div class="speech-bubble speach-image speech-left bg-highlight">
                <img class="img-fluid preload-img" src="images/empty.png" data-src="images/pictures/8w.jpg" alt="img">
            </div>
            <div class="clearfix"></div>
            <div class="speech-bubble speech-left bg-highlight">
                Images can be used here as well, very easy! Just add an image tag!
            </div>
            <div class="clearfix"></div>
            <div class="speech-bubble speech-right color-black">
                WOW! Videos?!
            </div>
            <div class="clearfix"></div>
            <div class="speech-bubble speech-right color-black">
                Can I Embed videos or wait, actually, can I add maps?
            </div>
            <div class="clearfix"></div>
            <div class="speech-bubble speach-image speech-left">
                <iframe class="w-100" src='https://www.youtube.com/watch?v=mnwj6KxAvFc' frameborder='0' allowfullscreen=""></iframe>
            </div>
            <div class="clearfix"></div>
            <div class="speech-bubble speech-left bg-highlight">
                Yep! Just embed your stuff here. It's super simple. You just copy the embed code in this place.
            </div>
            <div class="clearfix"></div>
                <p class="text-center mb-0 font-11">25 Minutes Ago</p>
            <div class="speech-bubble speech-right color-black">
                Is this an actual chat system? Can i send messages already?
            </div>
            <div class="clearfix"></div>
            <div class="speech-bubble speech-last speech-left bg-highlight">
                It's just a chat template, but it's ready and able to be coded into a full chat system. Great huh?
            </div>
            <div class="clearfix"></div>
            <em class="speech-read mb-3">Delivered & Read - 07:18 PM</em>
        </div>

        <div  class="d-flex" style="position: absolute;bottom: 10px;width: inherit;">
            <div class="me-3 speach-icon text-center">
            <a href="#" data-menu="menu-upload" class="bg-gray-dark ms-2"><i class="fa fa-plus pt-2"></i></a>
            </div>
            <div class="flex-fill speach-input">
            <input type="text" class="form-control" placeholder="Enter your Message here">
            </div>
            <div class="ms-3 speach-icon text-center me-2">
            <a href="#" class="bg-highlight me-2"><i class="fa fa-arrow-up pt-2"></i></a>
            </div>
        </div>

    </div>
  </div>

@endsection


@section('content2')

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