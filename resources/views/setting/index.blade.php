<x-master-layout>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-block card-stretch">
                    <div class="card-body p-0">
                        <div class="d-flex justify-content-between align-items-center p-3">
                            <h5 class="font-weight-bold">{{ $pageTitle ?? __('messages.list') }}</h5>
                            <h5 class="font-weight-bold">v{{ config('app.version') }}</h5>
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
                                    @if(in_array( $page,['profile_form','password_form','time_slot']))
                                        <li class="nav-item">
                                            <a href="javascript:void(0)" data-href="{{ route('layout_page') }}?page=profile_form" data-target=".paste_here" class="nav-link {{$page=='profile_form'?'active':''}}"  data-toggle="tabajax" rel="tooltip"> {{ __('messages.profile')}} </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="javascript:void(0)" data-href="{{ route('layout_page') }}?page=password_form" data-target=".paste_here" class="nav-link {{$page=='password_form'?'active':''}}"  data-toggle="tabajax" rel="tooltip"> {{ __('messages.change_password') }} </a>
                                        </li>

                                        @role('provider')
                                            <li class="nav-item">
                                                <a href="javascript:void(0)" data-href="{{ route('layout_page') }}?page=time_slot" data-target=".paste_here" class="nav-link {{$page=='time_slot'?'active':''}}"  data-toggle="tabajax" rel="tooltip"> {{ __('messages.slot') }} </a>
                                            </li>
                                        @endrole
                                    @else
                                        @hasanyrole('admin|demo_admin')
                                            <li class="nav-item">
                                                <a href="javascript:void(0)" data-href="{{ route('layout_page') }}?page=general-setting" data-target=".paste_here" class="nav-link {{$page=='general-setting'?'active':''}}"  data-toggle="tabajax" rel="tooltip"> {{ __('messages.general_settings') }}</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="javascript:void(0)" data-href="{{ route('layout_page') }}?page=theme-setup" data-target=".paste_here" class="nav-link {{$page=='theme-setup'?'active':''}}"  data-toggle="tabajax" rel="tooltip"> {{ __('messages.theme_setup') }}</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="javascript:void(0)" data-href="{{ route('layout_page') }}?page=site-setup" data-target=".paste_here" class="nav-link {{$page=='site-setup'?'active':''}}"  data-toggle="tabajax" rel="tooltip"> {{ __('messages.site_setup') }}</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="javascript:void(0)" data-href="{{ route('layout_page') }}?page=service-configurations" data-target=".paste_here" class="nav-link {{$page=='service-configurations'?'active':''}}"  data-toggle="tabajax" rel="tooltip"> {{ __('messages.service_configurations') }}</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="javascript:void(0)" data-href="{{ route('layout_page') }}?page=other-setting" data-target=".paste_here" class="nav-link {{$page=='other-setting'?'active':''}}"  data-toggle="tabajax" rel="tooltip"> {{ __('messages.app_configurations') }}</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="javascript:void(0)" data-href="{{ route('layout_page') }}?page=notification-setting" data-target=".paste_here" class="nav-link {{$page=='notification-setting'?'active':''}}"  data-toggle="tabajax" rel="tooltip"> {{ __('messages.notification_configurations') }}</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="javascript:void(0)" data-href="{{ route('layout_page') }}?page=notification-templates" data-target=".paste_here" class="nav-link {{$page=='notification-templates'?'active':''}}"  data-toggle="tabajax" rel="tooltip"> {{ __('messages.notification_template_setup') }}</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="javascript:void(0)" data-href="{{ route('layout_page') }}?page=social-media" data-target=".paste_here" class="nav-link {{$page=='social-media'?'active':''}}"  data-toggle="tabajax" rel="tooltip"> {{ __('messages.social_media') }}</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="javascript:void(0)" data-href="{{ route('layout_page') }}?page=cookie-setup" data-target=".paste_here" class="nav-link {{$page=='cookie-setup'?'active':''}}"  data-toggle="tabajax" rel="tooltip"> {{ __('messages.cookie_setup') }}</a>
                                            </li>
                                            <!-- <li class="nav-item">
                                                <a href="javascript:void(0)" data-href="{{ route('layout_page') }}?page=sliders" data-target=".paste_here" class="nav-link {{$page=='sliders'?'active':''}}"  data-toggle="tabajax" rel="tooltip"> {{ __('messages.sliders') }}</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="javascript:void(0)" data-href="{{ route('layout_page') }}?page=taxes" data-target=".paste_here" class="nav-link {{$page=='taxes'?'active':''}}"  data-toggle="tabajax" rel="tooltip"> {{ __('messages.taxes') }}</a>
                                            </li> -->
                                            <li class="nav-item">
                                                <a href="javascript:void(0)" data-href="{{ route('layout_page') }}?page=role-permission-setup" data-target=".paste_here" class="nav-link {{$page=='role-permission-setup'?'active':''}}"  data-toggle="tabajax" rel="tooltip"> {{ __('messages.role_permission_setup') }}</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="javascript:void(0)" data-href="{{ route('layout_page') }}?page=language-setting" data-target=".paste_here" class="nav-link {{$page=='language-setting'?'active':''}}"  data-toggle="tabajax" rel="tooltip"> {{ __('messages.language_settings') }}</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="javascript:void(0)" data-href="{{ route('layout_page') }}?page=payment-setting" data-target=".paste_here" class="nav-link {{$page=='payment-setting'?'active':''}}"  data-toggle="tabajax" rel="tooltip"> {{ __('messages.payment_configuration') }}</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="javascript:void(0)" data-href="{{ route('layout_page') }}?page=mail-setting" data-target=".paste_here" class="nav-link {{$page=='mail-setting'?'active':''}}"  data-toggle="tabajax" rel="tooltip"> {{ __('messages.mail_settings') }}</a>
                                            </li>
                                            
                                            <!-- <li class="nav-item">
                                                <a href="javascript:void(0)" data-href="{{ route('layout_page') }}?page=push-notification-setting" data-target=".paste_here" class="nav-link {{$page=='push-notification-setting'?'active':''}}"  data-toggle="tabajax" rel="tooltip"> {{ __('messages.pushnotification_settings') }}</a>
                                            </li> -->
                                            <li class="nav-item">
                                                <a href="javascript:void(0)" data-href="{{ route('layout_page') }}?page=earning-setting" data-target=".paste_here" class="nav-link {{$page=='earning-setting'?'active':''}}"  data-toggle="tabajax" rel="tooltip"> {{ __('messages.earning_setting') }}</a>
                                            </li>
                                         
                                        @endhasanyrole
                                    @endif
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
                    loadurl = '{{route('layout_page')}}?page={{$page}}';

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
    @endsection
</x-master-layout>
