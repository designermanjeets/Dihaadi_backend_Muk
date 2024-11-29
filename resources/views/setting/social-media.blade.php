{{ Form::model($socialmedia, ['method' => 'POST','route' => ['socialMedia'],'enctype'=>'multipart/form-data','data-toggle'=>'validator']) }}

{{ Form::hidden('id', null, array('placeholder' => 'id','class' => 'form-control')) }}
{{ Form::hidden('page', $page, array('placeholder' => 'id','class' => 'form-control')) }}
<div class="row">
    <div class="col-lg-6"> 
        <div class="form-group">
            <label for="" class="col-sm-6 form-control-label">{{ __('messages.facebook_url') }}</label>
            <div class="col-sm-12">
                {{ Form::text('facebook_url', null, ['class'=>"form-control" , 'placeholder'=>__('messages.facebook_url_placeholder') ]) }}
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-sm-6 form-control-label">{{ __('messages.twitter_url') }}</label>
            <div class="col-sm-12">
                {{ Form::text('twitter_url', null, ['class'=>"form-control" , 'placeholder'=>__('messages.twitter_url_placeholder') ]) }}
            </div>
        </div>
        
        <div class="form-group">
            <label for="" class="col-sm-6 form-control-label">{{ __('messages.linkedin_url') }}</label>
            <div class="col-sm-12">
                {{ Form::text('linkedin_url', null, ['class'=>"form-control" , 'placeholder'=> __('messages.linkedin_url_placeholder') ]) }}
            </div>
        </div>
    </div>
    <div class="col-lg-6">

        <div class="form-group">
            <label for="" class="col-sm-6 form-control-label">{{ __('messages.instagram_url') }}</label>
            <div class="col-sm-12">
                {{ Form::text('instagram_url', null, ['class'=>"form-control" , 'placeholder'=> __('messages.instagram_url_placeholder') ]) }}
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-6 form-control-label">{{ __('messages.youtube_url') }}</label>
            <div class="col-sm-12">
                {{ Form::text('youtube_url', null, ['class'=>"form-control" , 'placeholder'=> __('messages.youtube_url_placeholder') ]) }}
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
    
</script>
