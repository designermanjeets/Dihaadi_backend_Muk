
{{ Form::model($landing_page, ['method' => 'POST','route' => ['landing_page_settings_updates'],'enctype'=>'multipart/form-data','data-toggle'=>'validator','id'=>'frontend_setting']) }}

{{ Form::hidden('id', null, array('placeholder' => 'id','class' => 'form-control')) }}
{{ Form::hidden('type', $tabpage, array('placeholder' => 'id','class' => 'form-control')) }}
        <div class="row">
            <div class="form-group col-md-12 d-flex justify-content-between">
                <label for="enable_section_6">{{__('messages.enable_section_6')}}</label>
                <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input section_6" name="status" id="section_6" data-type="section_6"  {{!empty($landing_page) && $landing_page->status == 1 ? 'checked' : ''}}>
                    <label class="custom-control-label" for="section_6"></label>
                </div>
            </div>
        </div>
        <div class="row" id='enable_section_6'>
            <div class="form-group col-md-6">
                {{ Form::label('title',trans('messages.title').' <span class="text-danger">*</span>',['class'=>'form-control-label'], false ) }}
                {{ Form::text('title',old('title'),['id'=>'title','placeholder' => trans('messages.title'),'class' =>'form-control']) }}
                <small class="help-block with-errors text-danger"></small>
            </div>
            
            <div class="form-group col-md-6">
            <label for="avatar" class="col-sm-6 form-control-label">{{ __('messages.main_image') }}</label>
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-4">
                        <img src="{{ getSingleMedia($landing_page,'main_image') }}" width="100"  id="main_image_preview" alt="main_image" class="image main_image main_image_preview">
                        @if($landing_page && getMediaFileExit($landing_page, 'main_image'))
                            <a class="text-danger remove-file" href="{{ route('remove.file', ['id' => $landing_page->id, 'type' => 'main_image']) }}"
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
                            {{ Form::file('main_image', ['class'=>"custom-file-input custom-file-input-sm detail" , 'id'=>"main_image" , 'lang'=>"en" , 'accept'=>"image/*", 'onchange'=>"preview()"]) }}
                            @if($landing_page && getMediaFileExit($landing_page, 'main_image'))
                            <label class="custom-file-label upload-label">{{ $landing_page->getFirstMedia('main_image')->file_name }}</label>
                            @else
                            <label class="custom-file-label upload-label">{{ __('messages.choose_file',['file' =>  __('messages.attachments') ]) }}</label>
                            @endif
                        </div>
                        <img id="main_image" src="" width="150px" />
                    </div>
                </div>

            </div>
        </div>
        <div class="form-group col-md-6">
            <label for="avatar" class="col-sm-6 form-control-label">{{ __('messages.google_image') }}</label>
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-4">
                        <img src="{{ getSingleMedia($landing_page,'google_play') }}" width="100"  id="google_play_preview" alt="google_play" class="image google_play google_play_preview">
                        @if($landing_page && getMediaFileExit($landing_page, 'google_play'))
                            <a class="text-danger remove-file" href="{{ route('remove.file', ['id' => $landing_page->id, 'type' => 'google_play']) }}"
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
                            {{ Form::file('google_play', ['class'=>"custom-file-input custom-file-input-sm detail" , 'id'=>"google_play" , 'lang'=>"en" , 'accept'=>"image/*", 'onchange'=>"preview()"]) }}
                            
                            @if($landing_page && getMediaFileExit($landing_page, 'google_play'))
                            <label class="custom-file-label upload-label">{{ $landing_page->getFirstMedia('google_play')->file_name }}</label>
                            @else
                            <label class="custom-file-label upload-label">{{ __('messages.choose_file',['file' =>  __('messages.attachments') ]) }}</label>
                            @endif
                        </div>
                        <img id="google_play" src="" width="150px" />
                    </div>
                </div>

            </div>
        </div>
        <div class="form-group col-md-6">
            <label for="avatar" class="col-sm-6 form-control-label">{{ __('messages.app_store') }}</label>
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-4">
                        <img src="{{ getSingleMedia($landing_page,'app_store') }}" width="100"  id="app_store_preview" alt="app_store" class="image app_store app_store_preview">
                        @if($landing_page && getMediaFileExit($landing_page, 'app_store'))
                            <a class="text-danger remove-file" href="{{ route('remove.file', ['id' => $landing_page->id, 'type' => 'app_store']) }}"
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
                            {{ Form::file('app_store', ['class'=>"custom-file-input custom-file-input-sm detail" , 'id'=>"app_store" , 'lang'=>"en" , 'accept'=>"image/*", 'onchange'=>"preview()"]) }}
                            @if($landing_page && getMediaFileExit($landing_page, 'app_store'))
                            <label class="custom-file-label upload-label">{{ $landing_page->getFirstMedia('app_store')->file_name }}</label>
                            @else
                            <label class="custom-file-label upload-label">{{ __('messages.choose_file',['file' =>  __('messages.attachments') ]) }}</label>
                            @endif
                        </div>
                        <img id="app_store" src="" width="150px" />
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
    var enable_section_6 = $("input[name='status']").prop('checked');
    checkSection3(enable_section_6);

    $('#section_6').change(function() {
        value = $(this).prop('checked') == true ? true : false;
        checkSection3(value);
        
    });

    function checkSection3(value) {
        if (value == true) {
            $('#enable_section_6').removeClass('d-none');
            $('#title').prop('required', true);
        } else {
            $('#enable_section_6').addClass('d-none');
            $('#title').prop('required', false);
        }
    }


    

    var get_value = $('input[name="status"]:checked').data("type");
    getConfig(get_value)
    $('.section_6').change(function(){
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
                var section_6 = title = description = '';

                if (response) {
                    if (response.data.key == 'section_6') {
                        obj = JSON.parse(response.data.value);
                    }
                    if (obj !== null) {
                        var title = obj.title;
                        var description = obj.description;
                    }
                    $('#title').val(title);
                    $('#description').val(description);
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
        $(document).on('change','#main_image',function(){
            readURL(this,'main_image');
        });
        $(document).on('change','#google_play',function(){
            readURL(this,'google_play');
        });
        $(document).on('change','#app_store',function(){
            readURL(this,'app_store');
        });
    })
    function preview() {
    var input = event.target;
    var previewImage;
    if (input.name === 'main_image') {
        previewImage = main_image;
    } else if (input.name === 'google_play') {
        previewImage = google_play;
    } else if (input.name === 'app_store') {
        previewImage = app_store;
    }
    previewImage.src = URL.createObjectURL(input.files[0]);
    var fileName = input.files[0].name;
    var label = $(input).closest('.custom-file').find('.custom-file-label');
    label.text(fileName);
}
</script>
