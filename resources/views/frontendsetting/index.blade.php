<x-master-layout>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-block card-stretch">
                    <div class="card-body p-0">
                        <div class="d-flex justify-content-between align-items-center p-3">
                            <h5 class="font-weight-bold">{{ $pageTitle ?? __('messages.list') }}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-body setting-pills"> 
                        <div class="row">
                            <div class="col-sm-12 col-lg-12">
                                <ul class="nav flex-column nav-pills nav-fill tabslink" id="tabs-text" role="tablist">
                                  
                                        @hasanyrole('admin|demo_admin')
                                            <li class="nav-item">
                                                <a href="javascript:void(0)" data-href="{{ route('layout_frontend_page') }}?page=landing-page-setting" data-target=".paste_here" class="nav-link {{$page=='landing-page-setting'?'active':''}}"  data-toggle="tabajax" rel="tooltip"> {{ __('messages.landing_page_settings') }}</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="javascript:void(0)" data-href="{{ route('layout_frontend_page') }}?page=heder-menu-setting" data-target=".paste_here" class="nav-link {{$page=='heder-menu-setting'?'active':''}}"  data-toggle="tabajax" rel="tooltip"> {{ __('messages.header_menu_settings') }}</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="javascript:void(0)" data-href="{{ route('layout_frontend_page') }}?page=footer-setting" data-target=".paste_here" class="nav-link {{$page=='footer-setting'?'active':''}}"  data-toggle="tabajax" rel="tooltip"> {{ __('messages.footer_settings') }}</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="javascript:void(0)" data-href="{{ route('layout_frontend_page') }}?page=login-register-setting" data-target=".paste_here" class="nav-link {{$page=='login-register-setting'?'active':''}}"  data-toggle="tabajax" rel="tooltip"> {{ __('messages.login_register_settings') }}</a>
                                            </li>
                                            <!-- <li class="nav-item">
                                                <a href="javascript:void(0)" data-href="{{ route('layout_frontend_page') }}?page=other-setting" data-target=".paste_here" class="nav-link {{$page=='other-setting'?'active':''}}"  data-toggle="tabajax" rel="tooltip"> {{ __('messages.other_settings') }}</a>
                                            </li> -->
                              
                                        @endhasanyrole
                                
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 col-lg-12">
                                <div class="tab-content" id="pills-tabContent-1">
                                    <div class="tab-pane active p-1" >
                                        <div class="paste_here"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    @section('bottom_script')
        <script>
            // (function($) {
            //     "use strict";
                $(document).ready(function(event)
                {
                    var $this = $('.nav-item').find('a.active');
                    loadurl = '{{route('layout_frontend_page')}}?page={{$page}}';

                    targ = $this.attr('data-target');
                    
                    id = this.id || '';

                    $.post(loadurl,{ '_token': $('meta[name=csrf-token]').attr('content') } ,function(data) {
                        $(targ).html(data);
                    });

                    $this.tab('show');
                    return false;
                });
            // });

            
      

            

        </script>

         <style>
        /* Style for the accordion items */
        .accordion-item {
            display: none;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            padding: 10px;
        }

        /* Style for the switch (checkbox) */
        .switch {
            display: none;
        }

        /* Style for the label of the switch */
        .switch-label {
            cursor: pointer;
            padding: 5px 10px;
            background-color: #3498db;
            color: #fff;
            border-radius: 4px;
        }

        /* Style for the accordion item when the switch is checked (open) */
        .switch:checked + .accordion-item {
            display: block;
        }
    </style>
    @endsection

     
</x-master-layout>