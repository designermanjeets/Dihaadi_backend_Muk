
{{ Form::model($landing_page_data, ['method' => 'POST','route' => ['login_register_page_settings'],'enctype'=>'multipart/form-data','data-toggle'=>'validator','id'=>'frontend_setting']) }}

{{ Form::hidden('id', null, array('placeholder' => 'id','class' => 'form-control')) }}
{{ Form::hidden('type', $tabpage, array('placeholder' => 'id','class' => 'form-control')) }}
        <div class="row">
            <div class="form-group col-md-12 d-flex ">
                <label for="enable_login_register">{{__('messages.enable_login_register')}}</label>
                <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input login_register" name="status" id="login_register" data-type="login_register"  {{!empty($landing_page_data) && $landing_page_data->status == 1 ? 'checked' : ''}}>
                    <label class="custom-control-label" for="login_register"></label>
                </div>
            </div>
        </div>
        <div class="row" id='enable_login_register'>
            <div class="form-group col-md-6">
                {{ Form::label('title',trans('messages.title').' <span class="text-danger">*</span>',['class'=>'form-control-label'], false ) }}
                {{ Form::text('title',old('title'),['id'=>'title','placeholder' => trans('messages.title'),'class' =>'form-control']) }}
                <small class="help-block with-errors text-danger"></small>
            </div>
           
            <div class="form-group col-md-6">
                <label for="avatar" class="col-sm-6 form-control-label">{{ __('messages.image') }}</label>
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-4">
                            <img src="{{ getSingleMedia($landing_page_data,'login_register_image') }}" width="100"  id="login_register_image_preview" alt="login_register_image" class="image login_register_image login_register_image_preview">
                            @if($landing_page_data && getMediaFileExit($landing_page_data, 'login_register_image'))
                                <a class="text-danger remove-file" href="{{ route('remove.file', ['id' => $landing_page_data->id, 'type' => 'login_register_image']) }}"
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
                                {{ Form::file('login_register_image', ['class'=>"custom-file-input custom-file-input-sm detail" , 'id'=>"login_register_image" , 'lang'=>"en" , 'accept'=>"image/*", 'onchange'=>"preview()"]) }}
                                @if($landing_page_data && getMediaFileExit($landing_page_data, 'login_register_image'))
                                    <label class="custom-file-label upload-label">{{ $landing_page_data->getFirstMedia('login_register_image')->file_name }}</label>
                                @else
                                    <label class="custom-file-label upload-label">{{ __('messages.choose_file',['file' =>  __('messages.attachments') ]) }}</label>
                                @endif
                            </div>
                            <img id="login_register_image" src="" width="150px" />
                        </div>
                    </div>

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
    var enable_login_register = $("input[name='status']").prop('checked');
    checkSection3(enable_login_register);

    $('#login_register').change(function() {
        value = $(this).prop('checked') == true ? true : false;
        checkSection3(value);
        
    });

    function checkSection3(value) {
        if (value == true) {
            $('#enable_login_register').removeClass('d-none');
            $('#title').prop('required', true);
        } else {
            $('#enable_login_register').addClass('d-none');
            $('#title').prop('required', false);
        }
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
        $(document).on('change','#login_register_image',function(){
            readURL(this,'login_register_image');
        });
    })
    function preview() {
        var input = event.target;
        login_register_image.src = URL.createObjectURL(input.files[0]);
        var fileName = input.files[0].name;
        var label = $(input).closest('.custom-file').find('.custom-file-label');
        label.text(fileName);
    }
</script>
