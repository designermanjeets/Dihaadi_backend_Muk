{{ Form::model($serviceconfig, ['method' => 'POST','route' => ['serviceConfig'],'enctype'=>'multipart/form-data','data-toggle'=>'validator','id' => 'myForm']) }}

{{ Form::hidden('id', null, ['placeholder' => 'id', 'class' => 'form-control']) }}
{{ Form::hidden('type', $page, ['placeholder' => 'id', 'class' => 'form-control']) }}


<div class="row">
    <div class="form-group col-md-12 d-flex justify-content-between">
        <label for="advance_payment" class="mb-0">{{ __('messages.enable_advanced_payment') }}</label>
        <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" name="advance_payment" id="advance_payment" {{ !empty($serviceconfig->advance_payment) ? 'checked' : '' }}>
            <label class="custom-control-label" for="advance_payment"></label>
        </div>
    </div>
</div>

<div class="row">
    <div class="form-group col-md-12 d-flex justify-content-between">
        <label for="slot_service" class="mb-0">{{ __('messages.enable_slot_Service') }}</label>
        <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" name="slot_service" id="slot_service" {{ !empty($serviceconfig->slot_service) ? 'checked' : '' }}>
            <label class="custom-control-label" for="slot_service"></label>
        </div>
    </div>
</div>

<div class="row">
    <div class="form-group col-md-12 d-flex justify-content-between">
        <label for="digital_services">{{ __('messages.enable_digital_services') }}</label>
        <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" name="digital_services" id="digital_services" {{ !empty($serviceconfig->digital_services) ? 'checked' : '' }}>
            <label class="custom-control-label" for="digital_services"></label>
        </div>
    </div>
</div>

<div class="row">
    <div class="form-group col-md-12 d-flex justify-content-between">
        <label for="service_packages">{{ __('messages.enable_service_packages') }}</label>
        <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" name="service_packages" id="service_packages" {{ !empty($serviceconfig->service_packages) ? 'checked' : '' }}>
            <label class="custom-control-label" for="service_packages"></label>
        </div>
    </div>
</div>

<div class="row">
    <div class="form-group col-md-12 d-flex justify-content-between">
        <label for="service_addons">{{ __('messages.enable_service_addons') }}</label>
        <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" name="service_addons" id="service_addons" {{ !empty($serviceconfig->service_addons) ? 'checked' : '' }}>
            <label class="custom-control-label" for="service_addons"></label>
        </div>
    </div>
</div>

<div class="row">
    <div class="form-group col-md-12 d-flex justify-content-between">
        <label for="post_services">{{ __('messages.enable_post_services') }}</label>
        <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" name="post_services" id="post_services" {{ !empty($serviceconfig->post_services) ? 'checked' : '' }}>
            <label class="custom-control-label" for="post_services"></label>
        </div>
    </div>
</div>






{{ Form::submit(__('messages.save'), ['class' => "btn btn-md btn-primary float-md-right"]) }}
{{ Form::close() }}

<script>

</script>