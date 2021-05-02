
@extends('layouts.app')

@push('styles')

@endpush

@section('content')

<div class="card card-style">
    <div class="content">
    <h4 class="mb-0">Select your View</h4>
    <p>
    Each view can support multiple design elements inside it.
    </p>
    </div>
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