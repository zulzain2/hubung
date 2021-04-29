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
                        <h4 class="font-700 text-uppercase font-12 opacity-50 mt-n2">Chat</h4>

                        <div class="ph-item ph-no-space ph-no-border">
                            <div class="ph-col-12">
                                <div class="ph-row">
                                    <div class="ph-col-2 big"></div>
                                    <div class="ph-col-2 empty"></div>
                                    <div class="ph-col-8 big"></div>
                                </div>
                            </div>
                        </div>

                        {{-- <h1 class="font-700 font-34 color-red-dark  mb-0">3 <small class="font-14">Unread</small></h1> --}}

                    </div>
                </div>
            </div>

            <div class="col-4 ps-2 pe-2">
                <div class="card card-style mx-0 mb-3">
                    <div class="p-3">
                        <h4 class="font-700 text-uppercase font-12 opacity-50 mt-n2">Meet</h4>

                        <div class="ph-item ph-no-space ph-no-border">
                            <div class="ph-col-12">
                                <div class="ph-row">
                                    <div class="ph-col-2 big"></div>
                                    <div class="ph-col-2 empty"></div>
                                    <div class="ph-col-8 big"></div>
                                </div>
                            </div>
                        </div>

                        {{-- <h1 class="font-700 font-34 color-blue-dark mb-0">2 <small class="font-14">Upcoming</small> </h1> --}}

                    </div>
                </div>
            </div>
            <div class="col-4 ps-2">
                <div class="card card-style mx-0 mb-3">
                    <div class="p-3">
                        <h4 class="font-700 text-uppercase font-12 opacity-50 mt-n2">File</h4>

                        <div class="ph-item ph-no-space ph-no-border">
                            <div class="ph-col-12">
                                <div class="ph-row">
                                    <div class="ph-col-12 big"></div>
                                </div>
                            </div>
                        </div>

                        {{-- <h1 class="font-700 font-18 color-green-dark mb-0">5.4/15 <small class="font-14">GB</small></h1> --}}

                    </div>
                </div>
            </div>
        </div>
    </div>

    

    <div class="card card-style">
        <div class="row px-3 py-3 m-0">
            <div class="col-2 align-self-center">
                <a href="#" class="icon icon-xs rounded-xs color-white bg-red-dark me-3"><i class="fas fa-comments"></i></a>
            </div>
            <div class="col-8 align-self-center">
                <h5>Chat</h5>

                <div class="ph-item ph-no-space ph-no-border">
                    <div class="ph-col-12 px-0">
                        <div class="ph-row">
                            <div class="ph-col-12 big"></div>
                        </div>
                    </div>
                </div>

                {{-- <p class="mb-0 mt-n2 opacity-50 font-11">2 Upcoming</p> --}}

            </div>
            <div class="col-2 align-self-center">
                
                
                <div class="ph-item ph-no-space ph-no-border">
                    <div class="ph-col-12 px-0 pt-4">
                        <div class="ph-row">
                            <div class="ph-col-12 big"></div>
                        </div>
                    </div>
                </div>

                {{-- <a href="#" class="btn btn-xxs bg-highlight text-uppercase font-800">GO</a> --}}

            </div>
        </div>
    </div>

    <div class="card card-style">
        <div class="row px-3 py-3 m-0">
            <div class="col-2 align-self-center">
                <a href="#" class="icon icon-xs rounded-xs color-white bg-blue-dark me-3"><i class="fas fa-video"></i></a>
            </div>
            <div class="col-8 align-self-center">
                <h5>Meet</h5>

                <div class="ph-item ph-no-space ph-no-border">
                    <div class="ph-col-12 px-0">
                        <div class="ph-row">
                            <div class="ph-col-12 big"></div>
                        </div>
                    </div>
                </div>

                {{-- <p class="mb-0 mt-n2 opacity-50 font-11">2 Upcoming</p> --}}

            </div>
            <div class="col-2 align-self-center">

                <div class="ph-item ph-no-space ph-no-border">
                    <div class="ph-col-12 px-0 pt-4">
                        <div class="ph-row">
                            <div class="ph-col-12 big"></div>
                        </div>
                    </div>
                </div>

                {{-- <a href="#" class="btn btn-xxs bg-highlight text-uppercase font-800">GO</a> --}}

            </div>
        </div>
    </div>

    <div class="card card-style">
        <div class="row px-3 py-3 m-0">
            <div class="col-2 align-self-center">
                <a href="#" class="icon icon-xs rounded-xs color-white bg-green-dark me-3"><i class="fas fa-folder-open"></i></a>
            </div>
            <div class="col-8 align-self-center">
                <h5>File</h5>

                <div class="ph-item ph-no-space ph-no-border">
                    <div class="ph-col-12 px-0">
                        <div class="ph-row">
                            <div class="ph-col-12 big"></div>
                        </div>
                    </div>
                </div>

                {{-- <p class="mb-0 mt-n2 opacity-50 font-11">2 Upcoming</p> --}}

            </div>
            <div class="col-2 align-self-center">
                
                <div class="ph-item ph-no-space ph-no-border">
                    <div class="ph-col-12 px-0 pt-4">
                        <div class="ph-row">
                            <div class="ph-col-12 big"></div>
                        </div>
                    </div>
                </div>

                {{-- <a href="#" class="btn btn-xxs bg-highlight text-uppercase font-800">GO</a> --}}
            </div>
        </div>
    </div>





@endsection

@push('scripts')

    <script>

    </script>

@endpush
