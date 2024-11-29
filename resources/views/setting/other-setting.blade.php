{{ Form::model($othersetting, ['method' => 'POST','route' => ['otherSetting'],'enctype'=>'multipart/form-data','data-toggle'=>'validator','id' => 'myForm']) }}

{{ Form::hidden('id', null, ['placeholder' => 'id', 'class' => 'form-control']) }}
{{ Form::hidden('type', $page, ['placeholder' => 'id', 'class' => 'form-control']) }}

<div class="row">
    <div class="form-group col-md-12 d-flex justify-content-between">
        <label for="social_login" class="mb-0">{{ __('messages.enable_social_login') }}</label>
        <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" name="social_login" id="social_login" {{ !empty($othersetting->social_login) ? 'checked' : '' }}>
            <label class="custom-control-label" for="social_login"></label>
        </div>
    </div>
</div>

<div class="form-padding-box mb-3" id='social_login_data'>
    <div class="row">
        <div class="col-md-12">
                <div class="form-group d-flex justify-content-between mb-2">
                <label for="google_login" class="mb-0">{{ __('messages.enable_google_login') }}</label>
                <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" name="google_login" id="google_login" {{ !empty($othersetting->google_login) ? 'checked' : '' }}>
                    <label class="custom-control-label" for="google_login"></label>
                </div>
            </div>
            <div class="form-group d-flex justify-content-between mb-2">
                <label for="apple_login" class="mb-0">{{ __('messages.enable_apple_login') }}</label>
                <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" name="apple_login" id="apple_login" {{ !empty($othersetting->apple_login) ? 'checked' : '' }}>
                    <label class="custom-control-label" for="apple_login"></label>
                </div>
            </div>
             <div class="form-group d-flex justify-content-between mb-0">
                <label for="otp_login" class="mb-0">{{ __('messages.enable_otp_login') }}</label>
                <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" name="otp_login" id="otp_login" {{ !empty($othersetting->otp_login) ? 'checked' : '' }}>
                    <label class="custom-control-label" for="otp_login"></label>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="form-group col-md-12 d-flex justify-content-between">
        <label for="online_payment" class="mb-0">{{ __('messages.enable_online_payment') }}</label>
        <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" name="online_payment" id="online_payment" {{ !empty($othersetting->online_payment) ? 'checked' : '' }}>
            <label class="custom-control-label" for="online_payment"></label>
        </div>
    </div>
</div>

<div class="row">
    <div class="form-group col-md-12 d-flex justify-content-between">
        <label for="blog" class="mb-0">{{ __('messages.enable_blog') }}</label>
        <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" name="blog" id="blog" {{ !empty($othersetting->blog) ? 'checked' : '' }}>
            <label class="custom-control-label" for="blog"></label>
        </div>
    </div>
</div>

<div class="row">
    <div class="form-group col-md-12 d-flex justify-content-between">
        <label for="enable_chat_gpt" class="mb-0">{{ __('messages.enable_chat_gpt') }}</label>
        <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" name="enable_chat_gpt" id="enable_chat_gpt" {{ !empty($othersetting->enable_chat_gpt) ? 'checked' : '' }}>
            <label class="custom-control-label" for="enable_chat_gpt"></label>
        </div>
    </div>
</div>

<div class="form-padding-box mb-3" id='chat_gpt_key_section'>
    <div class="row">
    <div class="form-group col-md-12 d-flex justify-content-between">
        <label for="test_without_key" class="mb-0">{{ __('messages.test_without_key') }}</label>
        <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" name="test_without_key" id="test_without_key" {{ !empty($othersetting->test_without_key) ? 'checked' : 'checked' }}>
            <label class="custom-control-label" for="test_without_key"></label>
        </div>
    </div>
    <div class="form-group col-sm-6 mb-0" id='key'>
            {{ Form::label('key',trans('messages.key').' ',['class'=>'form-control-label'], false ) }}
            {{ Form::text('chat_gpt_key', null, ['class'=>"form-control" ,'id'=>'chat_gpt_key', 'placeholder'=>__('messages.key') ]) }}
            <small class="help-block with-errors text-danger"></small>
        </div>

    </div>
</div>

  @hasanyrole('admin')

<div class="row">
    <div class="form-group col-md-12 d-flex justify-content-between">
        <label for="maintenance_mode" class="mb-0">{{ __('messages.enable_maintenance_mode') }}</label>
        <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" name="maintenance_mode" id="maintenance_mode" {{ !empty($othersetting->maintenance_mode) ? 'checked' : '' }}>
            <label class="custom-control-label" for="maintenance_mode"></label>
        </div>
    </div>
</div>

 @endhasanyrole



<div class="row">
    <div class="form-group col-md-12 d-flex justify-content-between">
        <label for="wallet">{{ __('messages.enable_user_wallet') }}</label>
        <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" name="wallet" id="wallet" {{ !empty($othersetting->wallet) ? 'checked' : '' }}>
            <label class="custom-control-label" for="wallet"></label>
        </div>
    </div>
</div>

<div class="row">
    <div class="form-group col-md-12 d-flex justify-content-between">
        <label for="force_update_user_app" class="mb-0">{{ __('messages.enable_user_app_force_update') }}</label>
        <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" name="force_update_user_app" id="force_update_user_app" {{ !empty($othersetting->force_update_user_app) ? 'checked' : '' }}>
            <label class="custom-control-label" for="force_update_user_app"></label>
        </div>
    </div>
</div>

<div class="form-padding-box mb-3" id='user_verson_code'>
    <div class="row">
        <div class="form-group col-sm-6 mb-0">
            {{ Form::label('user_app_minimum_version',trans('messages.user_app_minimum_version').' ',['class'=>'form-control-label'], false ) }}
            {{ Form::number('user_app_minimum_version',old('user_app_minimum_version'),['id'=>'user_app_minimum_version','placeholder' => '1','class' =>'form-control']) }}
            <small class="help-block with-errors text-danger"></small>
        </div>
        <div class="form-group col-sm-6 mt-sm-0 mt-3 mb-0">
            {{ Form::label('user_app_latest_version',trans('messages.user_app_latest_version').' ',['class'=>'form-control-label'], false ) }}
            {{ Form::number('user_app_latest_version',old('user_app_latest_version'),['id'=>'user_app_latest_version','placeholder' => '2','class' =>'form-control']) }}
            <small class="help-block with-errors text-danger"></small>
        </div>
    </div>
</div>

<div class="row">
    <div class="form-group col-md-12 d-flex justify-content-between">
        <label for="force_update_provider_app" class="mb-0">{{ __('messages.enable_provider_app_force_update') }}</label>
        <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" name="force_update_provider_app" id="force_update_provider_app" {{ !empty($othersetting->force_update_provider_app) ? 'checked' : '' }}>
            <label class="custom-control-label" for="force_update_provider_app"></label>
        </div>
    </div>
</div>

<div class="form-padding-box mb-3" id='provider_verson_code'>
    <div class="row">
        <div class="form-group col-sm-6 mb-0">
            {{ Form::label('provider_app_minimum_version',trans('messages.provider_app_minimum_version').' ',['class'=>'form-control-label'], false ) }}
            {{ Form::number('provider_app_minimum_version',old('provider_app_minimum_version'),['id'=>'provider_app_minimum_version','placeholder' => '1','class' =>'form-control']) }}
            <small class="help-block with-errors text-danger"></small>
        </div>
        <div class="form-group col-sm-6 mt-sm-0 mt-3 mb-0">
            {{ Form::label('provider_app_latest_version',trans('messages.provider_app_latest_version').' ',['class'=>'form-control-label'], false ) }}
            {{ Form::number('provider_app_latest_version',old('provider_app_latest_version'),['id'=>'provider_app_latest_version','placeholder' => '2','class' =>'form-control']) }}
            <small class="help-block with-errors text-danger"></small>
        </div>
    </div>
</div>

<div class="row">
    <div class="form-group col-md-12 d-flex justify-content-between">
        <label for="force_update_admin_app" class="mb-0">{{ __('messages.enable_admin_app_force_update') }}</label>
        <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" name="force_update_admin_app" id="force_update_admin_app" {{ !empty($othersetting->force_update_admin_app) ? 'checked' : '' }}>
            <label class="custom-control-label" for="force_update_admin_app"></label>
        </div>
    </div>
</div>

<div class="form-padding-box mb-3" id='admin_verson_code'>
    <div class="row">
        <div class="form-group col-sm-6 mb-0">
            {{ Form::label('admin_app_minimum_version',trans('messages.admin_app_minimum_version').' ',['class'=>'form-control-label'], false ) }}
            {{ Form::number('admin_app_minimum_version',old('admin_app_minimum_version'),['id'=>'admin_app_minimum_version','placeholder' => '1','class' =>'form-control']) }}
            <small class="help-block with-errors text-danger"></small>
        </div>
        <div class="form-group col-sm-6 mt-sm-0 mt-3 mb-0">
            {{ Form::label('admin_app_latest_version',trans('messages.admin_app_latest_version').' ',['class'=>'form-control-label'], false ) }}
            {{ Form::number('admin_app_latest_version',old('admin_app_latest_version'),['id'=>'admin_app_latest_version','placeholder' => '2','class' =>'form-control']) }}
            <small class="help-block with-errors text-danger"></small>
        </div>
    </div>
</div>

<div class="row">
    <div class="form-group col-md-12 d-flex justify-content-between">
        <label for="firebase_notification" class="mb-0">{{ __('messages.firebase_notification') }}</label>
        <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" name="firebase_notification" id="firebase_notification" {{ !empty($othersetting->firebase_notification) ? 'checked' : '' }}>
            <label class="custom-control-label" for="firebase_notification"></label>
        </div>
    </div>
</div>

<div class="form-padding-box mb-3" id='firebase_notification_key'>
    <div class="row">
        <div class="form-group col-sm-6 mb-0">
            {{ Form::label('firebase_key_title',trans('messages.firebase_key_title').' ',['class'=>'form-control-label'], false ) }}
            {{ Form::text('firebase_key', null, ['class' => 'form-control', 'id' => 'firebase_key', 'placeholder' => __('messages.firebase_key_title')]) }}
            <small class="help-block with-errors text-danger"></small>
        </div>
    </div>
</div>


<div class="row">
    <div class="form-group col-md-12 d-flex justify-content-between">
        <label for="auto_assign_provider" class="mb-0">{{ __('messages.enable_auto_assign') }}</label>
        <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" name="auto_assign_provider" id="auto_assign_provider" {{ !empty($othersetting->auto_assign_provider) ? 'checked' : '' }}>
            <label class="custom-control-label" for="auto_assign_provider"></label>
        </div>
    </div>
</div>
{{ Form::submit(__('messages.save'), ['class' => "btn btn-md btn-primary float-md-right"]) }}
{{ Form::close() }}

<script>


var social_login = $("input[name='social_login']").prop('checked');

checkOtherSettingOption(social_login);

$('#social_login').change(function(){
    value = $(this).prop('checked');
    checkOtherSettingOption(value);
});
function checkOtherSettingOption(value){
    if(value == true){
        $('#social_login_data').removeClass('d-none');
    }else{
        $('#social_login_data').addClass('d-none');
    }
}
var enable_chat_gpt = $("input[name='enable_chat_gpt']").prop('checked');

checkChatGPTSetting(enable_chat_gpt);
$('#enable_chat_gpt').change(function(){
    value = $(this).prop('checked');
    checkChatGPTSetting(value);
});
function checkChatGPTSetting(value){
    if(value == true){
        $('#chat_gpt_key_section').removeClass('d-none');
    }else{
        $('#chat_gpt_key_section').addClass('d-none');
    }
}

var test_without_key = $("input[name='test_without_key']").prop('checked');

testWithoutKey(test_without_key);
$('#test_without_key').change(function(){
    value = $(this).prop('checked');
    testWithoutKey(value);
});
function testWithoutKey(value){
    if(value == true){
        $('#key').addClass('d-none');
        $("#chat_gpt_key").prop("required", false);
    }else{
        $('#key').removeClass('d-none');
        $("#chat_gpt_key").prop("required", true);
    }
}


var force_update_user_app = $("input[name='force_update_user_app']").prop('checked');

checkForceUpdateSettingOption(force_update_user_app);

$('#force_update_user_app').change(function(){
    value = $(this).prop('checked');
    checkForceUpdateSettingOption(value);
});
function checkForceUpdateSettingOption(value){
    if(value == true){
        $('#user_verson_code').removeClass('d-none');
         $("#user_app_latest_version").prop("required", true);
        $("#user_app_minimum_version").prop("required", true);
    }else{
        $('#user_verson_code').addClass('d-none');
         $("#user_app_latest_version").prop("required", false);
        $("#user_app_minimum_version").prop("required", false);
    }
}

var force_update_provider_app = $("input[name='force_update_provider_app']").prop('checked');

checkProviderForceUpdateSetting(force_update_provider_app);

$('#force_update_provider_app').change(function(){
    value = $(this).prop('checked');
    checkProviderForceUpdateSetting(value);
});

function checkProviderForceUpdateSetting(value){
    if(value == true){
        $('#provider_verson_code').removeClass('d-none');
        $("#provider_app_latest_version").prop("required", true);
        $("#provider_app_minimum_version").prop("required", true);
    }else{
        $('#provider_verson_code').addClass('d-none');
        $("#provider_app_latest_version").prop("required", false);
        $("#provider_app_minimum_version").prop("required", false);

    }
}

var force_update_admin_app = $("input[name='force_update_admin_app']").prop('checked');

checkAdminForceUpdateSetting(force_update_admin_app);

$('#force_update_admin_app').change(function(){
    value = $(this).prop('checked');
    checkAdminForceUpdateSetting(value);
});
function checkAdminForceUpdateSetting(value){
    if(value == true){
        $('#admin_verson_code').removeClass('d-none');
        $("#admin_app_latest_version").prop("required", true);
        $("#admin_app_minimum_version").prop("required", true);
    }else{
        $('#admin_verson_code').addClass('d-none');
        $("#admin_app_latest_version").prop("required", false);
        $("#admin_app_minimum_version").prop("required", false);
    }
}

var firebase_notification = $("input[id='firebase_notification']").prop('checked');

checkfirebaseNotificationSetting(firebase_notification);

$('#firebase_notification').change(function(){
    value = $(this).prop('checked');
    checkfirebaseNotificationSetting(value);
});

function checkfirebaseNotificationSetting(value){
    if(value == true){
        $('#firebase_notification_key').removeClass('d-none');
        $("#firebase_key").prop("required", true);
    }else{
        $('#firebase_notification_key').addClass('d-none');
        $("#firebase_key").prop("required", false);

    }
}
</script>
