{{ Form::model($themesetup, ['method' => 'POST','route' => ['themesetup'],'enctype'=>'multipart/form-data','data-toggle'=>'validator']) }}

{{ Form::hidden('id', null, array('placeholder' => 'id','class' => 'form-control')) }}
{{ Form::hidden('page', $page, array('placeholder' => 'id','class' => 'form-control')) }}
<div class="row">
    <div class="col-lg-6"> 
        <div class="form-group">
            <label for="avatar" class="col-sm-3 form-control-label">{{ __('messages.logo') }}</label>
            <div class="col-sm-12">

                <div class="row">
                    <div class="col-sm-4">
                    <img src="{{ getSingleMedia($themesetup,'logo') }}" width="100"  id="logo_preview" alt="logo" class="image logo logo_preview">
                            @if($themesetup && getMediaFileExit($themesetup, 'logo'))
                                <a class="text-danger remove-file" href="{{ route('remove.file', ['id' => $themesetup->id, 'type' => 'logo']) }}"
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
                        {{ Form::file('logo', ['class'=>"custom-file-input custom-file-input-sm detail" , 'id'=>"logo" , 'lang'=>"en" , 'accept'=>"image/*", 'onchange'=>"preview()"]) }}
                                @if($themesetup && getMediaFileExit($themesetup, 'logo'))
                                    <label class="custom-file-label upload-label">{{ $themesetup->getFirstMedia('logo')->file_name }}</label>
                                @else
                                    <label class="custom-file-label upload-label">{{ ('logo.png') }}</label>
                                @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="form-group">
            <label for="avatar" class="col-sm-6 form-control-label">{{ __('messages.favicon') }}</label>
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-4">
                        <img src="{{ getSingleMedia($themesetup,'favicon') }}" height="30"  id="favicon_preview" alt="favicon" class="image favicon favicon_preview">
                        @if($themesetup && getMediaFileExit($themesetup, 'favicon'))
                            <a class="text-danger remove-file" href="{{ route('remove.file', ['id' => $themesetup->id, 'type' => 'favicon']) }}"
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
                            {{ Form::file('favicon', ['class'=>"custom-file-input custom-file-input-sm detail" , 'id'=>"favicon" , 'lang'=>"en" , 'accept'=>"image/*",'onchange'=>"preview()"]) }}
                            @if($themesetup && getMediaFileExit($themesetup, 'favicon'))
                                <label class="custom-file-label upload-label">{{ $themesetup->getFirstMedia('favicon')->file_name }}</label>
                            @else
                                <label class="custom-file-label upload-label">{{ ('favicon.png') }}</label>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>

        
    </div>
    <div class="col-lg-6"> 
        <div class="form-group">
            <label for="avatar" class="col-sm-3 form-control-label">{{ __('messages.footer_logo') }}</label>
            <div class="col-sm-12">

                <div class="row">
                    <div class="col-sm-4">
                        <img src="{{ getSingleMedia($themesetup,'footer_logo') }}" width="100"  id="footer_logo_preview" alt="footer_logo" class="image footer_logo footer_logo_preview">
                        @if($themesetup && getMediaFileExit($themesetup, 'footer_logo'))
                            <a class="text-danger remove-file" href="{{ route('remove.file', ['id' => $themesetup->id, 'type' => 'footer_logo']) }}"
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
                            {{ Form::file('footer_logo', ['class'=>"custom-file-input custom-file-input-sm detail" , 'id'=>"footer_logo" , 'lang'=>"en" , 'accept'=>"image/*",'onchange'=>"preview()"]) }}
                            @if($themesetup && getMediaFileExit($themesetup, 'footer_logo'))
                                <label class="custom-file-label upload-label">{{ $themesetup->getFirstMedia('footer_logo')->file_name }}</label>
                            @else
                                <label class="custom-file-label upload-label">{{ ('logo.png') }}</label>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="form-group">
            <label for="avatar" class="col-sm-6 form-control-label">{{ __('messages.loader') }}</label>
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-4">
                        <img src="{{ getSingleMedia($themesetup,'loader') }}" style="height: 80px; width: auto;" id="loader_preview" alt="loader" class="image loader loader_preview">
                        @if($themesetup && getMediaFileExit($themesetup, 'loader'))
                            <a class="text-danger remove-file" href="{{ route('remove.file', ['id' => $themesetup->id, 'type' => 'loader']) }}"
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
                            {{ Form::file('loader', ['class'=>"custom-file-input custom-file-input-sm detail" , 'id'=>"loader" , 'lang'=>"en" , 'accept'=>"image/*",'onchange'=>"preview()"]) }}
                            @if($themesetup && getMediaFileExit($themesetup, 'loader'))
                                <label class="custom-file-label upload-label">{{ $themesetup->getFirstMedia('loader')->file_name }}</label>
                            @else
                                <label class="custom-file-label upload-label">{{ ('loader.gif') }}</label>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>

        
    </div>

     <div class="col-lg-12"> 
        <div class="form-group">
            <div class="col-md-offset-3 col-sm-12 ">
                {{ Form::submit(__('messages.save'), ['class'=>"btn btn-md btn-primary float-md-right"]) }}
            </div>
        </div>
     </div>
</div>
{{ Form::close() }}
<script>
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
        $(document).on('change','#logo',function(){
            readURL(this,'logo');
        });
        $(document).on('change','#favicon',function(){
            readURL(this,'favicon');
        });
        $(document).on('change','#footer_logo',function(){
            readURL(this,'footer_logo');
        });
        $(document).on('change','#loader',function(){
            readURL(this,'loader');
        });
    })
    function preview() {
    var input = event.target;
    var previewImage;
    if (input.name === 'logo') {
        previewImage = logo;
    } else if (input.name === 'favicon') {
        previewImage = favicon;
    } else if (input.name === 'footer_logo') {
        previewImage = footer_logo;
    } else if (input.name === 'loader') {
        previewImage = loader;
    }
    previewImage.src = URL.createObjectURL(input.files[0]);
    var fileName = input.files[0].name;
    var label = $(input).closest('.custom-file').find('.custom-file-label');
    label.text(fileName);
}
</script>
