
{{ Form::model($landing_page, ['method' => 'POST','route' => ['landing_page_settings_updates'],'enctype'=>'multipart/form-data','data-toggle'=>'validator']) }}

{{ Form::hidden('id', null, array('placeholder' => 'id','class' => 'form-control')) }}
{{ Form::hidden('type', $tabpage, array('placeholder' => 'id','class' => 'form-control')) }}
        <div class="row">
            <div class="form-group col-md-12 d-flex justify-content-between">
                <label for="enable_section_9">{{__('messages.enable_section_9')}}</label>
                <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input section_9" name="status" id="section_9" data-type="section_9"  {{!empty($landing_page) && $landing_page->status == 1 ? 'checked' : ''}}>
                    <label class="custom-control-label" for="section_9"></label>
                </div>
            </div>
        </div>
        <div class="row" id='enable_section_9'>
            <div class="form-group col-md-12">
                {{ Form::label('title',trans('messages.title').' <span class="text-danger">*</span>',['class'=>'form-control-label'], false ) }}
                {{ Form::text('title',old('title'),['id'=>'title','placeholder' => trans('messages.title'),'class' =>'form-control']) }}
                <small class="help-block with-errors text-danger"></small>
            </div>
            <div class="form-group col-md-12 d-flex justify-content-between">
            <label for="enable_overall_rating">{{__('messages.enable_overall_rating')}}</label>
            <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" name="overall_rating" id="overall_rating">
                <label class="custom-control-label" for="overall_rating"></label>
            </div>
            </div>
            <div class="form-group col-md-12">
                {{ Form::label('description',trans('messages.description'),['class'=>'form-control-label'], false ) }}
                {{ Form::textarea('description',null,['id'=>'description','placeholder' => trans('messages.description'),'class' =>'form-control textarea',  'rows'=>2]) }}
                <small class="help-block with-errors text-danger"></small>
            </div>
            
        </div>
    {{ Form::submit(__('messages.save'), ['class'=>"btn btn-md btn-primary float-md-right submit_section1"]) }}
    {{ Form::close() }}

<script>
    var enable_section_9 = $("input[name='status']").prop('checked');
    checkSection1(enable_section_9);

    $('#section_9').change(function() {
        value = $(this).prop('checked') == true ? true : false;
        checkSection1(value);
    });

    function checkSection1(value) {
        if (value == true) {
            $('#enable_section_9').removeClass('d-none');
            $('#title').prop('required', true);
        } else {
            $('#enable_section_9').addClass('d-none');
            $('#title').prop('required', false);
        }
    }


    var get_value = $('input[name="status"]:checked').data("type");
    getConfig(get_value)
    $('.section_9').change(function(){
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
                var section_9 = title = overall_rating = description = '';

                if (response && response.data.value !== undefined) {
                    if (response.data.key == 'section_9') {
                        obj = JSON.parse(response.data.value);
                    }
                    if (obj !== null) {
                        var title = obj.title;
                        var overall_rating = obj.overall_rating;
                        var description = obj.description;
                       
                    }
                    $('#title').val(title)
                    $('#overall_rating').prop('checked', overall_rating == 'on');
                    $('#description').val(description)
                   
                }
            },
            error: function (error) {
                console.log(error);
            }
        });
    }

 



</script>
