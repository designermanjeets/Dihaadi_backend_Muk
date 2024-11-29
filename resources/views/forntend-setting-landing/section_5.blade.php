
{{ Form::model($landing_page, ['method' => 'POST','route' => ['landing_page_settings_updates'],'enctype'=>'multipart/form-data','data-toggle'=>'validator','id'=>'frontend_setting']) }}

{{ Form::hidden('id', null, array('placeholder' => 'id','class' => 'form-control')) }}
{{ Form::hidden('type', $tabpage, array('placeholder' => 'id','class' => 'form-control')) }}
        <div class="row">
            <div class="form-group col-md-12 d-flex justify-content-between">
                <label for="enable_section_5">{{__('messages.enable_section_5')}}</label>
                <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input section_5" name="status" id="section_5" data-type="section_5"  {{!empty($landing_page) && $landing_page->status == 1 ? 'checked' : ''}}>
                    <label class="custom-control-label" for="section_5"></label>
                </div>
            </div>
        </div>
        <div class="row" id='enable_section_5'>
            <div class="form-group col-md-6">
                {{ Form::label('title',trans('messages.title').' <span class="text-danger">*</span>',['class'=>'form-control-label'], false ) }}
                {{ Form::text('title',old('title'),['id'=>'title','placeholder' => trans('messages.title'),'class' =>'form-control']) }}
                <small class="help-block with-errors text-danger"></small>
            </div>
            <div class="form-group col-md-6">
                {{ Form::label('email', __('messages.email').' ', ['class' => 'form-control-label'], false) }}
                {{ Form::email('email', old('email'), ['placeholder' => __('messages.email'), 'class' => 'form-control',  'pattern' => '[^@]+@[^@]+\.[a-zA-Z]{2,}', 'title' => 'Please enter a valid email address']) }}
                <small class="help-block with-errors text-danger"></small>
            </div>
            <div class="form-group col-md-6">
                {{ Form::label('contact_number', __('messages.contact_number').' ', ['class' => 'form-control-label'], false) }}
                {{ Form::text('contact_number', old('contact_number'), ['placeholder' => __('messages.contact_number'), 'class' => 'form-control contact_number']) }}
                <small class="help-block with-errors text-danger " id="contact_number_err"></small>
            </div>
            <div class="form-group col-md-6">
                <label class="form-control-label" for="section5_attachment">{{ __('messages.image') }}</label>
                <div class="custom-file">
                    <input type="file" name="section5_attachment[]" class="custom-file-input" data-file-error="{{ __('messages.files_not_allowed') }}" multiple onchange="preview()">
                    @if($landing_page && getMediaFileExit($landing_page, 'section5_attachment'))
                        <label class="custom-file-label upload-label">{{ $landing_page->getFirstMedia('section5_attachment')->file_name }}</label>
                    @else
                        <label class="custom-file-label upload-label">{{ __('messages.choose_file',['file' =>  __('messages.attachments') ]) }}</label>
                    @endif
                </div>
                <img id="frontend_image_preview" src="" width="150px" />
            </div>
            <div class="row section5_attachment_div">
            <div class="col-md-12">
                @if($landing_page && getMediaFileExit($landing_page, 'section5_attachment'))
                    @php
                        $attchments = $landing_page->getMedia('section5_attachment');
                        $file_extention = config('constant.IMAGE_EXTENTIONS');
                    @endphp
                    <div class="border-left-2">
                        <p class="ml-2"><b>{{ __('messages.attached_files') }}</b></p>
                        <div class="ml-2 my-3">
                            <div class="row">
                            @foreach($attchments as $attchment )
                                <?php
                                    $extention = in_array(strtolower(imageExtention($attchment->getFullUrl())), $file_extention);
                                ?>
                                <div class="col-md-2 pr-10 text-center galary file-gallary-{{$landing_page->id}}"
                                    data-gallery=".file-gallary-{{$landing_page->id}}"
                                    id="section5_attachment_preview_{{$attchment->id}}">
                                    @if($extention)
                                        <a id="attachment_files" href="{{ $attchment->getFullUrl() }}" class="list-group-item-action attachment-list" target="_blank">
                                            <img src="{{ $attchment->getFullUrl() }}" class="attachment-image" alt="">
                                        </a>
                                    @else
                                        <a id="attachment_files" class="video list-group-item-action attachment-list" href="{{ $attchment->getFullUrl() }}">
                                            <img src="{{ asset('images/file.png') }}" class="attachment-file">
                                        </a>
                                    @endif
                                    <a class="text-danger remove-file" href="{{ route('remove.file', ['id' => $attchment->id, 'type' => 'section5_attachment']) }}"
                                        data--submit="confirm_form" data--confirmation='true'
                                        data--ajax="true" data-toggle="tooltip"
                                        title='{{ __("messages.remove_file_title" , ["name" =>  __("messages.attachments") ] ) }}'
                                        data-title='{{ __("messages.remove_file_title" , ["name" =>  __("messages.attachments") ] ) }}'
                                        data-message='{{ __("messages.remove_file_msg") }}'>
                                        <i class="ri-close-circle-line"></i>
                                    </a>
                                </div>
                            @endforeach
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div> 
            <div class="form-group col-md-12">
                {{ Form::label('description',__('messages.description'), ['class' => 'form-control-label']) }}
                {{ Form::textarea('description', null, ['class'=>"form-control textarea" , 'rows'=>2  , 'placeholder'=> __('messages.description') ]) }}
            </div>
        </div>
                     

        
       
    {{ Form::submit(__('messages.save'), ['class'=>"btn btn-md btn-primary float-md-right submit_section1"]) }}
    {{ Form::close() }}

<script>
    var enable_section_5 = $("input[name='status']").prop('checked');
    checkSection5(enable_section_5);

    $('#section_5').change(function() {
        value = $(this).prop('checked') == true ? true : false;
        checkSection5(value);
        
    });

    function checkSection5(value) {
        if (value == true) {
            $('#enable_section_5').removeClass('d-none');
            $('#title').prop('required', true);
        } else {
            $('#enable_section_5').addClass('d-none');
            $('#title').prop('required', false);
        }
    }


    

    var get_value = $('input[name="status"]:checked').data("type");
    getConfig(get_value)
    $('.section_5').change(function(){
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
                var section_5 = title = description = email = contact_number = '';

                if (response) {
                    if (response.data.key == 'section_5') {
                        obj = JSON.parse(response.data.value);
                    }
                    if (obj !== null) {
                        var title = obj.title;
                        var email = obj.email;
                        var contact_number = obj.contact_number;
                        var description = obj.description;
                    }
                    $('#title').val(title);
                    $('#email').val(email);
                    $('#contact_number').val(contact_number);
                    $('#description').val(description);
                }
            },
            error: function (error) {
                console.log(error);
            }
        });
    }

    function preview() {
            frontend_image_preview.src = URL.createObjectURL(event.target.files[0]);
            var fileName = event.target.files[0].name;
            var label = $(event.target).closest('.custom-file').find('.custom-file-label');
            label.text(fileName);
        }

</script>
