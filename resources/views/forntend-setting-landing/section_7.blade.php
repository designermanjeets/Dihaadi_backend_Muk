
{{ Form::model($landing_page, ['method' => 'POST','route' => ['landing_page_settings_updates'],'enctype'=>'multipart/form-data','data-toggle'=>'validator','id'=>'frontend_setting']) }}

{{ Form::hidden('id', null, array('placeholder' => 'id','class' => 'form-control')) }}
{{ Form::hidden('type', $tabpage, array('placeholder' => 'id','class' => 'form-control')) }}
        <div class="row">
            <div class="form-group col-md-12 d-flex justify-content-between">
                <label for="enable_section_7">{{__('messages.enable_section_7')}}</label>
                <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input section_7" name="status" id="section_7" data-type="section_7"  {{!empty($landing_page) && $landing_page->status == 1 ? 'checked' : ''}}>
                    <label class="custom-control-label" for="section_7"></label>
                </div>
            </div>
        </div>
        <div class="row" id='enable_section_7'>
            <div class="form-group col-md-6">
                {{ Form::label('title',trans('messages.title').' <span class="text-danger">*</span>',['class'=>'form-control-label'], false ) }}
                {{ Form::text('title',old('title'),['id'=>'title','placeholder' => trans('messages.title'),'class' =>'form-control']) }}
                <small class="help-block with-errors text-danger"></small>
            </div>
            <div class="form-group col-md-6">
                {{ Form::label('url',trans('messages.url').' <span class="text-danger">*</span>',['class'=>'form-control-label'], false ) }}
                {{ Form::text('url',old('url'),['id'=>'url','placeholder' => trans('messages.url'),'class' =>'form-control']) }}
                <small class="help-block with-errors text-danger"></small>
            </div>
            
            
            <div class="form-group col-md-6">
                <label for="avatar" class="col-sm-6 form-control-label">{{ __('messages.image') }}</label>
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-4">
                            <img src="{{ getSingleMedia($landing_page,'vimage') }}" width="100"  id="vimage_preview" alt="vimage" class="image vimage vimage_preview">
                            @if($landing_page && getMediaFileExit($landing_page, 'vimage'))
                                <a class="text-danger remove-file" href="{{ route('remove.file', ['id' => $landing_page->id, 'type' => 'vimage']) }}"
                                    data--submit="confirm_form"
                                    data--confirmation='true'
                                    data--ajax="true"
                                    title='{{ __("messages.remove_file_title" , ["name" =>  __("messages.image") ]) }}'
                                    data-title='{{ __("messages.remove_file_title" , ["name" =>  __("messages.image") ]) }}'
                                    data-message='{{ __("messages.remove_file_msg") }}'>
                                    <i class="ri-close-circle-line"></i>
                                </a>
                            @endif
                        </div>
                        <div class="col-sm-8 mt-sm-0 mt-2">
                            <div class="custom-file col-md-12">
                                {{ Form::file('vimage', ['class'=>"custom-file-input custom-file-input-sm detail" , 'id'=>"vimage" , 'lang'=>"en" , 'accept'=>"image/*", 'onchange'=>"preview()"]) }}
                                @if($landing_page && getMediaFileExit($landing_page, 'vimage'))
                                <label class="custom-file-label upload-label">{{ $landing_page->getFirstMedia('vimage')->file_name }}</label>
                                @else
                                <label class="custom-file-label upload-label">{{ __('messages.choose_file',['file' =>  __('messages.attachments') ]) }}</label>
                                @endif
                            </div>
                            <img id="vimage" src="" width="150px" />
                        </div>
                    </div>

                </div>
            </div>
            
            <div class="form-group col-md-12">
                {{ Form::label('description',__('messages.description'), ['class' => 'form-control-label']) }}
                {{ Form::textarea('description', null, ['class'=>"form-control textarea" , 'rows'=>2  , 'placeholder'=> __('messages.description') ]) }}
            </div>
            
            @if($landing_page && $landing_page->value != null)
                @php
                    $landingPageValue = json_decode($landing_page->value, true);
                @endphp

                @foreach($landingPageValue['subtitle'] as $index => $subtitle)
                    <div class="form-section1 form-group col-md-12 ">
                    @if(isset($landingPageValue['subtitle'][$index]) || ($landingPageValue['subdescription'][$index]))
                        <div class="row">
                            <div class="form-group col-md-12">
                                {{ Form::label('subtitle',__('messages.subtitle'), ['class' => 'form-control-label']) }}
                                {{ Form::text("subtitle[$index]", is_array($subtitle) ? $subtitle[0] : $subtitle, ['id' => 'subtitle_'.$index, 'placeholder' => trans('messages.subtitle'), 'class' => 'form-control']) }}
                            </div>
                            <div class="form-group col-md-12">  
                                {{ Form::label('subdescription',__('messages.subdescription'), ['class' => 'form-control-label']) }}
                                {{ Form::textarea("subdescription[$index]", is_array($landingPageValue['subdescription'][$index]) ? $landingPageValue['subdescription'][$index][0] : $landingPageValue['subdescription'][$index], ['id' => 'subdescription_'.$index, 'placeholder' => trans('messages.subdescription'), 'class' => 'form-control textarea', 'rows'=>2]) }}
                            </div>
                            <small class="help-block with-errors text-danger"></small>
                            <div class="form-group col-3 mb-0 align-self-center">
                                <button class="remove-section1 button-custom button-remove"  title="Remove" data--confirmation1='true'>
                                <i class="far fa-trash-alt"></i>
                                </button>
                            </div>
                        </div>
                    @endif
                    </div>

                @endforeach

            @endif 
            
                <div class="form-section form-group col-md-12 ">
                    <div class="form-group col-md-12">
                        {{ Form::label('subtitle',__('messages.subtitle'), ['class' => 'form-control-label']) }}
                        {{ Form::text('subtitle[]', '', ['class'=>"form-control" , 'placeholder'=> __('messages.subtitle') ]) }}
                    </div>
                    <div class="form-group col-md-12">
                        {{ Form::label('subdescription',__('messages.subdescription'), ['class' => 'form-control-label']) }}
                        {{ Form::textarea('subdescription[]', '', ['class'=>"form-control textarea" , 'rows'=>2  , 'placeholder'=> __('messages.subdescription') ]) }}
                    </div>
                    <div class="col-md-6 text-md-left pr-1">
                        <button class="remove-section  button-custom button-remove" title="Remove" data--confirmation1='true'>
                            <i class="far fa-trash-alt"></i>
                        </button>
                    </div>
                </div>
            
            <div class="form-group col-md-12">
                <div class="form-group row">
                    <div class="col-md-9 text-md-right pr-1">
                        <button type="button" id="add-section" class="button-custom button-added">
                            <i class="fas fa-plus mr-2"></i>Add More 
                        </button>
                    </div>
                    <div class="col-md-3"></div>
                </div>
            </div>

        </div>
                     

        
       
    {{ Form::submit(__('messages.save'), ['class'=>"btn btn-md btn-primary float-md-right submit_section1"]) }}
    {{ Form::close() }}

<script>
    var enable_section_7 = $("input[name='status']").prop('checked');
    checkSection3(enable_section_7);

    $('#section_7').change(function() {
        value = $(this).prop('checked') == true ? true : false;
        checkSection3(value);
        
    });

    function checkSection3(value) {
        if (value == true) {
            $('#enable_section_7').removeClass('d-none');
            $('#title').prop('required', true);
            $('#url').prop('required', true);
        } else {
            $('#enable_section_7').addClass('d-none');
            $('#title').prop('required', false);
            $('#url').prop('required', false);
        }
    }

    $(document).ready(function () {
        var maxSections = 5; 

         //hide form section
        function hideFormSection(){
            if($(".form-section1").length >= maxSections){
                $('.form-section').hide();
            }else{
                $('.form-section').show();
            }
        }
        hideFormSection();

        // Add Section
        $("#add-section").click(function () {
            var totalSections = $(".form-section").length + $(".form-section1").length;
            if (totalSections < maxSections) {
                var newSection = $(".form-section:first").clone();
                newSection.find('input,textarea').val(''); // Clear input values
                $(".form-section:last").after(newSection);
                updateRemoveButtonVisibility();
            }
            hideFormSection();
        });

        // Remove Section
        $(document).on('click', '.remove-section[data--confirmation1="true"]', function(e) {
            e.preventDefault();

            var confirmationMessage = $(this).data('message') || 'Are you sure you want to delete?';
            var _this = this;
            $.confirm({
                content: confirmationMessage,
                type: '',
                title: 'Remove Section',
                buttons: {
                    yes: {
                        action: function() {
                            if ($(".form-section").length > 1) {
                            $(_this).closest('.form-section').remove();
                            updateRemoveButtonVisibility();
                            hideFormSection();
                            }
                            
                            var form = $(this).attr('data--submit');
                                if (form == 'confirm_form') {
                                    $('#confirm_form').attr('action', $(_this).attr('href'));
                                }
                                $('[data--submit="'+form+'"]').submit();
                                
                        }
                    },
                    no: {
                        action: function() {}
                    },
                },
                theme: 'material'
            });
        });


        // Remove Section1
        $(document).on('click', '.remove-section1[data--confirmation1="true"]', function(e) {
            e.preventDefault();

            var confirmationMessage = $(this).data('message') || 'Are you sure you want to delete?';
            var _this = this;

            $.confirm({
                content: confirmationMessage,
                type: '',
                title: 'Remove Section1',
                buttons: {
                    yes: {
                        action: function() {
                            $(_this).closest('.form-section1').remove();
                            var form = $(this).attr('data--submit');
                                if (form == 'confirm_form') {
                                    $('#confirm_form').attr('action', $(_this).attr('href'));
                                }
                                $('[data--submit="'+form+'"]').submit();
                        }
                    },
                    no: {
                        action: function() {}
                    },
                },
                theme: 'material'
            });
        });

       
       
        // Function to update Remove button visibility
        function updateRemoveButtonVisibility() {
            if ($(".form-section").length > 1) {
                $('.remove-section').show();
            } else {
                $('.remove-section').hide();
            }
        }

        // Initially hide Remove button if there's only one section
        updateRemoveButtonVisibility();
    });
    

    var get_value = $('input[name="status"]:checked').data("type");
    getConfig(get_value)
    $('.section_7').change(function(){
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
                var section_7 = title = description = url = subtitle= subdescription ='';

                if (response && response.data.value !== undefined) {
                    if (response.data.key == 'section_7') {
                        obj = JSON.parse(response.data.value);
                    }

                    if (obj !== null) {
                        var title = obj.title;
                        var description = obj.description;
                        var url = obj.url;
                        var subtitle = obj.subtitle;
                        var subdescription = obj.subdescription;
                    }
                    $('#title').val(title);
                    $('#description').val(description);
                    $('#url').val(url);
                    $('#subtitle').val(Array.isArray(subtitle) ? subtitle.join(', ') : subtitle);
                    $('#subdescription').val(Array.isArray(subdescription) ? subdescription.join(', ') : subdescription);
                }
            },
            error: function (error) {
                console.log(error);
            }
        });
    }

    function getExtension(filename) {
            var parts = filename.split('.');
            return parts[parts.length - 1];
        }
        function isImage(filename) {
            var ext = getExtension(filename);
            switch (ext.toLowerCase()) {
                case 'jpg':
                case 'jpeg':
                case 'png':
                case 'gif':
                case 'ico':
                    return true;
            }
            return false;
        }
    function readURL(input,className) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            var res = isImage(input.files[0].name);
            if(res == false){
                var msg = 'Image should be png/PNG, jpg/JPG & jpeg/JPG.';
                Snackbar.show({text: msg ,pos: 'bottom-right',backgroundColor:'#d32f2f',actionTextColor:'#fff'});
                $(input).val("");
                return false;
            }
            reader.onload = function(e){
                $(document).find('img.'+className).attr('src', e.target.result);
                $(document).find("label."+className).text((input.files[0].name));
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
    $(document).ready(function (){
        $('.select2js').select2();
        $(document).on('change','#vimage',function(){
            readURL(this,'vimage');
        });
    })
    function preview() {
        var input = event.target;
        vimage.src = URL.createObjectURL(input.files[0]);
        var fileName = input.files[0].name;
        var label = $(input).closest('.custom-file').find('.custom-file-label');
        label.text(fileName);
    }
</script>
