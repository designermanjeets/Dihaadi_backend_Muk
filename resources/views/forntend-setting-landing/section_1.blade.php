
{{ Form::model($landing_page, ['method' => 'POST','route' => ['landing_page_settings_updates'],'enctype'=>'multipart/form-data','data-toggle'=>'validator']) }}

{{ Form::hidden('id', null, array('placeholder' => 'id','class' => 'form-control')) }}
{{ Form::hidden('type', $tabpage, array('placeholder' => 'id','class' => 'form-control')) }}
        <div class="row">
            <div class="form-group col-md-12 d-flex justify-content-between">
                <label for="enable_section_1">{{__('messages.enable_section_1')}}</label>
                <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input section_1" name="status" id="section_1" data-type="section_1"  {{!empty($landing_page) && $landing_page->status == 1 ? 'checked' : ''}}>
                    <label class="custom-control-label" for="section_1"></label>
                </div>
            </div>
        </div>
        <div class="row" id='enable_section_1'>
            <div class="form-group col-md-12">
                {{ Form::label('title',trans('messages.title').' <span class="text-danger">*</span>',['class'=>'form-control-label'], false ) }}
                {{ Form::text('title',old('title'),['id'=>'title','placeholder' => trans('messages.title'),'class' =>'form-control']) }}
                <small class="help-block with-errors text-danger"></small>
            </div>
            <div class="form-group col-md-12">
                {{ Form::label('description',trans('messages.description'),['class'=>'form-control-label'], false ) }}
                {{ Form::textarea('description',null,['id'=>'description','placeholder' => trans('messages.description'),'class' =>'form-control textarea',  'rows'=>2]) }}
                <small class="help-block with-errors text-danger"></small>
            </div>
            <div class="form-group col-md-12 d-flex justify-content-between">
            <label for="enable_current_location">{{__('messages.enable_current_location')}}</label>
            <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" name="current_location" id="current_location">
                <label class="custom-control-label" for="current_location"></label>
            </div>
            </div>
            <div class="form-group col-md-12 d-flex justify-content-between">
            <label for="enable_search">{{__('messages.enable_search')}}</label>
            <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" name="enable_search" id="enable_search">
                <label class="custom-control-label" for="enable_search"></label>
            </div>
            </div>
            <!-- <div class="form-group col-md-12 d-flex justify-content-between">
                <label for="enable_post_job">{{__('messages.enable_post_job')}}</label>
                <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" name="enable_post_job" id="enable_post_job">
                    <label class="custom-control-label" for="enable_post_job"></label>
                </div>
            </div> -->
            <div class="form-group col-md-12 d-flex justify-content-between">
                <label for="enable_popular_services">{{__('messages.enable_popular_services')}}</label>
                <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" name="enable_popular_services" id="enable_popular_services">
                    <label class="custom-control-label" for="enable_popular_services"></label>
                </div>
            </div>
            <div class="form-group col-md-8" id='enable_select_category'>
                {{ Form::label('name', __('messages.select_name', ['select' => __('messages.category')]) . ' <span class="text-danger">*</span>', ['class' => 'form-control-label'], false) }}
                <br />
                {{ Form::select(
                    'category_id[]',
                    [], 
                    old('category_id'), 
                    [
                        'class' => 'select2js form-control category_id', 
                        'id' => 'category_id',
                        'data-placeholder' => __('messages.select_name', ['select' => __('messages.category')]),
                        'data-ajax--url' => route('ajax-list', ['type' => 'category']),
                        'multiple' => true,
                    ]
                ) }}
            </div>
            <div class="form-group col-md-12 d-flex justify-content-between">
                <label for="enable_popular_provider">{{__('messages.enable_popular_provider')}}</label>
                <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" name="enable_popular_provider" id="enable_popular_provider">
                    <label class="custom-control-label" for="enable_popular_provider"></label>
                </div>
            </div>
            <div class="form-group col-md-8" id='enable_select_provider'>
                {{ Form::label('name', __('messages.select_name', ['select' => __('messages.provider')]) . ' <span class="text-danger">*</span>', ['class' => 'form-control-label'], false) }}
                <br />
                {{ Form::select(
                    'provider_id[]',
                    [], 
                    null,
                    [
                        'class' => 'select2js form-control provider_id',
                        'id' => 'provider_id',
                        'data-placeholder' => __('messages.select_name', ['select' => __('messages.provider')]),
                            'data-ajax--url' => route('ajax-list', ['type' => 'provider']),
                            'multiple' => true,
                    ]
                ) }}
            </div>
        </div>
    {{ Form::submit(__('messages.save'), ['class'=>"btn btn-md btn-primary float-md-right submit_section1"]) }}
    {{ Form::close() }}

<script>
    var enable_section_1 = $("input[name='status']").prop('checked');
    checkSection1(enable_section_1);

    $('#section_1').change(function() {
        value = $(this).prop('checked') == true ? true : false;
        checkSection1(value);
    });

    function checkSection1(value) {
        if (value == true) {
            $('#enable_section_1').removeClass('d-none');
            $('#title').prop('required', true);
        } else {
            $('#enable_section_1').addClass('d-none');
            $('#title').prop('required', false);
        }
    }

    ///// open select popular category ///////////

    var enable_popular_services = $("input[name='enable_popular_services']").prop('checked');
    checkEnableService(enable_popular_services);

    $('#enable_popular_services').change(function() {
        value = $(this).prop('checked') == true ? true : false;
        checkEnableService(value);
    });

    function checkEnableService(value) {
        if (value == true) {
            $('#enable_select_category').removeClass('d-none');
            $('#category_id').prop('required', true);
        } else {
            $('#enable_select_category').addClass('d-none');
            $('#category_id').prop('required', false);
        }
    }


    ///// open select popular provider ///////////

     var enable_popular_provider = $("input[name='enable_popular_provider']").prop('checked');
    checkEnableProvider(enable_popular_provider);

    $('#enable_popular_provider').change(function() {
        value = $(this).prop('checked') == true ? true : false;
        checkEnableProvider(value);
    });

    function checkEnableProvider(value) {
        if (value == true) {
            $('#enable_select_provider').removeClass('d-none');
            $('#provider_id').prop('required', true);
        } else {
            $('#enable_select_provider').addClass('d-none');
            $('#provider_id').prop('required', false);
        }
    }

    $(document).ready(function() {
        $('.select2js').select2();
    });
    $(document).ready(function() {
        $('#category_id').on('change', function() {

            var selectedOptions = $(this).val();


            if (selectedOptions && selectedOptions.length > 4) {

                selectedOptions.pop();

                $(this).val(selectedOptions).trigger('change.select2');
            }
        });

        $('#provider_id').on('change', function() {

            var selectedOptions = $(this).val();


            if (selectedOptions && selectedOptions.length > 4) {

                selectedOptions.pop();

                $(this).val(selectedOptions).trigger('change.select2');
            }
        });
    });


    var get_value = $('input[name="status"]:checked').data("type");
    getConfig(get_value)
    $('.section_1').change(function(){
        value = $(this).prop('checked') == true ? true : false;
        type = $(this).data("type");
        getConfig(type)

    });

    var categorySelect = $('#category_id');
    var providerSelect = $('#provider_id');
    function getConfig(type) {
        var _token = $('meta[name="csrf-token"]').attr('content');
        var page = "{{$tabpage}}";
        var getDataRoute = "{{ route('getLandingLayoutPageConfig') }}";
        $.ajax({
            url: getDataRoute,
            type: "POST",
            data: {
                type: type,
                page: page,
                _token: _token
            },
            success: function (response) {
                var obj = '';
                var section_1 = title = description = current_location = enable_search = enable_post_job = enable_popular_services = category_ids = enable_popular_provider = provider_id = '';

                if (response) {
                    if (response.data.key == 'section_1') {
                        obj = JSON.parse(response.data.value);
                    }
                    if (obj !== null) {
                        var title = obj.title;
                        var description = obj.description;
                        var current_location = obj.current_location;
                        var enable_search = obj.enable_search;
                        var enable_post_job = obj.enable_post_job;
                        var enable_popular_services = obj.enable_popular_services;
                        var category_ids = obj.category_id;
                        var enable_popular_provider = obj.enable_popular_provider;
                        var provider_ids = obj.provider_id;
                    }
                    $('#title').val(title)
                    $('#description').val(description)
                    $('#current_location').prop('checked', current_location == 'on');
                    $('#enable_search').prop('checked', enable_search == 'on');
                    $('#enable_post_job').prop('checked', enable_post_job == 'on');
                    var enable_popular_services = obj.enable_popular_services;
                    $('#enable_popular_services').prop('checked', enable_popular_services == 'on');
                    $('#enable_popular_services').change();
                    $('#enable_popular_provider').prop('checked',enable_popular_provider == 'on');
                    $('#enable_popular_provider').change();
                    if (category_ids && category_ids.length > 0) {
                            loadCategory(category_ids);
                        }
                    if (provider_ids && provider_ids.length > 0) {
                            loadProvider(provider_ids);
                        }
                }
            },
            error: function (error) {
                console.log(error);
            }
        });
    }

    function loadCategory(category_ids) {
        var categorySelect = $('#category_id');
        var category_route = "{{ route('ajax-list', ['type' => 'category']) }}";
        if (category_ids && category_ids.length > 0) {
            $.ajax({
                url: category_route,
                data: { ids: category_ids },
                success: function (result) {
                    categorySelect.select2({
                        width: '100%',
                        placeholder: "{{ trans('messages.select_name',['select' => trans('messages.category')]) }}",
                        data: result.results
                    });
                    categorySelect.val(category_ids).trigger('change');
                }
            });
        } else {
            categorySelect.empty().trigger('change');
        }
    }

    function loadProvider(provider_ids) {
        var providerSelect = $('#provider_id');
        var provider_route = "{{ route('ajax-list', ['type' => 'provider']) }}";
            $.ajax({
                url: provider_route,
                data: { ids: provider_ids },
                success: function (result) {
                    providerSelect.select2({
                        width: '100%',
                        placeholder: "{{ trans('messages.select_name',['select' => trans('messages.provider')]) }}",
                        data: result.results
                    });
                    providerSelect.val(provider_ids).trigger('change');
                }
            });
        
    }



</script>
