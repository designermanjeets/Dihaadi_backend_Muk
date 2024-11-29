<x-master-layout>
    <div class="container-fluid">
    @include('partials._provider')
        <div class="row">
        <div class="col-lg-12">
                <div class="card card-block card-stretch">
                    <div class="card-body p-0">
                        <div class="d-flex justify-content-between align-items-center p-3 flex-wrap gap-3">
                            <h5 class="font-weight-bold">{{ $pageTitle ?? __('messages.list') }}</h5>
                            @if($auth_user->can('provideraddress list'))
                                <a href="{{ route('provideraddress.show',['provideraddress' => $providerdata->id]) }}" class="float-right btn btn-sm btn-primary"><i class="fa fa-angle-double-left"></i> {{ __('messages.back') }}</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        {{ Form::model($provideraddress ?? '',['method' => 'POST','route'=>'provideraddress.store', 'data-toggle'=>"validator" ,'id'=>'provideraddress'] ) }}
                            {{ Form::hidden('id') }}
                            <div class="row">
                                @if(auth()->user()->hasAnyRole(['admin','demo_admin']))
                                    <div class="form-group col-md-4">
                                        {{ Form::label('provider_id', __('messages.select_name',[ 'select' => __('messages.providers') ]).' <span class="text-danger">*</span>',['class'=>'form-control-label'],false) }}
                                        <br />
                                        {{ Form::select('provider_id',[$providerdata->id => $providerdata->display_name],$providerdata->id, 
                                            [
                                            'class' => 'select2js form-group providers',
                                            'required',
                                            'data-placeholder' => __('messages.select_name',[ 'select' => __('messages.providers') ]),
                                            'data-ajax--url' => route('ajax-list', ['type' => 'provider']),
                                        ]) }}
                                    </div>
                                @endif
                              
                                
                                <div id="latFields" class="form-group col-md-4">
                                    {{ Form::label('latitude',__('messages.latitude').' ',['class'=>'form-control-label'], false ) }}
                                    {{ Form::number('latitude',old('latitude'), ['id' => 'latitude', 'placeholder' => '00.0000','class' =>'form-control','step'=>'any']) }}
                                </div>

                                <div id="lngFields" class="form-group col-md-4">
                                    {{ Form::label('longitude',__('messages.longitude').' ',['class'=>'form-control-label'], false ) }}
                                    {{ Form::number('longitude',old('longitude'), ['id' => 'longitude', 'placeholder' => '00.0000','class' =>'form-control','step'=>'any']) }}
                                </div>

                                <div class="form-group col-md-4">
                                    {{ Form::label('status',__('messages.status').' <span class="text-danger">*</span>',['class'=>'form-control-label'],false) }}
                                    {{ Form::select('status',['1' => __('messages.active') , '0' => __('messages.inactive') ],old('status'),[ 'id' => 'role' ,'class' =>'form-control select2js','required']) }}
                                </div>

                                <div class="form-group col-md-4">
                                    {{ Form::label('address',__('messages.address').' <span class="text-danger">*</span>',['class'=>'form-control-label'],false) }}
                                    {{ Form::textarea('address', null, ['id' => 'address-input', 'class'=>"form-control textarea" , 'required','rows'=>3  , 'placeholder'=> __('messages.address') ]) }}
                                    <small class="help-block with-errors text-danger"></small>
                                </div>  
                            </div>
                            {{ Form::submit( __('messages.save'), ['class'=>'btn btn-md btn-primary float-right']) }}
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-master-layout>
<script>
    $('#address-input').on('input', function() {
        var address = $(this).val();

        if (address) {
            $.ajax({
                url: '{{ route("getLatLong") }}',
                method: 'POST',
                data: { address: address },
                dataType: 'json',
                success: function(response) {
                    var latitude = response.latitude;
                    var longitude = response.longitude;
                    if (latitude != null && longitude != null) {
                       
                        $('#latitude').val(latitude);
                        $('#longitude').val(longitude);
                    }
                },
                error: function(error) {
                    console.error('Error:', error);
                }
            });
        } 
    });

</script>
