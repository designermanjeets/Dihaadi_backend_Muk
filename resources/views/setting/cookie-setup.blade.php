{{ Form::model($cookiesetup, ['method' => 'POST','route' => ['cookiesetup'],'enctype'=>'multipart/form-data','data-toggle'=>'validator']) }}

{{ Form::hidden('id', null, array('placeholder' => 'id','class' => 'form-control')) }}
{{ Form::hidden('page', $page, array('placeholder' => 'id','class' => 'form-control')) }}
<div class="row">
    <div class="col-lg-12"> 

        <div class="form-group">
            <label for="" class="col-sm-6 form-control-label">{{ __('messages.title') }}</label>
            <div class="col-sm-12">
                {{ Form::text('title', null, ['class'=>"form-control" ,'placeholder'=> __('messages.title') ]) }}
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-sm-6 form-control-label">{{ __('messages.description') }}</label>
            <div class="col-sm-12">
                {{ Form::textarea('description', null, ['class'=>"form-control textarea" , 'rows'=>3  , 'placeholder'=> __('messages.description')]) }}
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

