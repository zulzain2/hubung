@extends('layouts.empty')

@push('styles')

@endpush

@section('content')

    <div id='check-auth'></div>

    <div class="card mb-0" style="height:100vh">
        <div class="card-center">
            <div class="ps-5 pe-5">
                <h1 class="color-white text-center text-uppercase font-900 fa-4x">JOIN</h1>
                
                <p class="color-highlight text-center font-12 mb-3">
                    Login to get the complete tools offer by us. 
                </p>
                <label for="meetingNameJoin" class="text-uppercase font-700 font-10 text-center w-100" style="background-color:transparent !important">Room Name</label>
                <div class="input-style input-style-always-active no-borders no-icon mb-4">
                    <input type="text" id="meetingNameJoin" class="form-control text-center"  readonly>
                    
                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                    <i class="fa fa-check disabled valid color-green-dark"></i>
                    <em></em>
                </div>
              
                <a id="loginFirst" href="#" class="btn btn-3d btn-m btn-full mb-3 rounded-xs text-uppercase font-900 shadow-s border-red-dark bg-red-light">Login First</a>
                <br>

                <div class="divider-icon divider-margins bg-highlight"><i class="font-17"><strong>OR</strong></i></div>

                <div class="card card-style">
                    <div class="content">
                        <p class="text-center font-12 mb-2">
                            Join Without Login
                        </p>
                        <div class="input-style input-transparent no-borders has-icon validate-field">
                            <i class="fa fa-user"></i>
                            <input type="name" class="form-control validate-name" id="usrNameJoin" placeholder="Nick Name">
                            <label for="usrNameJoin" class="color-blue-dark font-10 mt-1">Nick Name</label>
                            <i class="fa fa-times disabled invalid color-red-dark"></i>
                            <i class="fa fa-check disabled valid color-green-dark"></i>
                            <em>(required)</em>
                        </div>
                     
                        <a href="#"
                            class="back-button btn btn-full btn-m shadow-large rounded-s text-uppercase font-900 bg-highlight">JOIN</a>
                   
                    </div>
                </div>
            </div>
        </div>
        <div class="card-overlay bg-black opacity-85"></div>
        <div class="card-overlay-infinite preload-img" data-src="{{ URL::to('images/pictures/_bg-infinite.jpg') }}"></div>
    </div>

    <div id="meetPublic"></div>

@endsection

@push('scripts')
<script>
   
</script>
@endpush
