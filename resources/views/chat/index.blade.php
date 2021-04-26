
@extends('layouts.app')

@push('styles')

@endpush

@section('content')


    <div class="search-page">
        <div class="search-box search-header bg-theme card-style me-3 ms-3">
            <i class="fa fa-search"></i>
            <input type="text" class="border-0" placeholder="What are you looking for? " data-search="">
            <a href="#" class="disabled"><i class="fa fa-times-circle color-red-dark"></i></a>
        </div>
    </div>
    
    <div class="card card-style">
        <div class="content my-2">
            <div class="list-group list-custom-large">
            <a href="{{URL::to('chat/13')}}">
                <img src="images/pictures/1s.jpg" style="width:40px !important;margin-right: 15px;" class="preload-img img-fluid rounded-circle">
    
                <span>UTM HSSE</span>
                <strong>A powerful Mobile Template</strong>
                <span class="badge bg-dark-light mt-2">12:15 PM</span>
                <span class="badge bg-red-dark"><small>1</small></span>
            </a>
            <a href="#">
                <img src="images/pictures/1s.jpg" style="width:40px !important;margin-right: 15px;" class="preload-img img-fluid rounded-circle">
    
                <span>UTM HSSE</span>
                <strong>A powerful Mobile Template</strong>
                <span class="badge bg-dark-light mt-2">12:15 PM</span>
                <span class="badge bg-red-dark"><small>1</small></span>
            </a>
            <a href="#">
                <img src="images/pictures/1s.jpg" style="width:40px !important;margin-right: 15px;" class="preload-img img-fluid rounded-circle">
    
                <span>UTM HSSE</span>
                <strong>A powerful Mobile Template</strong>
                <span class="badge bg-dark-light mt-2">12:15 PM</span>
                <span class="badge bg-red-dark"><small>1</small></span>
            </a>
            </div>
        </div>
    </div>




@endsection

@push('scripts')

<script>

</script>

@endpush