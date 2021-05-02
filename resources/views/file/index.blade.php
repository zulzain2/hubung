
@extends('layouts.app')

@push('styles')

@endpush

@section('content')

<div class="card card-style">
    
    <div class="divider mb-0"></div>
    <div class="gallery-view-controls">
    <a href="#" class="color-highlight gallery-view-1"><i class="fa fa-th"></i></a>
    <a href="#" class="gallery-view-2"><i class="fa fa-th-large"></i></a>
    <a href="#" class="gallery-view-3"><i class="fa fa-bars"></i></a>
    <div class="clearfix"></div>
    </div>
    <div class="content my-n1">
    <div class="gallery-views gallery-view-1">
    <a data-gallery="gallery-1" href="images/pictures/10t.jpg" title="Vynil and Typerwritter">
    <img src="images/empty.png" data-src="images/pictures/10t.jpg" class="rounded-m preload-img shadow-l img-fluid" alt="img">
    <div class="caption">
    <h4 class="color-theme">Messy Desk?</h4>
    <p>Some may consider this to be a very messy desk.</p>
    <div class="divider bottom-0"></div>
    </div>
    </a>
    <a data-gallery="gallery-1" href="images/pictures/11t.jpg" title="Fruit Cookie Pie">
    <img src="images/empty.png" data-src="images/pictures/11t.jpg" class="rounded-m preload-img shadow-l img-fluid" alt="img">
    <div class="caption">
    <h4 class="color-theme">Designers Desk</h4>
    <p>With all the gadgets you'd ever wish for.</p>
    <div class="divider bottom-0"></div>
    </div>
    </a>
    <a data-gallery="gallery-1" href="images/pictures/28t.jpg" title="Plain Cookies and Flour">
    <img src="images/empty.png" data-src="images/pictures/28t.jpg" class="rounded-m preload-img shadow-l img-fluid" alt="img">
    <div class="caption">
    <h4 class="color-theme">Apple Watch</h4>
    <p>The perfect and small notification device.</p>
    <div class="divider bottom-0"></div>
    </div>
    </a>
    <a data-gallery="gallery-1" href="images/pictures/18t.jpg" title="Pots and Stuff">
    <img src="images/empty.png" data-src="images/pictures/18t.jpg" class="rounded-m preload-img shadow-l img-fluid" alt="img">
    <div class="caption">
    <h4 class="color-theme">City Landscape</h4>
    <p>It's absolutely gorgeous, we'd love to see it live.</p>
    <div class="divider bottom-0"></div>
    </div>
    </a>
    <a data-gallery="gallery-1" href="images/pictures/14t.jpg" title="Delicious Strawberries">
    <img src="images/empty.png" data-src="images/pictures/14t.jpg" class="rounded-m preload-img shadow-l img-fluid" alt="img">
    <div class="caption">
    <h4 class="color-theme">Typography and iPhone 5</h4>
    <p>A beautifully captured snap with great contrast.</p>
    <div class="divider bottom-0"></div>
    </div>
    </a>
    <a data-gallery="gallery-1" href="images/pictures/15t.jpg" title="A Beautiful Camera">
    <img src="images/empty.png" data-src="images/pictures/15t.jpg" class="rounded-m preload-img shadow-l img-fluid" alt="img">
    <div class="caption">
    <h4 class=" color-theme">Feather and Paper?</h4>
    <p>Going back to days when things were simplere.</p>
    </div>
    </a>
    </div>
    </div>
    </div>



    

    @endsection

    @section('content2')

 
    <a href="#" data-menu="menu-upload" class="btn btn-3d btn-m mb-3 rounded-xl text-uppercase font-900 shadow-s border-highlight  bg-highlight" style="
        position: fixed; 
        width: 50px; 
        height: 50px; 
        bottom: 60px; 
        right: 20px; 
        background-color: rgb(0, 204, 153); 
        color: rgb(255, 255, 255); 
        border-radius: 50px; text-align: 
        center; box-shadow: rgb(153, 153, 153) 2px 2px 3px;">

        <i class="fas fa-plus" style="
            margin-top: 5px;
            margin-left: -1.5px;
            font-size: 18px;
            text-align: center;"></i>
    </a>


    <div id="menu-upload" class="menu menu-box-bottom menu-box-detached rounded-m" data-menu-height="255" data-menu-effect="menu-parallax">
        <div class="menu-title text-center mt-4">
            <h4>Create New</h4>
        </div>
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
        </div>
        </div>

    @endsection