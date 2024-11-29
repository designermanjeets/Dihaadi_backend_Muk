
{{ Form::model($landing_page, ['method' => 'POST','route' => ['landing_page_settings_updates'],'enctype'=>'multipart/form-data','data-toggle'=>'validator']) }}

{{ Form::hidden('id', null, array('placeholder' => 'id','class' => 'form-control')) }}
{{ Form::hidden('type', $tabpage, array('placeholder' => 'id','class' => 'form-control')) }}
        <div class="row">
            <div class="form-group col-md-12 d-flex justify-content-between">
                <label for="enable_section_4">{{__('messages.enable_section_4')}}</label>
                <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input section_4" name="status" id="section_4" data-type="section_4"  {{!empty($landing_page) && $landing_page->status == 1 ? 'checked' : ''}}>
                    <label class="custom-control-label" for="section_4"></label>
                </div>
            </div>
        </div>
        <div class="row form-section" id='enable_section_4'>
            <div class="form-group col-md-12">
                {{ Form::label('title',trans('messages.title').' <span class="text-danger">*</span>',['class'=>'form-control-label'], false ) }}
                {{ Form::text('title',old('title'),['id'=>'title','placeholder' => trans('messages.title'),'class' =>'form-control','required']) }}
                <small class="help-block with-errors text-danger"></small>
            </div>
            
            <div class="form-group col-md-12" id='enable_select_service'>
                {{ Form::label('name', __('messages.select_name', ['select' => __('messages.service')]) . ' <span class="text-danger">*</span>', ['class' => 'form-control-label'], false) }}
                <br />
                {{ Form::select(
                    'service_id[]',
                    [], 
                    old('service_id'), 
                    [
                        'class' => 'select2js form-control service_id', 
                        'id' => 'service_id',
                        'data-placeholder' => __('messages.select_name', ['select' => __('messages.service')]),
                        'data-ajax--url' => route('ajax-list', ['type' => 'service', 'is_featured' => 1]),
                        'multiple' => true,
                      
                    ]
                ) }}
            </div>
            
        </div>
        
       
    {{ Form::submit(__('messages.save'), ['class'=>"btn btn-md btn-primary float-md-right submit_section1"]) }}
    {{ Form::close() }}

<script>
    var enable_section_4 = $("input[name='status']").prop('checked');
    checkSection3(enable_section_4);

    $('#section_4').change(function() {
        value = $(this).prop('checked') == true ? true : false;
        checkSection3(value);
        
    });

    function checkSection3(value) {
        if (value == true) {
            $('#enable_section_4').removeClass('d-none');
            $('#title').prop('required', true);
            $('#service_id').prop('required', true).trigger('change.select2');
        } else {
            $('#enable_section_4').addClass('d-none');
            $('#title').prop('required', false);
            $('#service_id').prop('required', false).trigger('change.select2');
        }
    }

    ///// open select popular category ///////////
    $(document).ready(function() {
        $('.select2js').select2();

        $('#service_id').on('change', function() {
            var selectedOptions = $(this).val();
            if (selectedOptions && selectedOptions.length > 16) {
                selectedOptions.pop();
                $(this).val(selectedOptions).trigger('change.select2');
            }
        });

      
    });

    var get_value = $('input[name="status"]:checked').data("type");
    getConfig(get_value)
    $('.section_4').change(function(){
        value = $(this).prop('checked') == true ? true : false;
        type = $(this).data("type");
        getConfig(type)

    });

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
                var section_4 = title = service_ids = '';

                if (response) {
                    if (response.data.key == 'section_4') {
                        obj = JSON.parse(response.data.value);
                    }
                    if (obj !== null) {
                        var title = obj.title;
                        var service_ids = obj.service_id;
                    }
                    $('#title').val(title);
                    loadService(service_ids);
                    
                }
            },
            error: function (error) {
                console.log(error);
            }
        });
    }

   
    function loadService(service_ids) {
    var service_route = "{{ route('ajax-list', ['type' => 'service']) }}";
    service_route = service_route.replace('amp;', '');
    var is_featured = 1;
    $.ajax({
        url: service_route,
        data: {
            is_featured: is_featured,
            ids: service_ids,
        },
        success: function(result) {
            $('#service_id').select2({
                width: '100%',
                placeholder: "{{ trans('messages.select_name',['select' => trans('messages.service')]) }}",
                data: result.results
            });
            $('#service_id').val(service_ids).trigger('change');
        }
    });
}

</script>
