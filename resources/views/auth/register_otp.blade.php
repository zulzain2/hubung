@extends('layouts.empty')

@push('styles')

@endpush

@section('content')


<table style="border:none;width:100%">
    <tr>
        <td class="text-center" style="height:95vh;vertical-align:middle;">
            <div class="card card-style">
                <div class="content mt-4 mb-0">
                
                    <div class="row">
                        <div class="col-6">
                            <div class="d-flex">
                                <div class="w-50 font-11 pb-2 color-theme opacity-60 pb-3 text-start"><a href="/register" class="color-theme"><i class="fas fa-arrow-left"></i></a></div>                                   
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="custom-control scale-switch ios-switch" style="text-align: right;margin-right: unset;position: unset;padding-left: unset;">
                                <input data-toggle-theme="" type="checkbox" class="ios-input" id="switch-dark-mode">
                                <label class="custom-control-label" for="switch-dark-mode"></label>
                            </div>
                        </div>
                    </div>
            
                    <h1 class="text-center font-900 font-40 text-uppercase mb-0">Verification Code</h1>

                    <p class="bottom-0 text-center color-highlight font-11">Enter the code generated on your mobile device below to log in!</p>

                    <form method="get" id="registerOtpForm" class="digit-group" data-group-name="digits" data-autosubmit="false" autocomplete="off">
                        <div class="text-center" >
                            <input type="text" class="text-center" id="digit1" name="digit1" data-next="digit2" style="width: 15vw;"/>
                            <input type="text" class="text-center" id="digit2" name="digit2" data-next="digit3" data-previous="digit-1" style="width: 15vw;"/>
                            <input type="text" class="text-center" id="digit3" name="digit3" data-next="digit4" data-previous="digit-2" style="width: 15vw;"/>
                            <input type="text" class="text-center" id="digit4" name="digit4" data-previous="digit3" style="width: 15vw;"/>
                        </div>
                        <input type="hidden" name="type" id="type" value="{{isset($type) ? $type : ''}}">
                        <input type="hidden" id="tempuser_id" name="tempuser_id" value="{{isset($tempuser) ? $tempuser->id : ''}}">
                    </form>
                    <br><br><br>
                    <a href="#" id="registerOtpBtn" class="btn w-75 font-900 text-uppercase bg-red-dark btn-m rounded-sm">Continue &nbsp;&nbsp; <i class="fas fa-long-arrow-right"></i></a>
                    <br><br>

                  
                </div>
            </div>
       
           
          
            
        </td>
    </tr>
</table>


@endsection

@push('scripts')

@endpush
