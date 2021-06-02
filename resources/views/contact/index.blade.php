@extends('layouts.app')

@section('content')

    <style>
        #footer-bar{
            display:none;
        }
    </style>
    
    <div id="contact"></div>
    
    <div class="header header-fixed header-logo-center">
        <a href="index.html" class="header-title">Select Contact</a>
        <a href="#" data-back-button="" class="header-icon header-icon-1"><i class="fas fa-arrow-left"></i></a>
        <a href="#" data-toggle-theme="" class="header-icon header-icon-4"><i class="fa fa-search"></i></a>
    </div>

    <div class="row mt-4">
        <div class="col-12">

            <div class="content my-2">
                
                    <div class="list-group list-custom-large">
                        <a href="#">
                            <i class="fas fa-user-plus bg-highlight rounded-l mt-3 mb-2" style="
                                            width: 40px;
                                            height: 40px;
                                            padding-top: 2px;
                                            padding-left: 2px;
                                        "></i>

                            <span class="mt-1">Add Contact</span>
                        </a>
                    </div>
               
                    <div id="contact-list" class="list-group list-custom-large">
                        <table style="height:70vh;width:100%;border:none">
                            <tr>
                                <td style="vetical-align:middle">
                                    
                                        <div class="d-flex justify-content-center">
                                            <div class="spinner-border color-highlight text-center" role="status">
                                                <span class="sr-only">Loading...</span>
                                            </div>
                                        </div>
                                    
                                </td>
                            </tr>                        
                        </table>
                    </div>
                    
      
            </div>

        </div>
    </div>

@endsection
